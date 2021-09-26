{{-- 
@extends('admin.mainpanel')
  --}}
@extends('srv.layout')

@section('title')Service - Excel
@endsection

@section('content')
@parent

<h2>Excel</h2>
<?php
//*
$lang=App\Http\Middleware\LocaleMiddleware::getLocale();
if($lang)$lang.='\\';
//*/
?>
<nav class="adaptive-menu">
	<ul>
		<li><a href="\service\{{$lang}}excel\open\MyNewBook.xls">open?</a></li>
		<li><a href="">second</a></li>
		<li><a href="">third</a></li>
	</ul>
</nav>

<?php
//$doc

if(isset($doc))
	$dataArray = $doc->sheet->toArray();//двумерный числовой по-строчно со всей страницы
else
	$dataArray = [];

print_r($dataArray);


//dd($doc->sheet);

//@foreach($doc->spreadsheet->workSheetCollection as $SheetIndex => $sheet)


$docName = isset($doc) ? $doc->fileName : 'Новая таблица';
?>






<div class="excel">
	<div class="btns">
		<button class="btn-open-file">Open file</button>
		<input type="file" class="file-name"/>
	</div>
	<div class="doc">
		<h2>{{$docName}}</h2>
		<div class="pages">



@if(isset($doc))

@foreach($doc->spreadsheet->getSheetNames() as $sheetIndex => $sheetName)

<?php

	$doc->spreadsheet->setActiveSheetIndex($sheetIndex);
	$sheet = $doc->spreadsheet->getActiveSheet();

	$dataArray = $sheet->toArray();//двумерный числовой по-строчно со всей страницы

?>


			<div class="page">


				<table>
					<tr>
						<td>\</td>
				@foreach($dataArray[0] as $j => $dataCell)
						<td>{{$j+1}}</td>
				@endforeach
					</tr>
				@foreach($dataArray as $i => $dataRow)
					<tr>
						<td>{{$i+1}}</td>
				@foreach($dataRow as $j => $dataCell)
						<td>
							{{$dataCell}}
						</td>
				@endforeach
					
					</tr>
				@endforeach
				</table>

			</div>
@endforeach


@else
			<div class="page">
empty page
			</div>
@endif


			


		</div>
		<div class="tabs">

@if(isset($doc))
	@foreach($doc->spreadsheet->getSheetNames() as $sheetIndex => $sheetName)
			<button class="tab"  >{{$sheetName}}</button>{{-- onclick="doAjax();" --}}
	@endforeach
@endif

		</div>
	</div>
</div>























{{-- 

@if(isset($doc))

@foreach($doc->spreadsheet->getSheetNames() as $sheetIndex => $sheetName)
<h3>{{$sheetName}}</h3>
<?php

	$doc->spreadsheet->setActiveSheetIndex($sheetIndex);
	$sheet = $doc->spreadsheet->getActiveSheet();

	$dataArray = $sheet->toArray();//двумерный числовой по-строчно со всей страницы

?>

<table>
@foreach($dataArray as $i => $dataRow)
	<tr>
@foreach($dataRow as $j => $dataCell)
		<td>
			{{$dataCell}}
		</td>
@endforeach
	
	</tr>
@endforeach
</table>

@endforeach


@endif
 --}}





@endsection