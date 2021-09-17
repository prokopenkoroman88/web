@extends('layouts.app')

@section('content')

{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Karta</title>

 --}}
<!--
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
-->

{{--     <script
      src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
 --}}


<!--    <script src="/js/google-map.js"></script> -->

    <style type="text/css">
      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }


      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        /*height: 100%;*/
        height: 400%;
      }



      #map #memo{
      	position: fixed;
      	right: 50px;
      	top: 50px;
      	width: 300px;
      	height: 500px;
      	overflow: scroll;
      	border: 3px groove gray;
      	background-color: rgba(255,255,255,0.4);
      	      	

      }
    </style>
    <script>
      //let map;

//      function initMap() {

//      	const chicago = new google.maps.LatLng(41.85, -87.65);
        /*map = new google.maps.Map(document.getElementById("map"), {
          center: chicago,//{ lat: -34.397, lng: 150.644 },
          zoom: 8,
        });//*/
//      };
    </script>

{{-- 
</head>
<body>
	 --}}


{{-- 
<img id="" src="/images/large-topographical-map-of-israel.jpg" alt="">
<hr> --}}


{{--
<details>
	<summary>Level 1</summary>
	<details>
		<summary>Level 1.1</summary>
		about level 1.1
	</details>
	<details>
		<summary>Level 1.2</summary>
		about level 1.2
	</details>
</details>
--}}

<a href="https://developers.google.com/maps/documentation/javascript/examples">google map example</a>
<div id="map">
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
{{-- 

      let map;

      function initMap() {




      	const chicago = new google.maps.LatLng(41.85, -87.65);
        map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: -34.397, lng: 150.644 },
          zoom: 8,
        });//*/
      };


 --}}
<hr>
{{-- 
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5882199.473709078!2d26.467169125768002!3d49.22440731825652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d1d9c154700e8f%3A0x1068488f64010!2z0KPQutGA0LDRl9C90LA!5e0!3m2!1suk!2sua!4v1601739355916!5m2!1suk!2sua" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
 --}}

{{-- 


src="https://www.google.com/maps/embed?
pb=
!1m18
!1m12
!1m3
!1d5882199.473709078
!2d26.467169125768002
!3d49.22440731825652
!2m3
!1f0
!2f0
!3f0
!3m2
!1i1024
!2i768
!4f13.1
!3m3
!1m2
!1s0x40d1d9c154700e8f%3A0x1068488f64010
!2z0KPQutGA0LDRl9C90LA
!5e0
!3m2
!1suk
!2sua
!4v1601739355916
!5m2
!1suk
!2sua"



 --}}

<script>


	//initMap();
/*
      let map=document.getElementById('map');
      let memo=document.getElementById('memo');
      let punkts=document.getElementById('punkts');//+
//*/

//$x,$y,&$e,&$n
      function xy2en(x,y){

      	let x1=x,y1=y,x2,y2;
      	//prosto pryamoug setka
      	let xTop34=259, xWidth1=397;
      	x2=(x1-xTop34)/xWidth1 + 34;
      	let yCntr33=370, yHeight1=475;
      	y2=(yCntr33-y1)/yHeight1 + 33;




      	if(x1<740){
      		//????
      	}else{//>740
      	};
    	

      	x2=Math.round(x2*100)/100;
      	y2=Math.round(y2*100)/100;
      	let xy=[];
      	xy[0]=x2;
      	xy[1]=y2;
      	//return xy;
      	return {x:x2, y:y2 };
     
/*
y  33  367  
y  32  842
   31  1317
   30  1791
y  29  2265


x 34  250 (244-269)
  35  (662 on bottom)   (666 on top)
    740   vertical
  36 1079

    otklonenie:
     x    y      x35    x36
x34  269   54    666 1063                +397  
     265  367 y33    1065  369
     260  842 y32    1069  841
     255 1317 y31    1072 1317
     250 1790 y30    1076 1792
     245 2264 y29    1079 2267
     244 2380    662

  dY=475


*/
      };



      map.style.backgroundImage = 'url(/images/large-topographical-map-of-israel.jpg)';

/*  onMouseDown
      map.addEventListener('mousedown', function(e){

      	let x1=e.offsetX, y1=e.offsetY, x2=0,y2=0;
      	let xy=xy2en(x1,y1);//,x2,y2);
      	x2=xy.x;
      	y2=xy.y;

    	memo.innerHTML+='x='+x1+' y='+y1 +' == '+x2+'E '+y2+'N'  +'<br>';
    	//?//window.location.href='/karta?x='+x2+'&y='+y2;


      });

const dY=[367,842,1317,1790,2264];
for(let i=1; i<4; i++){
	let y3=33-i;
	let dH=dY[i]-dY[i-1];
	memo.innerHTML+='do y='+y3+' dH='+dH   +'<br>';
};
*/

      	//const chicago = new google.maps.LatLng(41.85, -87.65);
        /*map = new google.maps.Map(document.getElementById("map"), {
          center: chicago,//{ lat: -34.397, lng: 150.644 },
          zoom: 8,
        });//*/


/*


require('./bootstrap');

window.Vue = require('vue');

const axios = require('axios');//+14.2.21



Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
});

*/



</script>

{{-- 
<script src="/js/app.js"></script>
 --}}


 {{-- 
</body>
</html>
 --}}