import React, { useState, useEffect } from 'react';
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

    int2 = setInterval(clock, 125);
  };

  const clock = (e)=>{
      console.log('clock: '+world.u.length);
      for(let i=0; i<world.u.length; i++){
        world.u[i].x+=(Math.random()*10-5);
        world.u[i].y+=(Math.random()*10-5);
        console.log(i);
        console.log(world.u[i]);
      };
      setStep(prevStep => prevStep + 1);
      //setState({step:step+1});
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
          units = {world.u}
        />
      </main>
      <footer>
      </footer>
    </div>
  );
}

export default App;
