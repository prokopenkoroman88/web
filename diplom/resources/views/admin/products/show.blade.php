{{--
 @extends('adminlte::page') 

@extends('layouts.app')
--}}

@extends('admin.mainpanel')

@section('title',' Продукт ')
{{-- categories.show это такое же как и news.index --}}

@section('css')
	@parent
<style>
#preview{
	background-image: url('{{$product->img}}');
}
</style>

@endsection


@section('content')

{{-- 
<h1 class="text-center">{{$category->name}}</h1>
 --}}


<h1 class="text-center">Продукт {{$product->name}}</h1>
	<div class="container">
		
		<div class="row">
			<div class="col-md-4" id="preview" style="background-image: url('{{$product->img}}');   ">
			</div>
			<div class="col-md-8">
				<p>Артикул {{$product->sku}} Цена {{$product->price}}</p>
				<div>{!!$product->descr!!}
					
				</div>
			</div>
		</div>
	</div>


<h6 class="tabs-panel">
	<span class="tab-selected">Релизы</span>
	<span class="">Приложения</span>
</h6>
<div class="tabs-body"> 

	<article>
		{{ view('admin.releases._list',compact('releases','product')) }}
	</article>

	<article style="display:none;">
		{{ view('admin.applications._list',compact('applications','product')) }}
	</article>

</div>
	
@endsection

@section('js')
	@parent
	@include('layouts.js')


    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    {{-- для закладок на products.show --}}

<script>

$(document).ready( function () {
	//.admin-table //.tabs-body table//#myTable
	//alert('ready');

	console.log($('#applications-table'));
	console.log(document.getElementById('applications-table'));

	console.log($('#applications-table').DataTable);


    //$('#applications-table').DataTable();//
} );

var tabsBody=document.querySelectorAll('.tabs-body article');


var tabsPanel=document.querySelectorAll('.tabs-panel span');

for (var i = tabsPanel.length - 1; i >= 0; i--){
	tabsPanel[i].addEventListener('click',function(){
		//console.log(tabsPanel);//?	

		let ii=-1;
		for(let j=0;j<tabsPanel.length;j++){
			if(tabsPanel[j]==this)
				ii=j;
			if(tabsPanel[j].classList.contains('tab-selected'))
				tabsPanel[j].classList.remove('tab-selected');
			if(tabsBody[j])
				tabsBody[j].style.display = 'none';
		};

		console.log(ii);//tabsPanel.indexOf(this)
		//let ii=tabsPanel.indexOf(this);

		this.classList.add('tab-selected');
		if(tabsBody[ii])
			tabsBody[ii].style.display = 'block';
	});
};

let search = location.search;
let tab = (search.split('&')[0]).split('=')[1]
if(tab){

	tabsPanel[tab].click()
}

</script>


@endsection