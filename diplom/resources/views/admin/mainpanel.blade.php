{{-- resources/views/admin/dashboard.blade.php --}}
{{--
 @extends('adminlte::page') 
--}}
@extends('layouts.app')
<?php
use App\Http\Controllers\Admin\AdminController;

?>

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

{{-- @section('content') --}}

@section('nav') 
<?php
$classes = AdminController::classes();

//dd($classes);

$url = $_SERVER['REQUEST_URI']; // "/admin/releases"

?>

{{-- <ul> --}}
@foreach($classes as $item)
<?php
	$href= $item['url'];
	$text= $item['table'];
	$count= $item['label'];
	echo view('layouts.li',compact('href','text','count'));
?>

{{-- 	
<?php
 $active = ($url==$item['url'])?'active':'';

?>
	<li class="nav-item  {{$active}} has-count nowrap">
		<a href="{{$item['url']}}" class="nav-link ">
			<span class="link-text">{{$item['table']}}</span>
		</a>
		<span class="elem-count">{{$item['label']}}</span>
	</li>
 --}}

@endforeach
{{-- </ul> --}}
@stop


@section('content') 

	<h1 itemscope style="font-size: 1em;">
		<p class="capture capt-0">
			<span >
				<strong style="background-color:#eeeeee;">
					Администрационная панель
				</strong>
			</span>
		</p>
	</h1>


<a href="/admin/init">Инициализировать базу</a>


{{-- @include('admin._falayers') --}}


@stop

{{--  
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
 --}}
