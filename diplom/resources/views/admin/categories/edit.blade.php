@extends('adminlte::page')

@section('title',' редактирование категории ')

@section('content')
{{--

<form action="/categories/{{ $category->id }}"  method="PUT" class="form-group" style="margin: 0 auto; border:2px solid green;">

	//@update
 --}}



@if ($errors->any()) 
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




{!!	Form::model($category,['url'=>'/admin/categories/'.$category->id, 'method'=>'PUT']) !!}


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










