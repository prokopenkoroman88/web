import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import { useSelector, useDispatch } from 'react-redux';
//import { Counter } from '../../features/counter/Counter';//!))))
import { Counter } from '../../counter/Counter';//!))))



class Unit extends React.Component{
	constructor(props){
		super(props);
		this.state={
			unit:props.unit,
			gameCanvas:props.owner,
			name:props.unit.name,
			height:props.unit.h,
			width:props.unit.w,
			x:props.unit.x,
			y:props.unit.y,
			canvasObj:props.canvasObj,
		};
		//?//this.state.gameCanvas.state.u.push(this);
		//this.state.



	};

	printUnit(){
		//console.log('printUnit');
		//let canvasObj = this.state.canvasObj;
		let canvasObj = this.state.gameCanvas.state.canvasObj;
		//console.log(canvasObj);//
		if(canvasObj && canvasObj.ctx){// && canvasObj.current
			//console.log(canvasObj);//
			canvasObj.setRGB(this.state.unit.x,this.state.unit.y,[200,100,50,255]);
			//canvas.put();
			//?//canvasObj.ctx.putImageData(canvasObj.imageData,0,0);
		};
 		return null;
	};

	
	render(){
		return this.printUnit();
	};
};





export default Unit