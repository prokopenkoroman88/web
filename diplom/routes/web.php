<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




//добавились LOGIN и REGISTER после:
//composer require laravel/ui "^1.0" --dev

//?  verni//
Auth::routes();

Route::get('/', 'HomeController@index')->name('home'); //'/home'     .'home'
///


Route::post('/question', 'HomeController@question');//+30.4.20

Route::get('/contacts', 'HomeController@contacts');//+28.4.20
Route::get('/products', 'HomeController@products');//+28.4.20

Route::get('/product/{slug}', 'HomeController@product'); //+17.3.20
Route::get('/application/{slug}', 'HomeController@application'); //+29.4.20

Route::get('/product/{slug}/whatsnew/{version}', 'HomeController@whatsnew_old'); //+8.4.20
//Route::get('/whatsnew/{slug}', 'HomeController@whatsnew'); //+10.4.20
Route::get('/whatsnew/{slug}/{version}', 'HomeController@whatsnew'); //+10.4.20

//Route::get('/update/{slug}', 'HomeController@product');  = product


/*???????????

Route::post('/cart/add', 'CartController@add'); //+19.3.20
Route::post('/cart/clear', 'CartController@clear'); //+19.3.20
Route::post('/cart/remove', 'CartController@remove'); //+24.3.20
Route::post('/cart/change-qty', 'CartController@changeQty'); //+24.3.20
Route::get('/checkout', 'OrderController@checkout'); //+24.3.20
Route::get('/addOrder', 'OrderController@addOrder'); //+24.3.20

*/

//Controllers
//Controllers\Admin\ с namespace-ом
//Route::get('/admin', 'Admin\AdminController@index')->middleware('auth');//+27.2.20 админка

//есть 2 варианта огранич доступа:
//  ->middleware('auth')    незалогиненого - перебросит на стр входа  http://shop/login
//посредник middleware выполняется перед методом контроллера 'Admin\AdminController@index'

//  /admin - auth - admin - Admin\AdminController@index
// создать своего посредника 
// одинаковое слово admin в адресах и общий middleware
// можно вынести в группу маршрутов.
Route::group([//группа админки:
		'prefix'     => 'admin',//префикс адреса
		'namespace'  => 'Admin',//папка контроллера
		'middleware' => ['auth', 'admin']//посредники в массиве
	],function(){
		Route::get('/', 'AdminController@index');
		Route::get('/init', 'AdminController@init');//+10.4.20
		Route::resource('/applications','ApplicationController');
		Route::resource('/products','ProductController');
		Route::resource('/releases','ReleaseController');

		//вместо Route::get('/admin', 'Admin\AdminController@index')->middleware('auth')->middleware('admin')  ;//+27.2.20 админка
});//что общее префикс,  группа маршрутов

///admin - auth - admin - AdminController@index


//Route::get('/admin', 'Admin\AdminController@index')->middleware('auth')->middleware('admin');



/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/


Route::group([//группа админки:
		'prefix'     => 'user',//префикс адреса
		//'namespace'  => '',//папка контроллера
		'middleware' => ['auth']//посредники в массиве
	],function(){

		Route::resource('/comments','CommentController');

		//вместо Route::get('/admin', 'Admin\AdminController@index')->middleware('auth')->middleware('admin')  ;//+27.2.20 админка
});//что общее префикс,  группа маршрутов

