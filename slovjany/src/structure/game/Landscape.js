import  { CELL, aPointSect }  from './../../common/system';
import  enums  from './../../common/enums';


function stage(Name){
	return enums.id('stage',Name);
}

class Landscape{

	constructor(){
		this.cells = [];
		this.width = 0;
		this.height = 0;
	}

	resize(width,height){
		this.width = width;
		this.height = height;
		this.cells = new Array(this.height*this.width);
	}


	inGame(i,j){
//		let res=8;
//  if not((i in[0..h-1])and(j in[0..w-1]))then result:=aGo[d(i,h),d(j,w)];

//  Math.sign(i) Math.sign(i-this.height) 

//  -100       0           h          10000
//       -1    0      1    1    1
//       -1   -1     -1    0    1
//       -2   -1      0    1    2

		let i1=Math.sign( Math.sign(i-1) + Math.sign(i-this.height) )+1;
		let j1=Math.sign( Math.sign(j-1) + Math.sign(j-this.width) )+1;
		return aPointSect[i1][j1];
	}


	getCell(i,j){
		if(this.inGame(i,j)==8)
			return this.cells[i*this.width+j]
		else
			return [];//?
	}

	getCellValue(i,j,stageName){
		//return this.getCell(i,j)[stage(stageName)]
		let cell = this.getCell(i,j);
		let k=stage(stageName);
		return cell[k];
	}

	setCellValue(i,j,stageName,value){
		//this.getCell(i,j)[stage(stageName)] = value;
		let cell = this.getCell(i,j);
		let k=stage(stageName);
		cell[k] = value;
	}


	getGround(i,j){
		return this.getCellValue(i,j,'Grounds');
	}
	setGround(i,j,map){
		this.setCellValue(i,j,'Grounds',map);
	}

	getRough(i,j){
		return this.getCellValue(i,j,'Roughs');
	}
	setRough(i,j,map){
		this.setCellValue(i,j,'Roughs',map);
	}

	getCarpet(i,j){
		return this.getCellValue(i,j,'Carpets');
	}
	setCarpet(i,j,map){
		this.setCellValue(i,j,'Carpets',map);
	}

	getWealth(i,j){
		return this.getCellValue(i,j,'Wealths');
	}
	setWealth(i,j,map){
		this.setCellValue(i,j,'Wealths',map);
	}

	getSeeing(i,j){
		return this.getCellValue(i,j,'Seeings');
	}
	setSeeing(i,j,map){
		this.setCellValue(i,j,'Seeings',map);
	}


/*
колізії серед динам
чи можна проплити? чи легко проплити? втопитись?
чи можна пройти? чи легко пройти? послизнутись? загрузнути?
чи можна будувати? (дім, порт, шахту) checkMaket
що відображати в комірці

де рубити дерево?
чи можна їсти траву?
*/

/*
source are
	map in cell[Wealths]
	map in cell[Roughs ] = gory ????????
	map in cell[Carpets] = sneg,led????????
	колода на полі (TsrtObject?) ????
	simple building or ship ???????
	rch in neset skill, in Voz
	rch in Riches
*/

}

export default Landscape;