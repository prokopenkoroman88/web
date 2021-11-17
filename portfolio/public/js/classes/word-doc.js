import Tag from './tag-editor.js';//  /classes

export /*default*/ class WordDoc {

	static self=null//word

	constructor(root){//root = div.excel
		this.baseURL='/service/word';
		this.init(root);
		this.event=null;//+







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
		//let btnCreateFile, btnAddText, inpText, btnSaveFile, inpFileName;
		this.currP=null;
		this.fileName='Пустой неоткрытый файл word/pdf';

		if(root) this.root = new Tag(this,root);
		this.root
		.div('btns').assignTo('btns')
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
			.button().inner('<i class="far fa-plus-square"></i>').assignTo('btnAddRow2')
			.button().inner('<i class="fas fa-plus-circle"></i>').assignTo('btnAddRow')
/*
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
*/
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




		this.btnAddRow2.currHTMLTag.addEventListener('click', this.addRow2);
		//this.btnAddRow2.currHTMLTag.addEventListener('click', function(){WordDoc.self.addRow2(WordDoc.self);});
		this.root.currHTMLTag.addEventListener('click', function(){
			console.log('click of root:');
			console.log(WordDoc.self.event);
			console.log(event);
			WordDoc.self.event=event;
		});

		this.btns.currHTMLTag.addEventListener('click', function(){
			//console.log('click of btns:');
			//console.log(event);
		});


		let medList=
JSON.parse(`{"result":[

["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u0410\u043c\u0431\u0443\u043b\u0430\u0442\u043e\u0440\u0456\u044f \u0437\u0430\u0433\u0430\u043b\u044c\u043d\u043e\u0457 \u043f\u0440\u0430\u043a\u0442\u0438\u043a\u0438-\u0441\u0456\u043c\u0435\u0439\u043d\u043e\u0457 \u043c\u0435\u0434\u0438\u0446\u0438\u043d\u0438 \u2116 1","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0431\u0443\u043b\u044c\u0432\u0430\u0440 \u0428\u0435\u0432\u0447\u0435\u043d\u043a\u0430, 25","0975771263"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u0410\u043c\u0431\u0443\u043b\u0430\u0442\u043e\u0440\u0456\u044f \u0437\u0430\u0433\u0430\u043b\u044c\u043d\u043e\u0457 \u043f\u0440\u0430\u043a\u0442\u0438\u043a\u0438 \u0441\u0456\u043c\u0435\u0439\u043d\u043e\u0457 \u043c\u0435\u0434\u0438\u0446\u0438\u043d\u0438 \u2116 4","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u0410\u0432\u0440\u0430\u043c\u0435\u043d\u043a\u0430, 4","(061) 702-34-08, 702-34-03"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u0410\u043c\u0431\u0443\u043b\u0430\u0442\u043e\u0440\u0456\u044f \u0437\u0430\u0433\u0430\u043b\u044c\u043d\u043e\u0457 \u043f\u0440\u0430\u043a\u0442\u0438\u043a\u0438 - \u0441\u0456\u043c\u0435\u0439\u043d\u043e\u0457 \u043c\u0435\u0434\u0438\u0446\u0438\u043d\u0438 \u21162","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u0414\u0443\u0434\u0438\u043a\u0456\u043d\u0430, 6","061-702-30-95, 0617023133, 0676116620"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u0430\u043c\u0431\u0443\u043b\u0430\u0442\u043e\u0440\u0456\u044f \u0437\u0430\u0433\u0430\u043b\u044c\u043d\u043e\u0457 \u043f\u0440\u0430\u043a\u0442\u0438\u043a\u0438-\u0441\u0456\u043c\u0435\u0439\u043d\u043e\u0457 \u043c\u0435\u0434\u0438\u0446\u0438\u043d\u0438 \u21162","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u0417\u0430\u043f\u043e\u0440\u0456\u0437\u044c\u043a\u043e\u0433\u043e \u041a\u043e\u0437\u0430\u0446\u0442\u0432\u0430, 25","061-286-28-09"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u0410\u043c\u0431\u0443\u043b\u0430\u0442\u043e\u0440\u0456\u044f \u21166","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u0406\u0441\u0442\u043e\u0440\u0438\u0447\u043d\u0430, 65","(098) 422-36-76, (066) 711-00-09"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u0410\u0417\u041f\u0421\u041c \u21161","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u041b\u0456\u043a\u0430\u0440\u043d\u044f\u043d\u0430, 18","(061)239-63-07,  099-1 333-108"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u041f\u043e\u043b\u0456\u043a\u043b\u0456\u043d\u0456\u0447\u043d\u0435 \u0432\u0456\u0434\u0434\u0456\u043b\u0435\u043d\u043d\u044f \u041f\u041c\u0414 \u041a\u041d\u041f \\"\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u0426\u0415\u041d\u0422\u0420\u0410\u041b\u042c\u041d\u0410 \u0420\u0410\u0419\u041e\u041d\u041d\u0410 \u041b\u0406\u041a\u0410\u0420\u041d\u042f\\" \u0417\u0420\u0420 \u0417\u041e","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u041b\u0456\u043a\u0430\u0440\u043d\u044f\u043d\u0430, 18","(061) 764-86-05,   (061) 764 86 01"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u041a\u041e\u041d\u0421\u0423\u041b\u042c\u0422\u0410\u0422\u0418\u0412\u041d\u041e-\u0414\u0406\u0410\u0413\u041d\u041e\u0421\u0422\u0418\u0427\u041d\u0415 \u0412\u0406\u0414\u0414\u0406\u041b\u0415\u041d\u041d\u042f \u0425\u041e\u0420\u0422\u0418\u0426\u042c\u041a\u041e\u0413\u041e \u0420\u0410\u0419\u041e\u041d\u0423 \u0422\u041e\u0412\u0410\u0420\u0418\u0421\u0422\u0412\u0410 \u0417 \u041e\u0411\u041c\u0415\u0416\u0415\u041d\u041e\u042e \u0412\u0406\u0414\u041f\u041e\u0412\u0406\u0414\u0410\u041b\u042c\u041d\u0406\u0421\u0422\u042e \\"\u0412\u0406\u0422\u0410\u0426\u0415\u041d\u0422\u0420\\"","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u041d\u043e\u0432\u0433\u043e\u0440\u043e\u0434\u0441\u044c\u043a\u0430, 28\u0410","0676194611"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u041a\u041e\u041d\u0421\u0423\u041b\u042c\u0422\u0410\u0422\u0418\u0412\u041d\u041e-\u0414\u0406\u0410\u0413\u041d\u041e\u0421\u0422\u0418\u0427\u041d\u0415 \u0412\u0406\u0414\u0414\u0406\u041b\u0415\u041d\u041d\u042f \u041f\u041e\u041b\u0406\u041a\u041b\u0406\u041d\u0406\u041a\u0418 \u041c\u0415\u0414\u0418\u0427\u041d\u041e\u0413\u041e \u0426\u0415\u041d\u0422\u0420\u0423 \u0422\u041e\u0412\u0410\u0420\u0418\u0421\u0422\u0412\u0410 \u0417 \u041e\u0411\u041c\u0415\u0416\u0415\u041d\u041e\u042e \u0412\u0406\u0414\u041f\u041e\u0412\u0406\u0414\u0410\u041b\u042c\u041d\u0406\u0421\u0422\u042e \\"\u0412\u0406\u0422\u0410\u0426\u0415\u041d\u0422\u0420\\"","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u041d\u043e\u0432\u043e\u043a\u0443\u0437\u043d\u0435\u0446\u044c\u043a\u0430, 12","0676194611"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u0410\u043c\u0431\u0443\u043b\u0430\u0442\u043e\u0440\u0456\u044f \u211610 \u0422\u041e\u0412 \\"\u041c\u0435\u0434\u0438\u043a\u0430\u043b \u0421\u0435\u0440\u0432\u0456\u0441\\"","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u041d\u043e\u0432\u043e\u043a\u0443\u0437\u043d\u0435\u0446\u044c\u043a\u0430, 15\u0430","0663245958"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u0424\u041e\u041f \u0421\u0435\u0440\u0431\u0456\u043d \u041e\u043b\u0435\u0433 \u0412\u043e\u043b\u043e\u0434\u0438\u043c\u0438\u0440\u043e\u0432\u0438\u0447","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u041f\u0430\u0432\u043b\u043e\u043a\u0456\u0447\u043a\u0430\u0441\u044c\u043a\u0430, 28","0739112828"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u0421\u0410\u0421 \u042e\u041b\u0406\u042f \u041a\u041e\u0421\u0422\u042f\u041d\u0422\u0418\u041d\u0406\u0412\u041d\u0410","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u041f\u043e\u0448\u0442\u043e\u0432\u0430/\u0423\u043a\u0440\u0430\u0457\u043d\u0441\u044c\u043a\u0430, 163/51","0668473730"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u0412\u0406\u0422\u0410\u0426\u0415\u041d\u0422\u0420","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u0421\u0454\u0434\u043e\u0432\u0430, 3","0676194611"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u0410\u043c\u0431\u0443\u043b\u0430\u0442\u043e\u0440\u0456\u044f","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u0421\u0442\u0430\u043b\u0435\u0432\u0430\u0440\u0456\u0432, 17","0672590384"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u0424\u041e\u041f \u0421\u043e\u043b\u043e\u0434\u0443\u043d \u0410\u043d\u043d\u0430 \u0406\u0432\u0430\u043d\u0456\u0432\u043d\u0430","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u0422\u043e\u0432\u0430\u0440\u0438\u0441\u044c\u043a\u0430/\u041b\u0430\u0434\u043e\u0437\u044c\u043a\u0430, 56/25","0668473730"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u041a\u043e\u043c\u0443\u043d\u0430\u043b\u044c\u043d\u0435 \u043d\u0435\u043a\u043e\u043c\u0435\u0440\u0446\u0456\u0439\u043d\u0435 \u043f\u0456\u0434\u043f\u0440\u0438\u0454\u043c\u0441\u0442\u0432\u043e \\"\u0426\u0435\u043d\u0442\u0440 \u043f\u0435\u0440\u0432\u0438\u043d\u043d\u043e\u0457 \u043c\u0435\u0434\u0438\u043a\u043e-\u0441\u0430\u043d\u0456\u0442\u0430\u0440\u043d\u043e\u0457 \u0434\u043e\u043f\u043e\u043c\u043e\u0433\u0438 \u2116 8\\" \u0427\u0435\u0440\u0433\u043e\u0432\u0438\u0439 \u043a\u0430\u0431\u0456\u043d\u0435\u0442","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u0425\u0430\u0440\u0447\u043e\u0432\u0430, 2","(061) 702-33-83"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u0430\u043c\u0431\u0443\u043b\u0430\u0442\u043e\u0440\u0456\u044f \u21166","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0432\u0443\u043b\u0438\u0446\u044f \u0427\u0443\u043c\u0430\u0447\u0435\u043d\u043a\u0430, 21","099-176-33-63"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u0410\u043c\u0431\u0443\u043b\u0430\u0442\u043e\u0440\u0456\u044f \u0437\u0430\u0433\u0430\u043b\u044c\u043d\u043e\u0457 \u043f\u0440\u0430\u043a\u0442\u0438\u043a\u0438 \u0441\u0456\u043c\u0435\u0439\u043d\u043e\u0457 \u043c\u0435\u0434\u0438\u0446\u0438\u043d\u0438 \u21161, \u041a\u041d\u041f \\"\u0417\u0426\u041f\u041c\u0421\u0414 \u21161\\" \u041e\u043b\u0435\u043a\u0441\u0430\u043d\u0434\u0440\u0456\u0432\u0441\u044c\u043a\u043e\u0433\u043e \u0440\u0430\u0439\u043e\u043d\u0443 \u043c. \u0417\u0430\u043f\u043e\u0440\u0456\u0436\u0436\u044f","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u043f\u0440\u043e\u0441\u043f\u0435\u043a\u0442 \u0421\u043e\u0431\u043e\u0440\u043d\u0438\u0439, 88","068-314-51-56"],
["\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410","","\u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f","\u041a\u043e\u043d\u0441\u0443\u043b\u044c\u0442\u0430\u0442\u0438\u0432\u043d\u0430 \u043f\u043e\u043b\u0456\u043a\u043b\u0456\u043d\u0456\u043a\u0430","\u0417\u0410\u041f\u041e\u0420\u0406\u0417\u042c\u041a\u0410 \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u043c\u0456\u0441\u0442\u043e \u0417\u0410\u041f\u041e\u0420\u0406\u0416\u0416\u042f, \u0448\u043e\u0441\u0435 \u041e\u0440\u0456\u0445\u0456\u0432\u0441\u044c\u043a\u0435, 10","099-101-75-22,  0688129776, 0661460317"]
]}`);
		console.log('medList:');
		console.log(medList);

			//
		this.page.table('').dn().trtd('','',medList.result);
		//this.page.currHTMLTag.innerHTML=;


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



	addRow2(event){ 
		let self = WordDoc.self;
		//let self = findWordDoc(event);
		console.log(event);//this = button
		self.page.tag('p').attr('contenteditable','true')/*.inner('new paragraph')*/;
	}


}//export class without ';'



//not export
function findWordDoc(event){

	for(let i = event.path.length - 1; i >= 0; i--) {
		if(event.path[i].tagName.toLowerCase()=='div' && event.path[i].classList.contains('word'))
			if(WordDoc.self.currHTMLTag==event.path[i])
				return WordDoc.self;
	};//i--
	
};


//export let word = null;
//можно без сервера: https://webformyself.com/pdfmake-prostoe-sozdanie-pdf-dokumentov-ispolzuya-javascript/