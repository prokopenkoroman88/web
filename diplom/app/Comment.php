<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Release;//+
use App\Services\Statistic;//+

class Comment extends Model//+15.4.20
{
    //
    protected $fillable =['user_id','product_id','release_id','mark','descr'];


    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }

    public function release(){
        return $this->belongsTo('App\Release','release_id');
    }


    public function get_starmark(){

        echo Statistic::get_starmark($this->mark);
    }



}
