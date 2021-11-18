
<?php  $path='/admin/applications'; 

//+30.4.20
	$product_id=0;
	if(!isset($product)){
		if($applications){
			$product_id=$applications[0]->product->id;
		};
	}
	else{
		$product_id=$product->id;
	};
?>


{{-- <a href="/admin/applications/create">New</a> --}}

<table class="admin-table" id="applications-table">
	<tr>
		<th>#</th>
	@if(!isset($product))
		<th>Проект</th>
	@endif
		<th>Модуль</th>
		<th></th>
	</tr>
@foreach($applications as $item)

	<tr>
		<td>{{$loop->iteration}}{{-- $item->id --}}</td>

	@if(!isset($product))
		<td><a href="/admin/products/{{$item->product->id}}">{{$item->product->name}}</a>
		</td>
	@endif		

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
		$product=$applications[0]->product;
	};
?>
{{ view('layouts.redact',compact('path','product')) }}
{{-- 
{{$applications->appends(['tab'=>'1'])->links()}}
 --}}
</p>

{{-- 		<nav>
			<span>1</span>
			<span>2</span>
			<span>3</span>
		</nav>
 --}}

		