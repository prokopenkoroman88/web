{{--
 @extends('adminlte::page') 

@extends('layouts.app')
--}}
@extends('admin.mainpanel')

@section('title',' релиз ')
{{-- categories.show это такое же как и news.index --}}

@section('content')



<h1>
    <p class="capture capt-1" style="width:calc(99% - 0px); display: inline-block;">
        <span>
            <strong>проект {{$release->product->name ?? '<без проекта>'}}
            </strong>
        </span>
    </p>

</h1>

<h2>
	<p class="capture capt-2">
	<span><strong>
		{{$release->name}}
	</strong></span>
	</p>
</h2>

	<article class="container news-snippet">
{{--
 		<p>{{ $release->appNames }}</p>
 --}}
		<ul class="list">
			@foreach($release->applications as $app)
				<li class="cogs">{{$app->name}}</li>
			@endforeach
		</ul>
		<div class="row">
{{-- 
			<div class="col-md-4">
				<img src="{{$release->img}}" alt="{{$release->name}}" class="news-image">
			</div>
 --}}
			<div class="col-md-12 list" id="whats-new-descr">
				{!! $release->descr !!}
			</div>
		</div>
	</article>

@endsection