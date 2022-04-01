import axios from 'axios';

class Loader{
	constructor(){
		this.host = axios.create({
			//https://axios-http.com/docs/req_config
			baseURL: process.env.REACT_APP_API_URL || 'http://localhost:5000',
		});

	}

/*
https://github.com/axios/axios/issues/2825
Чтобы запрос не выполнялся дважды, убрал <React.StrictMode> из index.js
или можно добавить event.preventDefault(); в обработчик 
*/

	showResult(response){
		//console.log('showResult');
		if(response.status === 200){//statusText:"OK"
			//console.log(response.data);
			return response.data;//+?
		};
	}

	showError(error){
		console.log(error.message);
	}

	//main function:
	async request(method, url, obj={}, showResult=null){
		//console.log('request("'+method+'", "'+url+'") beg');
		if(!showResult)
			showResult = this.showResult;
		let res;
		await this.host[method](url, obj).then(async (response) =>{
			res = await showResult(response);
		},this.showError);
		//console.log('request end');
		return res;
	}

}

class ResourceLoader extends Loader{
	constructor(table){
		super();
		this.table = table;
	}

	url(id=0,where=''){
		return '/'+this.table + ((id>0)?'/'+id:'') + ((where)?'/where/'+where:'');
	}

	async getAll(){
		return this.request('get', this.url(), {});
	}

	async getById(id){
		return this.request('get', this.url(id), {});
	}

	async getBy(fieldName, fieldValue){//????
		return this.request('get', this.url(0,fieldName+'='+fieldValue), {});
	}

	async getWhere(where){
		return this.request('get', this.url(0,where), {});
	}

	async add(obj){
		return this.request('post', this.url(), obj);//insert
	}

	async edit(id, obj){
		return this.request('put', this.url(id), obj);//update
	}

	async del(id){
		return this.request('delete', this.url(id), {});//delete
	}

	async delWhere(where=''){
		return this.request('delete', this.url(0,where), {});//delete
	}

}

export { Loader, ResourceLoader }
