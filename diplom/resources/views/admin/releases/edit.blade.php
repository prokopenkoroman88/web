{{--
 @extends('adminlte::page') 
--}}
{{--
@extends('layouts.app')
--}}

@extends('admin.mainpanel')

@section('title', 'Edit release')

@section('content_header')
    <h1>Edit release</h1>
@stop

@section('content')


	@include('layouts.error')

{!!	Form::model($release,['url'=>'/admin/releases/'.$release->id, 'method'=>'PUT', 'enctype'=>'multipart/form-data' ]) !!}
	@include('admin.releases.form')
{!! Form::close() !!}

@stop

@section('js')
	@include('layouts.js')
@endsection


