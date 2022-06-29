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
			//height:props.unit.h,
			//width:props.unit.w,
			x:props.unit.x,
			y:props.unit.y,
			canvasObj:props.canvasObj,
		};
		//?//this.state.gameCanvas.state.u.push(this);
		//this.state.



	};

componentDidMount(){
	this.state.unit.tag=this;//?
}

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

	renderUnit(){
			return(
			<div
				className="game-unit"
				key={this.props.id}
				style={{
					width:this.props.unit.w+'px',
					height:this.props.unit.h+'px',
					left:Math.round(this.state.x)+'px',
					top:Math.round(this.state.y)+'px',
					backgroundImage:'url(./images/units/man.bmp)',//in public/
					//backgroundImage:'url(./../../../painting/images/units/man.bmp)',
					//backgroundPosition: '-64px -160px',//'64px 160px',
					//backgroundPosition: Math.round(-Math.random()*9)*32+'px '+ Math.round(-Math.random()*18)*32+'px' //'bottom right'
					backgroundPosition: this.state.unit.mapJ*-32+'px '+ this.state.unit.mapI*-32+'px', //'bottom right'
				}}>
				{/*<b>{this.state.name}</b>*/}
			</div>
			)
	}

	render(){
		//
		if(this.state.gameCanvas.state.renderWay=='tagsRender')//'tagsRender','tagsPaint','allCanvas','rects'
			return this.renderUnit();
		if(this.state.gameCanvas.state.renderWay=='tagsPaint')//'tagsRender','tagsPaint','allCanvas','rects'
		return this.printUnit();
	};
};





export default Unit