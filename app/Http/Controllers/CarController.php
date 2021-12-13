<?php

namespace App\Http\Controllers;

use App\Mail\BookingMail;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Location;
use App\Price;
use App\Booking;
use App\BookingDetail;
use Mail;
use App\Services\SmsSendService;

class CarController extends Controller
{
    //
    protected $module_name = "";
    protected $model = "";
    protected $route_path = "car";
    protected $view_path = "car";
    protected $validations = [
        'name' => 'required',
    ];

    public function __construct(){

        $this->view_path = $this->view_path;

        $this->module_name = "car";
        //$this->model = new home();
        //View::share('module_name',$this->module_name);
        //View::share('route_path',$this->route_path);
    }

    public function index(Request $request)
    {
        $location = new Location();
        $price = new Price();
        $params = $request->all();
        $return = $params["return"];
        $car1 = $params["car_1"];
        $car2 = $params["car_2"];
        $date1 = $params["date1"];
        $date2 = $params["date2"];
        $time1 = $params["time1"];
        $time2 = $params["time2"];
        $person = $params["person"];
        $package_type = $params["package_type"];
        $car1Details = $location->getLocation($car1);
        $car2Details = $location->getLocation($car2);

        session(['return' => $return]);
        session(['date1' => $date1]);
        session(['date2' => $date2]);
        session(['time1' => $time1]);
        session(['time2' => $time2]);

        session(['car_1' => $car1]);
        session(['car_2' => $car2]);

        session(['person' => $person]);
        session(['package_type' => $package_type]);

        $start_location_id = 0;
        $stop_location_id = 0;
        if(isset($car1Details[0]) && $car1Details[0]->id){
            $start_location_id = $car1Details[0]->id;
        }
        if(isset($car2Details[0]) && $car2Details[0]->id){
            $stop_location_id = $car2Details[0]->id;
        }

        session(['start_location_id' => $start_location_id]);
        session(['stop_location_id' => $stop_location_id]);
        
        $vehicleList = $price->getVehicleList($start_location_id, $stop_location_id, $person);

        $setting = new Setting();
        $transferReturnDiscount = $setting->getSetting("TRANSFER_RETURN_DISCOUNT", 30);

        return view($this->view_path.'.index',compact(
            "vehicleList", "return", "car1", "car2", "date1", "date2", "time1", "time2",
            "transferReturnDiscount"
        ));
    }

    public function getlocation(Request $request)
    {
        $location = new Location();
        $items = $location->getLocation();

        return $items;
    }

    public function booking($id, Request $request)
    {
        $setting = new Setting();
        $transferReturnDiscount = $setting->getSetting("TRANSFER_RETURN_DISCOUNT", 30);

        $car1 = session('car_1');
        $car2 = session('car_2');
        $date1 = session('date1');
        $date2 = session('date2');
        $time1 = session('time1');
        $time2 = session('time2');
        $person = session('person');
        $return = session('return');
        $package_type = session(['package_type']);

        $params = $request->all();

        $price = new Price();
        $bookingDetails = $price->getPrice($id);
        $bookingDetails = $bookingDetails[0];


        if ($request->isMethod('post')) {

            $this->validate($request,  [
                'flight_number' => 'required',
                "passengers.*.firstname"  => "required|string",
                "passengers.*.lastname"  => "required|string",
                "passengers.*.email"  => "required|string",
                "passengers.*.phonenumber"  => "required|string",
                "passengers.*.pid"  => "required|string",
            ]);

            //validationları yap
            $bookingModel = new Booking();
            $bookingModel->user_id = 0;
            $bookingModel->payment_type = 1;
            $bookingModel->type = $return+1;
            $bookingModel->booking_datetime = date('Y-m-d H:i:s');
            $bookingModel->start_location_id = session('start_location_id');
            $bookingModel->stop_location_id = session('stop_location_id');
            $bookingModel->special_requirement = $params['special_requirement'];
            $bookingModel->flight_number = $params['flight_number'];
            $bookingModel->pickup_address = @$params['pickup_address'];
            $bookingModel->dropoff_address = @$params['dropoff_address'];
            $date1 = str_replace(".","-",$date1);
            $date2 = str_replace(".","-",$date2);
            $bookingModel->pickup_datetime = date('Y-m-d', strtotime($date1)) . " ".$time1;
            $bookingModel->dropoff_datetime = date('Y-m-d', strtotime($date2)). " ".$time2;
            $bookingModel->vehicle_id = $bookingDetails->vehicle_id;
            $bookingModel->passenger = session('person');
            $bookingModel->suitcase = session('package_type');
            $bookingModel->status = 0;
            $bookingModel->is_completed = 0;
            if($return=="0"){
                $bookingModel->transfer_price = $bookingDetails->price;
                $bookingModel->total_price = $bookingDetails->price * intval(session('person'));
            }else{
                $bookingModel->transfer_price = ($bookingDetails->price)*2;
                $bookingModel->total_price = ceil(((100 - $transferReturnDiscount) / 100) * (($bookingDetails->price * intval(session('person')))*2));
            }
            $bookingModel->save();

            $bookingId = $bookingModel->id;
            
            foreach ($params['passengers'] as $passenger){
                $bookingDetailModel = new BookingDetail();
                $bookingDetailModel->booking_id = $bookingId;
                $bookingDetailModel->name = $passenger['firstname'];
                $bookingDetailModel->surname = $passenger['lastname'];
                $bookingDetailModel->email =  $passenger['email'];
                $bookingDetailModel->phone =  $passenger['phonenumber'];
                $bookingDetailModel->pid =  $passenger['pid'];
                $bookingDetailModel->save();
                if(strlen($passenger['email'])>0) {
                    if (filter_var($passenger['email'], FILTER_VALIDATE_EMAIL)) {
                        if($_SERVER['SERVER_NAME']!="127.0.0.1") {
                            Mail::to($passenger['email'])->send(new BookingMail($bookingId));

                            Mail::send(['html' => 'email.admin_booking'], ["bookingId" => $bookingId], function ($message) {
                                $message->to('info@dalamanairport.com', 'Yeni Rezervasyon')->subject('Yeni rezervasyon geldi');
                                $message->from('info@dalamanairport.com', 'dalamanairport.com');
                            });
                        }
                    }
                }
                if($_SERVER['SERVER_NAME']!="127.0.0.1") {
                    $smsService = new SmsSendService();
                    $smsService->send($passenger['phonenumber'], "Rezervasyonunuz alınmıştır. Teşekkürler.");
                    $smsService->send("05465128877", "Yeni rezervasyon alındı.");
                    $smsService->send("05432077777", "Yeni rezervasyon alındı.");
                }
            }

            return redirect()->route($this->route_path.'.success',compact("bookingId"));
        }

        $locationModel = new Location();
        $location_start = $locationModel->with("locationType")->find(session('start_location_id'));
        $location_stop = $locationModel->with("locationType")->find(session('stop_location_id'));

        return view($this->view_path.'.booking',compact(
            "return","bookingDetails", "car1", "car2", "time1", "time2", "date1", "date2", "person", "package_type",
            "transferReturnDiscount", "location_start", "location_stop"
        ));
    }
    
    public function success($bookingId)
    {

        
        return view($this->view_path.'.success',compact("bookingId"));
    }
}
