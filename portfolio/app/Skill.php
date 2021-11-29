<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Skill_kind;

class Skill extends Model
{

    public $timestamps = false;
    protected $fillable =['kind_id','name'];//  что автоматом заполнять

    public static $fields=[
            'kindName'=>'Вид',//calc field
            'name'=>'Название',
        ];

    public function getDisplayNameAttribute(){
    	return $this->name ?? '<скилл не выбран>';
    }

    public function kind(){
        return $this->belongsTo('App\Skill_kind','kind_id');
    }

    public function getKindNameAttribute(){
        //$k=$this->kind;
        return $this->kind->attributes['name'] ?? '<noname>';
    }


    public function vacancies(){
        return $this->belongsToMany('App\Vacancy', 'vacancy_skills', 'skill_id', 'vacancy_id');
    }

    public function skillVacancies(){//?
        return $this->hasMany('App\Vacancy_skill', 'skill_id', 'id');
    }

}
