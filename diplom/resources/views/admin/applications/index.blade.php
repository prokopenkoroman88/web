{{--
 @extends('adminlte::page') 
--}}
@extends('admin.mainpanel')

@section('title',' все приложения ')

@section('content')

{{-- ,'product'=null --}}
{{ view('admin.applications._list',compact('applications')) }}

@endsection


@section('js')
	<script>
		//$('table').DataTable()//+10.3.20 плагин 
	</script>
@endsection

