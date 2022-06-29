import React, { useState, useEffect, useRef } from 'react';
import ReactDOM from 'react-dom';
import { useSelector, useDispatch } from 'react-redux';



class CustomPlace extends React.Component{
	constructor(props){
		super(props);
		this.state={
			place:props.place,
			worldMapCanvas:props.worldMap,
			name:props.place.name,
			//height:props.unit.h,
			//width:props.unit.w,
			x:props.place.cx,
			y:props.place.cy,
			//canvasObj:props.canvasObj,
		};
		this.state.place.tag=this;
		console.log('place:',this.state.x,this.state.y,this.state.name);
		//?//this.state.worldMapCanvas.state.u.push(this);
		//this.state.



	};

	componentDidMount(){
		//
	}

	componentWillUnmount(){
		//
	}


	printUnit(){
/*
		//console.log('printUnit');
		//let canvasObj = this.state.canvasObj;
		let canvasObj = this.state.worldMapCanvas.state.canvasObj;
		//console.log(canvasObj);//
		if(canvasObj && canvasObj.ctx){// && canvasObj.current
			//console.log(canvasObj);//
			canvasObj.setRGB(this.state.unit.x,this.state.unit.y,[200,100,50,255]);
			//canvas.put();
			//?//canvasObj.ctx.putImageData(canvasObj.imageData,0,0);
		};
 		return null;
*/
		//let style = `position : "absolute"; left: {$this.state.x}px; top: {$this.state.y}px;  `;
		let style = {
			position : 'absolute',
			left: this.state.x+'px',
			top: this.state.y+'px',
		}
		//<div style={style} onClick={this.openSavings.bind(this)} >
		return(
			<div style={style} onClick={this.props.onClick} >
				<span>{this.state.name}</span>
				{this.props.children}
			</div>
		)
	};

	render(){
		return this.printUnit();
	};
};


//==================== Place =====================

class Place extends React.Component{
	constructor(props){
		super(props);
		this.state={
			place:props.place,
			worldMap:props.worldMap,
			name:props.place.name,
		};
		this.state.place.tag=this;
		console.log('place:',this.state.x,this.state.y,this.state.name);
		//?//this.state.worldMapCanvas.state.u.push(this);
		//this.state.



	};

	componentDidMount(){
		//
	}

	componentWillUnmount(){
		//
	}

	render(){
		return (
			<CustomPlace
						worldMap={this.props.worldMap}
						place={this.props.place}
						canvasObj={this.props.canvasObj}

			/>
		);
	};
};

//==================== Level =====================

class Level extends React.Component{
	constructor(props){
		super(props);
		this.state={
			place:props.place,
			worldMap:props.worldMap,
			name:props.place.name,
			opened:false,
		};
		this.state.place.tag=this;
		console.log('place:',this.state.x,this.state.y,this.state.name);
		//?//this.state.worldMapCanvas.state.u.push(this);
		//this.state.
		console.log(this.props.place.savings);


	};

	componentDidMount(){
		//
	}

	componentWillUnmount(){
		//
	}


	move(dx,dy){
		this.state.place.cx+=dx;
		this.state.place.cy+=dy;
		this.setState({x:this.state.place.cx, y:this.state.place.cy});


	}

	openSavings(e){
		this.state.place.readSavings();
		//let levelName=this.state.name;
		//this.props.worldMap.readSavings(levelName);

		this.setState({opened:true});
	}

	choiceSaving(e){
		console.log(this);
		//this.move(1,1);
		//this.state.worldMapCanvas.props.onPlayModeChange( enums.id('pm','Level'));
		let levelName=this.state.name;
		let savingName=e.target.innerHTML;
		this.props.onChoice( levelName, savingName );
		console.log(e);
		
		
		console.log(this.state.worldMap.places);


		//this.state.worldMapCanvas.state.worldMap.places.list[0].cx+=20;
		//let worldMap1=this.state.worldMapCanvas.state.worldMap;
		//worldMap1.places.list[0].cx+=20;
		//this.state.worldMapCanvas.setState({worldMap:worldMap1});

		//
		console.log('this.state.place.cx='+this.state.place.cx+', '+this.state.x);
		//this.worldMapCanvas.
	};

	render(){
		return (
			<CustomPlace
						worldMap={this.props.worldMap}
						place={this.props.place}
						canvasObj={this.props.canvasObj}
						onClick={this.openSavings.bind(this)}
			>
				{this.state.opened &&
				<ul>
					<li onClick={this.choiceSaving.bind(this)}>З початку</li>
				{this.props.place.savings.map((saving,i)=>
					<li key={'saving-'+i} onClick={this.choiceSaving.bind(this)} >{saving+' '+i}</li>
				)}
				</ul>}
			</CustomPlace>
		);
	};
};



export { Place, Level };