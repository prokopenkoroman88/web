<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CustomResourceController;//+
use Illuminate\Http\Request;
use \App\Firm;//+
use \App\Vacancy;//+

class VacancyController extends CustomResourceController//Controller
{

    public $prefix='job';
    public $tableName='vacancies';

    public $model= \App\Vacancy::class;
    //  \App\Http\Middleware\AdminMiddleware::class


    public $validations=[
            'name' => 'required|min:3',
            'firm_id' => 'required|exists:firms,id',
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
        //
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
        //?//$item->skills()->sync($request->vacancy_skill);
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
        //dd($request);
//        dd($request->request->parameters);
//['parameters']
//['vacancy_skill']
        //dd($request->vacancy_skill);


        $item = $this->model::find($id);
        $item->skills()->sync($request->vacancy_skill);
         return parent::update($request, $id);
     }

/*
    /* *
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * /
    public function update(Request $request, $id)
    {
        //
        return $this->prepare($request, $id);
    }
*/



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return parent::destroy($id);
    }



    //ajax:
    public function createBy($firm_id){
        $item = new $this->model();
        $path= $this->path('save_vacancy');
        $item->firm_id=$firm_id;
        return $this->view('create',compact('item','path'));
    }

    public function editBy($id){
        $item = $this->model::find($id);
        $path= $this->path('save_vacancy');
        return $this->view('edit',compact('item','path'));
    }

    public function saveBy(Request $request){

        if(!$request->id){
            $item = $this->model::create($request->all());//new +id
            $request->id = $item->id;//+
        }else
            $item = $this->model::find($request->id);
        $item->skills()->sync($request->vacancy_skill);

        return $this->prepare($request,$request->id,' ');
    }

}
