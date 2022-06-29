class UserInfo{

	constructor(){
		this.name='';
		this.login='';
	}

	logIn(name,login){
		this.name=name;
		this.login=login;
	}

	logOut(){
		this.name='';
		this.login='';
	}

}

export default UserInfo;