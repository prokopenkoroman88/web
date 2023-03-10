const CustomRouter = require("./CustomRouter");

//методи команд:
const cmdMethods = new Map();
cmdMethods.set('select','get');
cmdMethods.set('insert','post');
cmdMethods.set('update','put');
cmdMethods.set('delete','delete');

class CustomResourceRouter extends CustomRouter{

	static methodByCommand(command){
		let method = cmdMethods.get(command);
		return method;
	}

	constructor(table, controllerName='', modelName=''){
		super('/resources/'+table, '');
		this.table=table;
		this.initController(controllerName,table,modelName)
		//
	}

/*
	resourceRoute(command,byId=false){
		let method = cmdMethods.get(command);//CustomResourceController.methodByCommand(command);
		let url ='/'+this.table+(byId?'/:id':'');

		//this.app[method](url, this.controller.simpleQuery);//(req, res)
		this.route(method, url, this.controller.simpleQuery);
	}//route

	resourceRoutes(){
		this.resourceRoute('select');
		this.resourceRoute('select',true);
		this.resourceRoute('insert');
		this.resourceRoute('update',true);
		this.resourceRoute('delete',true);
	}//routes
//*/

	initController(controllerName='', table='', modelName=''){
		this.controller = this.getController(controllerName,table,modelName);
	}

	getController(controllerName='', table='', modelName=''){
		console.log('CustomResourceRouter.getController',controllerName,'"'+table+'"');
		let ResourceController=null;
		let controller=null;

		if(table){//resource
			if(controllerName){
				ResourceController = require('./../controllers/resources/'+controllerName);//imports class
				if(!ResourceController)
					ResourceController = require('./../controllers/CustomResourceController');
				controller = new ResourceController(table,modelName);//model?
			}
			else {
				ResourceController = require('./../controllers/CustomResourceController');
				controller = new ResourceController(table,modelName);
			};
		}
		else{//custom
			controller = super.getController(controllerName);
		};
		return controller;
	}

	prepareParams(method, url_suffix, controllerName, methodName, req, res){
		const { id } = req.params;
		const obj = req.body;
		//?const files = req.files;
		let params = [id,obj];
		//console.log(JSON.stringify(obj));
		if(methodName=='store')
			params.shift();
		return params;
	}

	sendResult(methodName, result, res){
		console.log('router.result:');
		//console.log(JSON.stringify(result));
		console.log(JSON.stringify(result.rows));//index
		switch (methodName) {//command
			case 'index'  : res.json(result.rows   ); break;
			case 'show'   : res.json(result.rows[0]); break;
			case 'create' : res.json(result); break;// return result;
			case 'store'  : res.json(result.rows[0]); break;//after create
			case 'edit'   : res.json(result); break;// return result;
			case 'update' : res.json(result.rows[0]); break;//after edit
			case 'destroy': res.json('Record #'+id+' was deleted from "'+this.table+'"'); break;
			default: res.json(result); break;
		};
	}

	controllerRoutes(controllerName=''){
		this.controllerRoute('get'   ,''         ,controllerName+'.index');
		this.controllerRoute('get'   ,'/create'  ,controllerName+'.create');//?
		this.controllerRoute('post'  ,''         ,controllerName+'.store');
		this.controllerRoute('get'   ,'/:id'     ,controllerName+'.show');
		this.controllerRoute('get'   ,'/edit/:id',controllerName+'.edit');//?
		this.controllerRoute('put'   ,'/:id'     ,controllerName+'.update');
		this.controllerRoute('delete','/:id'     ,controllerName+'.destroy');
	}

}

module.exports = CustomResourceRouter;
