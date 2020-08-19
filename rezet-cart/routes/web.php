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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//'wellcome'

Route::get('/', 'HomeController@products');
Route::get('/products', 'HomeController@products');
Route::get('/cart', 'CartController@index');
Route::post('/cart/add', 'CartController@add');
Route::post('/cart/del', 'CartController@del');

Route::post('/shipping', 'CartController@shipping');
Route::post('/shipping/pay', 'CartController@shippingPay');



////////////////

/*
Route::post('/cart/add', 'CartController@add'); //+19.3.20
Route::post('/cart/clear', 'CartController@clear'); //+19.3.20
Route::post('/cart/remove', 'CartController@remove'); //+24.3.20
Route::post('/cart/change-qty', 'CartController@changeQty'); //+24.3.20
Route::get('/checkout', 'OrderController@checkout'); //+24.3.20
Route::get('/addOrder', 'OrderController@addOrder'); //+24.3.20

*/

