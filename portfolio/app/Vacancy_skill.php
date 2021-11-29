<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy_skill extends Model
{

    public $timestamps = false;
    protected $fillable =['vacancy_id','skill_id'];//  что автоматом заполнять

    public static $fields=[
            'vacancy_id'=>'Вакансия',
            'skill_id'=>'Скилл',
        ];

    public function getDisplayNameAttribute(){
    	return $this->name ?? '<скилл не выбран>';
    }



    public function skill(){
        return $this->belongsTo('App\Skill','skill_id');
    }

    public function getSkillNameAttribute(){
        return $this->skill->attributes['name'] ?? '<noname>';
    }


    public function vacancy(){
        return $this->belongsTo('App\Vacancy','vacancy_id');
    }

    public function getVacancyNameAttribute(){
        return $this->vacancy->attributes['name'] ?? '<noname>';
    }

}
