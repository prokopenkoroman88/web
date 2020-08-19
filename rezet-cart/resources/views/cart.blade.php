@extends('common')


@section('content')
	@parent

<h1>Корзина</h1>


@if(!$products)
	<p>В корзине ничего нет</p>
@else

	@foreach($products as $product)

	<article class="snippet cart-snippet">

		<h2>{{$product['name']}}</h2>
		<form action="/cart/del" method="post" class="del-form">
			{{ csrf_field() }}
			<input type="hidden" name="product_id" value="{{$product['id']}}">
			<button>
				<img src="images/trash3.png" alt="мусорка" class="trash-img">
			</button>
		</form>


		<img src="/images/{{$product['img']}}" alt="{{$product['name']}}" class="product-img">
		<div class="cart-info">	
<?php
	$descr=\App\Product::find($product['id'])->descr;
?>
		<div class="product-descr">
			{!!$descr!!}
		</div>


	<div class="cart-control">
		<form action="/cart/add" method="post"  class="sub-form">
			{{ csrf_field() }}
			<input type="hidden" name="product_id" value="{{$product['id']}}">
			<input type="hidden" name="quan" value="-1">
			<input type="submit" value="-">
		</form>
		<span class="cart-quan">{{$product['quan']}}</span>
		<form action="/cart/add" method="post"  class="add-form">
			{{ csrf_field() }}
			<input type="hidden" name="product_id" value="{{$product['id']}}">
			<input type="hidden" name="quan" value="1">
			<input type="submit" value="+">
		</form>

		<span class="cart-price">
			{{$product['quan']*$product['price']}}&euro;
		</span>
	</div>
	</div>

	</article>


	@endforeach

<hr>
		
<form action="/shipping" method="POST" class="form-buy">
	<span>{{$totalSum}}&euro;</span>
	{{ csrf_field()}} 
	<input type="hidden" name="totalSum" value="{{$totalSum}}">
	<input type="submit" value="BUY">
</form>

@endif

@endsection
