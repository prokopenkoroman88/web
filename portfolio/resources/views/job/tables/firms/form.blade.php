
{{-- 
<?php
$places = App\Place::all();


$place_kind_model= \App\Place_kind::class;
//$place_kinds = App\Place_kind::all();
$place_kinds = $place_kind_model::all();
?>
 --}}

<fieldset>
    <legend>@lang('table.firm')</legend>
    <label >
        <span>@lang('table.name')</span>
        <input type="text" name="name" value="{{$item->name}}">
    </label><br/>
    <label >
        <span>@lang('table.site')</span>
        <input type="text" name="www" value="{{$item->www}}">
    </label><br/>
    <label >
        <span>@lang('table.email')</span>
        <input type="email" name="email" value="{{$item->email}}">
    </label><br/>
    <label >
        <span>@lang('table.phone')</span>
        <input type="tel" name="phone" value="{{$item->phone}}">
    </label><br/>
    <label >
        <span>@lang('table.address')</span>
        <input type="text" name="place" value="{{$item->place}}">
    </label><br/>

<textarea name="descr">{{$item->descr}}</textarea>



</fieldset>

{{-- 
            'name'=>'Фирма',
            'www'=>'Сайт',
            'email'=>'Эл. почта',
            'phone'=>'Телефоны',
            'place'=>'Улица',
 --}}




{{-- 
<input type="text" name="surname" value="{{$item->surname}}">

<input type="number" name="father" value="{{$item->father}}">
<input type="number" name="mother" value="{{$item->mother}}">
<input type="date" name="birthday" value="{{$item->birthday}}">
 --}}

{{-- ~~~~~~~~~~~~ --}}
{{-- 
<?php

$path='/place_kinds';
$model = \App\Place_kind::class;
$fieldName = 'kind_id';
$id = $item->kind_id;
?>
{{view('tables.custom.popup-field',compact('path','model','fieldName','id'))}}


<?php

$path='/places';
$model = \App\Place::class;
$fieldName = 'owner_id';
$id = $item->owner_id;
?>
{{view('tables.custom.popup-field',compact('path','model','fieldName','id'))}}
 --}}
{{-- ================================================== --}}


{{-- 
<ul>
@foreach($places as $place)
<li>{{$place->name}}</li>


@endforeach
</ul>

<div class="popup1">
<input type="checkbox" value="open" class="btn-open"
style=""
>

<div class="frame">
	<p>aaaaaaaaaaa</p>
	<p>bbbbbbbbbbbbb</p>
	<p>cccccccccccc</p>
</div>

</div>
 --}}
{{--  ===================  END  =====================  --}}

{{-- 
<input type="button"
onclick="
let ufv=document.querySelector('#ufv-places');
ufv.style.display = 'table';//block
"
value="..."
>

<div id="ufv-places" style="display: none; position: absolute; background-color: lightyellow;
">
	
<?php


	$path='/places';//'/gen/humans';
        //$fields=App\Place::FIELDS;
		$fields=App\Place::$fields;

        /*[
        	'id'=>'#',
            'name'=>'Имя',
            'x'=>'by x',
            'y'=>'by y',
            'ownerName'=>'Внутри',
            'kindName'=>'Что это',
        ];*/

	$items=$places;
	$actions=['select'];//'edit','del'
?>

{{view('tables.custom.list',compact('path','fields','items','actions')) }}

<input type="button" value="ok" class="button primary-button" onclick="
let ufv=document.querySelector('#ufv-places');
ufv.style.display = 'none';//block
">

</div>	

 --}}

{{-- 


<input type="button"
onclick="
let ufv=document.querySelector('#ufv-place_kinds');
ufv.style.display = 'table';//block
"
value="..."
>

<div id="ufv-place_kinds" style="display: none; position: absolute; background-color: lightyellow;
">
	
<?php


	$path='/place_kinds';//'/gen/humans';
        $fields=[
        	'id'=>'#',
            'name'=>'Имя',
            'table'=>'класс',
            'descr'=>'описание'
        ];

	$items=$place_kinds;
	$actions=['select'];//'edit','del'
	$table='Place_kinds';//?????????????6.12.20
?>


// @section('table','Place_kinds') 
{{view('tables.custom.list',compact('path','fields','items','actions','table')) }}

<input type="button" value="ok" class="button primary-button" onclick="
let ufv=document.querySelector('#ufv-place_kinds');
ufv.style.display = 'none';//block
">

</div>	


 --}}
