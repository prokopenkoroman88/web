class CustomController{
	constructor(table, modelClassName='CustomModel'){
		this.table = table;
		this.ModelClass = require('./../models/'+modelClassName);
		this.model = new this.ModelClass(this.table);
	}

/*
	async simpleQuery(req, res) {
			try{
				const params = [];///?
				const { id } = req.params;
				const obj = req.body;

				const result = this.model.runQuery(command, id, obj,'');

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
	}
*/
/*
	async resourceQuery(req, res) {
			try{
				const params = [];///?
				const { id } = req.params;
				const obj = req.body;

				const result = this.model.runQuery(command, id, obj,'');

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
	}
*/
	index(){
		const result = this.model.getAll();
		return result;
	}

	create(){
		const result = {obj:{}, view:'create.html'};//???
		//view editor form
		return result;
	}

	store(obj){
		const result = this.model.add(obj);
		return result;
	}

	show(id){
		const result = this.model.getById(id);
		return result;
	}

	edit(id){
		const obj = this.model.getById(id);
		const result = {obj, view:'edit.html'};//???
		//view editor form
		return result;
	}

	update(id, obj){
		const result = this.model.edit(id,obj);
		return result;
	}

	destroy(id){
		const result = this.model.del(id);
		return result;
	}

}

module.exports = CustomController;