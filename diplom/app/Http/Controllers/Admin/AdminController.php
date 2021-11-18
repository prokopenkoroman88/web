<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Product;
use \App\Release;
use \App\Application;

class AdminController extends Controller
{
    public function index(){
    	//return 'Видно только для админов';

		//$classes=$this::classes();
		//,compact('classes')

    	return view('admin.mainpanel');//главная страница админки 'admin.dashboard'
    	 
    }

	public function init(){
		//


		$arrProds=[
			[
			'name'=>'Раджа',
			'descr'=>'',
			'img'=>'',
			'price'=>100,
			//'sku'=>
			],
			[
			'name'=>'X-Door',
			'descr'=>'',
			'img'=>'',
			'price'=>200,
			],
			[
			'name'=>'rtx-Door',
			'descr'=>'',
			'img'=>'',
			'price'=>150,
			],

		];


		$arrApps=[
			[
			'name'=>'Бухгалтерская отчетность',
			'descr'=>'документы и бланки, связанные с бухгалтерией',
			'img'=>'',
			'product_name'=>'Раджа',
			],
			[
			'name'=>'Зарплата',
			'descr'=>'Составление табеля, расчет и выплата зарплаты',
			'img'=>'',
			'product_name'=>'Раджа',
			],
			[
			'name'=>'Здравница',
			'descr'=>'Документы и отчеты об отдыхающих',
			'img'=>'',
			'product_name'=>'Раджа',
			],
			[
			'name'=>'Основные средства',
			'descr'=>'необоротные активы, малоценные быстроизнашивающиеся предметы',
			'img'=>'',
			'product_name'=>'Раджа',
			],
			[
			'name'=>'Первичные документы',
			'descr'=>'первичка',
			'img'=>'',
			'product_name'=>'Раджа',
			],
			[
			'name'=>'Производство',
			'descr'=>'Производственные документы и отчеты. Материалы и изделия',
			'img'=>'',
			'product_name'=>'Раджа',
			],
			[
			'name'=>'Товарно материальный учет',
			'descr'=>'Справочник товаров и услуг, документы прихода и отпуска',
			'img'=>'',
			'product_name'=>'Раджа',
			],
			[
			'name'=>'Учет НДС',
			'descr'=>'Декларации по НДС, налоговые накладные и приложения к ним',
			'img'=>'',
			'product_name'=>'Раджа',
			],

			[
			'name'=>'Бухгалтерский учет',
			'descr'=>'документы и бланки, связанные с бухгалтерией',
			'img'=>'',
			'product_name'=>'X-Door',
			],
			[
			'name'=>'Зарплата',
			'descr'=>'Составление табеля, расчет и выплата зарплаты',
			'img'=>'',
			'product_name'=>'X-Door',
			],
			[
			'name'=>'Единый социальный взнос',
			'descr'=>'Расчет ЕСВ',
			'img'=>'',
			'product_name'=>'X-Door',
			],
			[
			'name'=>'Торговый склад 2',
			'descr'=>'Справочник товаров и услуг, документы прихода и отпуска',
			'img'=>'',
			'product_name'=>'X-Door',
			],


		];

/*
		foreach ($arrProds as $key => $arr) {
			$item = new Product();
			$item->name=$arr['name'];
			$item->slug=$arr['name'];
			$item->descr=$arr['descr'];//?
			$item->price=$arr['price'];
			$item->sku=$key;
			$item->save();
		};
*/
		foreach ($arrApps as $key => $arr) {
			$item = new Application();
			//$item->product_id=$arr['product_id'];
			$item->product_id=Product::where('name','=',$arr['product_name'])->first()->id;
			$item->name=$arr['name'];
			$item->slug='';//$arr['name'];
			$item->descr=$arr['descr'];//?
			$item->save();
		};

		return view('admin.mainpanel');//главная страница админки 'admin.dashboard'
	}

    public static function classes(){
    	return
[
	[
		'table'=>'Проекты',//'products',
		'url'=>'/admin/products',
		'label' => Product::count(),//кол-во продуктов
	],
	[
		'table'=>'Модули',//'applications',
		'url'=>'/admin/applications',
		'label' => Application::count(),//кол-во
	],
	[
		'table'=>'Релизы',//'releases',
		'url'=>'/admin/releases',
		'label' => Release::count(),//кол-во
	],

];    	
    }
}
