@extends('srv.layout')

@section('title')Service - Word/PHP
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
		<li><a href="\service\{{$lang}}excel\open\MyNewBook.xls">open excel?</a></li>
		<li><a href="">second</a></li>
		<li><a href="">third</a></li>
	</ul>
</nav>

<?php
//$doc

/*
if(isset($doc))
	$dataArray = $doc->sheet->toArray();//двумерный числовой по-строчно со всей страницы
else
	$dataArray = [];

print_r($dataArray);
*/

//dd($doc);

//dd($doc->sheet);

//@foreach($doc->spreadsheet->workSheetCollection as $SheetIndex => $sheet)


$docName = isset($doc) ? $doc->fileName : 'Новый документ';
?>






<div class="word">




</div>
@endsection