@extends('job.layout')

@section('css')
	@parent
    <link href="{{ asset('css/srv-style.css') }}" rel="stylesheet">
@endsection

@section('jsafter')
	@parent
	<script src="{{ asset('js/srv-script.js') }}" type="module"></script>
@endsection


@section('title')@lang('table.job-resume')@endsection

@section('content')

<h1>RESUME</h1>

<img src="https://lorempixel.com/500/500/" alt="">

<div class="word">
	
</div>
<?php

echo '<pre>'.print_r($data,true).'</pre>';

?>

@endsection