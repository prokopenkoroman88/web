<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    //
    protected $fillable = ['name','firm_id','email','phone','requirements','offers','hr_name'];


    public static $fields=[
			'firmName'=>'@table.firm',
            'name'=>'@table.vacancy',
			'email'=>'@table.email',
			'phone'=>'@table.phone',
			//'requirements'=>'Требования',
			//'offers'=>'Предложения',
			'hr_name'=>'ФИО HR',
		];



    public function getDisplayNameAttribute(){
    	return $this->name ?? '<Вакансия не выбрана>';
    }

    public function firm(){
        return $this->belongsTo('App\Firm','firm_id');
    }
    public function getFirmNameAttribute(){//+20.4.20
        //return $this->attributes['fatherRef']->name;
/*
        $o=$this->owner;
        if($o) return $o->attributes['name'];
        else return '<??>';
*/
         return $this->firm->attributes['name'] ?? '[???]';
    }





}
