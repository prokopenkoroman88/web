import  { Item, ItemList }  from './../custom/Items';

class Place extends Item{
	constructor(kind,x,y,name){
		super();
		this._kind_id=kind;
		this._c={x:x, y:y};
		this.name=name;
	}
	get cx(){ return this._c.x; }
	set cx(value){ this._c.x=value;  } // this.tag.setState({x:value}); - works!!!

	get cy(){ return this._c.y; }
	set cy(value){ this._c.y=value; }
}

class Level extends Place{
	init(){
		//super();
		super.init();
		super.mission='';
		this.savings=[];
	}

	addSaving(name){
		this.savings.push(name);
	}

	readSavings(){
		this.savings=[];
		//test:
		this.addSaving('Перше збереження');
		this.addSaving('Друге збереження');
		this.addSaving('Третє збереження');
	}
}

class MapItemList extends ItemList{
}

export { Place, Level, MapItemList }