<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use Illuminate\Http\Request;
use View;

class ContentController extends Controller
{
	protected $module_name = "";
	protected $model = "";
	protected $route_path = "content";
	protected $view_path = "content";
	protected $validations = [
		'name' => 'required',
	];
	
	public function __construct(){
        $this->view_path = "admin.".$this->view_path;
		$this->module_name = "İçerik";
		$this->model = new Content();
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
        $contentModel = new Content();
        $params[] = [
            "field" => "content_id",
            "operation" => "=",
            "value" => "0",
        ];
        $topContents = $contentModel->getAll($params);

		
		return view($this->view_path.'.create', compact("topContents"));
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
		$data["content_id"] = intval($data["content_id"]);
		$data["seo"] = $this->generateSeoURL($data["name"]);
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

        $contentModel = new Content();
        $params[] = [
            "field" => "content_id",
            "operation" => "=",
            "value" => "0",
        ];
        $topContents = $contentModel->getAll($params);
		
		return view($this->view_path.'.edit',compact('item','topContents'));
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
        $data["seo"] = $this->generateSeoURL($data["name"]);
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

    function generateSeoURL($s){
        $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
        $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
        $s = str_replace($tr,$eng,$s);
        $s = strtolower($s);
        $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
        $s = preg_replace('/\s+/', '-', $s);
        $s = preg_replace('|-+|', '-', $s);
        $s = preg_replace('/#/', '', $s);
        $s = str_replace('.', '', $s);
        $s = trim($s, '-');
        return $s;
    }
}