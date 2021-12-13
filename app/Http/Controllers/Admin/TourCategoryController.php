<?php

namespace App\Http\Controllers\Admin;

use App\TourCategory;
use Illuminate\Http\Request;
use View;

class TourCategoryController extends Controller
{
	protected $module_name = "";
	protected $model = "";
	protected $route_path = "tourcategory";
	protected $view_path = "tourcategory";
	protected $validations = [
		'name' => 'required',
	];
	
	public function __construct(){

        $this->view_path = "admin.".$this->view_path;

		$this->module_name = "TourCategory";
		$this->model = new TourCategory();
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
	
}