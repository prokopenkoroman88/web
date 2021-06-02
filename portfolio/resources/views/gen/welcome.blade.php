@extends('admin.mainpanel')
 
@section('title')Genealogy
@endsection

@section('content')
@parent

<h2>Genealogy</h2>
<?php
//*
$lang=App\Http\Middleware\LocaleMiddleware::getLocale();
if($lang)$lang.='\\';
//*/
?>
<nav class="adaptive-menu">
	<ul>
		<li><a href="\gen\{{$lang}}humans">humans</a></li>
		<li><a href="\map\{{$lang}}places">places</a></li>
		<li><a href="">second</a></li>
		<li><a href="">third</a></li>
	</ul>
	<div class="mobile-bar">
		<span></span>
		<span></span>
		<span></span>
	</div>
</nav>
{{-- 
<p>text</p>
<button id="embed1">embed1</button>


<embed type="application/octet-stream"
height="140" width="180" 
src="D:\МОЁ\ййй\dll\prMySRT.exe"
></embed>
 --}}

@endsection