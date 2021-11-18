{{--
@extends('layouts.app')

@section('left_panel')
    @include('layouts.map')
@endsection


@extends('home')
 --}}
@extends('user.custompanel')



@section('content')
	@parent

<h4>
    <p class="capture capt-1" style="width:calc(99% - 103px); display: inline-block;">
        <span>
            <strong>проект {{$product->name}}
            </strong>
        </span>
    </p>

    <p style="font-size: 10px; display: inline-block; width:103px; ">
        {{$product->get_starmark()}}
    </p>
</h4>


<h5>
	<p class="capture capt-2">
	<span><strong>
		@if($product->last())
			последняя версия: 
			{{$product->last()->version}}
		@else
			нет ниодной версии
		@endif	
	</strong></span>
	</p>
</h5>

{{-- 

	<div class="row">
		<div class="col-1"></div>
		<div class="col-10"></div>
		<div class="col-1"></div>		
	</div>
	<div class="row">

		<div class="col-10">{!!$product->descr!!}</div>
	</div>

 --}}

<div class="descr ">
	<div></div>
	<div></div>

	<span>

 
	{!!$product->descr!!}
{{--	 --}}
</span>

 {{-- <br style="clear: both;"> --}}
<span class="descr-bottom">
	<div></div>
	<div></div>
	<span>

{{-- 
		@if($product->last())
			<span>последняя версия:<br> 
			{{$product->last()->version}}</span>
		@else
			<span>нет ниодной версии</span>
		@endif	
--}}

	</span>
</span>	

</div>



<h2>его релизы:</h2>

<table class="product-table">
	<tr>
		<th>Дата</th>
		<th>Скачать файл</th>
		<th>Версия</th>
		<th>Размер, кБ</th>
		<th>Инструкция</th>
		<th></th>
	</tr>
@foreach($releases as $release)
	<tr>
		<td>
			{{$release->date}}
		</td>
		<td>


			<ul>
			@foreach(explode("\n",$release->files) as $file)
				<li><a href="{{$file}}" download>{{App\Services\Statistic::the_fileShortName($file)}} 
				</a></li>
			@endforeach
			</ul>

		</td>
		<td>
			{{$release->version}}
		</td>
		<td>
			<ul>
			@foreach(explode("\n",$release->files) as $file)
				<li>
					{{App\Services\Statistic::the_filesize($file,'КБ')}}
				<?php
				//echo round((filesize($file)/1024),1).' КБ' 
				?>
				</li>
			@endforeach
			</ul>
		</td>
		<td>

			<a href="/whatsnew/{{$product->slug}}/{{$release->version}}">Прочитать</a>

		</td>
		<td>
			<span style="font-size: 10px;">
                                    {{$release->get_starmark()}}</span>
		</td>

	</tr>
@endforeach
</table>

@endsection
