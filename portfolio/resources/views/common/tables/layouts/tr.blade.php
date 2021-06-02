<?php
// view('tables.custom.tr',compact('path','item','actions','cols'))
/*
$action='edit';
$edit=view('tables.custom.redact',compact('path','item','action'));
$action='del';
$del =view('tables.custom.redact',compact('path','item','action'));

*/

?>
@if(isset($actions))
	<td><nobr>
		@foreach($actions as $action)
		{!! view('common.tables.layouts.redact',compact('path','item','action')); !!}
		@endforeach</nobr>
	</td>
{{-- 	<td>
		{{$item->name}}
	</td> --}}
@endif

@if(isset($cols))
	{{-- колонки с данными: --}}
@foreach($cols as $col)
	<th>{!! $col !!}</th>
@endforeach
@endif