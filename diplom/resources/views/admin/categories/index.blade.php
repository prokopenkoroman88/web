@extends('adminlte::page')

@section('title',' все категории ')

@section('content')

<table>
	<tr>
		<th>#</th>
		<th>Name</th>
		<th>Img</th>
		<th>Slug</th>
		<th>Parent</th>				
		<th></th>
	</tr>
@foreach($categories as $item)

	<tr>
		<td>{{$loop->iteration}}{{-- $item->id --}}</td>
		<td>{{$item->name}}</td>
		<td>{{$item->img}}</td>				
		<td>{{$item->slug}}</td>
		<td>{{$item->parent_id}}-{{$item->parentCategory}}  </td>		


		<td>
			<a href="/admin/categories/{{$item->id}}/edit"><i>edit</i></a>

			|
			<form action="/admin/categories/{{$item->id}}/edit" method="GET">
				<input type="submit" value="edit">
			</form>
			<form action="/admin/categories/{{$item->id}}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="DELETE">
				<input type="submit" value="del">
				{{--  plugolab   icon-trash  иконка корзинки --}}
			</form>		

		</td>
	</tr>

@endforeach
</table>


@endsection

@section('js')
	<script>
		$('table').DataTable()//+10.3.20 плагин 
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
