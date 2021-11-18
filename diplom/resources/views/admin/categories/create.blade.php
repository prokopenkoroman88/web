@extends('adminlte::page')

@section('title', 'Add Category')

@section('content_header')
    <h1>Add Category</h1>
@stop

@section('content')



@if ($errors->any()) 
{{-- 18.2.20  ошибка создания в одноразовую сессию:
выведет

The name field is required.
The name must be at least 3 characters.
класс MessageBag $errors ->any() хоть одна ошибка

чтобы в самой форме вывело что заполнить
<input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
и еще
		@error('name')
			<div class="text-danger">{ { message } } </div>
		@enderror


<input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}} ">

		@if($errors->has('name'))
			<div class="text-danger">{{ $errors->first('name')}}</div>
		@endif

 --}}
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




{!!	Form::model($category,['url'=>'/admin/categories']) !!}


<div class="form-group">
	{!! Form::label('name', 'Category name:', ['class' => 'awesome'])  !!}
	{!! Form::text('name', null, ['class'=>'form-control']) !!}

	@if($errors->has('name'))
		<div class="text-danger">{{ $errors->first('name')}}</div>
	@endif

</div>


<div class="form-group">
	{!! Form::label('slug', 'Category slug:', ['class' => 'awesome'])  !!}
	{!! Form::text('slug', null, ['class'=>'form-control']) !!}
</div>


<div class="form-group">
	{!! Form::label('parent_id', 'Parent Category:', ['class' => 'awesome'])  !!}
	{!! Form::select('parent_id', 
		$categories,//['L' => 'Large', 'S' => 'Small'], 
		null, //выделенный элемент
		['placeholder' => 'Select parent category', 'class'=>'form-control'] //доп парам
	) 
	!!}
</div>

{{-- IMG --}}

 <div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
   <input id="thumbnail" class="form-control" type="text" name="img">
 </div>

 <div id="holder">
 	
 </div>

{!!
 Form::submit('Save', ['class'=>'form-control btn btn-primary d-inline-block']);
!!}



{!! Form::close() !!}




@stop

@section('js')
	<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
	<script>
		//https://unisharp.github.io/laravel-filemanager/integration		
		 $('#lfm').filemanager('image');//+5.3.20  

	</script>
@endsection


