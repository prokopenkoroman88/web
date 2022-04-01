import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import CanvasDraw from "react-canvas-draw";
import { useSelector, useDispatch } from 'react-redux';
//import { Counter } from '../../features/counter/Counter';//!))))
import { Counter } from '../counter/Counter';//!))))
import  Unit  from './unit/Unit';


class GameCanvas extends React.Component{
	constructor(props){
		super(props);
		this.state={
			/*
			name:props.name,
			height:props.height,
			width:props.width,
			u:[],
			*/
			//units:props.units,
			world:props.world,
			int1:null,
			canvasRef:props.canvasRef,//null,//useRef(null),
		};
		this.int2=null;
	};
	

	init(e){

		console.log(e);
		console.log(this);
		let w=this.props.world.width;
		let h=this.props.world.height;

		for(let i=0; i<10; i++){
			let chng = {x:Math.random()*w, y:Math.random()*h,};
			this.props.world.u.push(chng);
		};


		this.props.onInit(e);
	//	this.state.int1=()=>{setInterval(this.clock, 1000)};
		//this.setState({int1:(e)=>{setInterval(function(e){console.log('int1');}, 1000)},});

		//this.render();
		//this.clock(e);
	};

	clock(e){
		console.log('GameCanvas.clock:');
		console.log(e);
		console.log(this);
		for(let i=0; i<this.props.world.u.length; i++){
			this.props.world.u[i].x+=(Math.random()*10-5);
			this.props.world.u[i].y+=(Math.random()*10-5);
			//this.props.world.u[i].setState({x : this.props.world.u[i].x+Math.random()*10-5  });
			//this.props.world.u[i].setState({y : this.props.world.u[i].y+Math.random()*10-5  });
			//this.state.u[i].x = this.state.u[i].x+Math.random()*10-5;
			//this.state.u[i].y = this.state.u[i].y+Math.random()*10-5;
			//this.setState({u[i].x : u[i].x+Math.random()*10-5  });
			//this.setState({u[i].y : u[i].y+Math.random()*10-5  });

		};


	};

	render(){
		return (
			<div className="game-canvas">
				<button onClick={(e)=>this.init}>init</button>
				<ul style={{ width:this.props.world.width+'px', height:this.props.world.height+'px'  }}>
					<li>first "{this.props.world.name}"</li>
					<li>second "{this.name}"</li>
					<li>third ""</li>
				</ul>
				{/*<Counter />*/}

				<div>
				{this.state.world.u.map((unit,i)=>
				<Unit owner={this} unit={unit}/>
			)}
				</div>
				{/*this.state.units.map((unit,i)=>{
					console.log('maap'+i);
				(<Unit owner={this} name="M" h="32" w="32" x={unit.x} y={unit.y} />)
				<canvas width="1200" height="300" style={{ position:'absolute', top:'0px', left:'0px'}} ></canvas>


			})*/}
				<p><b>{this.props.step} - {this.state.world.u.length}</b></p>
				<CanvasDraw
					ref={this.state.canvasRef}
					canvasWidth={1000}
					canvasHeight={500}
				/>
			</div>
		);
	};
};





export default GameCanvas

