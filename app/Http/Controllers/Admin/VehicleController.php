<?php

namespace App\Http\Controllers\Admin;

use App\Vehicle;
use Illuminate\Http\Request;
use View;
use App\Services\UploadService;

class VehicleController extends Controller
{
	protected $module_name = "";
	protected $model = "";
	protected $route_path = "vehicle";
	protected $view_path = "vehicle";
	protected $validations = [
		'name' => 'required',
        'pictureNew' => 'image|mimes:jpeg,bmp,png|max:5000',
        'passenger' => 'numeric',
        'status' => 'required',
    ];
	
	public function __construct(){
        $this->view_path = "admin.".$this->view_path;
		$this->module_name = "Araç";
		$this->model = new Vehicle();
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
		//Listeler burada çağırılacak
		
		return view($this->view_path.'.create');
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

		$uploadService = new UploadService();
		$picture = $uploadService->uploadImage("pictureNew", $request, $this->route_path);

		$data = $request->except(['_token','submit']);
        $data{'picture'} = $picture ?: "";
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
		$item = $this->model->find($id);

		//Listeler burada çağırılacak
		
		return view($this->view_path.'.edit',compact('item'));
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

        $uploadService = new UploadService();
        $picture = $uploadService->uploadImage("pictureNew", $request, $this->route_path);

		$data = $request->except(['_token','_method','submit']);
        if($picture){
            $data['picture'] = $picture;
        }
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
	
}
