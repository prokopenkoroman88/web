<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\LocaleMiddleware;

class CustomResourceController extends Controller
{

    public $prefix='admin';
    public $tableName='';

    public $model=null;// \App\Human::class
    //  \App\Http\Middleware\AdminMiddleware::class

    //const FIELDS=['id'=>'id'    ];
    public $validations=[
            //'name' => 'required|min:3',
            //'slug' => 'required|min:3', 
            //'content' => 'required|min:20|max:150',
            //'price' => 'required|min:0.01',
//            'sku' => 'required|min:3',
            //'category_id' => 'required|exists:categories,id',
        ];


    public function locale(){
        return LocaleMiddleware::getLocale();
    }
    public function path(){
        $lcl=$this->locale();
        if($lcl)$lcl='/'.$lcl;
        $prf=$this->prefix;
        if($prf)$prf='/'.$prf;
        return "$prf$lcl/{$this->tableName}";
        //return "$lcl$prf/{$this->tableName}";//+13.9.20
        //"$lcl/{$this->prefix}/{$this->tableName}"
    }

    public function redirect(){
        return redirect($this->path());// '/admin/products'
    }

    public function view($action,$params){
        //return view("admin.products.create",compact('product','applications')); 
        $s="{$this->prefix}.tables.{$this->tableName}.{$action}";
        //$s="tables.{$this->prefix}.{$this->tableName}.{$action}";
        $s=str_replace('..', '.', $s);
        //dd($s);

        return view($s,$params); 
        //"tables.{$this->prefix}.{$this->tableName}.{$action}"
    }



    public function prepare(Request $request, $id){//+
        //store(Request $request)
        //update(Request $request, $id)

        $request->validate($this->validations);

        //Product => $this->model
        if(!$id)
            $item = $this->model::create($request->all());//new +id
        else{
            $item = $this->model::find($id);//старое
            $item->update($request->all());
        };

        return $this->redirect();
        //return redirect($this->path);// '/admin/products'
    }



    //=========================================================================

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  данные из потомка
        //return $this->view('index',compact('items','path','fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return $this->prepare($request, 0);
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
        return $this->prepare($request, $id);
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
        $this->model::find($id)->delete();//обращ к БД
        return $this->redirect();
        //return redirect($this->path());
    }
}
