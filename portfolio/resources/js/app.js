/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const axios = require('axios');//+14.2.21


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});













//+6.4.21
let popups={
	fields:[],
	

	createField:function(popupField){//<span></span>
		

		let field={
			input:popupField,
			choicedId:popupField.querySelector('.choiced-id'),
			choicedText:popupField.querySelector('.choiced-text'),
			btnOpen:popupField.querySelector('.popup-btn-open'),
			btnOK:popupField.querySelector('.popup-btn-ok'),
			btnCancel:popupField.querySelector('.popup-btn-cancel'),
			window:popupField.querySelector('.popup-window'),
			rows:[],

			open:function(){
				this.window.style.display = 'table';
				this.rows=this.window.querySelectorAll('tr');
			},
			close:function(){
				this.window.style.display = 'none';
				this.rows=[];

			},	
			initF:function(){
		
				//this.btnOpen.addEventListener('click', function(){
				this.btnOpen.onclick= function(){	
					let curr_field=null;
					for(let j=0; j<popups.fields.length; j++)
					{
						console.log('field['+j);
						if(popups.fields[j].input===this.parentNode){
							curr_field=popups.fields[j];
							break;
						};
					};


					console.log('this=');
					console.log(curr_field);
					curr_field.open();


for (let i2 = 1; i2 < curr_field.rows.length; i2++) {
	let id= curr_field.rows[i2].id.split('-')[2];
	console.log(id);

	//?//curr_field.rows[i2].classList.remove('selected');

//verni:
	if(id && (id==curr_field.choicedId.value)){
		curr_field.rows[i2].classList.add('selected');//+Math.floor(Math.random()*10) );///!!!!!!
		//curr_field.rows[i].classList.add('selected');///!!!!!!
	};
};


for (let i3 = 1; i3 < curr_field.rows.length; i3++) {
	let id= curr_field.rows[i3].id.split('-')[2];

	if(id)
	//curr_field.rows[i3].addEventListener('click', function(){
	curr_field.rows[i3].onclick= function(){

					let curr_field=null;
					for(let j=0; j<popups.fields.length; j++)
					{
						console.log('field['+j);
						if(popups.fields[j].input===this.parentNode.parentNode.parentNode.parentNode){
							curr_field=popups.fields[j];
							break;
						};
					};

		for (let j3 = 1; j3 < curr_field.rows.length; j3++) {
			curr_field.rows[j3].classList.remove('selected');
		};
		//curr_field.rows[i3].classList.add('selected');
		this.classList.add('selected');//???????????
		//('selected');
	};/////);//tr.click
				//this!!!!!!!!!!????????
	//console.log('this=');
	//console.log(curr_field);
};//i++



				};/////);
			},//init

		};//field

		

		field.initF();//!!!!!!!!!!!!!!!



		field.btnOK.addEventListener('click', function(){


for (let i = 1; i < field.rows.length; i++) {

	if(field.rows[i].classList.contains('selected')){
		let id= field.rows[i].id.split('-')[2];


		//let inp=document.querySelector('input[name={{$fieldName}}]');
		field.choicedId.value=id;
		//let spn=inp.nextElementSibling;
		let itemName=id;
		itemName=field.rows[i].querySelector('td:nth-child(2)').innerHTML;

		field.choicedText.innerHTML=itemName;//???? $item->displayName ?? '<не выбрано>' ?????



	};//if selected

};//i++



			
			field.close();
		});

		field.btnCancel.addEventListener('click', function(){
			field.close();
			//let ufv=this.parentNode.parentNode;//document.querySelector('#ufv-{{$fieldName}}');
			//ufv.style.display = 'none';//block
		});



		return field;
	},


	init:function(){
		let popupFields=document.querySelectorAll('.popup-input');

		for(let i=0; i< popupFields.length; i++){
			this.fields.push(
				this.createField(popupFields[i])
			);
		};//i++


	},









};//popups


popups.init();//+6.4.21












// ===============BEG AJAX ======================




//let 


      let map=document.getElementById('map');

//$x,$y,&$e,&$n
      function xy2en(x,y){

      	let x1=x,y1=y,x2,y2;
      	//prosto pryamoug setka
      	let xTop34=259, xWidth1=397;
      	x2=(x1-xTop34)/xWidth1 + 34;
      	let yCntr33=370, yHeight1=475;
      	y2=(yCntr33-y1)/yHeight1 + 33;




      	if(x1<740){
      		//????
      	}else{//>740
      	};
    	

      	x2=Math.round(x2*100)/100;
      	y2=Math.round(y2*100)/100;
      	let xy=[];
      	xy[0]=x2;
      	xy[1]=y2;
      	//return xy;
      	return {x:x2, y:y2 };
     
/*
y  33  367  
y  32  842
   31  1317
   30  1791
y  29  2265


x 34  250 (244-269)
  35  (662 on bottom)   (666 on top)
    740   vertical
  36 1079

    otklonenie:
     x    y      x35    x36
x34  269   54    666 1063                +397  
     265  367 y33    1065  369
     260  842 y32    1069  841
     255 1317 y31    1072 1317
     250 1790 y30    1076 1792
     245 2264 y29    1079 2267
     244 2380    662

  dY=475


*/
      };




      function en2xy(x,y){

      	let x1=x,y1=y,x2,y2;
      	//prosto pryamoug setka
      	let xTop34=259, xWidth1=397;
      	//x2=(x1-xTop34)/xWidth1 + 34;
      	let yCntr33=370, yHeight1=475;
      	//y2=(yCntr33-y1)/yHeight1 + 33;



  //    	(x2-34)*xWidth1+xTop34    =(x1) ;



		x2= xTop34 + (x1-34)*xWidth1;
      	y2= yCntr33 - (y1-33)*yHeight1;


      	if(x1<740){
      		//????
      	}else{//>740
      	};
    	

      	x2=Math.round(x2);//*100)/100;
      	y2=Math.round(y2);//*100)/100;

      	return {x:x2, y:y2 };

      };



if(map)
{


let editor={
	down:false,
	oldX:-1,
	oldY:-1,
	place:null,
};


      let memo=document.getElementById('memo');
      let punkts=document.getElementById('punkts');//+


//init - show all saved towns



map.addEventListener('click', function(e){
	e.preventDefault();

	console.log('click:');
	console.log(editor.place);
	if(editor.place){ 
		editor.place=null;
		return;
	}
	console.log('A:');


      	let x1=e.offsetX, y1=e.offsetY, x2=0,y2=0;
      	let xy=xy2en(x1,y1);//,x2,y2);
      	x2=xy.x;
      	y2=xy.y;

	const productData = 
	{ x:x2, y:y2, };
	//new FormData(this);//обращение к форме, откуда получить данные о продукте
	//вместо того, чтобы по отдельности: поля формы qty
//данные получили

// и теперь отправим:
// объект axios
axios.post('/map/place/add', productData)
  .then(function (response) {

 	putPlace(response.data);//+21.2.21
	//updateCart(response.data);
    //console.log(response.data);
    //CartController  return view('cart');

    
  })
  .catch(function (error) {
    console.log(error);
  });

//.then - Ответ от сервера
//.catch - по ошибке в запросе



});

updateCart('<b>init!</b>');




let places = punkts.querySelectorAll('.place');
places.forEach( function(place, index) {
	// statements

	place.addEventListener('mousemove',function(){
		//editor.place=this;
		//console.log(editor.place);
	});

	place.addEventListener('mousedown',function(e){
		//
		e.preventDefault();
		editor.place=this;
		//editor.oldX=Number(editor.place.style.left)+e.offsetX;
		//editor.oldY=Number(editor.place.style.top)+e.offsetY;
	editor.oldX= (+editor.place.style.left.split('px')[0])+e.offsetX;
	editor.oldY= (+editor.place.style.top.split('px')[0])+e.offsetY;

	console.log('ed.x='+editor.oldX+' ed.y='+editor.oldY);
	});
});//places


map.addEventListener('mouseup', function(e){
if(!editor.place) return;//nothing move
	e.preventDefault();

	let dx=e.offsetX-editor.oldX;
	let dy=e.offsetY-editor.oldY;

	console.log('dx='+dx+' dy='+dy);

	editor.place.style.left = ((+editor.place.style.left.split('px')[0])+dx)+'px';
	editor.place.style.top = ((+editor.place.style.top.split('px')[0])+dy)+'px';

	console.log(editor.place.style);

	//editor.place=null;
	//need Ajax!!!!!!!!!!!



      	let x1=(+editor.place.style.left.split('px')[0]);//+dx;
      	let y1=(+editor.place.style.top.split('px')[0]);//+dy; 
      	let x2=0,y2=0;
      	let xy=xy2en(x1,y1);//,x2,y2);
      	x2=xy.x;
      	y2=xy.y;
      	placeId = editor.place.querySelector('input.place-id').value;

	const productData = 
	{ x:x2, y:y2, id:placeId,};
	//new FormData(this);//обращение к форме, откуда получить данные о продукте
	//вместо того, чтобы по отдельности: поля формы qty
//данные получили

// и теперь отправим:
// объект axios
axios.post('/map/place/edit', productData)
  .then(function (response) {

	editPlace(editor.place, response.data);
 	//putPlace(response.data);//+21.2.21
	//updateCart(response.data);
    //console.log(response.data);
    //CartController  return view('cart');

    
  })
  .catch(function (error) {
    console.log(error);
  });



	
});


};//#map


function putPlace(item){//+21.2.21
	let xy=en2xy(item.x,item.y);//,x2,y2);
	let x2=xy.x;
	let y2=xy.y;


	let place = document.createElement('div');
	place.classList.add('place');
	place.classList.add('place-town');
	place.style.left=x2+'px';
	place.style.top=y2+'px';
	//place.innerHTML=item.name;

	punkts.append(place);

	let placeId = document.createElement('input');
	placeId.type='hidden';
	placeId.classList.add('place-id');
	placeId.value=item.id;
	place.append(placeId);

	let placeName = document.createElement('input');
	placeName.type='text';
	placeId.classList.add('place-name');
	placeName.value=item.name;
	place.append(placeName);



};

function editPlace(place, item){//+7.3.21
	let xy=en2xy(item.x,item.y);//,x2,y2);
	let x2=xy.x;
	let y2=xy.y;


	if(!place){
		let pid=document.querySelector('input.place-id[value="'+item.id+'"]')
		if(pid)
			place=pid.parentNode;
	};

	// create
	place.style.left=x2+'px';
	place.style.top=y2+'px';
	//place.innerHTML=item.name;
	let placeName = place.querySelector('input.place-name');
	placeName.value=item.name;

	//append
};



function updateCart(html){
	memo.innerHTML+=html;
	//document.querySelector('.modal-body').innerHTML = html;
	//обновили содержимое тега на форме корзины cart.blade.php 
};











/*



//что отправлять форму с покупкой

if(document.querySelector('.buy'))
{
document.querySelector('.buy').addEventListener('submit', function(e){
	e.preventDefault();

	const productData = new FormData(this);//обращение к форме, откуда получить данные о продукте
	//вместо того, чтобы по отдельности: поля формы qty
//данные получили

// и теперь отправим:
// объект axios
axios.post('/cart/add', productData)
  .then(function (response) {

	updateCart(response.data);
    //console.log(response.data);
    //CartController  return view('cart');

    
  })
  .catch(function (error) {
    console.log(error);
  });

//.then - Ответ от сервера
//.catch - по ошибке в запросе



});
};

function updateCart(html){
	document.querySelector('.modal-body').innerHTML = html;
	//обновили содержимое тега на форме корзины cart.blade.php 
};


//+19.3.20:
document.querySelector('.clear-cart').addEventListener('click', function(e){
	e.preventDefault();
	//очистить корзину

	//const productData = new FormData(this);//ничего не передавали

// и теперь отправим:
// объект axios
axios.post('/cart/clear', {})//productData
  .then(function (response) {

	updateCart(response.data);
    //console.log(response.data);
    //CartController  return view('cart');

    
  })
  .catch(function (error) {
    console.log(error);
  });

//.then - Ответ от сервера
//.catch - по ошибке в запросе



});


//24.3.20                   .remove-product
document.querySelector('.modal-body').addEventListener('click', function(e){
	e.preventDefault();
	//очистить корзину

	//const productData = new FormData(this);//ничего не передавали

// и теперь отправим:
// объект axios

//e.target элемент д.б. кнопкой
if(e.target.classList.contains('remove-product')) //
{//для динамических элементов

	//const id = this.getAttribute('data-id');// теперь это уже .modal-body
	const id = e.target.getAttribute('data-id');
	console.log(id);
	//productData
	axios.post('/cart/remove', {product_id: id})//productData  самой страницы '/cart/remove' нет
	  .then(function (response) {

		updateCart(response.data);
	    //console.log(response.data);
	    //CartController  return view('cart');

	    
	  })
	  .catch(function (error) {
	    console.log(error);
	  });

	//.then - Ответ от сервера
	//.catch - по ошибке в запросе
};


});


//24.3.20                   .change-qty
document.querySelector('.modal-body').addEventListener('input', function(e){
	e.preventDefault();
	//очистить корзину

	//const productData = new FormData(this);//ничего не передавали

// и теперь отправим:
// объект axios

//e.target элемент д.б. инпутом
if(e.target.classList.contains('change-qty')) //
{//для динамических элементов

	//const id = this.getAttribute('data-id');// теперь это уже .modal-body
	const id = e.target.getAttribute('data-id');
	const qty = e.target.value;// <input value="" class="change-qty" >
	//console.log(id);
	//productData
	axios.post('/cart/change-qty', {product_id: id, product_qty: qty})//productData  самой страницы '/cart/remove' нет
	  .then(function (response) {

		updateCart(response.data);
	    //console.log(response.data);
	    //CartController  return view('cart');

	    
	  })
	  .catch(function (error) {
	    console.log(error);
	  });

	//.then - Ответ от сервера
	//.catch - по ошибке в запросе
};


});


//npm run watch 

/*
axios.post('/user', {
    firstName: 'Fred',
    lastName: 'Flintstone'
  })
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });


*/

let btnDropDown=document.querySelector('.nav-item.dropdown');
if(btnDropDown){
btnDropDown.addEventListener('click', function(){
//btnDropDown.onclick= function(){	
	let menuDropDown=btnDropDown.querySelector('.dropdown-menu');
	if(menuDropDown){
		menuDropDown.style.display='block';
		//menuDropDown.style.height='300px';
		//menuDropDown.style.width='300px';
	};

});//func
};//btnDropDown




// ===============END AJAX ======================






//document.onload=function(){
let menu = document.querySelector('.adaptive-menu .mobile-bar');
if(menu){
	menu.addEventListener('click', function(){
		//
		let ul = menu.parentElement.querySelector('ul');
		ul.classList.toggle('active');
		menu.classList.toggle('active');

	});

};

//};


function toggleMenu(){



};



//Genealogy:
let embed1=document.querySelector('#embed1');
if(embed1){

embed1.addEventListener('click', function(e){

console.log(e);
e.target.innerHTML+='🏇';
//alert('1');
console.log('1');
//*
let obj = {
  f3() {console.log(this)},
  f1: function() { console.log(this) },
  f2: () => console.log(this),
  //f2: () => console.log(obj),

};

console.log('1_1');
obj.__proto__.f4 = function f4(){console.log('fff444')};
obj.__proto__.f5 = function f5(){console.log('fff555')};
//Object.prototype.f4 = function f4(){console.log('fff444')};
console.log('1_2');
console.log(obj.__proto__);
console.log('1_3')
console.log(Object.prototype);
console.log('1_4')

obj;
console.log('2');
obj.f1();
obj.f2();
obj.f3();
obj.f4();
console.log('3');
console.log(obj);

//*/
console.log('4');

delete obj.__proto__.f4;
delete obj.__proto__.f5;

});

};


