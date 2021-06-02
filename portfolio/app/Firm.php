<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    //
    protected $fillable = ['name','www','email','phone','place','descr'];


    public static $fields=[
            'name'=>'@table.name',//Фирма
			'www'=>'@table.site',//Сайт
			'email'=>'@table.email',//Эл. почта
			'phone'=>'@table.phone',//Телефоны
			'place'=>'@table.address',//Улица
		//	'descr'=>'Описание',
        ];


    public function getDisplayNameAttribute(){
    	return $this->name ?? '<Фирма не выбрана>';
    }
/*

        <span>@lang('table.name')</span>
        <span>@lang('table.site')</span>
        <span>@lang('table.email')</span>
        <span>@lang('table.phone')</span>
        <span>@lang('table.address')</span>


*/


}
