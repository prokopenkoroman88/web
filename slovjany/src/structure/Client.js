import  UserInfo  from './UserInfo';
import  WorldMap  from './WorldMap';
import  Game  from './Game';
import  Manipulator  from './Manipulator';


class Client{

	constructor(){
		this.userInfo = new UserInfo();
		this.worldMap = new WorldMap();
		this.game = new Game();
		this.mnpltr = new Manipulator(this.worldMap, this.game);
	}

}

export default Client;