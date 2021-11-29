<?php

namespace App\Http\Controllers\Gen;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CustomResourceController;//+
use Illuminate\Http\Request;
use \App\Human;//+

class HumanController extends CustomResourceController
{



    public $prefix='gen';
    public $tableName='humans';

    public $model= \App\Human::class;
    //  \App\Http\Middleware\AdminMiddleware::class


    public $validations=[
            'name' => 'required|min:3',
            //'slug' => 'required|min:3', 
            //'content' => 'required|min:20|max:150',
            //'price' => 'required|min:0.01',
//            'sku' => 'required|min:3',
            //'category_id' => 'required|exists:categories,id',
        ];

/*

        //$arr=$_FILES;//['img'];
        //dd($arr);

        $file = $request->file('img');//  'img' - имя поля формы
        //$file = $request->img;


        //$file = Storage::url($file);

        //dd($request->img);
        //dd($file);
        if($file){//если картинка выбрана, загрузить в нашу папку 'uploaded'
            $fName = $file->getClientOriginalName(); //uploaded file
            $fTeka='images/products';
            $file->move($fTeka, $fName);//в папку в public, новое назв файла

            $product->img = "/$fTeka/$fName";
            $product->save();
        };


*/






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Human::all();
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
        $item = new Human();
        $path=$this->path();
        return $this->view('create',compact('item','path'));

        //$product = new Product();
        //$applications = $this->allApps();
        //return view('admin.products.create',compact('product','applications')); 
    }

    // public function store(Request $request)

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
        //$item = Human::find($id);;
        $item = $this->model::find($id);;

        $path=$this->path();
        return $this->view('edit',compact('item','path'));

    }

    // public function update(Request $request, $id)
    // public function destroy($id)
}
