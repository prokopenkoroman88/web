import Tag from './tag-editor.js';//  /classes

export default class ExcelDoc {

	constructor(root){//root = div.excel
		this.init(root);








	}


	init(root=null){
/*
		if(root) this.root = root;

		let tag = document.createElement('div');
		tag.classList.add('btns');
		this.root.before(tag);

		let btn = document.createElement('button');
		btn.innerHTML='test import';
		btn.onclick=function(){
			console.log('import was successfull!!!');
		};
		tag.append(btn);
*/
		//this.pages=null;
		//this.tabs=null;
		this.fileName='Пустой неоткрытый файл excel';

		if(root) this.root = new Tag(this,root);
		this.root
		.div('btns')
		  .dn()
			.button('btn-open-file').inner('Open the Excel file')//,{'click':this.openFile,}
			.input('#excel-file file-name','file')
			.input('file-name').attr('type','color')
		  .up()
		.div('doc')
		  .dn()
			.h2().inner(this.fileName)
			.tag('h3').inner('header3')
			.div('pages').assignTo('pages')//.dn()this,
			.div('tabs').assignTo('tabs');//this,

			console.log(this.pages);
			console.log(this.tabs);



/*
const a = [
	{'tag':'div', 'class':'btns',
		'children':[
		{'tag':'button', 'class':'btn-open-file'},
		{'tag':'input', 'class':'file-name', 'type':'file'},
		],
		
	},
	{'tag':'div', 'class':'doc'

	},


];//a
//*/


/*
this.root
.div('btns').dn()
	.button('btn-open-file',{'click':this.openFile,})
	.input('#excel-file file-name','file')
	.up()
.div('doc').dn()
	.h2(this.fileName)
	.div('pages').assign(this.pages)//.dn()
	.div('tabs').assign(this.tabs);


this.pages
.div('page').dn()
	.table().dn();
		.trtd('','',this.data);

let table = 
this.pages
.div('page').dn()
	.table().dn();
for(let i=0; i<rows; i++){
	let tr = table.tr().dn();
	for(let j=0; j<cols; j++){
		let td = tr.td().dn();
		td.inner(this.data[i][j])

	};//j++


};//i++


this.pages
.div('page').dn()
	.table().dn()
		.tr().dn()
			.td().inner(this.data[i][j])
//*/


	}
}//export class without ';'
/*
<div class="excel">
	<div class="btns">
		<button class="btn-open-file">Open file</button>
		<input type="file" class="file-name"/>
	</div>
	<div class="doc">
		<h2>{{$docName}}</h2>
		<div class="pages">


			<div class="page">
				<table>
					<tr>
						<td> cell!!!!! </td>
					</tr>
				</table>
			</div>

		</div>
		<div class="tabs">

			<button class="tab"  >{{$sheetName}}</button>{{-- onclick="doAjax();" --}}

		</div>
	</div>
</div>





<div class="excel">
	<div class="btns">
		<button class="btn-open-file">Open file</button>
		<input type="file" class="file-name"/>
	</div>
	<div class="doc">
		<h2>{{$docName}}</h2>
		<div class="pages">



@if(isset($doc))

@foreach($doc->spreadsheet->getSheetNames() as $sheetIndex => $sheetName)

<?php

	$doc->spreadsheet->setActiveSheetIndex($sheetIndex);
	$sheet = $doc->spreadsheet->getActiveSheet();

	$dataArray = $sheet->toArray();//двумерный числовой по-строчно со всей страницы

?>


			<div class="page">


				<table>
					<tr>
						<td>\</td>
				@foreach($dataArray[0] as $j => $dataCell)
						<td>{{$j+1}}</td>
				@endforeach
					</tr>
				@foreach($dataArray as $i => $dataRow)
					<tr>
						<td>{{$i+1}}</td>
				@foreach($dataRow as $j => $dataCell)
						<td>
							{{$dataCell}}
						</td>
				@endforeach
					
					</tr>
				@endforeach
				</table>

			</div>
@endforeach


@else
			<div class="page">
empty page
			</div>
@endif


			


		</div>
		<div class="tabs">

@if(isset($doc))
	@foreach($doc->spreadsheet->getSheetNames() as $sheetIndex => $sheetName)
			<button class="tab"  >{{$sheetName}}</button>{{-- onclick="doAjax();" --}}
	@endforeach
@endif

		</div>
	</div>
</div>
*/