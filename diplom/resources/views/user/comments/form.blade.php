{{-- кусок формы --}}

<?php

//*
	if(isset($_GET['release_id'])){
		//
		$release=App\Release::find($_GET['release_id']);

	};
//*/
	if(!isset($release)){
		$release=$comment->release;
	}
	else
	if(!$comment->release_id){
		$comment->release_id=$release->id;
	};


	if(!$comment->product_id){
		$product->product_id=$release->product->id;
	};

/*
	if(!isset($products)){

		$products = App\Product::where('name','<>','""')->orderBy('name','ASC')->pluck('name','id')->all();		
	};
//*/

?>

{{-- 
Auth::user()->name
 --}}
{{-- 
<span>Пользователь {{ $comment->user->name ?? 'NoName'}}</span>
<br>
<span>Релиз №{{$release->version ?? '?.?.?'}}</span>

 --}}
<input type="hidden" id="user_id" name="user_id" value="{{$comment->user_id}}">
<input type="hidden" id="product_id" name="product_id" value="{{$release->product_id}}">
<input type="hidden" id="release_id" name="release_id" value="{{$release->id}}">

<div class="form-group container">


<?php
//{{$comment->mark}}
?>

{{-- 
	<div class="row">
		<div class="col-md-3">
			{!! Form::label('mark', 'Оценка:', ['class' => 'awesome'])  !!}
		</div>

	</div>

 --}}

	<div class="row">
		<div class="col-md-3">
			{!! Form::label('descr', 'Ваш отзыв:', ['class' => 'awesome fat'])  !!}
		</div>

		<div class="col-md-9">
			<span class="star-mark star-mark-0" onmousemove="starMouseMove(event);" onmouseleave="starMouseLeave(event);" onmousedown="starMouseDown(event);"
				></span>

			<br>
			{!! Form::hidden('mark', null, ['class'=>'form-control', 'id'=>'mark']) !!}
		</div>
	</div>

	<div class="row">		
		<div class="col-md-12">
			{!! Form::textarea('descr', null, ['class'=>'form-control', 'id'=>'descr']) !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">	

			@if($errors->has('descr'))
				<div class="text-danger">{{ $errors->first('descr')}}</div>
			@endif

		</div>
	</div>

</div>



<div class="form-group container">
	<div class="row">

		<div class="offset-md-9 col-md-3">
{!! //
 Form::submit('Save', ['class'=>'form-control btn btn-primary d-inline-block']);
!!}			
		</div>
	</div>	
</div>
 

@section('js')
@parent

<script>
/*
	let markSpan=document.querySelector('star-mark-new');
	markSpan.addEventListener('mousemove', function(e){
	});
*/

var span=null;
var markValue=0,markTmpValue=0;

function starMouseMove(event){
	//
	//147 w 
	span=event.toElement;
	let w=span.offsetWidth;  //clientWidth; //offsetWidth  =149

	//console.log(event);
	markTmpValue=Math.floor(5*event.offsetX/w+0.25);

	//console.log('xy='+event.offsetX+' '+event.offsetY+' '+markValue);

	span.classList='star-mark star-mark-'+markTmpValue;

};

function starMouseDown(event){
	markValue=markTmpValue;
	let markInput=document.getElementById('mark');
	markInput.value=markValue;

};
function starMouseLeave(event){
	//markValue=0;
	span.classList='star-mark star-mark-'+markValue;


};


</script>

@endsection

