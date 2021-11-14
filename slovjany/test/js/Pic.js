export class ColorMap {

	constructor(height,width,bRes=true){
		this.height=height;
		this.width=width;

		this.data = new Uint8ClampedArray(this.height*this.width*4);
		//Uint8ClampedArray()
		//https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Global_Objects
		//https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Uint8ClampedArray/Uint8ClampedArray
		// polifill: https://github.com/zloirock/core-js#ecmascript-typed-arrays
/*
		this.canvas=document.querySelector(selector);//'#game-field canvas'
		this.canvas.height=1000;
		this.canvas.width=1000;
		this.ctx = this.canvas.getContext('2d');
		this.imageData = this.ctx.getImageData(0, 0, this.canvas.width, this.canvas.height);
*/
	}


	setRGB(x,y,rgba){
		let i = (y*this.width+x) * 4;
		//this.imageData.data.splice(i, 4, rgba);
		for(let j=0; j<4; j++)
		this.data[i+j]=rgba[j];//rgba=[r,g,b,a]//.imageData.data[i+j]
		//console.log(x, y, i, rgba[0], this.imageData.data[i+0]);

	}

	getRGB(x,y){
		let rgba=[];
		let i = (y*this.width+x) * 4;
		//this.imageData.data.splice(i, 4, rgba);
		for(let j=0; j<4; j++)
		rgba.push(this.data[i+j]);//rgba=[r,g,b,a]
		return rgba;
	}

	paintRect(x,y,w,h,rgba){//+16.7.21
		for(let i=0; i<h; i++)
			for(let j=0; j<w; j++)
				this.setRGB(x+j, y+i, rgba);
	}







}//class ColorMap