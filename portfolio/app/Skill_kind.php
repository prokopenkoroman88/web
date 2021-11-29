<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill_kind extends Model
{

    public $timestamps = false;
    protected $fillable =['side','name'];//  что автоматом заполнять

    public static $fields=[
        	//'id'=>'#',
            'side'=>'Сторона',
            'name'=>'Название'
        ];

    public static $sideNames=['<не выбрано>','Требования','Предложения'];

    public function getDisplaySideAttribute(){
    	$index=$this->side ?? 0;
    	return self::$sideNames[$index];
    }


    public function getDisplayNameAttribute(){
    	return $this->name ?? '<Вид не выбран>';
    }

}
