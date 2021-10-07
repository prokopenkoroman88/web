
//__webpack_require__(/*! ./bootstrap */ "./resources/js/bootstrap.js");
//window.Vue = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
//var axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js"); //+14.2.21
//Vue.component('example-component', __webpack_require__(/*! ./components/ExampleComponent.vue */ "./resources/js/components/ExampleComponent.vue")["default"]);

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//const app = new Vue({
//    el: '#app',
//});


//================= srv ===========
//console.log('srv-script!!!');
import ExcelDoc from './classes/excel-doc.js';
import WordDoc from './classes/word-doc.js';
let excel = null;
let word = null;


document.addEventListener('DOMContentLoaded', function(){

// let excelTabs = document.querySelectorAll('.excel .tabs button');

// for(let i=0; i<excelTabs.length; i++ ){
// 	excelTabs[i].addEventListener('click', function(){ doAjax(); });
// };


/*
	public function openFile(Request $request){//+17.9.21
		$doc = new ExcelDoc($request->fileName);
		Session::put('excelDoc',$doc);
		return ['doc', $doc];
    }

	public function choiceSheet(Request $request){//+17.9.21
		$doc = Session::get('excelDoc');
		$doc->spreadsheet->setActiveSheetIndex($request->sheetIndex);
		$doc->sheet = $doc->spreadsheet->getActiveSheet();
		$sheetCells = $doc->sheet->toArray();//двумерный числовой по-строчно со всей страницы
		return ['sheetCells', $sheetCells];
    }
*/
if(document.querySelector('.excel')){
	excel = new ExcelDoc(document.querySelector('.excel'));
	initExcel();
};
if(document.querySelector('.word')){
	word = new WordDoc(document.querySelector('.word'));
	initWord();
};


});


function initExcel(){
//excel.initIn();
let btnOpenFile = document.querySelector('.excel .btn-open-file');
let inpFileName = document.querySelector('.excel .file-name');
btnOpenFile.addEventListener('click', function(){ openExcelFile(inpFileName.value); });




};

function openExcelFile(fileName){
	const data = 
	{
		fileName:fileName,
	};

window.axios.post('/service/excel/open-file', data)
  .then(function (response) {


console.log('response=');
console.log(response);
    console.log(response.data);
 //	putPlace(response.data);//+21.2.21
	//updateCart(response.data);
    //console.log(response.data);
    //CartController  return view('cart');



/*structure of response:
response
	config
		data: "{\"fileName\":\"C:\\\\fakepath\\\\MyNewBook.xls\"}"
		method:'post'
		url:'/service/excel/open-file'
		xsrfCookieName: "XSRF-TOKEN"
		xsrfHeaderName: "X-XSRF-TOKEN"

	data [2]
		0:'doc' - name
		1:{spreadsheet, sheet, reader, writer, fileName} - data!!!!
	status: 200
	statusText: 'OK'
*/


    
  })
  .catch(function (error) {
    console.log('error=');
    console.log(error.response.data);
    console.log(error);
  });









};





function initWord(){
//excel.initIn();
let btnCreateFile = document.querySelector('.word .btn-create-file');
let btnAddText = document.querySelector('.word .btn-add-text');
let btnSaveFile = document.querySelector('.word .btn-save-file');
let inpText = document.querySelector('.word .text');
let inpFileName = document.querySelector('.word .file-name');
btnCreateFile.addEventListener('click', function(){ createWordFile(inpFileName.value); });
btnSaveFile.addEventListener('click', function(){ saveWordFile(inpFileName.value); });

btnAddText.addEventListener('click', function(){ addTextToWord(inpText.value); });


};

function createWordFile(fileName=''){
	const data = 
	{
		fileName:fileName,
	};

window.axios.post('/service/word/create-file', data)
  .then(function (response) {

	console.log('response=');
	console.log(response);
    console.log(response.data);
    
  })
  .catch(function (error) {
    console.log('error=');
    console.log(error.response.data);
    console.log(error);
  });

};

function addTextToWord(text){
	const data = 
	{
		text:text,
	};

window.axios.post('/service/word/add-text', data)
  .then(function (response) {

	console.log('response=');
	console.log(response);
    console.log(response.data);
    
  })
  .catch(function (error) {
    console.log('error=');
    console.log(error.response.data);
    console.log(error);
  });

};

function saveWordFile(fileName=''){
	if(!fileName)
		fileName='myFirstPDF_File.pdf';

	const data = 
	{
		fileName:fileName,
	};

window.axios.post('/service/word/save-file', data)
  .then(function (response) {

	console.log('response=');
	console.log(response);
    console.log(response.data);
    
  })
  .catch(function (error) {
    console.log('error=');
    console.log(error.response.data);
    console.log(error);
  });

};




function doAjax(){

	const productData = 
	{ //x:x2, y:y2, 
		page:1,//?//'Второй лист';
		cell:'B4',
		value:'',

	};
	//new FormData(this);//обращение к форме, откуда получить данные о продукте
	//вместо того, чтобы по отдельности: поля формы qty
//данные получили

// и теперь отправим:
// объект axios
window.axios.post('/service/excel/set-value', productData)
  .then(function (response) {


console.log('response=');
console.log(response);

 //	putPlace(response.data);//+21.2.21
	//updateCart(response.data);
    //console.log(response.data);
    //CartController  return view('cart');

    
  })
  .catch(function (error) {
    console.log('error=');
    console.log(error.response.data);
    console.log(error);
  });

//.then - Ответ от сервера
//.catch - по ошибке в запросе

};



