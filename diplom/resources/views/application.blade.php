@extends('user.custompanel')



@section('content')
	@parent

<div>
	<p class="red">приложение {{$application->name}}</p>
{{-- 
	@if($product->last())
		<p>последняя версия: 
		{{$product->last()->version}}</p>
	@else
		<p>нет ниодной версии</p>
	@endif
 --}}
	<div class="descr">
		{!!$application->descr!!}
	</div>
</div>


<h2>Задействовано в обновлениях:</h2>
<ul class="list">
@foreach($application->releases as $release)
	<li>
		<a href="/whatsnew/{{$application->product->slug}}/{{$release->version}}">{{$release->version}} от {{$release->date}}</a>
	</li>
@endforeach
</ul>



@endsection

