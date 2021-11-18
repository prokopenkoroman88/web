{{--
 @extends('adminlte::page') 

@extends('layouts.app')
--}}
@extends('admin.mainpanel')

@section('title', 'Add product')

@section('content_header')
    <h1>Add product</h1>
@stop

@section('content')
	

	@include('layouts.error')

{!!	Form::model($product,['url'=>'/admin/products', 'enctype'=>'multipart/form-data' ]) !!}
	@include('admin.products.form')
{!! Form::close() !!}

@stop

@section('js')
	@include('layouts.js')
@endsection


