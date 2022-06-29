import { Place, Level, MapItemList } from './worldmap/MapItems';

class WorldMap{//TsrtLevels

	constructor(){
		this.width = 1162;
		this.height = 1286;
		this.offset = {x:0,y:0};
		//this.map_img = './../painting/images/world-map.jpg';
		this.map_img = './images/world-map.jpg';// in public/
		this.places = new MapItemList();//[];
		this.levels = new MapItemList();//[];

		this.userName = '';
		this.levelName = '';
		this.savingName = '';

	}

	addPlace(kind,x,y,name){
		let place = new Place(kind,x,y,name);
		return this.places.list.push(place)-1;
	}

	addLevel(kind,x,y,name){
		let level = new Level(kind,x,y,name);
		level.init();
		//this.readSavings(name);
		return this.levels.list.push(level)-1;
	}

	load(){
		//test:
		this.readPlaces();
		this.readLevels();
	}

	readPlaces(){
		//test:
		this.addPlace(1,550,800,'Центр виникнення');
		//this.addPlace(kind,x,y,name);
	}

	readLevels(){
		//test:
		let iL=this.addLevel(1,550,820,'Початок');
		//this.addLevel(kind,x,y,name);
		//this.readSavings(name);
	}

	readSavings(levelName){
		let iL=this.levels.nameIndex(levelName);
		this.levels.list[iL].readSavings();
	}

}

export default WorldMap;