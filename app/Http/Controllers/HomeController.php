<?php

namespace App\Http\Controllers;

use App;
use App\Content;
use App\Mail\BookingMail;
use App\TourCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Services\SmsSendService;
use App\BookingDetail;
use App\Booking;

class HomeController extends Controller
{
    //
    protected $module_name = "";
    protected $model = "";
    protected $route_path = "home";
    protected $view_path = "home";
    protected $validations = [
        'g-recaptcha-response'=>'recaptcha'
    ];

    public function __construct(){

        $this->view_path = $this->view_path;

        $this->module_name = "home";
    }

    public function index(Request $request)
    {
        $tourCategoryModel = new TourCategory();
        $tourCategories = $tourCategoryModel->getAll();

        $lang = App::getLocale();

        $contentModel = new Content();
        $homeContents = $contentModel->getHomeContents();
        return view($this->view_path.'.index', compact("tourCategories", "homeContents"));
    }

    public function content($slug = '')
    {
        $contentModel = new Content();
        $params[] = [
            "field" => "seo",
            "operation" => "=",
            "value" => $slug,
        ];
        $contents = $contentModel->getAll($params);
        if(count($contents)==0){
            return redirect("/");
        }
        $content = $contents[0];
        return view($this->view_path.'.content', compact("content"));
    }

    public function destination($slug = '')
    {
        $locationModel = new App\Location();
        $contents = $locationModel->where("seo","=",$slug)->orWhere("seo_eng","=",$slug)->get();
        if(count($contents)==0){
            return redirect("/");
        }
        $content = $contents[0];
        return view($this->view_path.'.destination', compact("content"));
    }

    public function contactUs (Request $request)
    {
        $params = $request->all();
        $send = false;
        if ($request->isMethod('post')) {
            $this->validate($request, $this->validations);
            $requestModel = new App\ContactMessage();
            $requestModel->name = $params["name"];
            $requestModel->email = $params["email"];
            $requestModel->phone = $params["mobile"];
            $requestModel->request = $params["message"];
            $requestModel->save();

            if($_SERVER['SERVER_NAME']!="127.0.0.1") {
                Mail::send(['html'=>'email.admin_contact'], [], function($message) {
                    $message->to('info@dalamanairport.com')->subject('Yeni İletişim Mesajı');
                    $message->from('info@dalamanairport.com','dalamanairport.com');
                });

                $smsService = new SmsSendService();
                $smsService->send("05465128877", "Yeni İletişim Mesajı alındı.");
                $smsService->send("05432077777", "Yeni İletişim Mesajı alındı.");
            }
            $send = true;
        }
        return view($this->view_path.'.contact-us', compact("send"));
    }

    public function bookingQuery(Request $request)
    {
        $params = $request->all();

        $item = [];

        if ($request->isMethod('post')) {
            $id = intval($params["reservationId"]);

            $bookingModel = new App\Booking();
            $item = $bookingModel->with(["driver","plate","startLocation","stopLocation"])->find($id);

            $detailWhere[] = [
                'field' => 'booking_id',
                'value' => $id,
                'operation' => '=',
            ];
            $bookingDetailModel = new BookingDetail();
            $bookingDetails = $bookingDetailModel->getAll($detailWhere);
        }

        return view($this->view_path.'.booking-query', compact("item", "bookingDetails"));
    }
}
