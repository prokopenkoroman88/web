import React, { useState } from 'react';
import ReactDOM from 'react-dom';
//import { useSelector, useDispatch } from 'react-redux';
//import { Counter } from '../../features/counter/Counter';//!))))
//import { Counter } from '../counter/Counter';//!))))


class ToolPanel extends React.Component{
	constructor(props){
		super(props);
		this.state={
			height:props.h,
			width:props.w,
		};
	};

	init(){
		//
	}

	render(){
		return (
			<div style={{ width:this.state.width+'px', height:this.state.height+'px'  }}>
				<button onClick={()=>this.init()}>init</button>
				<button onClick={()=>this.init()}>init</button>
				<button onClick={()=>this.init()}>init</button>
			</div>
		);
	};
};





export default ToolPanel