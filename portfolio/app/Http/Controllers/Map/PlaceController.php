<?php

namespace App\Http\Controllers\Map;

use App\Http\Controllers\Controller;//+
use App\Http\Controllers\Admin\CustomResourceController;//+
use Illuminate\Http\Request;
use \App\Place;//+

class PlaceController extends CustomResourceController//Controller
{



    public $prefix='map';//gen
    public $tableName='places';

    public $model= \App\Place::class;
    //  \App\Http\Middleware\AdminMiddleware::class
    //App\Place::$fields


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


    public function write(Request $request, $id){//+
        //store(Request $request)
        //update(Request $request, $id)

        $request->validate([
            'name' => 'required|min:3',
            //'slug' => 'required|min:3', 
            //'content' => 'required|min:20|max:150',
            //'price' => 'required|min:0.01',
//            'sku' => 'required|min:3',
            //'category_id' => 'required|exists:categories,id',
        ]);


        if(!$id)
            $product = Place::create($request->all());//new +id
        else{
            $product = Place::find($id);//старое
            $product->update($request->all());
        };


        return redirect($this->path);// '/admin/products'
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Place::all();
        $path=$this->path();
        //$fields=self::FIELDS; 
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
        $item = new Place();
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
        return parent::store($request);//
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
        return parent::update($request, $id);//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return parent::destroy($id);//
    }



    public function refreshMap(){//+21.2.21

        $items = Place::all();
        return view('map.karta',compact('items'));
    }

    public function add(Request $request){//+14.2.21
        //данные через форму или аякс, все равно в request


//*
        $item = new Place();
        $item->x = $request->x;
        $item->y = $request->y;
        $item->name='place_'.$item->id;
        $item->save();
        $item->name='place_'.$item->id;
        $item->save();

        return $item;
        //return dd($item);
//*/
        //return 
        

/*
        //$request->name='place_';


        parent::store($request);
        dd($request);

        return view('karta');
*/



/*
        //
        $product = Product::find($request->product_id);

        $cart = new Cart();
        $cart->add($product, $request->qty);
        //на страничку с корз: название цена картинка

        //return $request->product_id;
        return view('cart');// вернет табличку с товарами  cart.blade.php  в консоль попадет responce.data
*/
    }


    public function redact(Request $request){//+14.2.21 edit
        //данные через форму или аякс, все равно в request
//*

        //$model=$this->model;
        //$item = $this->model::find($id);
        $item = $this->model::find($request->id);//!!!
        //$item = Place::find($request->id);//!


        $item->update($request->all());
        return $item;
        //return parent::update($request, $request->id);//
/*
        $item->x = $request->x;
        $item->y = $request->y;
        $item->name=$request->name;dd($item);
        $item->save();


        return $item;

*/
    }



/*
error 508:
Resource Limit Is Reached
The website is temporarily unable to service your request as it exceeded resource limit. Please try again later.

*/



}
