import  enums  from './../../common/enums';

class Rich{

	constructor(rchType){
		this.rchType = rchType;
		this.count = 0;
	}

	pay(count){
		this.count+=count;
	}

}

/*
aMapType  -> aRchType by Mining
aUnitType -> aRchType by Hunting
aRchType  -> aRchType by Converting
aUnitType <- aRchType by Paying (Training)
aUnitType <- aUnitType by Updating
find Hold for aRchType by Holding
*/

class Richment{

	constructor(){
		this.riches = [];
	}

	rchIndex(rchType){
		for(let i=0; i<this.riches.length; i++)
			if(this.riches[i].rchType==rchType)
				return i;
		return -1;
	}

	add(rchType){
		this.riches.push(new Rich(rchType));
		return this.riches.length-1;
	}

	pay(rchType, count){
		let i=this.rchIndex(rchType);
		if(i<0)
			i=this.add(rchType);
		this.riches[i].pay(count);
	}

}

export { Rich, Richment };