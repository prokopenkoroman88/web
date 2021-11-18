@extends('adminlte::page')

@section('title',' все товары категории ')
{{-- categories.show это такое же как и news.index --}}

@section('content')

<h1 class="text-center">{{$category->name}}</h1>


@foreach($products as $item)
	<article class="container news-snippet">
		<h2>{{ $item->category ? $item->category->name : '<без категории>' }}</h2>
		<h2>{{ $item->categoryNames }}</h2>
		<div class="row">
			<div class="col-md-4">
				<img src="{{$item->img}}" alt="{{$item->name}}" class="news-image">
			</div>

			<div class="col-md-8">
				<p>  {{$item->name}}</p>
				<p>  {{$item->price}}</p>
				{{-- <span class="news-time">{{$item->created_at}}</span> --}}

				<a href="/products/{{$item->id}}" class="news-edit-btn">
					<i class="far fa-eye ">Show</i>
				</a>

				<form action="/news/{{$item->id}}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="DELETE">
					<button type="submit" class="news-del-btn"><i class="far fa-trash-alt   "></i></button>
				</form>		
			</div>

		</div>
	</article>

@endforeach

	{{-- пагинация  http://blog/?page=2     --}}
	{{-- $products->links() --}}   {{-- в контроллере д.б. News::paginate(2)   --}}
	
@endsection