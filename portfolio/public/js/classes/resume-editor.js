import Tag from './tag-editor.js';//  /classes
import WordDoc from './word-doc.js';//  /classes

export /*default*/ class ResumeEditor extends WordDoc {

	static self=null//word

	constructor(root){//root = div.excel
		super(root);
		this.baseURL2='/service/word';
		//this.init(root);








	}


	init(root=null){


		super(root);
		if(!this.root)return;
/*

section:            Add   Del     Down Up

paragraph:       Add   Del     Down Up      [Left Center Right Width]      Margin             Absatz(UL OL) [AddRight DelLeft]

font:          Name     Size       BIUS    Color    Link


*/


		this.currP=null;
		this.fileName='Пустой неоткрытый файл word/pdf';

		if(root) this.root = new Tag(this,root);
		this.root
		.div('btns')
		  .dn()
			//.button('btn-open-file').inner('Open the PDF? file')//,{'click':this.openFile,}
			.button('btn-create-file').assignTo('btnCreateFile').inner('Create the PDF? file')//,{'click':this.openFile,}
			.tag('hr')
			.button('btn-add-text').inner('Add text').assignTo('btnAddText')
			.input('text','text').assignTo('inpText')
			.tag('hr')
			.button('').dn().tag('i','fas fa-align-left').up()
			.button('').dn().tag('i','fas fa-align-center').up()
			.button('').dn().tag('i','fas fa-align-right').up()
			.button('').dn().tag('i','fas fa-align-justify').up()
			.tag('hr')
			.button('btn-save-file').inner('Save the PDF? file <i class="far fa-save"></i>').assignTo('btnSaveFile')
			.input('#word-file file-name','file').assignTo('inpFileName')
			.button('btn-save-all').inner('Create and save All to the file <i class="far fa-save"></i>').assignTo('btnSaveAll')
			.tag('form').attr('method','post').attr('action',this.baseURL+'/save-all')
			  .dn()
				.button().inner('through a form').attr('type','submit')
			  .up()
			.button().inner('<i class="fas fa-plus"></i>')
			.button().inner('<i class="fas fa-plus-square"></i>')
			.button().inner('<i class="far fa-plus-square"></i>')
			.button().inner('<i class="fas fa-plus-circle"></i>').assignTo('btnAddRow')
			.tag('hr')
			.button().inner('<i class="fas fa-minus"></i>')
			.button().inner('<i class="fas fa-minus-square"></i>')
			.button().inner('<i class="far fa-minus-square"></i>')
			.button().inner('<i class="fas fa-minus-circle"></i>')
			.tag('hr')
			.button().inner('<i class="fas fa-arrow-up"></i>')
			.button().inner('<i class="fas fa-arrow-circle-up"></i>')
			.button().inner('<i class="fas fa-arrow-down"></i>')
			.button().inner('<i class="fas fa-arrow-circle-down"></i>')
			.tag('hr')			
			.button().inner('<i class="fas fa-caret-up"></i>')
			.button().inner('<i class="fas fa-caret-square-up"></i>')
			.button().inner('<i class="far fa-caret-square-up"></i>')
			.button().inner('<i class="fas fa-caret-down"></i>')
			.button().inner('<i class="fas fa-caret-square-down"></i>')
			.button().inner('<i class="far fa-caret-square-down"></i>')
			.tag('hr')
			.button().inner('<i class="fas fa-chevron-up"></i>')
			.button().inner('<i class="fas fa-chevron-circle-up"></i>')
			.tag('hr')
			.button().inner('<i class="fas fa-check"></i>')
			.button().inner('<i class="fas fa-check-square"></i>')
			.button().inner('<i class="far fa-check-square"></i>')
			.button().inner('<i class="fas fa-check-circle"></i>')
			.button().inner('<i class="far fa-check-circle"></i>')
			.tag('hr')

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
			.div('page').assignTo('page');//.attr('contenteditable','true');//.dn()this,

			console.log(this.page);
			
//console.log(this.btnCreateFile);




		this.btnAddRow.currHTMLTag.addEventListener('click', function(){ 
			let self = WordDoc.self;
			self.page.tag('p').attr('contenteditable','true')/*.inner('new paragraph')*/;

		});


		this.page.currHTMLTag.addEventListener('click', function(e){
			let self = WordDoc.self;

			console.log('page.click:');
			console.log(e);//this=page
			let p = e.target;

			if(self.currP)
				self.currP.classList.remove('active');
			self.currP=null;

			if(!p.tagName.toLowerCase()=='p') return;

			self.currP=p;
			p.classList.add('active');



		});

		this.btnCreateFile.currHTMLTag.addEventListener('click', function(){ 
			let self = WordDoc.self;
			let fn=self.inpFileName.currHTMLTag.Value;
			if(!fn)
				fn='myPDF_File.pdf';
			self.post('/create-file', {fileName: fn,}, self.then_func, self.error_func);
		});

		this.btnAddText.currHTMLTag.addEventListener('click', function(){ 
			//addTextToWord(inpText.value); 
			let self = WordDoc.self;
			self.post('/add-text', {text: self.inpText.currHTMLTag.value,}, self.then_func, self.error_func);
		});



		this.btnSaveFile.currHTMLTag.addEventListener('click', function(){ 
			let self = WordDoc.self;
			let fn=self.inpFileName.currHTMLTag.Value;
			if(!fn)
				fn='myPDF_File.pdf';
			self.post('/save-file', {fileName: fn}, self.then_func, self.error_func);
		});

		this.btnSaveAll.currHTMLTag.addEventListener('click', function(){ 
			let self = WordDoc.self;
			let fn=self.inpFileName.currHTMLTag.Value;
			if(!fn)
				fn='myPDF_File.pdf';
			let list = [
				{
					parStyle:{
						'borderLeftColor':'f0e080',
						'borderLeftSize':100,
						'align':'right',
					},
					parText:[
						{
							text:'first bold text', 
							fontStyle:{
								//'name':'Arial',
								//'size':30,
								//'color':'f080e0',
								//'bold':true,
								'name':'Arial', 
								'size':20, 
								'color':'008000', 
								'bold':true, 
								'italic':true, 
								'underlined':true,

							}
						},
						{
							text:'second itelic text', 
							fontStyle:{
								'color':'809080',
								'italic':true,
							}
						},
						{
							text:'third underlined text', 
							fontStyle:{
								'color':'606090',
								'underline':true,
							}
						},
						{
							text:'fourth link komfortno.net', 
							src:'http://komfortno.net/main',
							fontStyle:{
								'color':'8080f0',
								'underlined':true,
							}
						},
					]
				},
				{
					parStyle:{
						'borderLeftColor':'#f0e080',
						'borderLeftSize':100,
						'align':'center',
					},
					parText:[
						{
							text:'first bold text ', 
							fontStyle:{
								'name':'Arial',
								'color':'308090',
								'size':5,
								'bold':true,
							}
						},
						{
							text:'second itelic text ', 
							fontStyle:{
								'name':'Times New Roman',
								'size':36,
								'color':'888888',
								'italic':true,
							}
						},
						{
							text:'third underlined text', 
							fontStyle:{
								'color':'8080f0',
								'underlined':true,
							}
						},
					]
				},
			];
			self.post('/save-all', {fileName: fn, list: list}, self.then_func, self.error_func);
		});



	}


	then_func(response){
		console.log('response=');
		console.log(response);
		console.log(response.data);		
	}

	error_func(error){
		console.log('error=');
		console.log(error.response.data);
		console.log(error);
	}

	post(url, data, then_func, error_func){
		window.axios.post(this.baseURL+url, data).then(then_func).catch(error_func);
	}

	addSection(){

	}

}//export class without ';'
