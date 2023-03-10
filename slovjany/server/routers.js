const CustomRouter = require('./routers/CustomRouter');
const CustomResourceRouter = require('./routers/CustomResourceRouter');


class RouterManager{

	constructor(){
		this.init();
	}

	add(routerName, res=true){
		let path = './routers';
		if(res)
			path+='/resources';
		let Router = require(path+'/'+routerName);
		let router = new Router();
		router.controllerRoutes();//додає зв'язки між URL і методами контролера
		return router;
	}

	init(){
		this.routers = {
		};
		this.resources = {
			tribeRouter : this.add('TribeRouter'),
		};
	}

}

const routerManager = new RouterManager();

module.exports = routerManager;
