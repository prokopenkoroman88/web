
let codes;

codes=document.querySelectorAll('code.code-xml');


for(let i=0; i<codes.length; i++){

	let s = codes[i].innerHTML;


	s=stringToXML(s);

	let div = document.createElement('pre');
	div.classList.add('code-xml');
	div.innerHTML=s;
	codes[i].after(div);
};


for(let i=0; i<codes.length; i++){
	codes[i].remove();
};


codes=document.querySelectorAll('code.code-php');


for(let i=0; i<codes.length; i++){

	let s = codes[i].innerHTML;


	s=stringToPHP(s);

	let div = document.createElement('pre');
	div.classList.add('code-php');
	div.innerHTML='<code>'+s+'</code>';
	codes[i].after(div);

};
for(let i=0; i<codes.length; i++){
	codes[i].remove();
};




function stringToXML(s1){

	let s2='', ch='', iQuot=0, iAttr=-1, bAttrName=false;
	for(let j=0; j<s1.length; j++){
	//console.log(s[j]);


	if(s1[j]=='<'){
		iAttr=-1;
		ch='&lt;';
	}
	else
	if(s1[j]=='>'){

		ch='&gt;';
	}
	else
	if(s1[j]=='"'){
		iQuot++;
		if(iQuot % 2 == 0)
			ch=s1[j]+'</span>'
		else
			ch='<span class="attr-value">'+s1[j];
		//console.log('iQuot '+ch);

	}
	else
	{
		ch=s1[j];//simple
	};


	if(iAttr<0 && s1[j].match(/[A-Za-z0-9_]/) ){
		ch='<span class="tag-name">'+s1[j];		
		iAttr=0;
	}
	else
	if(iAttr==0 && !s1[j].match(/[A-Za-z0-9_]/) ){
		ch='</span>'+s1[j];		
		iAttr++;
	}
	else
	if(iAttr>0 && s1[j].match(/[A-Za-z0-9_\:]/) && s1[j-1]==' '){
		ch='<span class="attr-name">'+s1[j];		
		bAttrName=true;
		//iAttr++;
		//console.log('span class="attr-name"');
	}
	else
	if(iAttr>0 && !s1[j].match(/[A-Za-z0-9_\:]/) && bAttrName){
		ch='</span>'+s1[j];		
		iAttr++;
		bAttrName=false;
	};



	s2+=ch;

	//if(s1[j]=='"')		console.log(s2);
	};//j++

	return s2;
};


function stringToPHP(s1){
	let s2='';


	for(let j=0; j<s1.length; j++){
	//console.log(s[j]);


	if(s1[j]=='<'){
		iAttr=-1;
		ch='&lt;';
	}
	else
	if(s1[j]=='>'){

		ch='&gt;';
	}
	/*else
	if(s1[j]=='?'){

		ch='&guest;';
	}		
	else
	if(s1[j]=="'"){

		ch='&sbguo;';
	}	*/


	else
	{
		ch=s1[j];//simple
	};

	s2+=ch;
	};//i++


/*

	s2=s1;//?






			s2=s2.replaceAll('?','&quest;');
			s2=s2.replaceAll('!','&quot;');
			s2=s2.replaceAll('<','&lt;');
			//s2=s2.replaceAll('>','&gt;');


		s2=s2.replaceAll("'",'&sbquo;');
*/
		console.log(s2);


	return s2;
};