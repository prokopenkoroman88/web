<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Services\Statistic;//+?
//   

class Release extends Model
{
    //,'slug'
    protected $fillable =['name','descr','price','date','included_id','last_id','product_id','version','server_version','client_version'];

    public function setSlugAttribute($value)
    {//$value = form.slug м.б. пустой или заполн
    	//в латиницу без пробелов  дефисами


    	//Str::slug('строка', 'вместо пробела') 
//    	$this->attributes['slug'] = \Str::slug( $value ? $value : ($this->attributes['name'].'-'.$this->attributes['version']), '-');
    }

    public function setVersionAttribute($value)
    {//$value = form.slug м.б. пустой или заполн
    	//в латиницу без пробелов  дефисами

    	$this->attributes['version'] = $value;
    	//Str::slug('строка', 'вместо пробела') 

    	$ver=str_replace('.', '-', $value);
    	$slug=$this->product->slug.'-'.$ver;

    	$this->attributes['slug'] = \Str::slug( $slug, '-');
    }


    public function included(){
        return $this->belongsTo('App\Release','included_id');
    }

    public function last(){
        return $this->belongsTo('App\Release','last_id');
    }

    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }


    public function applications(){//через промежуточную таблицу
        return $this->belongsToMany('App\Application','components','release_id','application_id');
    }


    public function comments(){
        //много комментариев к релизу
        return $this->hasMany('App\Comment');//модель
    }




    public function isDistr(){
    	return (!$this->last);
    }


    public function getYearAttribute(){//+6.4.20
    	$y=getdate(strtotime($this->attributes['date']));
    	//dd($y);

    	return $y['year'];
    }

    public function getCreatingDateAttribute(){//+20.4.20
        $y=getdate(strtotime($this->attributes['created_at']));
        //dd($y);

        return date('Y-m-d',$y[0]);//['year'];
    }

    public function getCreatingDateHumanAttribute(){//+20.4.20
        $y=getdate(strtotime($this->attributes['created_at']));
        //dd($y);

        return date('d.m.Y',$y[0]);//['year'];
    }

    public function getAppNamesAttribute(){//+6.4.20
    	$apps=$this->applications;
    	$res='apps:';

//dd($apps);

        foreach ($apps as $item) {
            //dd($item->attributes['name']);
            
            $res.= ($res?', ':'').$item->attributes['name'];

        };
/*
    	foreach ($apps as $key => $app) {
    		//dd($app);
    		if($app)
    			$res.= (' '.$app->name);
    		//$app->
    	};
*/
    	return $res;
    }


    public function getReadmeAttribute(){
    	$apps=$this->applications;//()
    	$res='';//[];
    	//dd($apps);

    	// ne apps a components
    	foreach ($apps as $key => $app) {
    		//dd($app);
//    		if($app)
//    			$res.= ' '.$app->name;
    		//$app->
    	};

    	return $res;

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
        //$st= new Statistic();
        //dd(Stat(0));

        //return $st->get_starmark($this->mark);

        echo Statistic::get_starmark($this->mark);
    }


    public function scopeFavorite($query)
    {//scope...($query)
        //будем добавлять
        //?//return $query->where('favorite', '=', 1);
        // avg(select mark from comments c where c.release_id= )
    }
    

/*
    public function scopeLatest($query)
    {//scope...($query)
        //будем добавлять
        return $query->where('created_at', '>=', '01.01.2020');
        // avg(select mark from comments c where c.release_id= )
    }
*/



    public function scopeByProductName($query)
    {//scope...($query)
        //будем добавлять
        return $query->orderBy('product_id', 'ASC');
        //return $query->orderBy('(select min(name) from products p where p.id=product_id)', 'ASC');
    }

    public function scopeByLatest($query)
    {//scope...($query)
        //будем добавлять       created_at
        return $query->orderBy('date', 'DESC');
    }


}
