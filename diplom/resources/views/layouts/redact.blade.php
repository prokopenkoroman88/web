{{-- 
кусочек строки таблицы для редактирования и удаления

'admin.products'
'admin/products'
 --}}

{{--
 			<a href="/admin/products/{{$item->id}}/edit"><i>edit</i></a>|
 --}}
	
<span class="redact-panel">		
	@if(!isset($item))
<?php
		$params='';
		if(isset($product)){
			$params.=($params?'&':'?').'product_id='.$product->id;
		};
		
?>
			<a href="{{$path}}/create{{$params}}" class="redact-btn redact-new">*</a>


	@else
			<form action="{{$path}}/{{$item->id}}/edit" method="GET">
				<button type="submit" class="redact-btn redact-edit">
					<i class="far fa-edit"></i>
				</button>
			</form>

			<form action="{{$path}}/{{$item->id}}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="DELETE">
				<button type="submit" class="redact-btn redact-del">
					<i class="far fa-trash-alt"></i>
				</button>

				<!--input type="submit" value="Del"-->
				{{--  plugolab   icon-trash  иконка корзинки --}}
			</form>

			<a href="{{$path}}/{{$item->id}}/"  class="redact-btn redact-show"><i class="far fa-eye"></i></a>

{{--
 			solid:
			<i class="fas fa-edit"></i>
			<i class="fas fa-trash-alt"></i>
			<i class="fas fa-eye"></i>
			regul:
			<i class="far fa-edit"></i>
			<i class="far fa-trash-alt"></i>
			<i class="far fa-eye"></i>
 --}}
{{--
 			<i class="fas fa-cat  fa-10x fa-spin"></i> 
--}}


	@endif

</span>
