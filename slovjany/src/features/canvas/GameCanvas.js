import React, { useState, useEffect, useRef } from 'react';
import ReactDOM from 'react-dom';
//import CanvasDraw from "react-canvas-draw";
import { useSelector, useDispatch } from 'react-redux';
//import { Counter } from '../../features/counter/Counter';//!))))
import { Counter } from '../counter/Counter';//!))))
import  { RealCanvas }  from './../../painting/canvases';
import  Unit  from './unit/Unit';
import  { CELL, aWindRose, aPointSect }  from './../../common/system';
//import  Unit2  from './structure/units/Unit';//?
//import { Artefact, Source, GameUnit, StaticUnit, DynamicUnit, UnitList, Units } from './../../structure/game/Units';//?
import RichesBar from './../riches/RichesBar';



class GameCanvas extends React.Component{
	constructor(props){
		super(props);
		this.state={
			renderWay:'tagsRender',//'tagsRender','tagsPaint','allCanvas','rects'
			game:props.game,
			int1:null,
			canvasRef:props.canvas.ref,//null,//useRef(null),
			canvasObj:props.canvas.obj,
			ticks:0,
		};
		//const [step, setStep] = useState(0);
		//this.canvasRef = null;//useRef(null);
		//?//
//		this.init(null);
//		const clock=(e,world)=>{this.clock(e,this)};//this.state.world
		//?//
//		this.int2=setInterval(clock, 125*20);//null;

		this.int2=setInterval(this.clock.bind(this), 125*1.00020);//null;
		//this.props.game.init();
	};
	

	//init(e){
	componentDidMount(){
		//this.state.canvas = null;

		//console.log(e);
		console.log(this);
		let w=this.props.game.landscape.width;
		let h=this.props.game.landscape.height;



		//this.props.onInit(e);
	//	this.state.int1=()=>{setInterval(this.clock, 1000)};
		//this.setState({int1:(e)=>{setInterval(function(e){console.log('int1');}, 1000)},});
//		const clock=(world)=>{this.clock(this)};//this.state.world
//		this.int2=setInterval(clock, 125*1.00020);//null;


		//this.render();
		//this.clock(e);
	};

	componentWilUnmount(){
		clearInterval(this.int2);
	}

	clock(){
//	const clock=(e)=>{
		console.log('GameCanvas.clock:');
		//console.log(this);
		//console.log(this.state.canvasObj);
		if((!this.state.canvasObj || !this.state.canvasObj.current) && this.state.canvasRef && this.state.canvasRef.current){
			//this.state.canvasObj = new RealCanvas(this.state.canvasRef);
			//this.props.canvasObj = new RealCanvas(this.state.canvasRef);
			this.setState({canvasObj : new RealCanvas(this.state.canvasRef)});
			//console.log(this.state.canvasObj);
		};

		if(this.state.game.richment){
			//
			this.state.game.richment.pay('elka',1);//[1].count++;
		};

		console.log(this.state.game.units.dynamics.list.length);
		for(let i=0; i<this.state.game.units.dynamics.list.length; i++){
			let dx=(Math.random()*10-5);
			let dy=(Math.random()*10-5);


			let x0=this.state.game.units.dynamics.list[i].x+dx;
			let y0=this.state.game.units.dynamics.list[i].y+dy;
			try {
				//game.state.world.u[i].setState({x:x0, y:y0 });
				//game.state.world.u[i] = {...game.state.world.u[i], x:x0, y:y0 };
				this.state.game.units.dynamics.list[i].job = Math.round(Math.random()*6);
				this.state.game.units.dynamics.list[i].see = aPointSect[Math.sign(dy)+1][Math.sign(dx)+1];
				this.state.game.units.dynamics.list[i].x = x0;
				this.state.game.units.dynamics.list[i].y = y0;
				this.state.game.units.dynamics.list[i].tag.setState({x:x0, y:y0});
				//console.log('list['+i+']', game.state.game.units.dynamics.list[i].x, game.state.game.units.dynamics.list[i].y);
			} catch(e) {
				// statements
				console.log(e);
			}

			


			//this.props.world.u[i].setState({x : this.props.world.u[i].x+Math.random()*10-5  });
			//this.props.world.u[i].setState({y : this.props.world.u[i].y+Math.random()*10-5  });
			//this.state.u[i].x = this.state.u[i].x+Math.random()*10-5;
			//this.state.u[i].y = this.state.u[i].y+Math.random()*10-5;
			//this.setState({u[i].x : u[i].x+Math.random()*10-5  });
			//this.setState({u[i].y : u[i].y+Math.random()*10-5  });

		};
		//if(this.state.canvasObj && this.state.canvasObj.ctx)
		//this.setState((state, props) => ({ticks:state.ticks+1}));
		//this.setState({ticks:this.state.ticks+1});

	};

	putData(){
		console.log('putData: this.canvas='+(!this.state.canvasObj?'Null':'ready'));
		//console.log(this.state.canvasObj);
		try {
			if(this.state.canvasObj)
				this.state.canvasObj.put();
		} catch(e) {
			// statements
			console.log(e);
		}
		
	}

	render(){
		return (
			<div className="game-canvas">
				<button onClick={(e)=>this.init}>init</button>
				<div>
				{(this.state.renderWay=='tagsRender' || this.state.renderWay=='tagsPaint') &&
					this.state.game.units.dynamics.list.map((unit,i)=>
					<Unit key={'unit-'+i} owner={this} unit={unit} canvasObj={this.state.canvasObj}/>
				)}
				{this.putData()}
				</div>
				<RichesBar
					riches={this.state.game.richment.riches}
				/>
				<canvas
					ref={this.state.canvasRef}
					width={this.state.game.landscape.width}
					height={this.state.game.landscape.height}
				/>
				{/*
table>tr>td
	ground   межа?   вода???
	rough?
	carpet
	wealth
	static (left top)
	dynam????? out of table
	seeing  above even dynamics!!!
				*/}
			</div>
		);
	};
};





export default GameCanvas

