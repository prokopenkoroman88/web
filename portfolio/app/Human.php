<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    //
    protected $fillable =['name','surname','father','mother','birthday'];//,'mark'
    //  что автоматом заполнять для Product::create($request->all());

    public static $fields=[
            'name'=>'Имя',
            'fatherName'=>'Отец',
            'motherName'=>'Мать'
        ];


    public function getDisplayNameAttribute(){
    	return $this->name ?? '<Человек не выбран>';
    }

    public function fatherRef(){
        return $this->belongsTo('App\Human','father');
    }
    public function getFatherNameAttribute(){//+20.4.20
        //return $this->attributes['fatherRef']->name;

        return $this->fatherRef ? $this->fatherRef->name : '<Отец не выбран>';
        //dd($y);
    }


    public function motherRef(){
        return $this->belongsTo('App\Human','mother');
    }
    public function getMotherNameAttribute(){//+20.4.20
        //return $this->attributes['fatherRef']->name;
        //return $this->belongsTo('App\Human','mother')->name;
		return $this->motherRef ? $this->motherRef->name : '<Мать не выбрана>';

    }


}
