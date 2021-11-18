<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Application extends Model
{
    //
    protected $fillable =['name','slug','descr','img','product_id'];

    public function setSlugAttribute($value)
    {//$value = form.slug м.б. пустой или заполн
    	//в латиницу без пробелов  дефисами


		$product_slug=$this->product->slug;

    	//Str::slug('строка', 'вместо пробела') 
    	$this->attributes['slug'] = \Str::slug( $value ? $value : $product_slug.'-'.$this->attributes['name'], '-');
    }

    public function product(){//+10.4.20
        return $this->belongsTo('App\Product','product_id');
    }


    public function releases(){//через промежуточную таблицу
        return $this->belongsToMany('App\Release','components','application_id','release_id');
    }



}
