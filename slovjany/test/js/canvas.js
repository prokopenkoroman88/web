//*
//class Canvas extend ColorMap{
class Canvas {

	constructor(selector){
		this.init(selector);
	}

	init(selector){
		this.canvas=document.querySelector(selector);//'#game-field canvas'

		//?//this.resize(400,500);
	}

	resize(height,width){
		this.ctx = this.canvas.getContext('2d');
		this.canvas.height=height;//1400;
		this.canvas.width=width;//1500;
		this.imageData = this.ctx.getImageData(0, 0, this.canvas.width, this.canvas.height);
		this.data=this.imageData.data;//+16.7.21 !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!)))))))))))))))))))))))

	}

	setRGB(x,y,rgba){
		let i = (y*this.canvas.width+x) * 4;
		//this.imageData.data.splice(i, 4, rgba);
		for(let j=0; j<4; j++)
		this.data[i+j]=rgba[j];
		//this.imageData.data[i+j]=rgba[j];//rgba=[r,g,b,a]
		//console.log(x, y, i, rgba[0], this.imageData.data[i+0]);

	}

	getRGB(x,y){
		let rgba=[];
		let i = (y*this.canvas.width+x) * 4;
		//this.imageData.data.splice(i, 4, rgba);
		for(let j=0; j<4; j++)
		rgba.push(this.data[i+j]);
		//rgba.push(this.imageData.data[i+j]);//rgba=[r,g,b,a]
		return rgba;
	}

	paintRect(x,y,w,h,rgba){//+16.7.21
		for(let i=0; i<h; i++)
			for(let j=0; j<w; j++)
				this.setRGB(x+j, y+i, rgba);
	}


	applMap(x,y, cm){//(x,y, ColorMap cm)
		let h=cm.height;
		let w=cm.width;
		for(let i=0; i<h; i++)
			for(let j=0; j<w; j++)
				this.setRGB(x+j, y+i, cm.getRGB(j,i));
/*
			{
				let rgba = [];
				for(let k=0;k<4;k++){
					rgba[k]=cm.getRGB(j,i)
				};
				this.setRGB(x+j, y+i, rgba);
			};
*/
	}



};//class Canvas
//*/


/*
for(let i=0; i<imageData.data.length; i+=4){


let y=Math.floor(i/(4*canvas.width));
let x=Math.floor((i-y*4*canvas.width)/4);

if(((y) % 32)==0  )continue;
if(((x) % 32)==0  )continue;

imageData.data[i+0]=100+Math.random()*25;
imageData.data[i+1]=200+Math.random()*50;
imageData.data[i+2]=50+Math.random()*50;
imageData.data[i+3]=255;

};
*/


function normByte(value){
	if(value<0) return 0;
	if(value>255) return 255;
	return value;
};


function encodeColor(r,g,b,a=255){
	r=normByte(r);
	g=normByte(g);
	b=normByte(b);
	a=normByte(a);
	return [r,g,b,a];
};

// (r,g,b,a) [r,g,b,a] {r,g,b,a} '#rrggbb'?  'rgba(,,,)'



function rand(rgba,diap){
	for(let i=0; i<3; i++)
		rgba[i]=normByte(rgba[i]+Math.random()*diap-diap/2);
	rgba[3]=255;
	return rgba;
};



/*

imageData.data[i+0]=100+Math.random()*25;
imageData.data[i+1]=200+Math.random()*50;
imageData.data[i+2]=50+Math.random()*50;
imageData.data[i+3]=255;
*/




let gf=document.querySelector('#game-field');
gf.style.height = '2000px';
gf.style.width = '2500px';


var pb = new Canvas('#game-field canvas.dn');
pb.resize(2000,2500);

var pb2 = new Canvas('#game-field canvas.up');
pb2.resize(2000,2500);
pb2.paintRect(0,0,250,200,[255,128,255,100]);//+16.7.21

//?? pb2

var img = new Image();
var png = new Image();
//canvas.crossOrigin = 'anonymous';//?

img.src = 'images/z0.bmp';
png.src = 'images/favicon.png';
//img.crossOrigin = 'anonymous';
//png.crossOrigin = 'anonymous';


png.addEventListener('load',function(){
//????????//canvas=document.querySelector('#game-field canvas');//'.canvas'
pb.init('#game-field canvas.dn');

let x0=15,y0=3,w=90,h=70;
//

console.log('canvas.width='+pb.canvas.width);
console.log('canvas.height='+pb.canvas.height);

//?	ctx.drawImage(img,x0,y0,w,h);

x0=1;y0=13;

//?	ctx.drawImage(png,x0,y0,w,h);


//img.crossOrigin = 'anonymous';
//png.crossOrigin = 'anonymous';
//img.style.display='none';
//png.style.display='none';






});//png.load

//document.body.
pb.canvas.onmousemove = function(){

//canvas=document.querySelector('.canvas');
//ctx = canvas.getContext('2d');
//console.log('canvas.width='+canvas.width);
//console.log('canvas.height='+canvas.height);
pb.ctx.beginPath();
pb.ctx.moveTo(10,94);
pb.ctx.lineTo(90,94);

pb.ctx.stroke();
};


//img.src = 'images/z1.bmp';





function click(){


//img.style.display='none';

let x0=15,y0=3,w=50,h=70;
x0=1;y0=13;
//?	ctx.drawImage(png,x0,y0,w,h);
png.style.display='none';
//img.crossOrigin = 'anonymous';
//png.crossOrigin = 'anonymous';

var imageData = pb.imageData;//???????????//ctx.getImageData(0, 0, canvas.width, canvas.height);


x0=5;y0=4;


//????????????????//



console.log('imageData.length='+imageData.data.length);


for(let y=0; y<pb.canvas.height; y++){
	for(let x=0; x<pb.canvas.width; x++){

		if(((y) % 32)==0  )continue;
		if(((x) % 32)==0  )continue;

		let rgba=rand([125,225,75,255],50);
		pb.setRGB(x,y,rgba);
	};//x++
};//y++



/*
for(let i=0; i<imageData.data.length; i+=4){


let y=Math.floor(i/(4*canvas.width));
let x=Math.floor((i-y*4*canvas.width)/4);

if(((y) % 32)==0  )continue;
if(((x) % 32)==0  )continue;

imageData.data[i+0]=100+Math.random()*25;
imageData.data[i+1]=200+Math.random()*50;
imageData.data[i+2]=50+Math.random()*50;
imageData.data[i+3]=255;

};
//*/

  pb.ctx.putImageData(imageData,0,0);
console.log('E');


//?	
w=32;h=32;
pb.ctx.drawImage(png,x0,y0,w,h);





};//func click

document.querySelector('button').onclick=click;

	






//======================================================================
/*
var canvas=document.querySelector('#game-field canvas'); //'.canvas'
canvas.height=1000;
canvas.width=1000;

var ctx = canvas.getContext('2d');

var img = new Image();
var png = new Image();
//canvas.crossOrigin = 'anonymous';//?

img.src = 'images/z0.bmp';
png.src = 'images/favicon.png';
//img.crossOrigin = 'anonymous';
//png.crossOrigin = 'anonymous';


png.addEventListener('load',function(){
canvas=document.querySelector('#game-field canvas');//'.canvas'

let x0=15,y0=3,w=90,h=70;
//

console.log('canvas.width='+canvas.width);
console.log('canvas.height='+canvas.height);

//?	ctx.drawImage(img,x0,y0,w,h);

x0=1;y0=13;

//?	ctx.drawImage(png,x0,y0,w,h);


//img.crossOrigin = 'anonymous';
//png.crossOrigin = 'anonymous';
//img.style.display='none';
//png.style.display='none';






});//png.load

//document.body.
canvas.onmousemove= function(){

//canvas=document.querySelector('.canvas');
//ctx = canvas.getContext('2d');
//console.log('canvas.width='+canvas.width);
//console.log('canvas.height='+canvas.height);
ctx.beginPath();
ctx.moveTo(10,94);
ctx.lineTo(90,94);

ctx.stroke();
};


//img.src = 'images/z1.bmp';





function click(){


//img.style.display='none';

let x0=15,y0=3,w=50,h=70;
x0=1;y0=13;
//?	ctx.drawImage(png,x0,y0,w,h);
png.style.display='none';
//img.crossOrigin = 'anonymous';
//png.crossOrigin = 'anonymous';

var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);


x0=5;y0=4;



console.log('A'+imageData.data[  y0*4*canvas.width + x0*4 +0 ]);

 imageData.data[  y0*4*canvas.width + x0*4 +0 ] = 55; //0..255  rgba
console.log('A'+imageData.data[  y0*4*canvas.width + x0*4 +0 ]);
console.log('B');
 imageData.data[  y0*4*canvas.width + x0*4 +1 ] = 22; 
console.log('C');
 imageData.data[  y0*4*canvas.width + x0*4 +2 ] = 35; 
console.log('D');
 imageData.data[  y0*4*canvas.width + x0*4 +3 ] = 255; 


console.log('imageData.length='+imageData.data.length);

// *
for(let i=0; i<imageData.data.length; i+=4){


let y=Math.floor(i/(4*canvas.width));
let x=Math.floor((i-y*4*canvas.width)/4);

if(((y) % 32)==0  )continue;
if(((x) % 32)==0  )continue;

imageData.data[i+0]=100+Math.random()*25;
imageData.data[i+1]=200+Math.random()*50;
imageData.data[i+2]=50+Math.random()*50;
imageData.data[i+3]=255;

};
// * /

  ctx.putImageData(imageData,0,0);
console.log('E');


//?	
ctx.drawImage(png,x0,y0,w,h);





};//func click

document.querySelector('button').onclick=click;

*/