{{--
 @extends('adminlte::page') 

@extends('layouts.app')
--}}
@extends('admin.mainpanel')

@section('title',' все релизы ')

@section('content')

{{-- ,'product'=null --}}
{{ view('admin.releases._list',compact('releases')) }}

@endsection


@section('js')
	<script>
		//$('table').DataTable()//+10.3.20 плагин 



	</script>
@endsection

