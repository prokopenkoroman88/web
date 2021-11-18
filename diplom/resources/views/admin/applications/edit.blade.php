{{--
 @extends('adminlte::page') 
--}}
@extends('admin.mainpanel')

@section('title', 'Edit application')

@section('content_header')
    <h1>Edit application</h1>
@stop

@section('content')


	@include('layouts.error')


{!!	Form::model($application,['url'=>'/admin/applications/'.$application->id, 'method'=>'PUT', 'enctype'=>'multipart/form-data' ]) !!}
	@include('admin.applications.form')
{!! Form::close() !!}

@stop

@section('js')
	@include('layouts.js')
@endsection


