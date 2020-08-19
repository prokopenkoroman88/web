


let form = document.forms['shipping'];
let aErr=['','','',''];


function printError(i,field){
	let div;
	div=form.elements[field].nextElementSibling;
	console.log(div);
	if(aErr[i]){
		div.classList.remove('none');
		div.innerHTML=aErr[i];
	}
	else
		div.classList.add('none');

};



function check(){

	let s;

	s=form.elements['name'].value;
	aErr[0]='';
	if(s=='')aErr[0]='The name field is required';


	s=form.elements['address'].value;
	aErr[1]='';
	if(s=='')aErr[1]='The address field is required';
	//--------------------------------

	s=form.elements['phone'].value;
	aErr[2]='';
	//if(s=='')aErr[2]='The phone field is required';
	if(s!=''){
		let tel=s.match(/\d/g).join('');
		console.log('tel='+tel);
		if(tel.length!=12)aErr[2]='The phone length must be 12 digits';
	};
	//----------------------------

	s=form.elements['email'].value;
	aErr[3]='';
	if(s!=''){
		console.log(s);
		let re = /^[a-z0-9]+[_a-z0-9\.-]*[a-z0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/ig;
		console.log('match(re)='+s.match(re));
		if(! re.test(s))
			aErr[3]='The wrong email';
	};

	let b=false;
	for(let i=0; i<4; i++){
		if(aErr[i]){
			b=true;
		};
	};


	printError(0,'name');
	printError(1,'address');
	printError(2,'phone');
	printError(3,'email');

	form.elements['pay'].disabled=b;

};


if(form){

	form.elements['name'].addEventListener('blur', function(){
		check();
	});


	form.elements['address'].addEventListener('blur', function(){
		check();
	});

	form.elements['phone'].addEventListener('blur', function(){
		check();
	});


	form.elements['email'].addEventListener('blur', function(){
		check();
	});

	//check();

};


















