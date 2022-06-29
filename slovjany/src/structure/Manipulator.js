import  enums  from './../common/enums';
import  WorldMap  from './WorldMap';
import  Game  from './Game';


class Manipulator{

	constructor(worldMap,game){
		this.playMode = enums.id('pm','');
		this.worldMap=worldMap;
		this.game=game;
		this.old={x:0,y:0};
		this.new={x:0,y:0};//Rect0
		this.rect={x0:0,y0:0,x1:0,y1:0};
		this.btn=0;// 0-none 1-Left 2-Right
	}

	loadLevel(levelName,savingName){
		//load from Server
		this.game.init();
		this.testLoad();
	}

	testLoad(){
	}

	setRectLevel(press,button,x,y){
		//?
	}

}

export default Manipulator;