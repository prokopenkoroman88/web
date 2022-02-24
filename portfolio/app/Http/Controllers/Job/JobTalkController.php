<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CustomResourceController;//+
use Illuminate\Http\Request;
use \App\Firm;//+
use \App\Vacancy;//+
use \App\Job_talk;//+


class JobTalkController extends CustomResourceController//Controller
{

    public $prefix='job';
    public $tableName='job_talks';

    public $model= \App\Job_talk::class;
    //  \App\Http\Middleware\AdminMiddleware::class


    public $validations=[
            'vacancy_id' => 'required|exists:vacancies,id',
            'descr' => 'required|min:10',

            //'name' => 'required|min:3',
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
//-        $items = $this->model::all();
//-        $path=$this->path();
        //$fields=$this->fields;
//-        $fields=$this->model::$fields;
        //return view('admin.products.index',compact('products','path')); 
        $dataTable=$this->getDataTable();

        //parent::index();//из предка
        return $this->view('index',compact('dataTable'));//'items','path','fields',

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
    // public function store(Request $request)
    // {
    //     //
    // }

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
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }


    public function createBy($vacancy_id, $firm_id){//+1.6.21

        $item = new $this->model();
        //$item = new Firm();

//        $lcl=$this->locale();
//        if($lcl)$lcl='/'.$lcl;
//        $prf=$this->prefix;
//        if($prf)$prf='/'.$prf;
        $path= $this->path('save_job_talk');//"$prf$lcl/save_job_talk";//{$this->tableName}
        //~1.6.21//$path=$this->path();


        $item->vacancy_id=$vacancy_id;
        $item->firm_id=$firm_id;
        return $this->view('create',compact('item','path'));

    }

    public function editBy($id){//+1.6.21

        $item = $this->model::find($id);

//        $lcl=$this->locale();
//        if($lcl)$lcl='/'.$lcl;
//        $prf=$this->prefix;
//        if($prf)$prf='/'.$prf;
        $path= $this->path('save_job_talk');//"$prf$lcl/save_job_talk";//{$this->tableName}
        //~1.6.21//$path=$this->path();

        return $this->view('edit',compact('item','path'));

    }





    public function saveBy(Request $request){//+1.6.21



/*
        $id=$request->id;
        $request->validate($this->validations);

        //Product => $this->model
        if(!$id)
            $item = $this->model::create($request->all());//new +id
        else{
            $item = $this->model::find($id);//старое
            $item->update($request->all());
        };


//        $lcl=$this->locale();
//        if($lcl)$lcl='/'.$lcl;
//        $prf=$this->prefix;
//        if($prf)$prf='/'.$prf;
        $path= $this->path(' ');//"$prf$lcl/";//job/wellcome

        return redirect($path);
*/
        return $this->prepare($request,$request->id,' ');


    }


}
