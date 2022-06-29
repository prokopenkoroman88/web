import React, { useState, useEffect, useRef } from 'react';
import ReactDOM from 'react-dom';
import { useSelector, useDispatch } from 'react-redux';
import  { RealCanvas }  from './../../painting/canvases';


class LevelTaskCanvas extends React.Component{
	constructor(props){
		super(props);
		this.state={
			mission:props.mission,
			canvasRef:props.canvas.ref,
			canvasObj:props.canvas.obj,
		};
	};

	componentDidMount(){
	}

	componentWillUnmount(){
	}

	putData(){
		console.log('this.canvas='+(!this.state.canvasObj?'Null':'ready'));
		console.log(this.state.canvasObj);
		try {
			if(this.state.canvasObj)
				this.state.canvasObj.put();
		} catch(e) {
			console.log(e);
		}
	}

	render(){
		return (
			<div className="leveltask-canvas">
				<canvas
					ref={this.state.canvasRef}
					width={1000}
					height={500}
				/>
				{this.putData()}
			</div>
		);
	};
};

export default LevelTaskCanvas