<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Application;
//use App\Category;
use App\Product;

class ProductController extends Controller
{


    public $path='/admin/products';

    public function allApps(){//+
        //колонки - коллекция объектов -> в ассоц массив
        return Application::all('id','name')->pluck('name','id')->all();
    }

    public function write(Request $request, $id){//+
        //store(Request $request)
        //update(Request $request, $id)

        $request->validate([
            'name' => 'required|min:3',
            //'slug' => 'required|min:3', 
            //'content' => 'required|min:20|max:150',
            'price' => 'required|min:0.01',
//            'sku' => 'required|min:3',
            //'category_id' => 'required|exists:categories,id',
        ]);


        if(!$id)
            $product = Product::create($request->all());//new +id
        else{
            $product = Product::find($id);//старое
            $product->update($request->all());
        };




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


//?        if($request)
//?            $product->applications()->sync($request->applications); 
        //через метод applications() с belongsToMany передаем массив выбранных id-шек
        //запишет связи в промежуточную табличку product_category

        return redirect($this->path);// '/admin/products'
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::paginate(2);
        $products = Product::all();
        $path=$this->path;
        return view('admin.products.index',compact('products','path')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $applications = $this->allApps();
        //$path='admin/products';
        return view('admin.products.create',compact('product','applications')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->write($request, 0);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $applications = $product->applications;//paginate(3);
        $releases = $product->releases;//paginate(3);
        return view('admin.products.show',compact('product','applications','releases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $applications = $this->allApps();
        //$path='admin/products';
        return view('admin.products.edit',compact('product','applications'));
 
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
        return $this->write($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();//обращ к БД
        return redirect($this->path);
    }
}
