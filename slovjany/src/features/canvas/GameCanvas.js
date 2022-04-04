import React, { useState, useEffect, useRef } from 'react';
import ReactDOM from 'react-dom';
//import CanvasDraw from "react-canvas-draw";
import { useSelector, useDispatch } from 'react-redux';
//import { Counter } from '../../features/counter/Counter';//!))))
import { Counter } from '../counter/Counter';//!))))
import  { RealCanvas }  from './../../painting/canvases';
import  Unit  from './unit/Unit';
import RichesBar from './../riches/RichesBar';


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
			canvasObj:props.canvasObj,
			ticks:0,
		};
		//const [step, setStep] = useState(0);
		//this.canvasRef = null;//useRef(null);
		//?//
		this.init(null);
		const clock=(e,world)=>{this.clock(e,this)};//this.state.world
		//?//
		this.int2=setInterval(clock, 125*20);//null;
	};
	

	init(e){
		//this.state.canvas = null;

		console.log(e);
		console.log(this);
		let w=this.props.world.width;
		let h=this.props.world.height;

		this.props.world.riches.push({rchType:'dub',count:123456});
		this.props.world.riches.push({rchType:'elka',count:50});
		this.props.world.riches.push({rchType:'gold',count:123400});
		this.props.world.riches.push({rchType:'silver',count:456700});

		for(let i=0; i<10; i++){
			let chng = {x:Math.random()*w, y:Math.random()*h,};
			chng.name="M";
			chng.h=32;
			chng.w=32;
			this.props.world.u.push(chng);
		};


		this.props.onInit(e);
	//	this.state.int1=()=>{setInterval(this.clock, 1000)};
		//this.setState({int1:(e)=>{setInterval(function(e){console.log('int1');}, 1000)},});

		//this.render();
		//this.clock(e);
	};

	clock(e,game){
//	const clock=(e)=>{
		console.log('GameCanvas.clock:');
		console.log(this.state.canvasObj);
		if((!this.state.canvasObj || !this.state.canvasObj.current) && this.state.canvasRef && this.state.canvasRef.current){
			//this.state.canvasObj = new RealCanvas(this.state.canvasRef);
			//this.props.canvasObj = new RealCanvas(this.state.canvasRef);
			this.setState({canvasObj : new RealCanvas(this.state.canvasRef)});
			console.log(this.state.canvasObj);
		};

		if(game.state.world.riches){
			//
			game.state.world.riches[1].count++;
		};

		console.log(game.state.world);
		console.log(this);
		console.log(game.state.world.u.length);
		for(let i=0; i<game.state.world.u.length; i++){
			//world.u[i].x+=(Math.random()*10-5);
			//world.u[i].y+=(Math.random()*10-5);


        	let x0=game.state.world.u[i].x+(Math.random()*10-5);
    	    let y0=game.state.world.u[i].y+(Math.random()*10-5);
	        //world.u[i].setState({x:x0,y:y0});
			//world.u[i].y+=(Math.random()*10-5);
			//game.state.world.u[i].x=x0;
			//game.state.world.u[i].y=y0;
			//let u0 = game.state.world.u[i];
			//u0.x=x0;
			//u0.y=y0;
			try {
				game.state.world.u[i].setState({x:x0, y:y0 });
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
		if(this.state.canvasObj && this.state.canvasObj.ctx)
		this.setState({ticks:this.state.ticks+1});

	};

	putData(){
		console.log('this.canvas='+(!this.state.canvasObj?'Null':'ready'));
		console.log(this.state.canvasObj);
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
				{this.state.world.u.map((unit,i)=>
					<Unit key={'unit-'+i} owner={this} unit={unit} canvasObj={this.state.canvasObj}/>
				)}
				{this.putData()}
				</div>
				<p><b>{this.props.step} - {this.state.ticks} - {this.state.world.u.length}</b></p>
				<RichesBar
					riches={this.props.world.riches}
				/>
				<canvas
					ref={this.state.canvasRef}
					width={1000}
					height={500}
				/>
			</div>
		);
	};
};





export default GameCanvas

