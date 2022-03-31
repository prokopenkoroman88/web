import React, { useState, useEffect, useRef } from 'react';
//import { Counter } from './features/counter/Counter';
import  ToolPanel  from './features/tools/ToolPanel';
import  GameCanvas  from './features/canvas/GameCanvas';
import './App.css';

function App() {
  const world = {
    name:"param value",
    width:200,
    height:300,
    u:[],
    //[u,setU] : useState();
  };
/*
        <GameCanvas
          name="param value"
          width="200"
          height="100"
        />

*/
  const [step, setStep] = useState(0);
  const canvasRef = useRef(null);

  const canvasRef2 = React.createElement("canvas", {
/*
        key: name,
        ref: function ref(canvas) {
          if (canvas) {
            _this3.canvas[name] = canvas;
            _this3.ctx[name] = canvas.getContext("2d");

            if (isInterface) {
              _this3.coordSystem.canvas = canvas;
            }
          }
        },

        style: _extends({}, canvasStyle),
        onMouseDown: isInterface ? _this3.handleDrawStart : undefined,
        onMouseMove: isInterface ? _this3.handleDrawMove : undefined,
        onMouseUp: isInterface ? _this3.handleDrawEnd : undefined,
        onMouseOut: isInterface ? _this3.handleDrawEnd : undefined,
        onTouchStart: isInterface ? _this3.handleDrawStart : undefined,
        onTouchMove: isInterface ? _this3.handleDrawMove : undefined,
        onTouchEnd: isInterface ? _this3.handleDrawEnd : undefined,
        onTouchCancel: isInterface ? _this3.handleDrawEnd : undefined
*/
      });


  let int1=null,int2=null;
/*
    useEffect(() => {
    int1 = (e)=>{
        setInterval(e=>{}, 1000)
        }
    }, []);
*/

  const initClick = (e)=>{
    let w=1200;//world.width;
    let h=400;//world.height;
    for(let i=0; i<30; i++){
      let chng = {x:Math.random()*w, y:Math.random()*h,};
      world.u.push(chng);
    };

  console.log('canvasRef:');
        console.log(canvasRef);

    int2 = setInterval(clock, 1250);
  };

  const clock = (e)=>{
      console.log('clock: '+world.u.length);
      for(let i=0; i<world.u.length; i++){
        world.u[i].x+=(Math.random()*10-5);
        world.u[i].y+=(Math.random()*10-5);
        //console.log(i);
        //console.log(world.u[i]);
      };
      setStep(prevStep => prevStep + 1);
      //setState({step:step+1});
      let cnv = canvasRef.current.canvas;
      let ctx = canvasRef.current.ctx;

      console.log('ctx=');
      console.log(ctx);

      let canvasToExport = cnv.drawing;
      let context = canvasToExport.getContext("2d"); //cache height and width

      let width = canvasToExport.width;
      let height = canvasToExport.height; //get the current ImageData for the canvas

      let storedImageData = context.getImageData(0, 0, width, height); //store the current globalCompositeOperation





      let imageData = storedImageData;//ctx.getImageData(0, 0, cnv.width, cnv.height);
      let data=imageData.data;
      console.log(data);//640000   400*400*4 = 640000
      /*
      let i=100*4*cnv.width + 200*4;
      data[i+0]=250;
      data[i+1]=150;
      data[i+2]=50;
      data[i+3]=255;
      */
      for(let i=0; i<world.u.length; i++){
        

        let num=Math.round(world.u[i].y)*4*1000 + Math.round(world.u[i].x)*4;
        //imageData.
        data[num+0]=53;
        //imageData.
        data[num+1]=52;
        //imageData.
        data[num+2]=151;
        //imageData.
        data[num+3]=255;
      };
      context.putImageData(imageData,0,0);
  };
  return (
    <div className="App">
      <header className="App-header">
        <ToolPanel  w="1200" h="100"/>
      </header>
      <main>
        <button onClick={initClick} >initClick</button>
        <GameCanvas
          world={world}
          step={step}
          onInit={initClick}
          canvasRef={canvasRef}
        />
      </main>
      <footer>
      </footer>
    </div>
  );
}

export default App;
