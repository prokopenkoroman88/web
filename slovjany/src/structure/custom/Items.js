//?//import  Metrics  from './Metrics';
import  { CELL }  from './../../common/system';

class Item{//CustomUnit

	constructor(){

	}

	init(){
	}

	get kind_id(){return this._kind_id;}

	get c(){ return {x:this.cx, y:this.cy};}
	set c(value){ this.cx=value.x;  this.cy=value.y; }

	get cx(){}
	set cx(value){}

	get cy(){}
	set cy(value){}


	get x(){}
	set x(value){}

	get y(){}
	set y(value){}


	get w(){}

	get h(){}


	get rect(){
		return {
			x0:this.x, 
			y0:this.y, 
			x1:this.x+this.w-1, 
			y1:this.y+this.h-1
		};
	}

	get cell(){}
	set cell(value){}

	get cellRect(){
		return {
			j0:this.cell.j, 
			i0:this.cell.i, 
			j1:this.cell.j+this.w/CELL.width-1, 
			i1:this.cell.i+this.h/CELL.height-1
		};
	}


	get health(){}
	set health(value){this._health=value;}

	get maxHealth(){}

	step = new Uint8Array([0])[0];
	get maxStep(){}


}

class ItemList{//CustomUnitList
	constructor(){
		this.list=[];
	}

	add(item){
		this.list.push(item);
	}

	del(item){
		let i = item;
		if(isNaN(item))
			i = this.list.indexOf(item);
		if(i>=0)
			this.list.splice(i, 1);
	}

	item(index){
		return this.list[index];
	}

	get count(){
		return this.list.length;
	}

	nameIndex(name){
		for(let i=0; i<this.count; i++)
			if(this.item(i).name===name)
				return i;
		return -1;
	}

	findByCenter(x,y, radius=CELL.width/2){
		let res = this.selectByCenter(x,y, radius);
		if(!res)
			return null
		else
			return this.list[ res[0].index ];
	}

	selectByCenter(x,y, radius=CELL.width/2){
		let res=[];
		for(let i=0; i<this.list.length; i++){
			let distance = Math.sqrt( Math.pow((this.list[i].cx-x),2) + Math.pow((this.list[i].cy-y),2) );
			if(distance<=radius){
				res.push({index:i,dist:distance});
			};
		};
		res.sort((a,b) => { return a.dist-b.dist; });
		return res;
	}

	selectByBounds(rect){
		let res=[];
		for(let i=0; i<this.list.length; i++){
			let rct=this.list[i].rect;
			if(rect.x0<=rct.x1 && rct.x0<=rect.x1 && rect.y0<=rct.y1 && rct.y0<=rect.y1){
				res.push({index:i});//?
			};
		};
		return res;
	}

}

export { Item, ItemList };