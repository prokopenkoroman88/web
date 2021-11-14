import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import { useSelector, useDispatch } from 'react-redux';
//import { Counter } from '../../features/counter/Counter';//!))))
import { Counter } from '../../counter/Counter';//!))))



class Unit extends React.Component{
	constructor(props){
		super(props);
		this.state={
			gameCanvas:props.owner,
			name:props.name,
			height:props.h,
			width:props.w,
			x:props.x,
			y:props.y,
		};
		this.state.gameCanvas.state.u.push(this);
		//this.state.
	};
	
	render(){
		return (
			<div className="game-unit" style={{ width:this.state.width+'px', height:this.state.height+'px', left:this.state.x+'px', top:this.state.y+'px',   }}>
				<b>{this.state.name}</b>
				{/*<Counter />*/}
			</div>
		);
	};
};





export default Unit