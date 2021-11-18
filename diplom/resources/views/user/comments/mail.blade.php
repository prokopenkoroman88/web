<h1>Уважаемый(ая) {{$dest->name}}!</h1>

@if(isset($product))
<p class="red">Замечание по проекту <b>{{$product->name}}</b></p>
@endif

<div>
	{!!$descr!!}
</div>
<p>С уважением {{$send->name}}.</p>
