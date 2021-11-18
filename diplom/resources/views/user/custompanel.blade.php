@extends('layouts.app')



@section('nav')
<?php

$url = $_SERVER['REQUEST_URI']; // "/products"



?>

<?php
	$href= '/products';
	$text= 'Проекты';
	echo view('layouts.li',compact('href','text'));

	$href= '/contacts';
	$text= 'Контакты';
	echo view('layouts.li',compact('href','text'));	

	if(Auth::user()){
		$href= '/contacts#question';
		$text= "Написать<br>разработчику";
		echo view('layouts.li',compact('href','text'));			
	}
	
?>

{{--
                         <li class="nav-item @if($url=='/products')active @endif">
                            <a class="nav-link" href="/products"><span class="link-text">Проекты</span></a>
                        </li>
                        <li class="nav-item @if($url=='/contacts')active @endif">
                            <a class="nav-link" href="/contacts"><span class="link-text">Контакты</span></a>
                        </li>

	@if(Auth::user())


                        <li class="nav-item">
                            <a class="nav-link" href="/contacts#question"><span class="link-text">Написать<br>разработчику</span></a>
                        </li>

	@endif
 --}}
@endsection

@section('header')
{{-- 
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! 
                </div>
            </div>
 --}}
@endsection


@section('left_panel')
    @include('layouts.map')
@endsection





@section('right_panel')
    {{-- reklamki --}}
@endsection



@section('footer')
	<p>© 2020</p>

    <a href="/contacts#question">написать разработчику</a>
@endsection


