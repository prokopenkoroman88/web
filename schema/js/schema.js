let divSchemy=[];
let divSchema=null;

let funcs=[];
let hosts=[];
let lines=[];//let texts=[];
let labels=[];

function initArrays(){
hosts=[];
lines=[];//texts=[];
labels=[];
};


function host(x,y,capt,title=''){//class
	this.x=x;
	this.y=y;
	this.capt=capt;
	this.title=title;
	this.paint = function(){
		var divHost = document.createElement('div');
		divHost.classList.add('host');
		divHost.style.left=this.x+'px';
		divHost.style.top=this.y+'px';
		divSchema.appendChild(divHost);

		let divStruct = document.createElement('div');
		divStruct.classList.add('struct');
		divHost.appendChild(divStruct);
		
		let divR;
		for(let i=0;i<4;i++){
			divR = document.createElement('div');
			divStruct.appendChild(divR);
		};


		if(this.capt){
			let divCapt = document.createElement('div');
			divCapt.classList.add('capt');
			divCapt.innerHTML=this.capt;
			divHost.appendChild(divCapt);
		};
		if(this.title){		
			let divTitle = document.createElement('div');
			divTitle.classList.add('title');
			divTitle.innerHTML=this.title;
			divHost.appendChild(divTitle);
		};		

		if(this.files){		
			let divTitle = document.createElement('div');
			divTitle.classList.add('db-files');
			divTitle.innerHTML=this.files;//'Файли БД'
			divHost.appendChild(divTitle);
		};	

		
	};
	
};


//lines=[];
//texts=[];

function line(x,y,size,angle,kind=''){//class
	this.x=x;
	this.y=y;
	this.size=size;
	this.angle=angle-180;
	this.kind=kind;//arrow?
	this.paint = function(){
		var divHost = document.createElement('div');
		divHost.classList.add('line');
		if(this.kind)
		divHost.classList.add(this.kind);//arrow
		divHost.style.transform='rotate('+this.angle+'deg)';
		divHost.style.height=this.size+'px';

		//let kut = Math.round((this.angle % 180)/15)*15;


		divHost.style.left=this.x+'px';
		divHost.style.top=this.y+'px';
		divSchema.appendChild(divHost);	
	};
	
};



function label(x,y,capt,isLabel=false){//class
	this.x=x;
	this.y=y;
	this.capt=capt;
	this.paint = function(){
		var divHost = document.createElement('div');
		if(isLabel)
			divHost.classList.add('pic-label');
		else
			divHost.classList.add('pic-text');
		if (this.border){
			divHost.style.border=this.border;
			divHost.style.padding='10px 30px';
		};

		divHost.style.left=this.x+'px';
		divHost.style.top=this.y+'px';
		divHost.innerHTML=this.capt;
		divSchema.appendChild(divHost);	
	};
	
};

function setSize(w,h){
	divSchema.style.width=w+'px';
	divSchema.style.height=h+'px';	
};

function addHost(x,y,capt,title=''){
	let h1 = new host(x,y,capt,title);
	//console.log(h1);
	hosts.push( h1 );
};


function addLine(x,y,size,angle,kind=''){
	let h1 = new line(x,y,size,angle,kind);
	//console.log(h1);
	lines.push( h1 );
};


function addLabel(x,y,capt,isLabel){
	let h1 = new label(x,y,capt,isLabel);
	//console.log(h1);
	labels.push( h1 );
};



funcs['pic_1-2']=function (){

setSize(409,320);



addHost(15,25,'<nobr>Прикладна </nobr><br><nobr>програма 1</nobr>','<nobr>Робоча станція </nobr><br><nobr>(клієнтський</nobr><br><nobr>комп&#8217;ютер</nobr>');
addHost(140,25,'<nobr>Прикладна </nobr><br><nobr>програма 2</nobr>','<nobr>Робоча станція </nobr><br><nobr>(клієнтський</nobr><br><nobr>комп&#8217;ютер</nobr>');
addHost(265,25,'<nobr>Прикладна </nobr><br><nobr>програма N</nobr>','<nobr>Робоча станція </nobr><br><nobr>(клієнтський</nobr><br><nobr>комп&#8217;ютер</nobr>');


addHost(15,165,'','<br><nobr>Файловий </nobr><br><nobr>сервер</nobr>');
hosts[3].files='Файли БД';//???


addLine(180,200,160,-52,'');
addLine(180,200,150,10,'');
addLine(180,200,170,62,'');
addLine(180,200,90,220,'');

addLine(220,250,60,-75,'arrow-out');
addLabel(225,250,'дуже «вузьке» місце');

addLabel(15,285,'Рис. 1-2',true);

//hosts[0].title='Верхний заголовок';

	
};




funcs['pic_1-6']=function (){

setSize(666,373);



addHost(155,15,'<nobr>Клієнт 1 &nbsp; &nbsp; &nbsp; </nobr>');
addHost(280,15,'<nobr>Клієнт 2 &nbsp; &nbsp; &nbsp; </nobr>');

addHost(425,15,'<nobr>Клієнт 1 &nbsp; &nbsp; &nbsp; </nobr>');
addHost(545,15,'<nobr>Клієнт 2 &nbsp; &nbsp; &nbsp; </nobr>');

addHost(155,145,'<nobr>&nbsp; Сервер Додатків 1</nobr><br>'); //,'<br><br><nobr>Комп&#8217;ютер-сервер</nobr>'
addHost(425,145,'<nobr>&nbsp; Сервер Додатків 2</nobr><br>'); //,'<br><br><nobr>Комп&#8217;ютер-сервер</nobr>'

addHost(15,225,'<nobr>&nbsp;Сервер Бази Даних</nobr><br>'); //,'<br><br><nobr>Комп&#8217;ютер-сервер</nobr>'
hosts[6].files='Файли БД';//???


addLine(220,130,30,0,'');
addLine(340,130,30,0,'');
addLine(220,130,145,90,'');//znyzu

addLine(495,130,30,0,'');
addLine(610,130,30,0,'');
addLine(495,130,145,90,'');//znyzu


addLine(220+145,130,60,180,'');//zahal'nyj
addLine(220+145,190,90,270,'');//vlevo

addLine(495+145,130,60,180,'');//zahal'nyj
addLine(495+145,190,90,270,'');//vlevo

addLine(220+145-90,200,80,180,'');//униз
addLine(495+145-90,200,80,180,'');//униз


addLine(495+145-90,280,430,270,'');//vlivo



addLine(120,330,40,30,'');

addLabel(15,350,'Рис. 1-6',true);

//hosts[0].title='Верхний заголовок';
	
};



funcs['pic_3-1']=function (){ //based on 'pic_1_6'

setSize(666,373);
//setSize(599,361);



addHost(155,15,'<nobr>Клієнт 1 &nbsp; &nbsp; &nbsp; </nobr>');
addHost(280,15,'<nobr>Клієнт 2 &nbsp; &nbsp; &nbsp; </nobr>');

addHost(425,15,'<nobr>Клієнт 1 &nbsp; &nbsp; &nbsp; </nobr>');
addHost(545,15,'<nobr>Клієнт 2 &nbsp; &nbsp; &nbsp; </nobr>');

addHost(155,145,'<nobr>&nbsp; Сервер Додатків 1</nobr><br>'); //,'<br><br><nobr>Комп&#8217;ютер-сервер</nobr>'
addHost(425,145,'<nobr>&nbsp; Сервер Додатків 2</nobr><br>'); //,'<br><br><nobr>Комп&#8217;ютер-сервер</nobr>'

addHost(15,225,'<nobr>&nbsp;Сервер Бази Даних</nobr><br>'); //,'<br><br><nobr>Комп&#8217;ютер-сервер</nobr>'
hosts[6].files='Файли БД';//???


addLine(220,130,30,0,'');
addLine(340,130,30,0,'');
addLine(220,130,145,90,'');//znyzu

addLine(495,130,30,0,'');
addLine(610,130,30,0,'');
addLine(495,130,145,90,'');//znyzu


addLine(220+145,130,60,180,'');//zahal'nyj
addLine(220+145,190,90,270,'');//vlevo

addLine(495+145,130,60,180,'');//zahal'nyj
addLine(495+145,190,90,270,'');//vlevo

addLine(220+145-90,200,80,180,'');//униз
addLine(495+145-90,200,80,180,'');//униз


addLine(495+145-90,280,430,270,'');//vlivo

addLine(120,330,40,30,'');//файли БД


addLabel(235,310,'Сервер синхронізації');
labels[0].border='2px solid black';
addLine(270,310,90,-40,'');
addLine(360,310,110,45,'');

addLabel(15,350,'Рис. 3-1',true);

//hosts[0].title='Верхний заголовок';
	
};



function paintSchema(schema_id){//"pic_2-1_2-2");
	divSchema = document.getElementById(schema_id);
	if(!divSchema) return;
	if(!funcs[schema_id]){
		divSchema.style.display='none';
		return;
	};
		
	initArrays();
	funcs[schema_id]();
	//console.log(hosts);

	for(let i=0; i<lines.length; i++)	lines[i].paint();
	for(let i=0; i<hosts.length; i++)	hosts[i].paint();
	for(let i=0; i<labels.length; i++)	labels[i].paint();
};//paintSchema


function paintSchemy(){
	divSchemy = document.querySelectorAll('.js-schema');
	if(!divSchemy) return;

	for(let i=0; i<divSchemy.length; i++){
		paintSchema(divSchemy[i].id);
	};
};


//<div class="js-schema" id="pic_2-1_2-2"></div>
paintSchemy();//main function

