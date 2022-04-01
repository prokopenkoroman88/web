import { Loader, ResourceLoader } from './Loader';

class Tribe extends ResourceLoader{
	constructor(){
		super('tribes');
	}
}

class Character extends ResourceLoader{
	constructor(){
		super('characters');
	}
}

class Alphabet extends ResourceLoader{
	constructor(){
		super('alphabets');
	}
}

export { Tribe, Character, Alphabet }