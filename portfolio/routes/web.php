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




Auth::routes();

		Route::get('/home', 'HomeController@index')->name('home');

		Route::get('/softtaxi', 'HomeController@softtaxi');

		//?//Route::get('/', 'AdminController@index');
		Route::get('/init', 'AdminController@init');//+10.4.20





//============= Gen ==============
Route::group([//группа админки:
'prefix'     => 'gen',//префикс адреса
'namespace'  => 'Gen',//папка контроллера
//'middleware' => ['auth', 'admin']//посредники в массиве
],function(){
	
	Route::group([
	'prefix'=>App\Http\Middleware\LocaleMiddleware::getLocale()
	], function(){

		Route::get('/', 'MainController@index');
//		Route::resource('/places','PlaceController');

		Route::resource('/nations','NationController');
		Route::resource('/humans','HumanController');

	});//Locale

});//что общее префикс,  группа маршрутов


//========== Job =============
Route::group([//группа админки:
'prefix'     => 'job',//префикс адреса
'namespace'  => 'Job',//папка контроллера
//'middleware' => ['auth', 'admin']//посредники в массиве
],function(){

	Route::group([
	'prefix'=>App\Http\Middleware\LocaleMiddleware::getLocale()
	], function(){

		Route::get('/', 'MainController@index');

		Route::resource('/firms','FirmController');
		Route::resource('/vacancies','VacancyController');
		Route::resource('/job_talks','JobTalkController');





		Route::get('create_firm', 'FirmController@createBy');//+1.6.21
		Route::get('edit_firm/{id}', 'FirmController@editBy');//+1.6.21
		Route::post('save_firm', 'FirmController@saveBy');//+1.6.21 add
		Route::put('save_firm/{id}', 'FirmController@saveBy');//+1.6.21 edit


		Route::get('create_vacancy/{firm_id}', 'VacancyController@createBy');//+1.6.21
		Route::get('edit_vacancy/{id}', 'VacancyController@editBy');//+1.6.21
		Route::post('save_vacancy', 'VacancyController@saveBy');//+1.6.21 add
		Route::put('save_vacancy/{id}', 'VacancyController@saveBy');//+1.6.21 edit



		Route::get('create_job_talk/{vacancy_id}/{firm_id}', 'JobTalkController@createBy');//+1.6.21
		//'create_job_talk/{vacancy_id}/{firm_id}'
		Route::get('edit_job_talk/{id}', 'JobTalkController@editBy');//+1.6.21
		Route::post('save_job_talk', 'JobTalkController@saveBy');//+1.6.21 add
		Route::put('save_job_talk/{id}', 'JobTalkController@saveBy');//+1.6.21 edit

		Route::get('resume', 'ResumeController@index');//+7.10.21
	});//Locale

});//что общее префикс,  группа маршрутов



//============= Map ==============
Route::group([//группа админки:
'prefix'     => 'map',//префикс адреса
'namespace'  => 'Map',//папка контроллера
//'middleware' => ['auth', 'admin']//посредники в массиве
],function(){
	
	Route::group([
	'prefix'=>App\Http\Middleware\LocaleMiddleware::getLocale()
	], function(){

		Route::get('/', 'MainController@index');

		Route::resource('/places','PlaceController');
//Route::get('/karta', function () {
//    return view('karta');//+20.12.20
//});
		Route::get('/karta', 'PlaceController@refreshMap');//+21.2.21
		Route::post('/place/add', 'PlaceController@add'); //+14.2.21
		Route::post('/place/edit', 'PlaceController@redact'); //+7.3.21


	});//Locale

});//что общее префикс,  группа маршрутов


//+13.9.21
Route::group([
	'prefix'=>'service',
	'namespace'=>'Srv',
],function(){

	Route::group([
		'prefix'=>App\Http\Middleware\LocaleMiddleware::getLocale()
	],function(){

		Route::get('/','MainController@index');
		Route::group(['prefix'=>'excel'],function(){
			Route::get('/','ExcelController@index');
			//excel:
			Route::get('/open/{filename}','ExcelController@open');
			Route::post('/open-file','ExcelController@openFile');//ajax
			Route::post('/choice-sheet','ExcelController@choiceSheet');//ajax
			Route::post('/set-value','ExcelController@setValue');//ajax
		});
		Route::group(['prefix'=>'word'],function(){
			Route::get('/','WordController@index');
			//word:
			Route::post('/create-file','WordController@createFile');//ajax
			Route::post('/save-file','WordController@saveFile');//ajax
			Route::post('/add-text','WordController@addText');//ajax
			Route::post('/save-all','WordController@saveAll');//ajax
		});


	});


});



	// Route::group([
	// 'prefix'=>App\Http\Middleware\LocaleMiddleware::getLocale()
	// ], function(){

	// });//Locale



//Переключение языков
Route::get('setlocale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    //if (in_array($segments[1], App\Http\Middleware\LocaleMiddleware::$languages)) {
	if (isset( App\Http\Middleware\LocaleMiddleware::$languages[ $segments[1] ])) {

        unset($segments[1]); //удаляем метку
    } 
    
    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    if ($lang != App\Http\Middleware\LocaleMiddleware::$mainLanguage){ 
        array_splice($segments, 1+1, 0, $lang); 
    }

    //формируем полный URL
    $url = Request::root().implode("/", $segments);
    
    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){    
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url); //Перенаправляем назад на ту же страницу                            

})->name('setlocale');






return;
return;
//================================================
//=================================================

//Route::get('/karta', function () {
//    return view('karta');//+20.12.20
//});

Route::get('/karta', 'PlaceController@refreshMap');//+21.2.21


Route::post('/place/add', 'PlaceController@add'); //+14.2.21
Route::post('/place/edit', 'PlaceController@redact'); //+7.3.21



Route::group([
	'prefix'=>App\Http\Middleware\LocaleMiddleware::getLocale()
	], function(){





Auth::routes();

		Route::get('/home', 'HomeController@index')->name('home');

		Route::get('/softtaxi', 'HomeController@softtaxi');

		//?//Route::get('/', 'AdminController@index');
		Route::get('/init', 'AdminController@init');//+10.4.20


		Route::resource('/places','PlaceController');
		Route::resource('/jobs','JobController');


// Route::group([//группа админки:
// 		'prefix'     => 'gen',//префикс адреса
// 		'namespace'  => 'Gen',//папка контроллера
// 		//'middleware' => ['auth', 'admin']//посредники в массиве
// 	],function(){
// 		Route::get('/', 'AdminController@index');
// 		Route::get('/init', 'AdminController@init');//+10.4.20



// 		//вместо Route::get('/admin', 'Admin\AdminController@index')->middleware('auth')->middleware('admin')  ;//+27.2.20 админка
// });//что общее префикс,  группа маршрутов


//============= Gen ==============
Route::group([//группа админки:
		'prefix'     => 'gen',//префикс адреса
		'namespace'  => 'Gen',//папка контроллера
		//'middleware' => ['auth', 'admin']//посредники в массиве
	],function(){

		Route::get('/', 'MainController@index');
//		Route::resource('/places','PlaceController');

		Route::resource('/nations','NationController');
		Route::resource('/humans','HumanController');
//		Route::resource('/jobs','JobController');



		Route::resource('/applications','ApplicationController');
		Route::resource('/products','ProductController');
		Route::resource('/releases','ReleaseController');

		//вместо Route::get('/admin', 'Admin\AdminController@index')->middleware('auth')->middleware('admin')  ;//+27.2.20 админка
});//что общее префикс,  группа маршрутов


//========== Job =============
Route::group([//группа админки:
		'prefix'     => 'job',//префикс адреса
		'namespace'  => 'Job',//папка контроллера
		//'middleware' => ['auth', 'admin']//посредники в массиве
	],function(){

		Route::get('/', 'MainController@index');
//		Route::resource('/places','PlaceController');

		Route::resource('/firms','FirmController');
		Route::resource('/vacancies','VacancyController');
		Route::resource('/job_talks','JobTalkController');


		//вместо Route::get('/admin', 'Admin\AdminController@index')->middleware('auth')->middleware('admin')  ;//+27.2.20 админка
});//что общее префикс,  группа маршрутов



});//Locale

//Переключение языков
Route::get('setlocale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    //if (in_array($segments[1], App\Http\Middleware\LocaleMiddleware::$languages)) {
	if (isset( App\Http\Middleware\LocaleMiddleware::$languages[ $segments[1] ])) {

        unset($segments[1]); //удаляем метку
    } 
    
    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    if ($lang != App\Http\Middleware\LocaleMiddleware::$mainLanguage){ 
        array_splice($segments, 1, 0, $lang); 
    }

    //формируем полный URL
    $url = Request::root().implode("/", $segments);
    
    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){    
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url); //Перенаправляем назад на ту же страницу                            

})->name('setlocale');


return;


//==================================================
//============ Diplom =======


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






