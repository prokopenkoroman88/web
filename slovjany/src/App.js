import React from 'react';
//import { Counter } from './features/counter/Counter';
import  GameCanvas  from './features/canvas/GameCanvas';
import './App.css';

function App() {
  return (
    <div className="App">
      <header className="App-header">
      </header>
      <main>
        <GameCanvas name="param value" w="200" h="100"/>
      </main>
      <footer>
      </footer>
    </div>
  );
}

export default App;
