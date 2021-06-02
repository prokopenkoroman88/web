<?php

namespace App\Http\Controllers\Job;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CustomResourceController;//+
use Illuminate\Http\Request;
use \App\Firm;//+


class FirmController extends CustomResourceController//Controller
{

    public $prefix='job';
    public $tableName='firms';

    public $model= \App\Firm::class;
    //  \App\Http\Middleware\AdminMiddleware::class


    public $validations=[
            'name' => 'required|min:3',
            //'slug' => 'required|min:3', 
            //'content' => 'required|min:20|max:150',
            //'price' => 'required|min:0.01',
//            'sku' => 'required|min:3',
            //'category_id' => 'required|exists:categories,id',
        ];













    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = $this->model::all();
        $path=$this->path();
        //$fields=$this->fields;
        $fields=$this->model::$fields;
        //return view('admin.products.index',compact('products','path')); 

        //parent::index();//из предка
        return $this->view('index',compact('items','path','fields'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new $this->model();
        //$item = new Firm();
        $path=$this->path();
        return $this->view('create',compact('item','path'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return parent::store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = $this->model::find($id);;

        $path=$this->path();
        return $this->view('edit',compact('item','path'));

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
        //
        return parent::update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return parent::destroy($id);
    }
}


 
