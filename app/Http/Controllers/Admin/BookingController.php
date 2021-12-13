<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\BookingDetail;
use App\Driver;
use App\Plate;
use App\Location;
use App\Price;
use App\Setting;
use Illuminate\Http\Request;
use View;

class BookingController extends Controller
{
    protected $module_name = "";
    protected $model = "";
    protected $route_path = "booking";
    protected $view_path = "booking";
    protected $validations = [];

    public function __construct(){
        $this->view_path = "admin.".$this->view_path;
        $this->module_name = "Rezarvasyon";
        $this->model = new Booking();
        View::share('module_name',$this->module_name);
        View::share('route_path',$this->route_path);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where = array();
        $search = $request->all();
        if( $request->has('search') ){
            $search = $request->get('user_search');
            $where[] = [
                'field' => 'name',
                'value' => '%'.$search.'%',
                'operation' => 'LIKE',
            ];
        }
        if( $request->has('status') ){
            $status = $request->get('status');
            $where[] = [
                'field' => 'status',
                'value' => $status,
                'operation' => '=',
            ];
        }
        $items = $this->model->getAll($where);

        return view($this->view_path.'.index',compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * env('PER_PAGE'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locationModel = new Location();
        $locations = $locationModel->getAll();

        $person = 1;
        return view($this->view_path.'.create', compact(
            "person", "locations"
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validations);

        $data = $request->except(['_token','submit']);
        $this->model->create($data);

        return redirect()->route($this->route_path.'.index')
            ->with('success',$this->module_name.' kaydedildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //sonra ayarlanacak
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->model->with(["driver","plate"])->find($id);

        $detailWhere[] = [
            'field' => 'booking_id',
            'value' => $id,
            'operation' => '=',
        ];
        $bookingDetailModel = new BookingDetail();
        $bookingDetails = $bookingDetailModel->getAll($detailWhere);

        return view($this->view_path.'.edit',compact('item', 'bookingDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validations);

        $data = $request->except(['_token','_method','submit']);
        $this->model->find($id)->update($data);

        return redirect()->route($this->route_path.'.index')
            ->with('success',$this->module_name.' kaydedildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->find($id)->delete();
        return redirect()->route($this->route_path.'.index')
            ->with('success',$this->module_name.' başarılı bir şekilde silindi');
    }

    public function status($id,$status)
    {
        $data["status"] = $status;
        $this->model->find($id)->update($data);
        return redirect()->route($this->route_path.'.edit',["id"=>$id])
            ->with('success',"İşlem Başarılı");
    }

    public function assign($id, Request $request)
    {
        $driverModel = new Driver();
        $drivers = $driverModel->getAll();

        $plateModel = new Plate();
        $plates = $plateModel->get();

        $params = $request->all();

        if ($request->isMethod('post')) {
            $data = [];
            $data["driver_id"] = $params["driver_id"];
            $data["plate_id"] = $params["plate_id"];
            if(intval($params["driver_id"])>0 && intval($params["plate_id"])>0){
                $data["status"] = 2;
            }else{
                $data["status"] = 1;
            }

            $this->model->find($id)->update($data);
            return redirect()->route($this->route_path.'.edit',["id"=>$id])
                ->with('success',"İşlem Başarılı");
        }

        $bookingDetails = $this->model->find($id);
        return view($this->view_path.'.assign', compact("drivers","plates", "bookingDetails"));
    }

    public function cancel($id, Request $request)
    {
        $params = $request->all();

        if ($request->isMethod('post')) {
            $data = [];
            $data["cancel_reason"] = $params["cancel_reason"];
            $data["status"] = 99;
            $this->model->find($id)->update($data);
            return redirect()->route($this->route_path.'.edit',["id"=>$id])
                ->with('success',"İşlem Başarılı");
        }

        $bookingDetails = $this->model->find($id);
        return view($this->view_path.'.cancel', compact("bookingDetails"));
    }

    public function printBooking($id)
    {
        $item = $this->model->with(["driver","plate"])->find($id);

        $detailWhere[] = [
            'field' => 'booking_id',
            'value' => $id,
            'operation' => '=',
        ];
        $bookingDetailModel = new BookingDetail();
        $bookingDetails = $bookingDetailModel->getAll($detailWhere);

        return view($this->view_path.'.print-booking',compact('item', 'bookingDetails'));
    }

    public function select(Request $request)
    {
        $params = $request->all();

        $return = $params["return"];
        $start_location_id = $params["start_location_id"];
        $stop_location_id = $params["stop_location_id"];
        $date1 = $params["date1"];
        $date2 = $params["date2"];
        $time1 = $params["time1"];
        $time2 = $params["time2"];
        $person = $params["person"];
        $package_type = $params["package_type"];

        session(['return' => $return]);
        session(['date1' => $date1]);
        session(['date2' => $date2]);
        session(['time1' => $time1]);
        session(['time2' => $time2]);
        session(['start_location_id' => $start_location_id]);
        session(['stop_location_id' => $stop_location_id]);
        session(['person' => $person]);
        session(['package_type' => $package_type]);

        $price = new Price();
        $vehicles = $price->getVehicleList($start_location_id, $stop_location_id, $person);

        if ($request->isMethod('post')) {

        }

        $setting = new Setting();
        $transferReturnDiscount = $setting->getSetting("TRANSFER_RETURN_DISCOUNT", 30);

        return view($this->view_path.'.select',compact(
            "vehicles", "return", "start_location_id", "stop_location_id", "date1", "date2", "time1", "time2",
            "transferReturnDiscount"
        ));
    }

    public function newbooking(Request $request)
    {
        echo "ssss,-";
        die;
        $params = $request->all();

        $setting = new Setting();
        $transferReturnDiscount = $setting->getSetting("TRANSFER_RETURN_DISCOUNT", 30);

        $start_location_id = session('start_location_id');
        $stop_location_id = session('stop_location_id');
        $date1 = session('date1');
        $date2 = session('date2');
        $time1 = session('time1');
        $time2 = session('time2');
        $person = session('person');
        $return = session('return');
        $package_type = session(['package_type']);

        $vehicle_id = $params["vehicle_id"];
        session(['vehicle_id' => $vehicle_id]);

        $price = new Price();
        $bookingDetails = $price->getPrice($vehicle_id);
        $bookingDetails = $bookingDetails[0];

        if ($request->isMethod('post')) {

            //validationları yap
            $bookingModel = new Booking();
            $bookingModel->user_id = 0;
            $bookingModel->payment_type = 1;
            $bookingModel->type = $return+1;
            $bookingModel->booking_datetime = date('Y-m-d H:i:s');
            $bookingModel->start_location_id = session('start_location_id');
            $bookingModel->stop_location_id = session('stop_location_id');
            $bookingModel->special_requirement = @$params['special_requirement'];
            $bookingModel->flight_number = @$params['flight_number'];
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
                        }
                    }
                }

            }

            return redirect()->route($this->route_path.'.success',compact("bookingId"));
        }

        $locationModel = new Location();
        $location_start = $locationModel->with("locationType")->find(session('start_location_id'));
        $location_stop = $locationModel->with("locationType")->find(session('stop_location_id'));


        return view($this->view_path.'.newbooking',compact(
            "return","bookingDetails", "car1", "car2", "time1", "time2", "date1", "date2", "person", "package_type",
            "transferReturnDiscount", "location_start", "location_stop"
        ));
    }

    public function success($bookingId)
    {
        return view($this->view_path.'.success',compact("bookingId"));
    }
}
