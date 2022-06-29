// Значенм п.б. унікальними в межах масива!!

//Режим
const aPlayMode=['','Login','Main','Task','Level','Pause','Result'];

//Поверхи ландшафта
const aLandStage=['','Grounds','Roughs','Carpets','Wealths','Seeings',  'Stat','Dynam'];// землі, горби, килими, багатства, видимість

//Групування ділянок ландшафта за ознаками
const aLandGroup=['','Поле','Ліс','Дім','Живе','Вода','Берег','Поза'];


const aMapType=[''  ,'Empty' ,'Mix'   ,'Рід'
  ,'Межа1'  ,'Межа2',  'Берег'

//Roughs:
  ,'Рів'   ,'Вал'//+20.3.19 

//Grounds:
  ,'Ріка'  ,'Болото','Пісок' ,'Земля' ,'Глина'

//Carpets
  ,'Лід'   ,'Сніг'  ,'Трава?'    //??  mapOgon  ,mapRilla

//Wealths:
  ,'Стерно','Льон'   ,'Пшениця' ,'Жито' ,'Очерет','Сонях'
  ,'Пні'   ,'Ялина'  ,'Ялівець?','Дуб'   ,'Олива' ,'Береза'//trees
            ,'РудаAu','РудаAg','РудаCu','РудаSt','РудаFe'//metals
  ,'Камені' ,'Граніт','Ракушняк','Мармур'//bergs
  ,'Карта'
];

//const aRchType=[]

//const aRchConv=[] // aConversion

//Як пересувається юніт
const aMagistral=['','Суша','Море','Небо'];

//як рухається юніт
const aMoveStatus=[''
,'Stay','Go'
,'Soar','Fly'
,'Puddle','Swim'
];

//схоже, що тільки для видимого відображення (а будує і перебуває всередині?, а rich?)
const aJobStatus=['','Будівництво','Ремонт','Оновлення','Тренування','Перетирання','Шиття','Розділення','Плавлення','Готування'
//,'Сокира','Кирка','Коса','Серп','Лопата'
,'Рубає','Довбе','Косить','Жне','Копає'
,'Несе_Колоду','Несе_Мішок','Несе_Сніп','Несе_Камінь','Несе_Шерсть'
,'Йде_До_Шахти','Приносить_Ресурс'//?
,'Будує','Ремонтує','Руйнує','Входить'
,'Їсть'  
];

/*
enums.in
enums.id('pm.Level')
enums.is(4,'pm.Level')
enums.is(4,['pm.Main','pm.Level'])
enums.is(4,'pm.Main,pm.Level')
enums.is(4,'pm.Main..pm.Level')
enums.is(4,'pm','Main..Level')
enums.id('pm','Level')
aPlayMode.indexOf('Level')
enums.a('pm').is('Level',4)
*/

class Enums{
	constructor(){
		this.map = new Map;
		this.map.set('pm',aPlayMode);
		this.map.set('stage',aLandStage);
		this.map.set('move',aMoveStatus);
		this.map.set('job',aJobStatus);
	}

	findArr(arr){
		if(typeof arr==='string')
			arr = this.map.get(arr);
		if(Array.isArray(arr))
			return arr;
	}

	id(arr, value){
		arr=this.findArr(arr);
		return arr.indexOf(value);
	}

	is(key, arr, values){
		let res=false;
		arr=this.findArr(arr);
		values.split(',').forEach((elem)=>{
			if(res)return;
			let bounds = elem.split('..',2);
			let id1=this.id(arr, bounds[0]), id2=id1;
			if(bounds.length==2)
				id2=this.id(arr, bounds[1]);
			if(id1<=key && key<=id2)
				{res=true; return};
		}, this);
		return res;
	}
};


export default  new Enums();
