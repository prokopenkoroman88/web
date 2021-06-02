<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Place_kind;

class Place extends Model
{
    //
    protected $fillable =['name','x','y','owner_id','kind_id'];//,'mark'
    //  что автоматом заполнять для Product::create($request->all());


    //const FIELDS=[
    public static $fields=[
            'name'=>'Имя',
            'x'=>'Меридиан',
            'y'=>'Параллель',
            'ownerName'=>'Внутри чего',
            'kindName'=>'Тип места'
        ];

    public function getDisplayNameAttribute(){
    	return $this->name ?? '<Место не выбрано>';
    }

    public function owner(){
        return $this->belongsTo('App\Place','owner_id');
    }
    public function getOwnerNameAttribute(){//+20.4.20
        //return $this->attributes['fatherRef']->name;
/*
        $o=$this->owner;
        if($o) return $o->attributes['name'];
        else return '<??>';
*/
         return $this->owner->attributes['name'] ?? '[???]';
    }



    public function kind(){
        return $this->belongsTo('App\Place_kind','kind_id');
    }


    public function getKindNameAttribute(){//+20.4.20
        //return $this->attributes['fatherRef']->name;
        $k=$this->kind;
        //dd($k);
        return $this->kind->attributes['name'] ?? '<noname>';
        //dd($y);
    }


/*
    public function motherRef(){
        return $this->belongsTo('App\Human','mother');
    }
    public function getMotherNameAttribute(){//+20.4.20
        //return $this->attributes['fatherRef']->name;
        //return $this->belongsTo('App\Human','mother')->name;
		return $this->motherRef->name;

    }
*/




}



/*
            $table->string('name',100);
            $table->float('x')->nullable();
            $table->float('y')->nullable();
            $table->bigInteger('owner_id')->nullable();
            $table->bigInteger('kind_id')->nullable();


*/
