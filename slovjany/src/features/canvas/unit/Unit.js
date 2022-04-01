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
			canvasRef:props.canvasRef,
		};
		//?//this.state.gameCanvas.state.u.push(this);
		//this.state.



	};

	printUnit(){
	let canvasRef=this.state.gameCanvas.state.canvasRef;//this.state.canvasRef;
	//console.log(this.props);
	//console.log(canvasRef);
	if(canvasRef){
      let cnv = canvasRef.current.canvas;
      let ctx = canvasRef.current.ctx;

      //console.log('ctx=');
      //console.log(ctx);

      let canvasToExport = cnv.drawing;
      let context = canvasToExport.getContext("2d"); //cache height and width

      let width = canvasToExport.width;
      let height = canvasToExport.height; //get the current ImageData for the canvas

      let storedImageData = context.getImageData(0, 0, width, height); //store the current globalCompositeOperation


      let imageData = storedImageData;//ctx.getImageData(0, 0, cnv.width, cnv.height);
      let data=imageData.data;

        let num=Math.round(this.state.unit.y)*4*1000 + Math.round(this.state.unit.x)*4;
        data[num+0]=153;
        data[num+1]=152;
        data[num+2]=51;
        data[num+3]=255;

      context.putImageData(imageData,0,0);
 		};		
	};

	
	render(){
		return (<div>{this.printUnit()}</div>);
/*
		return (
			<div
				className="game-unit"
				key={this.props.id}
				style={{
					width:this.props.width+'px',
					height:this.props.height+'px',
					left:this.props.x+'px',
					top:this.props.y+'px', 
				}}>
				<b>{this.props.name}</b>
			</div>
		);
*/
	};
};





export default Unit