{{--
@extends('layouts.app')


@section('left_panel')
    @include('layouts.map')
@endsection

@extends('home')
 --}}


@extends('user.custompanel')


@section('header')



@endsection




@section('content')
	{{-- @parent --}}


	<h1 itemscope itemtype="http://schema.org/CreativeWork" style="font-size: 1em;">
		<p class="capture capt-product" itemprop="name"><strong>{{$product->name}}</strong></p>
		<p class="capture capt-1-news">
			<span>
				<strong>Что нового</strong>
			</span>
		</p>
		<p class="capture capt-version">
		<span></span><span></span>
		<b itemprop="datePublished" content="{{$release->date}}">{{$release->date}}</b>
		Версия {{$release->version}}
		</p>
	</h1>

<aside>
	<h4>@if($release->isDistr()) Дистрибутив @else Обновление @endif включает:</h4>
	<p class="fat">
	Версия серверной части {{$release->server_version}}<br>
	Версия клиентской части {{$release->client_version}}
	</p>
	<hr class=rc2>
</aside>

{{-- -------------- --}}

<div id="whats-new-descr" class="list">
	{!!$release->descr!!}
</div>

<aside>
	<hr class=rc2>
	<h4>Порядок установки:</h4>
@if($release->last)
	<p class="fat">Обновление можно устанавливать на версию не ниже {{$release->last->version}}</p>
@endif
	<ul>
		<li>Создать резервные копии ВСЕХ БАЗ ДАННЫХ.</li>
		<li>Запустить на выполнение файл {{App\Services\Statistic::the_fileShortName($release->files)}} 
			{{--$release->files--}}
		.</li>
		<li>Открыть базу данных.</li>
	</ul>	
</aside>

{{-- <p><i>update_100_200113.exe????????</i></p>
 --}}
<?php
//dd($release->last->version  );
?>


<p>средняя оценка: {{ round($release->mark,1)}}
{{$release->get_starmark()}}</p>


@guest
<p class="text-danger">Зарегистрируйтесь, чтобы оставить отзыв</p>
@else
<div class="form-group container">
	<div class="row">
		<div class="col-md-12">

<h2 id="new-comment">{{-- Ваш отзыв: --}}</h2>
<?php
$comment= new App\Comment();
$comment->user_id = Auth::user()->id;
$comment->release_id = $release->id;

?>

	@include('layouts.error')
{!!	Form::model($comment,['url'=>'/user/comments' ]) !!}
	@include('user.comments.form')
{!! Form::close() !!}

		</div>
	</div>
</div>
@endguest


<h2>Все Отзывы:</h2>
@foreach($comments as $comment)

<article class="container comment">

	<div class="row">
		<div class="col-md-3">
			<h3>{{$comment->user->name}}</h3>
			<p>{{$comment->get_starmark() }}</p>
			{{--


			  3© 4ª 5« 6¬ 8­ 12® --}}
			<p>{{$comment->mark}}</p>

			<p class="time">{{$comment->created_at}}</p>
		</div>
		<div class="col-md-9">
			<div class="comment-text">{!!$comment->descr!!}</div>
			
		</div>
	</div>

</article>

@endforeach


@endsection


@section('js')
	@include('layouts.js')
@endsection
