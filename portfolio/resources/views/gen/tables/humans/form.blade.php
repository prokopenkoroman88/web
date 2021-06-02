

<?php
$humans = App\Human::all();

?>


<input type="text" name="name" value="{{$item->name}}">
<input type="text" name="surname" value="{{$item->surname}}">

<input type="date" name="birthday" value="{{$item->birthday}}">{{-- 
<input type="number" name="father" value="{{$item->father}}">
<input type="number" name="mother" value="{{$item->mother}}">
 --}}

<?php
$path='/gen/humans';
$model = \App\Human::class;
$fieldName = 'father';
$id = $item->father;
?>
{{view('common.tables.layouts.popup-field',compact('path','model','fieldName','id'))}}

<?php
$path='/gen/humans';
$model = \App\Human::class;
$fieldName = 'mother';
$id = $item->mother;
?>
{{view('common.tables.layouts.popup-field',compact('path','model','fieldName','id'))}}


<br>

{{-- ===================== END ================== --}}

{{-- 
<input type="button"
onclick="
let ufv=document.querySelector('#ufv');
ufv.style.display = 'table';//block
"
value="..."
>

<div id="ufv" style="display: none; position: absolute; background-color: lightyellow;
">
	
<?php


	$path='/gen/humans';
        $fields=[
        	'id'=>'#',
            'name'=>'Имя',
            'fatherName'=>'Отец',
            'motherName'=>'Мать'
        ];

	$items=$humans;
	$actions=['select'];//'edit','del'
?>

{{view('tables.custom.list',compact('path','fields','items','actions')) }}

<input type="button" value="ok" class="button primary-button" onclick="
let ufv=document.querySelector('#ufv');
ufv.style.display = 'none';//block
">

</div>	


<ul>
@foreach($humans as $human)
<li>{{$human->name}}</li>


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
 --}}