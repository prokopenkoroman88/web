
let map = document.getElementById('map');
console.log(editor);

      map.style.backgroundImage = 'url(/images/large-topographical-map-of-israel.jpg)';


let btn;

btn = document.createElement('div');
btn.classList.add('btn');
//btn.addEventListener(type: DOMString, callback: EventListener, capture?: boolean)
btn.innerHTML='Cursor';
editor.append(btn);


btn = document.createElement('div');
btn.classList.add('btn');
//btn.addEventListener(type: DOMString, callback: EventListener, capture?: boolean)
btn.innerHTML='ADD';
editor.append(btn);








/*  onMouseDown
      map.addEventListener('mousedown', function(e){

      	let x1=e.offsetX, y1=e.offsetY, x2=0,y2=0;
      	let xy=xy2en(x1,y1);//,x2,y2);
      	x2=xy.x;
      	y2=xy.y;

    	memo.innerHTML+='x='+x1+' y='+y1 +' == '+x2+'E '+y2+'N'  +'<br>';
    	//?//window.location.href='/karta?x='+x2+'&y='+y2;


      });

const dY=[367,842,1317,1790,2264];
for(let i=1; i<4; i++){
	let y3=33-i;
	let dH=dY[i]-dY[i-1];
	memo.innerHTML+='do y='+y3+' dH='+dH   +'<br>';
};
*/

      	//const chicago = new google.maps.LatLng(41.85, -87.65);
        /*map = new google.maps.Map(document.getElementById("map"), {
          center: chicago,//{ lat: -34.397, lng: 150.644 },
          zoom: 8,
        });//*/


/*


require('./bootstrap');

window.Vue = require('vue');

const axios = require('axios');//+14.2.21



Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
});

*/




