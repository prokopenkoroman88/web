
<table class="redact-table">
	<caption>
		"{{$dataTable['table']}}"
	@if(isset($table))
		{{$table ?? ''}} {{-- для всплыв справочников view --}}
	@else
		@yield('table')
	@endif

	</caption>
	<thead>
		<tr>{{-- @yield('THs') --}}
			<th></th>
{{-- 			@if(in_array('select', $actions))
				<th>id#</th>
			@endif	 --}}		
@foreach($dataTable['fields'] as $field=>$fieldName)
			<th>
@if( substr($fieldName, 0,1)=='@' )
				{{__(substr($fieldName,1))}}
@else
				{{$fieldName}}
@endif
			</th>
@endforeach
		</tr>
	</thead>
{{--
		 @yield('TRs') --}}
	<tbody>
<?php
$action='';
if(in_array('new', $dataTable['actions']))
{
	//remove
	//delete($actions)
	$action='new';
	foreach ($dataTable['actions'] as $key => $act) {
		if($act=='new')$dataTable['actions'][$key]='';
	};
};
?>
{{--
@foreach($dataTable['items'] as $item)
		<tr @if(isset($id)&&($item['id']==$id))	class="selected"@endif >
			{{view('common.tables.layouts.tr',compact('path','item','actions')) }}{{- - 			@if(in_array('select', $actions))
				<td>
					{{$item['id']}}
				</td>
			@endif - -}}
@foreach($dataTable['fields'] as $field=>$fieldName)
			<td>{{$item[$field]}}</td>
@endforeach
		</tr>
@endforeach
	--}}
{{App\Http\Controllers\Admin\CustomResourceController::showTrTd($dataTable)}}
<?php
	$path=$dataTable['path'];
?>
	</tbody>
	<tfoot>
		<tr>
			<td>
				{!! view('common.tables.layouts.redact',compact('path','action')); !!}
			</td>
		</tr>
	</tfoot>
</table>