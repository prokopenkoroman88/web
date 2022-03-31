const app = require("./../app");

//методи команд:
const cmdMethods = new Map();
cmdMethods.set('select','get');
cmdMethods.set('insert','post');
cmdMethods.set('update','put');
cmdMethods.set('delete','delete');

//export default 
class CustomRouter{
	constructor(table, controllerName=''){
		this.app = app;
		this.table = table;
		this.controller = null;
		if(controllerName){
			let ResourceController = require('./../controllers/'+controllerName);//imports class
			if(!ResourceController)
				ResourceController = require('./../controllers/CustomController');
			this.controller = new ResourceController(this.table);//model?
		}
		else if (this.table) {
			let ResourceController = require('./../controllers/CustomController');
			this.controller = new ResourceController(this.table);
		};
	}

	static methodByCommand(command){
		let method = cmdMethods.get(command);
		return method;
	}

	route(method, url, controllerMethod){
		//controllerMethod = async (req, res) => { }
		this.app[method](url, controllerMethod);//(req, res)
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

	controllerRoute(method, url, controller_method){
		let controllerName = controller_method.split('.',2)[0];
		let methodName = controller_method.split('.',2)[1];

		let controller = this.controller;
		if(controllerName){
			let ResourceController = require('./../controllers/'+controllerName);//imports class
			if(!ResourceController)
				ResourceController = require('./../controllers/CustomController');
			controller = new ResourceController();//model?
		};

		//console.log(method,url,controllerName,methodName);
		//this.app[method](url, async (req, res) => {
		this.route(method, url, async (req, res) => {
			console.log(method,url,controllerName,methodName);

			try{
				const { id } = req.params;
				const obj = req.body;
				//?const files = req.files;
				let params = [id,obj];
				//console.log(JSON.stringify(obj));//udali
				if(methodName=='store')
					params.shift();

				const result = await controller[methodName](...params);//(id,obj)   controller -> model -> query

				this.sendResult(methodName, result, res);
			} catch(err) {
				console.error(err.message)
			}

		});
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
		let url='/'+this.table;
		let sId='/:id';
		this.controllerRoute('get'   ,url            ,controllerName+'.index');
		this.controllerRoute('get'   ,url+'/create'  ,controllerName+'.create');//?
		this.controllerRoute('post'  ,url            ,controllerName+'.store');
		this.controllerRoute('get'   ,url+sId        ,controllerName+'.show');
		this.controllerRoute('get'   ,url+'/edit'+sId,controllerName+'.edit');//?
		this.controllerRoute('put'   ,url+sId        ,controllerName+'.update');
		this.controllerRoute('delete',url+sId        ,controllerName+'.destroy');
	}

}

module.exports = CustomRouter;