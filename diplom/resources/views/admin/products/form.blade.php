{{-- кусок формы --}}


<div class="form-group container">
	
	<div class="row">
		<div class="col-md-3">
			{!! Form::label('name', 'Название', ['class' => 'awesome'])  !!}
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
			{!! Form::label('slug', 'Ярлык', ['class' => 'awesome'])  !!}
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

{{-- //категории:?
	<div class="row">
		<div class="col-md-3">
			{!! Form::label('applications[]', 'Компоненты', ['class' => 'awesome'])  !!}
		</div>		
		<div class="col-md-9">
			{!! Form::select('applications[]', 
				$applications,//['L' => 'Large', 'S' => 'Small'], 
				null, //выделенный элемент
				['placeholder' => 'Select components', 'multiple'=>'multiple', 'class'=>'form-control select'] //доп парам
			) 
			!!}		
		</div>
	</div>

 --}}
	<div class="row">
		<div class="col-md-3">
			{!! Form::label('sku', 'Артикул', ['class' => 'awesome'])  !!}
		</div>		
		<div class="col-md-3">
			{!! Form::text('sku', null, ['class'=>'form-control']) !!}	
		</div>
		<div class="col-md-3">
			{!! Form::label('price', 'Цена', ['class' => 'awesome'])  !!}		
		</div>		
		<div class="col-md-3">
			{!! Form::number('price', null, ['class'=>'form-control']) !!}		
		</div>	
	</div>

	<div class="row">
		<div class="col-md-3">
			{!! Form::label('descr', 'Описание', ['class' => 'awesome'])  !!}
		</div>	
	</div>
	<div class="row">
		<div class="col-12">
			{!! Form::textarea('descr', null, ['class'=>'form-control', 'id'=>'descr']) !!}
		</div>
	</div>
</div>


{{-- IMG --}}

<div class="form-group container">
	<div class="row">
		<div class="col-3" id="preview" style="background-image: url('{{$product->img}}');   ">
			@if(!$product->img)
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
 
<div class="form-group container">

	<div class="row">
		<div class="offset-md-9 col-md-3">
{!!
 Form::submit('Save', ['class'=>'form-control btn btn-primary d-inline-block']);
!!}			
		</div>
	</div>

</div>


<script>
/*
	let preview=document.getElementById('preview');
	let imgInput=document.getElementById('img');
	imgInput.addEventListener('change', function(){
		//
		//alert(imgInput.value);
		preview.style.background = 'url('+imgInput.value+')';


	});
*/

</script>
