import React, { useState, useEffect, useRef } from 'react';
//import { Counter } from './features/counter/Counter';
import dotenv from 'dotenv';
import  enums  from './common/enums';
import  ToolPanel  from './features/tools/ToolPanel';
import  Client  from './structure/Client';
import  WorldMapCanvas  from './features/canvas/WorldMapCanvas';
import  LevelTaskCanvas  from './features/canvas/LevelTaskCanvas';
import  GameCanvas  from './features/canvas/GameCanvas';
//import { Loader, ResourceLoader } from './http/Loader';
import { Tribe } from './http/ResourceTables';
import './App.css';

const client = new Client();

function App() {
  console.log('App 1');
  let tribeLoader;// = new Tribe();//ResourceLoader('tribes');
  let tribes;
  //canvases:
  const cnv = {
    worldMap : {
      ref : useRef(null),
      obj : useRef(null)
    },
    levelTask : {
      ref : useRef(null),
      obj : useRef(null)
    },
    game : {
      ref : useRef(null),
      obj : useRef(null)
    }
  };
  const [playMode, setPlayMode] = useState(enums.id('pm','Main'));//aPlayMode.indexOf('Level') //Main
  const [step, setStep] = useState(0);
//  const canvasRef = useRef(null);
//  const canvasObj = useRef(null);
    if(cnv.game.ref)
        console.log(cnv.game.ref);
      else
        console.log('canvasRef==null');



  let int1=null,int2=null;
/*
    useEffect(() => {
    int1 = (e)=>{
        setInterval(e=>{}, 1000)
        }
    }, []);
*/

  const initClick = (e)=>{
    if(cnv.canvasRef)
        console.log(cnv.canvasRef);
      else
        console.log('canvasRef==null');
    let w=1200;//world.width;
    let h=400;//world.height;
    tribeLoader = new Tribe();//ResourceLoader('tribes');


  console.log('canvasRef:');
        console.log(cnv.canvasRef);

    int2 = setInterval(clock, 125*20);
  };


  const load = async function(){
    //let t1 = Date.now();
    tribes = await tribeLoader.getAll();//60-120ms
    //tribes = await tribeLoader.getById(2);//50ms
    //let t2 = Date.now();
    //console.log(t2+' - '+t1+' = '+(t2-t1));
  };
//console.log('3');
  const work = function(){
    //console.log(tribes);
  };
//console.log('4');

  const f = async function(){
    //console.log('f');
    await load();
    work();
  };

  const clock = (e)=>{
      //f();//+++
      console.log('clock: begin client.playMode='+client.mnpltr.playMode);
      setStep(prevStep => prevStep + 1);
      //setState({step:step+1});
      //console.log('clock: end');
  };

  const handlePlayModeChange = (value)=>{
    setPlayMode(value);
  }

  const handleLevelChoice = (levelName, savingName)=>{
    //load level's data
    console.log('level '+levelName+' '+savingName);
    //client.loadGame(levelName, savingName);
    client.mnpltr.loadLevel(levelName, savingName);
    if(savingName)
      setPlayMode(enums.id('pm','Level'))
    else
      setPlayMode(enums.id('pm','Task'));//new
  }

  const handleAfterTask = (button)=>{
    if(button=='OK')
      setPlayMode(enums.id('pm','Level'))
    else
      setPlayMode(enums.id('pm','Main'));//cancel
  }

  return (
    <div className="App">
      <header className="App-header">
        <ToolPanel  w="1200" h="100"/>
      </header>
      <main>
        <button onClick={initClick} >initClick</button>
        {enums.is(playMode,'pm','Main') &&
        <WorldMapCanvas
          worldMap={client.worldMap}
          onPlayModeChange={handlePlayModeChange}
          onLevelChoice={handleLevelChoice}
          canvas={cnv.worldMap}
        />}
        {enums.is(playMode,'pm','Task') &&
        <LevelTaskCanvas
          mission='mission'
          onClickButton={handleAfterTask}
          canvas={cnv.levelTask}
        />}
        {enums.is(playMode,'pm','Level') &&
        <GameCanvas
          game={client.game}
          onInit={initClick}
          canvas={cnv.game}
        />}
      </main>
      <footer>
      </footer>
    </div>
  );
}

export default App;
