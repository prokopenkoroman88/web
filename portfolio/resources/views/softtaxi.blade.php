<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>


html, body{
	height: 100%;
	width: 100%;
	padding: 0;
	margin: 0;
	overflow:hidden;
}


body{
    display: flex;
    flex-direction: row;
}

#map-frame, #main-frame{
	height: 100%;
	margin: 0;
}

		
#map-frame{
	width: 320px;

}

		
#main-frame{
	width: calc(100% - 320px - 6px);
	
}

#splitter{
	display: inline-block;
	height: 100%;
	width: 4px;
	background-color: lightgray;
	margin: 0;
	border-left:1px solid gray;
	border-right:1px solid black;

}
#splitter:hover{
	cursor: col-resize;
	
}

#splitter:active{
	/*background-color: red;*/
	position: relative;
}

#splitter:active:before{
	background-color: transparent;/*rgba(255,0,255,0.2);*/
	height: 100%;
	width:200px;
	display: inline-block;
	position: absolute;
	content: '';
}

#splitter:active:after{
	background-color: transparent;/*rgba(255,255,0,0.2);*/
	height: 100%;
	width:200px;
	display: inline-block;
	position: absolute;
	content: '';
	right:0;
}


	</style>
</head>
<body>
{{-- 
	<div id="map-frame"></div>
	<span id="splitter"></span>
	<div id="main-frame"></div>
 --}}
{{-- 
	<iframe src="/" frameborder="0"	id="map-frame"></iframe>
	<span id="splitter"></span>
	<iframe src="/" frameborder="0"	id="main-frame"></iframe>


 --}}

	<iframe src="http:\\softtaxi.com.ua\menu2.html" frameborder="0"	id="map-frame"></iframe>
	<span id="splitter"></span>
	<iframe src="http:\\softtaxi.com.ua\news_hot.html" frameborder="0"	id="main-frame"></iframe>


<script>


let map=document.getElementById('map-frame');
let main=document.getElementById('main-frame');
let splitter = document.getElementById('splitter');
let oldX=0;
let pressed=false;


document.onmouseenter=function(e){

//console.log('ondragstart');	
//console.log(e);	
//////////oldX=e.clientX;
};



//onmousedown
//ondragstart
splitter.onmousedown=function(e){
	pressed=true;
console.log('ondragstart');	
console.log(e);	
oldX=e.clientX;
};

//onmousemove
//ondrag
//splitter.ondrag=function(e){
//splitter.onmousemove=drag;
//map.contentWindow.document.onmousemove=drag;
//main.contentWindow.document.onmousemove=drag;
//main.onmousemove=drag;
//document.body.onmousemove=drag;
//document.onmousemove=drag;
window.onmousemove=drag;


//! splitter.onmousemove=drag;
//! document.body.onmousemove=drag;


function drag(e){
console.log('ondrag');	

	

let deltaX=e.clientX-oldX;
oldX=e.clientX;
console.log(e);

	if(!pressed)return;


if(deltaX){

	let coords=map.getBoundingClientRect();


	console.log('map.width= '+map.style.width+'  + deltaX'+deltaX);
	console.log(coords);
//	map.style.width+=deltaX;
//	main.style.width-=deltaX;
	//coords.width+=deltaX;
	//map.clientWidth+=deltaX;
	map.style.width=(coords.width+deltaX)+'px';

	coords=main.getBoundingClientRect();
	//main.style.width=(coords.width-deltaX)+'px';

	main.style.width=`calc(100% - ${map.style.width} - 6px)`;
	//width: calc(100% - 320px - 15px);

}

};




//onmouseup
//ondragleave
//splitter
document.onmouseup=function(e){
console.log('ondragleave');	
console.log(e);	
pressed=false;
};



</script>

</body>
</html>