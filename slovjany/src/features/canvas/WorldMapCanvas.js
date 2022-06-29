import React, { useState, useEffect, useRef } from 'react';
import ReactDOM from 'react-dom';
import { useSelector, useDispatch } from 'react-redux';
import  enums  from './../../common/enums';
import  { RealCanvas }  from './../../painting/canvases';
import map from './../../painting/images/world-map.jpg';
import { Place, Level } from './unit/Place';


class WorldMapCanvas extends React.Component{
	constructor(props){
		super(props);
		this.state={
			worldMap:props.worldMap,
			canvasRef:props.canvas.ref,//null,//useRef(null),
			canvasObj:props.canvas.obj,
		};
		//const [step, setStep] = useState(0);
		//this.canvasRef = null;//useRef(null);
		//?//
//		this.init(null);
//		const clock=(e,world)=>{this.clock(e,this)};//this.state.world
		//?//
//		this.int2=setInterval(clock, 125*20);//null;
		this.int2=setInterval(this.clock.bind(this), 125*20);
		this.state.worldMap.load();
		this.painted=0;
	};

	componentDidMount(){
	};

	clock(){
		if((!this.state.canvasObj || !this.state.canvasObj.current) && this.state.canvasRef && this.state.canvasRef.current){
			this.setState({canvasObj : new RealCanvas(this.state.canvasRef)});
			//console.log(this.state.canvasObj);

			//let imgMap = RealCanvas.newImage(map);//(this.state.worldMap.map_img);//!!!
			//let imgMap = RealCanvas.newImage('./../../painting/images/world-map.jpg');
			//let imgMap = RealCanvas.newImage('./images/world-map.jpg');
			console.log('this.painted = '+this.painted);
			if(this.painted<2){
				let imgMap = RealCanvas.newImage(this.state.worldMap.map_img);//!!!
				this.state.canvasObj.applImage(imgMap,{x:0,y:0});
				this.painted++;
			};

		};

	};

	handleLevelChoice(levelName, savingName){
		this.props.onLevelChoice( levelName, savingName );
		//this.props.onPlayModeChange( enums.id('pm','Level'));
	}

	componentWillUnmount(){
		//
		clearInterval(this.int2);
	}

	putData(){
		//console.log('this.canvas='+(!this.state.canvasObj?'Null':'ready'));
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
			<div className="worldmap-canvas">
				<canvas
					ref={this.state.canvasRef}
					width={this.state.worldMap.width}
					height={this.state.worldMap.height}
				/>
				{/*<img src={map} />*/}
				{this.state.worldMap.places.list.map((place,i)=>
					<Place
						key={'place-'+i}
						worldMap={this.state.worldMap}
						place={place}
						canvasObj={this.state.canvasObj}
					/>
				)}
				{this.state.worldMap.levels.list.map((place,i)=>
					<Level
						key={'level-'+i}
						worldMap={this.state.worldMap}
						place={place}
						canvasObj={this.state.canvasObj}
						onChoice={this.handleLevelChoice.bind(this)}
					/>
				)}
				{this.putData()}
			</div>
		);
	};
};

export default WorldMapCanvas