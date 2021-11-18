





{{-- <a href="/admin/products/create">New</a> --}}


<table class="admin-table">
	<tr>
		<th>#</th>
		<th>Name</th>
		<th></th>
		<th>Модули</th>
		<th>Релизы</th>
	</tr>
@foreach($products as $item)

	<tr>
		<td>{{$loop->iteration}}{{-- $item->id --}}</td>
		<td><strong>{{$item->name}}</strong></td>
		<td>

<?php
//$path='admin/products'; 

$ac= new \App\Http\Controllers\Admin\ProductController();
$path= $ac->path;
?>
{{ view('layouts.redact',compact('path','item')) }}
		</td>

<?php
	$product=$item;//?
?>
		<td class="has-count">
			<span class="elem-count">{{$product->applications->count()}}</span>

<?php

$ac= new \App\Http\Controllers\Admin\ApplicationController();
$path= $ac->path;
// '/admin/applications'; 
?>
{{ view('layouts.redact',compact('path','product')) }}
{{-- 
			<a href="/admin/applications/create?product_id={{$product->id}}" class="redact-btn redact-new">*</a>
 --}}
		</td>
		<td class="has-count">
			<span class="elem-count">{{$product->releases->count()}}</span>

<?php

$ac= new \App\Http\Controllers\Admin\ReleaseController();
$path= $ac->path;
// '/admin/applications'; 
?>
{{ view('layouts.redact',compact('path','product')) }}
{{-- 
			<a href="/admin/releases/create?product_id={{$product->id}}" class="redact-btn redact-new">*</a>
 --}}
		</td>
	</tr>

@endforeach
</table>


<?php
//$path='admin/products'; 

$ac= new \App\Http\Controllers\Admin\ProductController();
$path= $ac->path;
?>

<p>
{{ view('layouts.redact',compact('path')) }}
{{-- 
{{$products->links()}}
 --}}
</p>







