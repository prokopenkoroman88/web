const CELL={width:32, height:32};//_w=32, _h=32;

const aWindRose=//aArrow
[{x: 0,y:-1}
,{x: 1,y:-1}
,{x: 1,y: 0}
,{x: 1,y: 1}
,{x: 0,y: 1}
,{x:-1,y: 1}
,{x:-1,y: 0}
,{x:-1,y:-1}
];

const aPointSect=
[[7,0,1]
,[6,8,2]
,[5,4,3]
]


function normByte(value){
	if(value<0) return 0;
	if(value>255) return 255;
	return value;
}



export { aWindRose, aPointSect, normByte };
