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

		<li><a href="">second</a></li>
		<li><a href="">third</a></li>
	</ul>
	<div class="mobile-bar">
		<span></span>
		<span></span>
		<span></span>
	</div>
</nav>
<p>text</p>
<?php
$firms = App\Firm::all();


?>

<p>Firms</p>
<ul>
@foreach($firms as $firm)
	<li>{{ $firm->name }}
		<ul>
<?php

$vacancies = App\Vacancy::where('firm_id','=',$firm->id)->get();

?>
@foreach($vacancies as $vacancy)
	<li>{{ $vacancy->name }}
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

		@foreach($actions as $action)
		{!! view('common.tables.layouts.redact',compact('path','item','action')); !!}
		@endforeach</nobr>{{ $job_talk->descr }}
			</li>
@endforeach
		<li>
<?php
	$path='job/job_talks';//App\Job_talk::path();
	$action='new';
?>
			{!! view('common.tables.layouts.redact',compact('path','action')); !!}
		</li>
		<li>

	<form action="job/create_job_talk/{{$vacancy->id}}/{{$firm->id}}" method="GET">
		<button type="submit" class="redact-btn redact-new">
			<i class="fas fa-asterisk"></i>
		</button>
	</form>
		создать со ссылкой на вакансию и фирму

		</li>
		</ul>
	</li>
@endforeach
		</ul>		
	</li>
	
@endforeach
</ul>


@endsection