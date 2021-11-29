<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CustomResourceController;//+
use Illuminate\Http\Request;
use \App\Skill_kind;//+
use \App\Skill;//+
use \App\Vacancy_skill;//+


class SkillController extends CustomResourceController//Controller
{

    public $prefix='job';
    public $tableName='skills';

    public $model= \App\Skill::class;
    //  \App\Http\Middleware\AdminMiddleware::class


    public $validations=[
            'kind_id' => 'required|exists:skill_kinds,id',
            'name' => 'required',

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
        $path=$this->path();
        return $this->view('create',compact('item','path'));
    }

//    public function store(Request $request)


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
        $item = $this->model::find($id);

        $path=$this->path();
        return $this->view('edit',compact('item','path'));
    }

//    public function update(Request $request, $id)
//    public function destroy($id)

}
