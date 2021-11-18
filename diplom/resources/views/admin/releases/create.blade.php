{{--
 @extends('adminlte::page') 
--}}
{{--
 @extends('layouts.app') 
--}}

@extends('admin.mainpanel')

@section('title', 'Add release')

@section('content_header')
    <h1>Add release</h1>
@stop

@section('content')


	@include('layouts.error')

{!!	Form::model($release,['url'=>'/admin/releases', 'enctype'=>'multipart/form-data' ]) !!}
	@include('admin.releases.form')
{!! Form::close() !!}

@stop

@section('js')
	@include('layouts.js')
@endsection


