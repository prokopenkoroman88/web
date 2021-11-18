{{--
 @extends('adminlte::page') 
--}}
@extends('admin.mainpanel')

@section('title', 'Add application')

@section('content_header')
    <h1>Add application</h1>
@stop

@section('content')


	@include('layouts.error')

{!!	Form::model($application,['url'=>'/admin/applications', 'enctype'=>'multipart/form-data' ]) !!}
	@include('admin.applications.form')
{!! Form::close() !!}

@stop

@section('js')
	@include('layouts.js')
@endsection


