<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\Statistic;//+

class Product extends Model
{
    //,'img'
    protected $fillable =['name','slug','descr','sku','price'];//,'mark'
    //  что автоматом заполнять для Product::create($request->all());

    public function setSlugAttribute($value)
    {//$value = form.slug м.б. пустой или заполн
    	//в латиницу без пробелов  дефисами


    	//Str::slug('строка', 'вместо пробела') 
    	$this->attributes['slug'] = \Str::slug( $value ? $value : $this->attributes['name'], '-');
    }


    public function applications(){
        //много обновлений продукта
        return $this->hasMany('App\Application');//модель
    }


	public function releases(){
		//много обновлений продукта
		return $this->hasMany('App\Release');//модель
	}

    public function comments(){
        //много комментариев к продукту
        return $this->hasMany('App\Comment');//модель
    }



    public function last(){
        $release = $this->releases()->orderBy('version', 'DESC')->first();

        //dd($release);
        return $release;
    }


    public function getMarkAttribute(){
        $comments = $this->comments->pluck('mark')->all();
        //dd($comments); array

        if($comments)
            return array_sum($comments)/count($comments);
        else
            return 0;
    

    }

    public function get_starmark(){
        echo Statistic::get_starmark($this->mark);
    }

    public function scopeFavorite($query)
    {//scope...($query)
        //будем добавлять
        //?//return $query->where('favorite', '=', 1);
    }

    public function scopeLatest($query)
    {//scope...($query)
        //будем добавлять
        return $query->orderBy('created_at', 'DESC');
    }

}
