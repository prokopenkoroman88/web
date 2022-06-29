import Landscape from './game/Landscape';
import { Artefact, Source, Unit, StaticUnit, DynamicUnit, UnitList, Units } from './game/Units';
import { Rich, Richment } from './game/Richment';


class Game{

	constructor(){
		this.levelName = '';//?
		this.offset = {x:0,y:0};
		this.landscape = new Landscape();
		this.units = new Units();
		this.richment = new Richment();
		//tasks
		//menus
	}

	init(){
		//test loading:
		this.landscape.resize(1000,500);//(width,height)

		this.richment.pay('dub',123456);
		this.richment.pay('elka',50);
		this.richment.pay('gold',123400);
		this.richment.pay('silver',456700);

		let w=this.landscape.width;
		let h=this.landscape.height;
		for(let i=0; i<10; i++){
			let unit = new DynamicUnit();
			unit.init();
			unit.name="M";
			unit.x=Math.random()*w;
			unit.y=Math.random()*h;
			this.units.dynamics.add(unit);
		};

	}
}

export default Game;