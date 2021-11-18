{{--
 @extends('adminlte::page') 
--}}
@extends('admin.mainpanel')

@section('title',' все товары категории ')
{{-- categories.show это такое же как и news.index --}}

@section('content')


<h1>
    <p class="capture capt-1" style="width:calc(99% - 0px); display: inline-block;">
        <span>
            <strong>проект {{$application->product->name ?? '<без проекта>'}}
            </strong>
        </span>
    </p>

</h1>

<h2>
	<p class="capture capt-2">
	<span><strong>
		Модуль {{$application->name}}
	</strong></span>
	</p>
</h2>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<img src="{{$application->img}}" alt="{{$application->name}}">
		</div>
		<div class="col-md-8" id=>
			{!! $application->descr !!}
		</div>		
	</div>
</div>

@endsection