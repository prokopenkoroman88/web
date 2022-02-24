//D:\STEP\PHP\OSPanel\domains\portfolio\resources\views\admin\mainpanel.blade.php

//export 

class CommonField{

	constructor(inputField){
		this.init(inputField)
	}

	init(inputField){
		this.input=inputField;		
	}
}//CommonField
//===================

class PopupField extends CommonField{



	init(inputField){
		super.init(inputField);
		let popupField=this.input;
		this.choicedId=popupField.querySelector('.choiced-id');
		this.choicedText=popupField.querySelector('.choiced-text');
		this.btnOpen=popupField.querySelector('.popup-btn-open');
		this.btnOK=popupField.querySelector('.popup-btn-ok');
		this.btnCancel=popupField.querySelector('.popup-btn-cancel');
		this.window=popupField.querySelector('.popup-window');
		this.rows=[];
	}

	open(){
		this.window.style.display = 'table';
		this.rows=this.window.querySelectorAll('tr');
	}
	close(){
		this.window.style.display = 'none';
		this.rows=[];
	}

	initF(){
		
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
	}//initF





}//PopupField

//=================================================

class FormControl{

	static fields=[];

//	constructor(){
//		this.init();
//	}

	static init(){
		let popupFields=document.querySelectorAll('.popup-input');

		for(let i=0; i< popupFields.length; i++){
			FormControl.fields.push(
				new PopupField(popupFields[i])
			);
		};//i++
	}


}





FormControl.init();
//FormControl.fields


//=================================================

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







