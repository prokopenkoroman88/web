//?//const env = require('./../core/env');

//методи команд:
const cmdMethods = new Map();
cmdMethods.set('select','get');
cmdMethods.set('insert','post');
cmdMethods.set('update','put');
cmdMethods.set('delete','delete');

//export default 
class CustomResourceController{
	constructor(app,db,table){
		this.app = app;
		this.db = db;//pool
		this.table = table;
	}

	static methodByCommand(command){
		let method = cmdMethods.get(command);
		return method;
	}

	route(command,byId=false){
		let method = cmdMethods.get(command);//CustomResourceController.methodByCommand(command);

		let url ='/'+this.table;
		if(byId)
			url+='/:id';
		let query='';

		this.app[method](url, async (req, res) => {
			try{
				const params = [];///?
				const { id } = req.params;
				const obj = req.body;
				query = this.prepareQuery(command, id, obj);
				console.log(' --- Query: ---\n'+query);//!
				const result = await this.db.query(query, params);

				switch (command) {
					case 'select': res.json(byId?result.rows[0]:result.rows); break;
					case 'insert': res.json(result.rows[0]); break;
					case 'update': res.json(result.rows[0]); break;
					case 'delete': res.json('Record #'+id+' was deleted from "'+this.table+'"'); break;
					default: res.json(result); break;
				};

			} catch(err) {
				console.error(err.message)
			}
		});
	}//route

	routes(){
		this.route('select');
		this.route('select',true);
		this.route('insert');
		this.route('update',true);
		this.route('delete',true);
	}//routes

	prepareQuery(command, id=0, obj={}, where=''){
		let query='', sWhere='';
		switch (command) {
			case 'select': query='SELECT * FROM '; break;
			case 'insert': query='INSERT INTO '; break;
			case 'update': query='UPDATE '; break;
			case 'delete': query='DELETE FROM '; break;
			default: ; break;
		};

		query+=this.table;
		const attrs = Object.getOwnPropertyNames(obj);//obj to array

		function prepareValue(fieldName){
			let value = obj[fieldName];
			if((typeof value =='string') && value.match(/[А-ЯІЄЇҐ]/img))
				value="'"+value+"'";
			return value;
		};

		if(command=='insert'){//INSERT INTO Table (name) VALUES($1) 
			let fields='', values='';
			attrs.forEach(function(fieldName, idx) {
				fields+=(idx?', ':'')+fieldName;
				values+=(idx?', ':'')+prepareValue(fieldName);
			});
			query+='('+fields+') VALUES('+values+')';
		};

		if(command=='update'){//UPDATE Table SET name = $1 WHERE id=$2
			query+=' SET ';
			attrs.forEach(function(fieldName, idx) {
				query+='\n '+(idx?',':' ')+fieldName+' = '+prepareValue(fieldName);
			});
		};

		if(id>0)
			sWhere=' id='+id;
		if(where)
			sWhere+=where;
		if(sWhere)
			query+='\nWHERE '+sWhere;

		if(command=='insert' || command=='update')
			query+='\nRETURNING * ';

		return query;
	}//prepareQuery

}

module.exports = CustomResourceController;