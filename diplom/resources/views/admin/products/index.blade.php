{{--
 @extends('adminlte::page') 

@extends('layouts.app')
--}}
@extends('admin.mainpanel')

@section('title',' все товары ')

@section('content')
	
{{-- ,'product'=null --}}
{{ view('admin.products._list',compact('products')) }}


@endsection


@section('js')
	<script>
		//?//$('table').DataTable();//+10.3.20 плагин 
	</script>
@endsection


{{-- 
			<form action="categories/{{$category->id}}/edit" method="GET">
				<button type="submit"><img src="{{asset('images/pensil.png')}}" alt="edit"></button>
			</form>
			<form action="categories/{{$category->id}}" method="DELETE">
				<button type="submit"><img src="{{asset('images/basket.png')}}" alt="delete"></button>
			</form>	

 --}}
