import React, { useState, useEffect, useRef } from 'react';
import ReactDOM from 'react-dom';
import { useSelector, useDispatch } from 'react-redux';
import './riches.css';


class RichItem extends React.Component{
	constructor(props){
		super(props);
		this.state={
			//rchType:props.rich.rchType,
			//count:props.rich.count,
		};
	};
	richClass(){
		let res = 'rich '+this.props.rich.rchType;
		return res;
	}
	countClass(){
		let res='count';
		if(this.props.rich.count<100)
			res+=' red';
		return res;
	}
	count(){
		return this.props.rich.count;
	}
	render(){
		return (
			<div className={this.richClass()}>
				<div className="pic"/>
				<div className={this.countClass()}>{this.count()}</div>  
			</div>
		)
	};
};//


class RichGroup extends React.Component{//???
	constructor(props){
		super(props);
		this.state={
			opened:true,
		};
	};

	grpClass(){
		let res = 'grp'+this.state.opened?'':' closed';
		return res;
	}
	render(){
		return (
			<div className={this.grpClass()}>
 			{this.state.riches.map((rich,i)=>
				<RichItem
					key={'rch-'+rich.rchType}
					rich={rich}
				/>
			)}
			</div>
		)
	};//
/*
					<div className="sep">
					</div>
					<div className="rich gold">
						<div className="pic"></div>
						<div className="count">12300</div>  
					</div>
*/
};//

class RichesBar extends React.Component{
	constructor(props){
		super(props);
		this.state={
			riches:props.riches,
		};
	};

	init(riches){
		this.groups=[];
		//RichGroup
	};

	render(){
		return (
			<div className="riches">
			{this.init(this.state.riches)}
			{this.state.riches.map((rich,i)=>
				<RichItem
					key={'rch-'+rich.rchType}
					rich={rich}
				/>
			)}
			</div>
		);
	};
};//


export default RichesBar
