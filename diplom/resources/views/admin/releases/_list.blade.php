

<?php  $path='/admin/releases'; ?>

{{-- view('layouts.redact',compact('path')) --}}
<table class="admin-table">
	<tr>
		<th>#</th>
	@if(!isset($product))
		<th>Проект</th>
	@endif
		<th>Версия</th>
		<th>Релиз</th>
		<th></th>
	</tr>
@foreach($releases as $item)

	<tr>
		<td>{{$loop->iteration}}{{-- $item->id --}}</td>

	@if(!isset($product))
		<td>
			<a href="/admin/products/{{$item->product->id}}">{{$item->product->name}}</a>
		</td>
	@endif		
		
		<td>{{$item->version}}</td>
		<td>{{$item->name}}</td>
		<td>
			{{ view('layouts.redact',compact('path','item')) }}
		</td>
	</tr>

@endforeach
</table>
<p>
<?php
if(!isset($product)){
	$product=null;
}
?>


{{ view('layouts.redact',compact('path','product')) }}
{{-- 
{{$releases->appends(['tab'=>'0'])->links()}}
 --}}
</p>





	{{-- пагинация  http://blog/?page=2     

	{{$news->appends(['s'=>$s])->links()}}   
!!!!!!!!!!!!!!!!!!!!!!!!!!
--}}

	{{-- в контроллере д.б. News::paginate(2)  создает пагинацию ,

	appends(['s'=>$s]) добавить свои парам в GET, кроме page

http://blog/search?s=новость
http://blog/search?s=новость&page=2
http://blog/search?s=новость&page=1

	--}}
	

