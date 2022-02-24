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
    public function path($adr=''){
        $lcl=$this->locale();
        if($lcl)$lcl='/'.$lcl;
        $prf=$this->prefix;
        if($prf)$prf='/'.$prf;
        if(!$adr)$adr=$this->tableName;
        if($adr)$adr='/'.$adr;
        return "$prf$lcl$adr";
        //return "$lcl$prf/{$this->tableName}";//+13.9.20
        //"$lcl/{$this->prefix}/{$this->tableName}"
    }

    public function redirect($adr=''){
        return redirect($this->path($adr));// '/admin/products'
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



    public function prepare(Request $request, $id, $adr=''){//+
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

        return $this->redirect($adr);
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
        $dataTable=$this->getDataTable();
        return $this->view('index',compact('dataTable'));
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


    //=============================

    public function getDataTable(){
        $dataTable=[
            'path'=>$this->path(),
            'fields'=>$this->model::$fields,
            'items'=>$this->model::all(),
            'table'=>$this->tableName,
            'model'=>$this->model,//?
            //'controller'=$this,
        ];
        return $dataTable;
    }

    public function getDataRow($dataTable, $item){
        $dataRow=[
            'table'=>$dataTable,
            'item'=>$item,
        ];
        return $dataRow;
    }

    //public function getDataField($dataRow, $fieldName){
    public static function getDataField($item, $fieldName, $fieldLabel=''){
        $dataField=[
            'item'=>$item,
            'fieldName'=>$fieldName,
        ];
        return $dataField;
    }


    public static function showDateField($item, $fieldName, $fieldLabel=''){
        $dataField=self::getDataField($item, $fieldName, $fieldLabel);
        return view('common.tables.layouts.date-field',compact('dataField'));
    }








    public static function getStaticDataTable($controller){//????
        //$pth = $controller::class->path();
        //dd($$controller->path());
        $dataTable=[
            'path'=>$controller->path(),
            'fields'=>$controller->model::$fields,
            'items'=>$controller->model::all(),
            'table'=>$controller->tableName,
            //'controller'=$this,
        ];
        return $dataTable;
    }

/*
    <label >
        <span>@lang('table.firm')</span>
    </label>
*/
    public static function showPopupField($item, $fieldName, $controllerClass, $fieldLabel=''){
        //$path='/firms';
        //$model = \App\Firm::class;
        //$fieldName = 'firm_id';
        //$id = $item->firm_id;
        //?//return view('common.tables.layouts.popup-field',compact('path','model','fieldName','id'));

        //dd($item);  $item->table


        $dataField=self::getDataField($item, $fieldName);


        //$controllerClass = \App\Firm::class;
        //dd($controllerClass);
        //dd($controllerClass::class::model);
        //$dataField['model'] = \App\Firm::class;//?//$controllerClass;

        $controllerItem = new $controllerClass;

        //?//$dataField['model'] = $controllerItem->model;

        $dataTable=$controllerItem->getDataTable();
        //dd($dataTable);
        $dataTable['actions']=['select','id'];
        $id=$item[ $fieldName ];
        $dataTable['id']=$id;

        $dataField['dataTable']=$dataTable;


        if(!$fieldLabel){
            $fieldLabel = 'table.'.$fieldName;
            //$_id=strpos($fieldLabel, '_id');
            //if($_id)
            $fieldLabel=str_replace('_id', '', $fieldLabel);
        };
        $dataField['fieldLabel']=$fieldLabel;

        return view('common.tables.layouts.popup-field',compact('dataField'));

    }



    public static function showList($dataTable){
        $dataTable['actions']=['new','edit','del','id'];
        return view('common.tables.layouts.list',compact('dataTable'));
    }

/*
    public static function showList($dataTable){

        $path=$dataTable['path'];
        $fields=$dataTable['fields'];
        $items=$dataTable['items'];

//require_once ('../resources/views/tables/custom/ViewFuncs.php'); //!!!!!!!!
//require_once ('../resources/views/tables/custom/ViewFuncs.php'); //!!!!!!!!
        $actions=['new','edit','del','id'];

        return view('common.tables.layouts.list',compact('path','fields','items','actions'));
    }
*/



    public static function showMatrix($dataTable, $tr, $td){

        foreach($dataTable['items'] as $item){

            $classList='';
            if(isset($dataTable['id'])&&($item['id']==$dataTable['id'])) $classList='selected';
            echo "<$tr  class='$classList'>";
                $path=$dataTable['path'];
                $actions=$dataTable['actions'];
                echo view('common.tables.layouts.tr',compact('path','item','actions'));
                foreach($dataTable['fields'] as $field=>$fieldName){
                echo "<$td>{$item[$field]}</$td>";
                };//for
            echo "</$tr>";
        };//for
    }



    public static function showTrTd($dataTable){


        return self::showMatrix($dataTable,'tr','td');
    }


}
