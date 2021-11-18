<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Application;
use App\Release;
use App\Comment;

use Mail;//модель отправления почты
use App\Mail\DeveloperMail;//наш класс  user.comments.mail
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //8.4.20 чтобы смотреть товары не регистрируясь//$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //когда зашел - первая страница
//        $categories = \App\Category::all();
        //$products = \App\Product::all();
        
//        return view('admin.products.index',compact('products')); 
//
        //$favorites = Product::where('favorite','=',1)->get();//
        //$latest = Product::orderBy('created_at','DESC')->get();//
        //рекоменд по дате
        //
//        $favorites = Product::favorite()->get();//Model::scopeFavorite()
        //коллекция моделей
        //dd($favorites);

        $latest = Product::latest()->paginate(10);//последние 10
        //$favorite2 = Product::favorite()->latest()->get();//Запросец!

//byProductName()->
        $latest_releases = Release::byProductName()->byLatest()->paginate(14);

        return view('home',compact('latest','latest_releases'));
    }










    public function question(Request $request){//+30.4.20
        //

/*
        foreach(session('cart') as $product ) {
            $item = new Order_item();
            $item->product_id = $product['id'];
            $item->product_price = $product['price'];
            $item->product_qty = $product['qty'];
            $item->order_id = $order->id;
            $item->save();
        };
*/



        $q_product_id = $request->product_id ?? 0;
        $q_descr= $request->descr ?? '';
/*
        $q_product_id = $_POST['product_id'] ?? 0;
        $q_descr= $_POST['descr'] ?? '';
        //dd($q_product_id);
*/

//        Session::put("cart.product_{$p->id}.name",$p->name);


        
        //$q=session('question');
        //if($q)
        {


            $dest= User::where('role','=','admin')->first();   

            //админу: prokopeenkoroman88@gmail.com
            //$dest->email
            //'roman.prokop@mail.zp.ua'
            Mail::to('prokopeenkoroman88@gmail.com')->send(
                new DeveloperMail($q_product_id,$q_descr)
            );
            //to(себе) send(создаем объект OrderMail)

            //Session::forget('question');

            Session::put('message',
                ['text'=>'Ваше сообщение отправлено','class'=>'success']
            );

        };//if



        return redirect('/contacts#question');
    }

    public function contacts(){//+28.4.20
        //
        $products = Product::all();
        //$releases = $product->releases()->byLatest()->get();

        return view('contacts',compact('products'));

        //return view('admin.products.show',compact('product','releases'));

        //return view('admin');


    }


    public function products(){//+28.4.20
        //
        $products = Product::all();
        //$releases = $product->releases()->byLatest()->get();

        return view('products',compact('products'));

        //return view('admin.products.show',compact('product','releases'));

        //return view('admin');


    }

    public function product($slug){//+3.4.20
        //

        $product = Product::where('slug','=',$slug)->first();/// get() - даст массив
        //объект модели Product (вместо  ->get()[0];  )

        //$product = Product::find($id);
        //$releases = $product->releases;//!
        $releases = $product->releases()->byLatest()->get();

        return view('product',compact('product','releases'));

        //return view('admin.products.show',compact('product','releases'));

        //return view('admin');

    }

    public function application($slug){//+29.4.20
        //

        $application = Application::where('slug','=',$slug)->first();/// get() - даст массив
        //объект модели Product (вместо  ->get()[0];  )

        //$product = Product::find($id);
        //$releases = $product->releases;//!
        //$releases = $application->releases()->get();

        return view('application',compact('application'));

        //return view('admin.products.show',compact('product','releases'));

        //return view('admin');

    }


    public function whatsnew_old($slug,$version){//+3.4.20
        //

        $product = Product::where('slug','=',$slug)->first();/// get() - даст массив
        //объект модели Product (вместо  ->get()[0];  )

        //$product = Product::find($id);
        $release = $product->releases->where('version','=',$version)->first();

        return view('whatsnew',compact('product','release'));

        //return view('admin.products.show',compact('product','releases'));

        //return view('admin');


    }    

/*
    public function whatsnew($slug){//+10.4.20
        //$product = Product::find($id);
        $release = Release::where('slug','=',$slug)->first();
        $product = $release->product;

        return view('whatsnew',compact('product','release'));
        //return view('admin.products.show',compact('product','releases'));
        //return view('admin');
    }   
*/

    public function whatsnew($slug,$version){//+10.4.20
        //$product = Product::find($id);
        $product = Product::where('slug','=',$slug)->first();//
        $release = $product->releases->where('version','=',$version)->first();

//->where('descr','<>','""')
        //$comments = 

        //$release->comments->orderBy('created_at','DESC')->all();
        //->orderBy('name','ASC')->all();//->paginate(10);        


        $comments = Comment::where('release_id','=',$release->id)->orderBy('created_at','DESC')->get();

        //dd($comments);

 

        return view('whatsnew',compact('product','release','comments'));
        //return view('admin.products.show',compact('product','releases'));
        //return view('admin');
    }   






}
