{{-- @extends('admin.mainpanel') --}}
@extends('job.layout')
 
@section('title')@lang('table.job-searching')@endsection

@section('content')
@parent

<h2>@lang('table.job-searching')</h2>
<?php
//*
$lang=App\Http\Middleware\LocaleMiddleware::getLocale();
if($lang)$lang.='\\';
//*/
?>
<nav class="adaptive-menu">
	<ul>
		<li><a href="\job\{{$lang}}firms">firms</a></li>
		<li><a href="\job\{{$lang}}vacancies">vacancies</a></li>
		<li><a href="\job\{{$lang}}job_talks">job_talks</a></li>
		<li><a href="\job\{{$lang}}skills">skills</a></li>

		<li><a href="\job\{{$lang}}resume">Resume</a></li>
		<li><a href="">third</a></li>
	</ul>
	<div class="mobile-bar">
		<span></span>
		<span></span>
		<span></span>
	</div>
</nav>
<p>text</p>

                <ul>
                    <li><a href="https://freelance.ua/uk/users/verstka/?page=50">Freelance.ua  (((((((</a> {{--  prokopenkoroman88  fu6Bz9hEC68%Qv^ --}}
                    </li>
                    <li><a href="https://freelancepax.com">freelancepax.com ((((</a></li>
                    <li><a href="https://free-lance.com.ua/">free-lance com ua 75 грн((((</a></li>
                    <li><a href="https://freelancehunt.com/blog/chi-povinien-frilansier-platiti-podatki/">chi-povinien-frilansier-platiti-podatki</a></li>
                    <li><a href="https://freelancehunt.com/blog/summary-chto-eto-i-zachiem-iegho-dobavliat-v-rieziumie/">summary-chto-eto-i-zachiem-iegho-dobavliat-v-rieziumie</a></li>
                    <li><a href="https://grc.ua/article/29047?utm_source=email&utm_medium=email&utm_campaign=vis_20921&utm_content=1st_vis_20921%20">Лайфхаки в офісі: як стати своїм у колективі</a></li>
                </ul>

<?php
$firms = App\Firm::all();


?>

<p>Firms</p>
<ul>
@foreach($firms as $firm)
	<li>
<nobr>
	<form action="job/edit_firm/{{$firm->id}}" method="GET">
		<button type="submit" class="redact-btn redact-edit">
			<i class="fas fa-edit"></i>
		</button>
	</form>
</nobr>
		{{ $firm->name }}
		<ul>
<?php

$vacancies = App\Vacancy::where('firm_id','=',$firm->id)->get();

?>
@foreach($vacancies as $vacancy)
	<li>
<nobr>
	<form action="job/edit_vacancy/{{$vacancy->id}}" method="GET">
		<button type="submit" class="redact-btn redact-edit">
			<i class="fas fa-edit"></i>
		</button>
	</form>
</nobr>
@if($vacancy->url)
		<a href="{{ $vacancy->url }}">{{ $vacancy->name }}</a>
@else
	{{ $vacancy->name }}
@endif
		<span class="mark-list">
		@foreach($vacancy->skills as $skill)
		<span class="mark">{{$skill->name}}</span>
		@endforeach
		</span>
		<ul>

<?php

$job_talks = App\Job_talk::where('vacancy_id','=',$vacancy->id)->get();

?>
@foreach($job_talks as $job_talk)
			<li>
<?php
	$path='job/job_talks';//App\Job_talk::path();
	$actions=['edit','del'];
	$item=$job_talk;
?>
<nobr>
	<form action="job/edit_job_talk/{{$job_talk->id}}" method="GET">
		<button type="submit" class="redact-btn redact-edit">
			<i class="fas fa-edit"></i>
		</button>
	</form>
</nobr><pre>{!! $job_talk->descr !!}</pre>
			</li>
@endforeach
		<li>

	<form action="job/create_job_talk/{{$vacancy->id}}/{{$firm->id}}" method="GET">
		<button type="submit" class="redact-btn redact-new">
			<i class="fas fa-asterisk"></i>
		</button>
	</form>Новый разговор по вакансии

		</li>
		</ul>
	</li>
@endforeach
	<li>

	<form action="job/create_vacancy/{{$firm->id}}" method="GET">
		<button type="submit" class="redact-btn redact-new">
			<i class="fas fa-asterisk"></i>
		</button>
	</form>Новая вакансия

	</li>
		</ul>		
	</li>
	
@endforeach
	<li>

	<form action="job/create_firm" method="GET">
		<button type="submit" class="redact-btn redact-new">
			<i class="fas fa-asterisk"></i>
		</button>
	</form>Новая фирма

	</li>
</ul>


@endsection