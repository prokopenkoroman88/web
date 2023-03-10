const app = require("./../app");


//export default 
class CustomRouter{
	constructor(prefix, controllerName=''){
		this.app = app;
		this.url_prefix = prefix;
		this.controller = null;
		if(controllerName)
			this.initController(controllerName);
	}

	route(method, url, controllerMethod){
		//controllerMethod = async (req, res) => { }
		this.app[method](url, controllerMethod);//(req, res)
	}

	initController(controllerName=''){
		this.controller = this.getController(controllerName);
	}

	getController(controllerName=''){
		console.log('CustomRouter.getController',controllerName);
		let Controller=null;
		let controller=null;

		if(controllerName){
			Controller = require('./../controllers/'+controllerName);//imports class
			if(!Controller)
				Controller = require('./../controllers/CustomController');
			controller = new Controller();//model? this.table
		}
		else{
			Controller = require('./../controllers/CustomController');
			controller = new Controller();//model? this.table
		};

		return controller;
	}

	controllerRoute(method, url_suffix, controller_method){
		let controllerName = controller_method.split('.',2)[0];
		let methodName = controller_method.split('.',2)[1];

		let controller = this.controller;
		if(controllerName)
			controller = this.getController(controllerName);
		let url = this.url_prefix+url_suffix;

		//console.log(method,url,controllerName,methodName);
		//this.app[method](url, async (req, res) => {
		this.route(method, url, async (req, res) => {
			console.log(method,url,controllerName,methodName);

			try{
				let params = this.prepareParams(method, url_suffix, controllerName, methodName, req, res);

				const result = await controller[methodName](...params);//(id,obj)   controller -> model -> query

				this.sendResult(methodName, result, res);
			} catch(err) {
				console.error(err.message)
			}

		});
	}

	prepareParams(method, url_suffix, controllerName, methodName, req, res){
		return [];
	}

	sendResult(methodName, result, res){
		res.json(result);
	}

	controllerRoutes(controllerName=''){
		//this.controllerRoute('get', '/suffix', controllerName+'.method');
	}

}

module.exports = CustomRouter;
