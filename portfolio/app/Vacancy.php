<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    //
    protected $fillable = ['name','firm_id','email','phone','requirements','offers','hr_name','socnet','url','salary'];


    public static $fields=[
			'firmName'=>'@table.firm',
            'name'=>'@table.vacancy',
			//'email'=>'@table.email',
			'phone'=>'@table.phone',
            'salary'=>'ЗП',
			//'requirements'=>'Требования',
			//'offers'=>'Предложения',
			//'hr_name'=>'ФИО HR',
		];



    public function getDisplayNameAttribute(){
    	return $this->name ?? '<Вакансия не выбрана>';
    }

    public function firm(){
        return $this->belongsTo('App\Firm','firm_id');
    }
    public function getFirmNameAttribute(){//+20.4.20
         return $this->firm->attributes['name'] ?? '[???]';
    }


    public function skills(){
        return $this->belongsToMany('App\Skill', 'vacancy_skills', 'vacancy_id', 'skill_id');
    }

    public function vacancySkills(){//?
        return $this->hasMany('App\Vacancy_skill', 'vacancy_id', 'id');
    }


}
