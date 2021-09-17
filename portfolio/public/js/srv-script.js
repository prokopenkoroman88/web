
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


document.addEventListener('DOMContentLoaded', function(){

let excelTabs = document.querySelectorAll('.excel .tabs button');

for(let i=0; i<excelTabs.length; i++ ){
	excelTabs[i].addEventListener('click', function(){ doAjax(); });
};

});

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



