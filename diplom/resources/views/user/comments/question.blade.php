

@if(Auth::user())

<?php

$products = App\Product::where('name','<>','""')->orderBy('name','ASC')->pluck('name','id')->all();

?>


{{-- $application --}}

{!!	Form::model(null,['url'=>'/question', 'enctype'=>'multipart/form-data','style'=>'width:100%;', 'method'=>'post' ]) !!}


			@if(session('message'))
				<h1 class="text-{{session('message')['class']}}">
					{{session('message')['text']}}					
				</h1>
				<? Session::forget('message'); ?>
			@endif


<div class="form-group container">
	<div class="row">
		<div class="col-md-12">

			{!! Form::select('product_id', 
				$products,//['L' => 'Large', 'S' => 'Small'], 
				null, //выделенный элемент
				['placeholder' => 'Выберите продукт', 'class'=>'form-control select'] //доп парам
			) 
			!!}	
					
		</div>

	</div>
{{-- 	<div class="row">
		<div class="col-md-12">	

			@if($errors->has('product_id'))
				<div class="text-danger">{{ $errors->first('product_id')}}</div>
			@endif

		</div>
	</div> --}}
</div>


{{-- 
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
</div>
 --}}


<div class="form-group container">

	<div class="row">		
		<div class="col-md-12">
			{!! Form::textarea('descr', null, ['class'=>'form-control', 'id'	=>'descr', 'placeholder'=>'Что Вас интересует?']) !!}
		</div>
	</div>
</div>

<div class="form-group container">
	<div class="row">
		<div class="offset-md-8 col-md-4">
{!!
 Form::submit('Отправить', ['class'=>'form-control btn btn-primary d-inline-block']);
!!}			
		</div>
	</div>	
</div>


{!! Form::close() !!}

@else

<p class="red">Написать разработчику могут только зарегистрированные пользователи</p>

@endif
