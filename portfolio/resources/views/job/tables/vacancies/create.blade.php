@extends('common.tables.layouts.form')

@section('table','Vacancies')


@section('form-content')

	@include('job.tables.vacancies.form') {{-- .gen. --}}

@endsection

{{-- 


@section('content')


	@include('layouts.error')

{!!	Form::model($release,['url'=>'/admin/releases', 'enctype'=>'multipart/form-data' ]) !!}
	@include('admin.releases.form')
{!! Form::close() !!}

@stop




@section('content')


	@include('layouts.error')

{!!	Form::model($release,['url'=>'/admin/releases/'.$release->id, 'method'=>'PUT', 'enctype'=>'multipart/form-data' ]) !!}
	@include('admin.releases.form')
{!! Form::close() !!}

@stop


 --}}