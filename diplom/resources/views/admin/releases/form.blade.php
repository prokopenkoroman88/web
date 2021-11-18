{{-- кусок формы --}}

<?php
//*
	if(isset($_GET['product_id'])){
		//
		$product=App\Product::find($_GET['product_id']);

	};
//*/
	if(!isset($product)){
		$product=$release->product;
	}
	else
	if(!$release->product_id){
		$release->product_id=$product->id;
	};


	if(!isset($products)){

		$products = App\Product::where('name','<>','""')->orderBy('name','ASC')->pluck('name','id')->all();		
	};


	//'name' -> 'version'  ->all('id','version')
	$releases = App\Release::where('product_id','=',$product->id ?? 0)->orderBy('version','ASC')->pluck('version','id')->all();
	//all();
	//all('id','name')->pluck('name','id')->all();
	//$applications = App\Application::all('id','name')->orderBy('name','DESC')->pluck('name','id')->all();

	$applications = App\Application::where('product_id','=',$product->id)->orderBy('name','ASC')->pluck('name','id')->all();


	if(!$release->date)
		$release->date=date('Y-m-d');
	//'2020-04-03'
?>
<span>{{$product->id}}</span>


{{-- 
<input type="hidden" name="product_id" value="{{ $release->product_id ?? ($product->id ?? 0) }}">

 --}}

<div class="form-group container">
	<div class="row">
		<div class="col-md-2">
			{!! Form::label('product_id', 'Продукт', ['class' => 'awesome'])  !!}			
		</div>
		<div class="col-md-10">

			{!! Form::select('product_id', 
				$products,//['L' => 'Large', 'S' => 'Small'], 
				null, //выделенный элемент
				['placeholder' => 'Выберите продукт', 'class'=>'form-control select'] //доп парам
			) 
			!!}	
					
		</div>

	</div>
	<div class="row">
		<div class="col-md-12">	

			@if($errors->has('product_id'))
				<div class="text-danger">{{ $errors->first('product_id')}}</div>
			@endif

		</div>
	</div>
</div>




<div class="form-group container">

	<div class="row">
		<div class="col-md-2">	
			{!! Form::label('name', 'Название', ['class' => 'awesome'])  !!}
		</div>
		<div class="col-md-10">				
			{!! Form::text('name', null, ['class'=>'form-control']) !!}

	<input type="text" name="slug" value="{{$release->slug}}" readonly>

		</div>
	</div>


	<div class="row">
		<div class="offset-md-2 col-md-10">	
	@if($errors->has('name'))
		<div class="text-danger">{{ $errors->first('name')}}</div>
	@endif
		</div>
	</div>

</div>

{{-- A --}}

<div class="form-group container">

	<div class="row">
		<div class="col-md-6">

			<div class="row">
				<div class="col-md-12">
					<label for="">Версии в обновлении:</label>
				</div>
			</div>

			<div class="row">
				<div class="col-4">
					{!! Form::label('version', 'релиза', ['class' => 'awesome'])  !!}
				</div>
				<div class="col-8">
					{!! Form::text('version', null, ['class'=>'form-control']) !!}
				</div>				
			</div>

			<div class="row">
				<div class="col-4">
					{!! Form::label('server_version', 'сервера', ['class' => 'awesome'])  !!}
				</div>
				<div class="col-8">
					{!! Form::text('server_version', null, ['class'=>'form-control']) !!}
				</div>				
			</div>

			<div class="row">
				<div class="col-4">
					{!! Form::label('client_version', 'клиента', ['class' => 'awesome'])  !!}
				</div>
				<div class="col-8">
					{!! Form::text('client_version', null, ['class'=>'form-control']) !!}
				</div>				
			</div>

			<div class="row">
				<div class="col-4">
					{!! Form::label('last_id', 'Ставить на', ['class' => 'awesome nowrap'])  !!}
				</div>
				<div class="col-8">
					{!! Form::select('last_id', 
				$releases,//['L' => 'Large', 'S' => 'Small'], 
				null, //выделенный элемент
				['placeholder' => 'Select last', 'class'=>'form-control select'] //доп парам
			) 
			!!}
				</div>				
			</div>

			<div class="row">
				<div class="col-4">
					{!! Form::label('included_id', 'Включено в', ['class' => 'awesome nowrap'])  !!}
				</div>
				<div class="col-8">
					{!! Form::select('included_id', 
				$releases,//['L' => 'Large', 'S' => 'Small'], 
				null, //выделенный элемент
				['placeholder' => 'Select included', 'class'=>'form-control select'] //доп парам
			) 
			!!}
				</div>				
			</div>
			
			<hr>
			
			<div class="row">
				<div class="col-4">
					{!! Form::label('date', 'Дата релиза', ['class' => 'awesome'])  !!}
				</div>
				<div class="col-8">
					{!! Form::date('date', null, ['class'=>'form-control']) !!}
			@if($errors->has('date'))
				<div class="text-danger">{{ $errors->first('date')}}</div>
			@endif
				</div>				
			</div>

			<div class="row">
				<div class="col-4">
					{!! Form::label('price', 'Цена', ['class' => 'awesome'])  !!}
				</div>
				<div class="col-8">
					{!! Form::number('price', null, ['class'=>'form-control']) !!}
				</div>				
			</div>	


		</div>
		<div class="col-md-6">

			<div class="row">
				<div class="col-md-12">
					{!! Form::label('applications[]', 'Компоненты обновления:', ['class' => 'awesome'])  !!}
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">

			{!! Form::select('applications[]', 
				$applications,//['L' => 'Large', 'S' => 'Small'], 
				null, //выделенный элемент
				//'placeholder' => 'Select components',
				[ 'multiple'=>'multiple', 'class'=>'form-control select', 'id'=>'select-applications'] //доп парам
			) 
			!!}		

				</div>
			</div>


		</div>		
	</div>
</div>

{{-- Z --}}


{{-- --}}


<div class="form-group container">

	<div class="row">
		<div class="col-md-2">	
	{!! Form::label('descr', 'Что нового', ['class' => 'awesome'])  !!}
		</div>
{{-- 		<div class="col-md-2">	
			<span id="span_template" 
			>Rajah teplate</span>
		</div> --}}
	</div>

	<div class="row">
		<div class="col-md-12">	
	{!! Form::textarea('descr', null, ['class'=>'form-control', 'id'=>'descr']) !!}
		</div>
	</div>
</div>


{{-- IMG --}}


<div class="form-group container">
	<div class="row">
		<div class="col-12">
			<h3>Загруженные файлы обновления</h3>
			<ul>
			@foreach(explode("\n",$release->files) as $file)
				<li><a href="{{$file}}">{{$file}} 
					{{App\Services\Statistic::the_filesize($file,'КБ')}}
				<?php
				//echo round((filesize($file)/1024),1).' КБ' ?>
				</a></li>
			@endforeach
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<input type="file" name="files[]" id="files" multiple>

		</div>
	</div> 
</div>

{{-- 
<div class="form-group container">
	<div class="row">
		<div class="col-12">
			<div class="input-group">
			   	<span class="input-group-btn">
			    	<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
			    		<i class="fa fa-picture-o"></i> Choose
			    	</a>
				</span>
				<input id="thumbnail" class="form-control" type="text" name="img">
			</div>
		</div>
	</div> 

	<div class="row">
		<div class="col-12">
			<div id="holder"></div>
		</div>
	</div> 

</div>
 --}}
 
<div class="form-group container">

	<div class="row">
		<div class="offset-md-9 col-md-3">
{!!
 Form::submit('Save', ['class'=>'form-control btn btn-primary d-inline-block']);
!!}			
		</div>
	</div>

</div>


@section('js')
	@parent
	@include('layouts.js')
<script>


setTimeout(afterload, 1000);

function afterload(){
//-28.4.20//var spanTmp = document.getElementById('span_template');
var fr=document.querySelector('iframe');
var frcd=fr.contentDocument || fr.contentWindow.document;//
var bd=frcd.querySelector('body');
/*-28.4.20
spanTmp.addEventListener('click',function(event){

	console.log(bd.childNodes);

	let sVer=document.getElementById('version').value;
	let sVer2=document.getElementById('server_version').value;
	let sVer3=document.getElementById('client_version').value;

	//bd.innerHTML += ('<b> <i>'+sVer+'</i> '+sVer2+'</b> '+sVer3);




});
*/
var selApps=document.getElementById('select-applications');
var opts=document.querySelectorAll('#select-applications option');
for(let i=0;i<opts.length;i++){
	opts[i].addEventListener('click', function(e){
		//this.innerHTML
		console.log(e);
		let s=e.toElement.text;

		if(e.toElement.selected){
			let node = frcd.createElement('article');
			//node.style.background = 'pink';
			node.innerHTML='<h4>'+s+'</h4><ul><li></li></ul>';
			bd.append(node);
		}
		else{
			let nodes=frcd.querySelectorAll('article');
			for(let i=0;i<nodes.length;i++){
				if(nodes[i].querySelector('h4').innerHTML == s)
					nodes[i].remove();//удалит найдя по названию заголовка
			};
		};


	});//f
		
};//i++



};


</script>

@endsection

