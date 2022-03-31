const db = require("./../core/db");//pool

class CustomModel{
	constructor(table){
		this.db = db;//pool
		this.table = table;
	}

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

	async runQuery(command, id, obj, where){
		let params = [];
		let query = this.prepareQuery(command, id, obj, where);
		console.log(' --- ModelQuery: ---\n'+query);//!
		const result = await this.db.query(query, params);
		return result;
	}

	async add(obj){
		const result = this.runQuery('insert', -1, obj);
		return result;
	}

	//async 
	getAll(){
		const result = this.runQuery('select');
		return result;
	}

	getById(id){
		const result = this.runQuery('select', id);
		return result;
	}

	getBy(fieldName, fieldValue){
		const result = this.runQuery('select', -1, {}, fieldName+' = '+fieldValue);
		return result;
	}

	getWhere(where){
		const result = this.runQuery('select', -1, {}, where);
		return result;
	}

	edit(id, obj, where=''){
		const result = this.runQuery('update', id, obj, where);
		return result;
	}

	del(id=-1, where=''){
		const result = this.runQuery('delete', id, {}, where);
		return result;//?
	}

/*
	async customQuery(req, res) {
			try{
				const params = [];///?
				const { id } = req.params;
				const obj = req.body;

				const result = this.runQuery(command, id, obj,'');

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

}

module.exports = CustomModel;