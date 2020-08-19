@extends('common')


@section('content')
	@parent

<h1>Продукты</h1>

@foreach($products as $product)

<article class="snippet product-snippet">
	<p>{{$product->name}}</p>
	<form action="/cart/add" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="product_id" value="{{$product->id}}">
		<input type="hidden" name="quan" value="1">
		<input type="submit" value="в корзину">
	</form>
</article>


@endforeach

@endsection
