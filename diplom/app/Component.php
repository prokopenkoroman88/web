<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    //

    public function release(){
        return $this->belongsTo('App\Release','release_id');
    }

    public function application(){
        return $this->belongsTo('App\Application','application_id');
    }


	public function notes(){
		//много позиций 
		return $this->hasMany('App\Notes');//модель
	}

}
