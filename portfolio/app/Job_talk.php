<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_talk extends Model
{
    //
    protected $fillable = ['firm_id','vacancy_id','when','by','platform_id','resume_filename','descr'];


    public static $fields=[
            'vacancyName'=>'Вакансия',
			'firmName'=>'Фирма',
			'when'=>'Когда',
			'by'=>'По телефону',
			'descr'=>'О чем разговор',
		];


    public function firm(){
        $res = $this->belongsTo('App\Firm','firm_id');
        if(!$res){
			$res = $this->vacancy->attributes['firm'];
        };
        return $res;
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

    public function getWhenDateAttribute(){
        $when = $this->when ?? ' ';
        return explode(' ', $when)[0];
    }
    public function getWhenTimeAttribute(){
        $when = $this->when ?? ' ';
        return explode(' ', $when)[1];
    }

    public function vacancy(){
        return $this->belongsTo('App\Vacancy','vacancy_id');
    }
    public function getVacancyNameAttribute(){//+20.4.20
        //return $this->attributes['fatherRef']->name;
/*
        $o=$this->owner;
        if($o) return $o->attributes['name'];
        else return '<??>';
*/
         return $this->vacancy->attributes['name'] ?? '[???]';
    }



}
