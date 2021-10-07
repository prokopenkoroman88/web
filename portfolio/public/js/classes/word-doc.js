import Tag from './tag-editor.js';//  /classes

export default class WordDoc {

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
		this.fileName='Пустой неоткрытый файл word/pdf';

		if(root) this.root = new Tag(this,root);
		this.root
		.div('btns')
		  .dn()
			//.button('btn-open-file').inner('Open the PDF? file')//,{'click':this.openFile,}
			.button('btn-create-file').inner('Create the PDF? file')//,{'click':this.openFile,}
			.tag('hr')
			.button('btn-add-text').inner('Add text')
			.input('text','text')
			.tag('hr')
			.button('').dn().tag('i','fas fa-align-left').up()
			.button('').dn().tag('i','fas fa-align-center').up()
			.button('').dn().tag('i','fas fa-align-right').up()
			.button('').dn().tag('i','fas fa-align-justify').up()
			.tag('hr')
			.button('btn-save-file').inner('Save the PDF? file <i class="far fa-save"></i>')
			.input('#word-file file-name','file')
			.button().inner('<i class="fas fa-plus"></i>')
			.button().inner('<i class="fas fa-plus-square"></i>')
			.button().inner('<i class="far fa-plus-square"></i>')
			.button().inner('<i class="fas fa-plus-circle"></i>')
			.button().inner('|')
			.button().inner('<i class="fas fa-bold"></i>')
			.button().inner('<i class="fas fa-italic"></i>')
			.button().inner('<i class="fas fa-underline"></i>')
			.button().inner('<i class="fas fa-strikethrough"></i>')
			.button().inner('<i class="fas fa-superscript"></i>')
			.button().inner('<i class="fas fa-subscript"></i>')
			.button().inner('|')
			.button().inner('<i class="fas fa-list"></i>')
			.button().inner('<i class="fas fa-list-ul"></i>')
			.button().inner('<i class="fas fa-list-ol"></i>')
			//.button().inner('')
			//.input('file-name').attr('type','color')
		  .up()
		.div('doc')
		  .dn()
			.h2().inner(this.fileName)
			.tag('h3').inner('header3')
			.div('page').assignTo('page');//.dn()this,

			console.log(this.page);
			

	}
}//export class without ';'

//можно без сервера: https://webformyself.com/pdfmake-prostoe-sozdanie-pdf-dokumentov-ispolzuya-javascript/