{{--
 @extends('adminlte::page') 
	
@extends('layouts.app')
--}}
@extends('admin.mainpanel')
 
@section('title') объект класса "@yield('table')"
@endsection

@section('content')
 
	@include('layouts.error')
{{-- --}}
<?php

$formPath=$path;
$method='POST';


//dd($item);
if($item->id){
	$formPath .= '/'.$item->id;
	$method='POST';//PUT
};

?>

<form action="{{$formPath}}" method="{{$method}}">
	{{ csrf_field()}} 

	@if($item->id)
	<input type="hidden" name="_method" value="PUT">
	@endif

	@yield('form-content')

	<input type="submit" value="SAVE">

</form>

@stop



{{-- 


'url'=>'/admin/releases', 
'enctype'=>'multipart/form-data' 


'url'=>'/admin/releases/'.$release->id, 
'method'=>'PUT', 
'enctype'=>'multipart/form-data'


//======================
@section('content')


	@include('layouts.error')

{!!	Form::model($release,['url'=>'/admin/releases', 'enctype'=>'multipart/form-data' ]) !!}
	@include('admin.releases.form')
{!! Form::close() !!}

@stop

//=========================


@section('content')


	@include('layouts.error')

{!!	Form::model($release,['url'=>'/admin/releases/'.$release->id, 'method'=>'PUT', 'enctype'=>'multipart/form-data' ]) !!}
	@include('admin.releases.form')
{!! Form::close() !!}

@stop



 --}}