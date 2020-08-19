@extends('common')


@section('content')
	@parent

<h1>Доставка</h1>


<form action="/shipping/pay" method="POST" class="shipping-form" name="shipping">
	{{ csrf_field() }}

	<label>
		<span>Name*</span>
		<input type="text" name="name">
		<div class="text-danger none"></div>
	</label>
{{-- 	@if($errors->has('name'))
				<div class="text-danger">{{ $errors->first('name')}}</div>
	@endif --}}
	
	<label>
		<span>Address*</span>
		<input type="text" name="address">
		<div class="text-danger none"></div>
	</label>
{{-- 	@if($errors->has('address'))
				<div class="text-danger">{{ $errors->first('address')}}</div>
	@endif	 --}}
	
	<label>
		<span>Phone</span>
		<input type="tel" name="phone">
		<div class="text-danger none"></div>
	</label>
	<label>
		<span>E-mail</span>
		<input type="e-mail" name="email">
		<div class="text-danger none"></div>
	</label>

	<label>
		<span>Shipping options</span>
		<select name="options"  >
<?php

$aShp=[
	 ['value'=>'Free shipping','inner'=>'Free shipping','from'=>0,'less'=>10]
	,['value'=>'Express shipping','inner'=>'Express shipping','from'=>10,'less'=>20]
	,['value'=>'Courier shipping','inner'=>'Courier shipping','from'=>20,'less'=>300]
	,['value'=>'Free express shipping','inner'=>'Free express shipping','from'=>300,'less'=>0]
];

$totalSum=$_POST['totalSum'];

?>
			@foreach($aShp as $key => $shp)
				<option value="{{$shp['value']}}" 
				@if($shp['from']<=$totalSum && (!$shp['less'] || $totalSum<$shp['less']))selected
				@endif
				>{{$shp['inner']}}</option>


			@endforeach
{{-- 

			<option value="Free shipping" selected >Free shipping</option>
			<option value="Express shipping"  >Express shipping</option>
			<option value="Courier shipping">Courier shipping</option>
			<option value="Free express shipping">Free express shipping</option>


		 --}}	
		</select>
	</label>

	<input type="submit" value="PAY" name="pay" disabled>


</form>




@endsection
