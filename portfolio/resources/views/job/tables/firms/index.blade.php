@extends('common.tables.layouts.index')

@section('table','Firms')
{{-- 
<?php
//use resources\views\tables\custom\ViewFuncs; //!!!!!!!!!
//require_once ('d:/step/php/ospanel/domains/portfolio/resources/views/tables/custom/ViewFuncs.php');


//require_once ('../resources/views/tables/custom/ViewFuncs.php'); //!!!!!!!!


//D:\STEP\PHP\OSPanel\domains\portfolio\resources\views\tables\custom\ViewFuncs.php

?>


@section('THs')
<?php
$cols=['','Имя','Отец','Мать'];//headers

/*
function printTHs($aCol){
	$s='';
	foreach ($aCol as $key => $col) {
		$s.="<th>$col</th>";
	};
	return $s;
};
*/

//include_once ('../resources/views/tables/custom/ViewFuncs.php'); //!!!!!!!!

//echo printTR($tds);
//echo printTHs($headers);//!!!!!!!!


//echo ViewFuncs::printTHs($headers);

//echo Resources\Views\Tables\Custom\ViewFuncs::printTHs($headers);
//echo resources\views\tables\custom\ViewFuncs::printTHs($headers);
?>

{{view('tables.custom.tr',compact('cols')) }}

@endsection

 --}}


{{-- 
@section('THs')
<?php
$cols=['','Имя','Отец','Мать'];//headers
?>

{{view('tables.custom.tr',compact('cols')) }}

@endsection

 --}}