import  { Item, ItemList }  from './../custom/Items';
import  { CELL, aWindRose }  from './../../common/system';
import  enums  from './../../common/enums';


class Artefact extends Item{
	constructor(){

	}

	init(){
		this._kind_id=0;
		this.j=0;
		this.i=0;
	}


	get cx(){return (this.j+0.5)*CELL.width;}
	set cx(value){this.j=(value-CELL.width/2)/CELL.width;}

	get cy(){return (this.i+0.5)*CELL.height;}
	set cy(value){this.i=(value-CELL.height/2)/CELL.height;}

	get x(){return this.j*CELL.width;}
	set x(value){this.j=value/CELL.width;}

	get y(){return this.i*CELL.height;}
	set y(value){this.i=value/CELL.height;}


	get w(){return CELL.width;}

	get h(){return CELL.height;}



	get cell(){
		return {j:this.j, i:this.i};//cx,cy?
	}
	set cell(value){
		this.j=(value.j);
		this.i=(value.i);
	}


}


class Source extends Item{//Source Wealth NatureItem
	constructor(){
		super();
	}

	init(){
		this._kind_id=0;
		this.j=0;
		this.i=0;
		this._health=this.maxHealth;
	}

}





/*
			type0	type1
	chars	буквы	0-255

	source	богат	0-255	TmapType

	units	юниты	0-255	unt

*/


class Unit extends Item{
	constructor(){
		super();
	}

	init(){
		this._kind_id=0;
		this._cx=0;
		this._cy=0;
		this._health=this.maxHealth;
		this.name='';
		this.id=0;
		this.visible=true;
		this.selected=false;
		this.color_id=0;
		this.tribe_id=0;
		this.menus='                  ';//18
		this.job=enums.id('job','');
	}

	get cx(){return this._cx;}
	set cx(value){this._cx=value;}

	get cy(){return this._cy;}
	set cy(value){this._cy=value;}

	get x(){ return this.cx-this.w/2; }
	set x(value){ this.cx=value+this.w/2; }

	get y(){ return this.cy-this.h/2; }
	set y(value){ this.cy=value+this.h/2; }

	get w(){}

	get h(){}

	get cell(){
		return {j:this.x/CELL.width, i:this.y/CELL.height};//cx,cy?
	}
	set cell(value){
		this.x=(value.j)*CELL.width;
		this.y=(value.i)*CELL.height;
	}

	get health(){ return this._health; }
	set health(value){ this._health=value; }

	get maxHealth(){}

	skills=[];
	id=-1;//?

	prepareMenus(){
		//this.menus
	}

}


class StaticUnit extends Unit{
	constructor(){
		super();
	}
}


class DynamicUnit extends Unit{
	constructor(){
		super();
	}
	init(){
		this.move=enums.id('move','Stay');
		this.step=1;
		this.see=4;
	}
	get w(){ return 32; }
	get h(){ return 32; }

	get mapI(){ return this.job*3 + aWindRose[this.see].y+1; }//??????
	get mapJ(){ return aWindRose[this.see].x+1; }//??????


	calcWay(){
	}

	calcCollision(){
	}

}


class UnitList extends ItemList{

}


class Units{
	constructor(){
		this.statics = new UnitList();
		this.dynamics = new UnitList();
		this.selection = new UnitList();
		this.artefacts = new ItemList();
	}
}


export { Artefact, Source, Unit, StaticUnit, DynamicUnit, UnitList, Units };
