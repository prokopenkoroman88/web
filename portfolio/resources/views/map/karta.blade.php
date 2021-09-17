@extends('layouts.app')


@section('css')
    <link href="{{ asset('css/map-style.css') }}" rel="stylesheet">
@endsection

@section('jsafter')
    <script src="{{ asset('js/karta.js') }}" defer></script>
      {{-- 
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="/js/google-map.js"></script>
       --}}
@endsection



@section('content')


{{-- 
<img id="" src="/images/large-topographical-map-of-israel.jpg" alt="">
style="background-image: url(/images/large-topographical-map-of-israel.jpg);"
backgroundImage: "url(\"/images/large-topographical-map-of-israel.jpg\")"


<hr> --}}

<a href="https://developers.google.com/maps/documentation/javascript/examples">google map example</a>
<div id="map" >
  <div id="editor"></div>
	<div id="memo"></div>
	<div id="punkts">
		@if($items)
			@foreach($items as $key=>$item)
				{{--  --}}
				<?php
      	$xTop34=259; $xWidth1=397;
      	//x2=(x1-xTop34)/xWidth1 + 34;
      	$yCntr33=370; $yHeight1=475;
      	//y2=(yCntr33-y1)/yHeight1 + 33;



  //    	(x2-34)*xWidth1+xTop34    =(x1) ;



		$x2= $xTop34 + ($item->x-34)*$xWidth1;
      	$y2= $yCntr33 - ($item->y-33)*$yHeight1;

      	$x2=round($x2);//*100)/100;
      	$y2=round($y2);//*100)/100;

				?>
				<div class="place place-town" style="left:{{$x2}}px; top:{{$y2}}px;  ">

					<input type="hidden" value="{{$item->id}}" class="place-id">
					<input type="text" value="{{$item->name}}" class="place-name">



				</div>


			@endforeach
		@endif
	</div>

</div>

<hr>

<hr>


{{-- 
<script src="/js/app.js"></script>
 --}}


 {{-- 
</body>
</html>
 --}}


 @endsection