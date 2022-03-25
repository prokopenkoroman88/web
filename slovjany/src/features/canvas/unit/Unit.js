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
		//?//this.state.gameCanvas.state.u.push(this);
		//this.state.
	};
	
	render(){
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
				{/*<Counter />*/}
			</div>
		);
	};
};





export default Unit