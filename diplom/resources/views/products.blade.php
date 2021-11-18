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



{{-- 
https://bootstrap-4.ru/docs/4.4/components/carousel/
 --}}
<div id="product-carousel" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
@foreach($products as $i => $product)
    <li data-target="#product-carousel" data-slide-to="{{$i}}" class=" @if($i==0)active @endif "></li>
@endforeach
  </ol>

  <div class="carousel-inner">

@foreach($products as $i => $product)
    <div class="carousel-item @if($i==0)active @endif">
      <div class="carousel-caption d-none d-md-block"><h2>{{$product->name}}</h2>
      </div>
      {{-- 
class="d-inline w-25"
       --}}
    <div style="height:200px; overflow: auto;">
      <img src="{{$product->img}}"  alt="{{$product->name}}" class="d-inline w-25" style="float:left; margin: 0px 20px 20px 0px; ">
    
      <div class="d-inline" style="display: inline; ">{!!$product->descr!!}</div>
	</div>
      <br style="clear: both;">
      <div class="row">
      	<div class="col-md-6">
	      	<h3>Модули</h3>
	      	<ul class="list">
	      		@foreach($product->applications as $application)
				<li>
					<a href="/application/{{$application->slug}}" style="z-index:10;">{{$application->name}}</a>
				</li>
	      		@endforeach
	      	</ul>      		
      	</div>
      	<div class="col-md-6">
       	<h3>Последние обновления</h3>
      	<ul class="list">
      		@foreach($product->releases as $release)
			<li><a href="/whatsnew/{{$product->slug}}/{{$release->version}}" style=" position: relative; z-index:11;">{{$release->version}} от {{$release->date}} 
				</a>
			</li>
      		@endforeach
      	</ul>     		
      	</div>      	
      </div>
   
    </div>
@endforeach

  </div>

  <a class="carousel-control-prev" href="#product-carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#product-carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>




@endsection


@section('js')
	@parent


    <script src="{{ asset('js/bootstrap.js') }}"></script>

{{-- 
/node_modules/bootstrap/dist/js/bootstrap.js

<script src="/../node_modules/bootstrap/dist/js/bootstrap.js"></script>
 --}}

{{-- 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>

<script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
 --}}

@endsection

