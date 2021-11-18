{{--
 @extends('adminlte::page') 

@extends('layouts.app')
--}}
@extends('admin.mainpanel')

@section('title', 'Edit product')

@section('content_header')
    <h1>Edit product</h1>
@stop

@section('content')


	@include('layouts.error')


{!!	Form::model($product,['url'=>'/admin/products/'.$product->id, 'method'=>'PUT', 'enctype'=>'multipart/form-data' ]) !!}
	@include('admin.products.form')
{!! Form::close() !!}

@stop

@section('js')
	@include('layouts.js')
@endsection


