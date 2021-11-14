import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import { useSelector, useDispatch } from 'react-redux';
//import { Counter } from '../../features/counter/Counter';//!))))
import { Counter } from '../counter/Counter';//!))))
import  Unit  from './unit/Unit';


class GameCanvas extends React.Component{
	constructor(props){
		super(props);
		this.state={
			name:props.name,
			height:props.h,
			width:props.w,
			u:[],
		};
	};
	

	init(e){

		console.log(e);
		console.log(this);
		let w=this.state.width;
		let h=this.state.height;

		for(let i=0; i<10; i++){
			let chng = {x:Math.random()*w, y:Math.random()*h,};
			this.state.u.push(chng);
		};



	//	this.state.int1=()=>{setInterval(this.clock, 1000)};

	};

	clock(e){
		console.log('clock:');
		console.log(e);
		console.log(this);
		for(let i=0; i<this.state.u.length; i++){
			this.state.u[i].x = this.state.u[i].x+Math.random()*10-5;
			this.state.u[i].y = this.state.u[i].y+Math.random()*10-5;
			//this.setState({u[i].x : u[i].x+Math.random()*10-5  });
			//this.setState({u[i].y : u[i].y+Math.random()*10-5  });

		};


	};

	render(){
		return (
			<div className="game-canvas">
				<button onClick={()=>this.init()}>init</button>
				<ul style={{ width:this.state.width+'px', height:this.state.height+'px'  }}>
					<li>first "{this.state.name}"</li>
					<li>second "{this.name}"</li>
					<li>third ""</li>
				</ul>
				{/*<Counter />*/}
				{this.state.u.map((unit,i)=>{
					console.log('map'+i);
				(<Unit owner={this} name="M" h="32" w="32" x={unit.x} y={unit.y} />)
			})}
			</div>
		);
	};
};





export default GameCanvas

