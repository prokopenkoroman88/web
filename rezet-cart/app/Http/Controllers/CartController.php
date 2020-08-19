<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Session;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    //

	// public function redirect_0($path){// /cart
	// 	//
	// 	Header('Location: '.$path );
	// 	die();
	// }






	public function index(){// /cart
		//
		//
		//$products=Product::all()->orWhere('id','=',$product_id);

		//$products=[];
		//$products[]=Product::find(1);
		$products=session('cart');
		$totalSum=session('total');

		return view('cart',compact('products','totalSum'));


	}

	public function add(Request $request){// /cart/add
		//
		//$product_id=$_POST['product_id'] ?? 0;
		$product_id=$request->product_id;
		$product = Product::find($product_id);
		$quan=$request->quan;

		$cart = new Cart;
		$cart->add($product,$quan);

		//$this->index();

		return redirect('cart');

	}

	public function del(Request $request){// /cart/add
		//
		//$product_id=$_POST['product_id'] ?? 0;
		$product_id=$request->product_id;
		//$product = Product::find($product_id);

		$cart = new Cart;
		$cart->remove($product_id);

		//$this->index();

		return redirect('cart');

	}

	public function shipping(){

		$products=session('cart');
		$totalSum=session('total');
		return view('shipping',compact('products','totalSum'));
	}

	public function shippingPay(Request $request){



        $request->validate([
        	'name' => 'required',
        	'address' => 'required',
        	//'phone' => '',
        	//'email' => '',

            // 'user_id' => 'required|exists:users,id',//
            // 'release_id' => 'required|exists:releases,id',//,id
            // 'mark' => 'required|min:0|max:5',
            // 'descr' => 'required|min:1',
            //'slug' => 'required|min:3', 
            //'content' => 'required|min:20|max:150',
//            'price' => 'required|min:0.01',
//            'sku' => 'required|min:3',
            //'category_id' => 'required|exists:categories,id',
        ]);

		//Session::put('','');

        return redirect('shipping');

/*
		$products=session('cart');
		$totalSum=session('total');
		return view('shipping',compact('products','totalSum'));
		*/
	}


}
