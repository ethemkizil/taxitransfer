<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TourController extends Controller
{
    //
    protected $module_name = "";
    protected $model = "";
    protected $route_path = "tour";
    protected $view_path = "tour";
    protected $validations = [
        'name' => 'required',
    ];

    public function __construct(){

        $this->view_path = $this->view_path;

        $this->module_name = "tour";
        //$this->model = new home();
        //View::share('module_name',$this->module_name);
        //View::share('route_path',$this->route_path);
    }

    public function index(Request $request)
    {

        return view($this->view_path.'.index');
    }
}
