{{--
 @extends('adminlte::page') 
	
@extends('layouts.app')
--}}
@extends('admin.mainpanel')
 
<?php
//dd($dataTable);
//dd($dataTable['items'][0]->descr);//!!!))
//dd($dataTable['items'][0]->getAttribute('by'));///!!!!!!1)))

//[0]->attributes['descr']
//item->table

//['table']
?>


{{--   Список объектов класса  

@lang('auth.E-Mail Address')
 --}}
@section('title') @lang('table.Object list of class') "@yield('table')"
@endsection

@section('content')
	
{{-- ,'product'=null --}}
{{-- 
{{ view('admin.products._list',compact('products')) }}
 --}}
<h2>@lang('table.Object list of class') "@yield('table')"</h2>

<?php

//require_once ('../resources/views/tables/custom/ViewFuncs.php'); //!!!!!!!!
//require_once ('../resources/views/tables/custom/ViewFuncs.php'); //!!!!!!!!
//verni	$actions=['new','edit','del','id'];
?>
{{--view('common.tables.layouts.list',compact('path','fields','items','actions')) --}}
{{App\Http\Controllers\Admin\CustomResourceController::showList($dataTable)}}









{{-- 
<?php
	$action='new';
?>
{!! view('tables.custom.redact',compact('path','action')); !!}
 --}}
{{-- {{view('tables.custom.tr',compact('path','item','actions')) }}
 --}}
@endsection