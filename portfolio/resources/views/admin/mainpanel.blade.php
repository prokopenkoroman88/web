@extends('layouts.app')

@section('title')
{{ config('app.name', 'Laravel') }}
@endsection



@section('breadcrumbs')
<?php

$path=$_SERVER['REQUEST_URI'];
$path_det=explode('/', $path);
$href='\\';
$s='';
$s1='';


foreach ($path_det as $key => $det) {
	if($det=='') {
		$det='MainPage';
	}
	else{
		$href.=($det.'\\');
		$det=strtoupper($det);
	};

	if($key<(count($path_det)-1)){
		$s1= "<a href=$href>$det</a>";
	}
	else{
		$s1= "$det";
	};
	//$s1= "<a href='$href'>$det $href</a>";
	$s.="<li>$s1</li>";
};
$s="<ul class='bread-crumbs'>$s</ul>";
echo $s;

/*
/gen
/gen/humans
*/

?>

@endsection


@section('content')


@endsection