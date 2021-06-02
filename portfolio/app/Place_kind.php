<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place_kind extends Model
{


    public static $fields=[
        	//'id'=>'#',
            'name'=>'Имя',
            'table'=>'класс',
            'descr'=>'описание'
        ];

    public function getDisplayNameAttribute(){
    	return $this->name ?? '<Тип не выбран>';
    }

}
