{{-- кусок формы --}}

<?php

//*
	if(isset($_GET['product_id'])){
		//
		$product=App\Product::find($_GET['product_id']);

	};
//*/
	if(!isset($product)){
		$product=$application->product;
	}
	else
	if(!$application->product_id){
		$application->product_id=$product->id;
	};



	if(!isset($products)){

		$products = App\Product::where('name','<>','""')->orderBy('name','ASC')->pluck('name','id')->all();		
	};


?>

<span>Продукт №{{$product->id ?? 0}}</span>


<div class="form-group container">
	<div class="row">
		<div class="col-md-2">
			{!! Form::label('product_id', 'Продукт', ['class' => 'awesome'])  !!}			
		</div>
		<div class="col-md-10">

			{!! Form::select('product_id', 
				$products,//['L' => 'Large', 'S' => 'Small'], 
				null, //выделенный элемент
				['placeholder' => 'Выберите продукт', 'class'=>'form-control select'] //доп парам
			) 
			!!}	
					
		</div>

	</div>
	<div class="row">
		<div class="col-md-12">	

			@if($errors->has('product_id'))
				<div class="text-danger">{{ $errors->first('product_id')}}</div>
			@endif

		</div>
	</div>
</div>


<div class="form-group container">

	<div class="row">
		<div class="col-md-3">
			{!! Form::label('name', 'Приложение:', ['class' => 'awesome'])  !!}
		</div>
		<div class="col-md-9">
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>

	</div>
	<div class="row">
		@if($errors->has('name'))
			<div class="text-danger">{{ $errors->first('name')}}</div>
		@endif
	</div>


	<div class="row">
		<div class="col-md-3">
			{!! Form::label('slug', 'Ярлык:', ['class' => 'awesome'])  !!}
		</div>
		<div class="col-md-9">
			{!! Form::text('slug', null, ['class'=>'form-control']) !!}
		</div>

	</div>
	<div class="row">
		@if($errors->has('slug'))
			<div class="text-danger">{{ $errors->first('slug')}}</div>
		@endif
	</div>

	<div class="row">
		<div class="col-md-3">
			{!! Form::label('descr', 'Описание:', ['class' => 'awesome'])  !!}
		</div>
	</div>

	<div class="row">		
		<div class="col-md-12">
			{!! Form::textarea('descr', null, ['class'=>'form-control', 'id'	=>'descr']) !!}
		</div>
	</div>
</div>

{{-- IMG --}}

<div class="form-group container">
	<div class="row">
		<div class="col-3" id="preview" style="background-image: url('{{$application->img}}');   ">
			@if(!$application->img)
			{!! Form::label('img', 'Изображение', ['class' => 'awesome'])  !!}	
			@endif
		</div>
		<div class="col-9">

			{!! Form::file('img', null, ['class'=>'form-control', 'id'=>'img']) !!}	
 {{--
			<input type="file" name="img" id="img">
 --}}

 		</div>
	</div> 
</div>

{{-- --}}

<div class="form-group container">
	<div class="row">
		<div class="offset-md-9 col-md-3">
{!!
 Form::submit('Save', ['class'=>'form-control btn btn-primary d-inline-block']);
!!}			
		</div>
	</div>	
</div>
 

