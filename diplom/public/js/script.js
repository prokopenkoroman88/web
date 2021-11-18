$(document).ready( function () {

const rowsPerPage=10;//3;

var adminTables= $('.admin-table').toArray();



function showRows(tableNum,page){
	//alert('table='+tableNum+' page='+page);

	//console.log(adminTables);
	let table=adminTables[tableNum];
	
	let rows= table.querySelectorAll('tr');
	//включая и заголовок!!!!

	//console.log(rows);

	for(let i=1;i<rows.length;i++){
		//
		if( ( Math.floor((i-1)/rowsPerPage) +1)==page )
			rows[i].style.display = '';
		else
			rows[i].style.display = 'none';
		//console.log('i='+i);

	};//i++

	let atP=table.nextElementSibling;
	let lis = atP.querySelectorAll('li');
	for(let i=1; i<= lis.length; i++){
		if(i==page) lis[i-1].classList.add('active');
		else        lis[i-1].classList.remove('active');

	};



};



//console.log(adminTables);
//'adminTables.count='+
//console.log(adminTables.length);

//.elements
//.length()
//.count()

for (let i = 0; i < adminTables.length; i++) {

	//showRows(adminTables[i],1);
	showRows(i,1);

	let atP = adminTables[i].nextElementSibling;
	let nav = document.createElement('nav');
	let ul = document.createElement('ul');
	ul.classList.add('pagination');




	let rows= adminTables[i].querySelectorAll('tr');
	//включая и заголовок!!!!

	for(let j=1; j<=Math.ceil((rows.length-1)/rowsPerPage); j++){
		//
		let li = document.createElement('li');
		li.classList.add('page-item');
		if(j==1) li.classList.add('active');
		let btn = document.createElement('button');
		btn.classList.add('page-link');
		btn.innerHTML=j;
		btn.addEventListener('click', function(){
			showRows(i,j);
			//showRows(adminTables[i],j);
			

		});
		li.append(btn);
		ul.append(li);
	};

/*
	<ul class="pagination">
		<li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
			<span class="page-link" aria-hidden="true">‹</span>
		</li>
		<li class="page-item active" aria-current="page">
			<span class="page-link">1</span>
		</li>
		<li class="page-item">
			<a class="page-link" href="http://diplom/admin/products/1?tab=1&amp;page=2">2</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="http://diplom/admin/products/1?tab=1&amp;page=3">3</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="http://diplom/admin/products/1?tab=1&amp;page=2" rel="next" aria-label="Next »">›</a>
		</li>
	</ul>
*/
	
	
	nav.append(ul);
	atP.append(nav);

};



let folders;
/*
 folders=$('.folder:before');

folders.click(function(e){
	console.log('click');
	$(this).toggleClass('folder');
	$(this).toggleClass('folder-open');
});
*/
//folders=$('.folder-open');

//folders = document.querySelectorAll('.folder-open,.folder');
folders = document.querySelectorAll('.folder');

for(let i=0; i<folders.length; i++)
folders[i].onclick =function(e){
	console.log('click');

	if(this!=e.target)return;
	let li=this;//e.target;
	console.log(li);
	li.classList.toggle('folder-opened');
	li.classList.toggle('folder-closed');

};

/*

folders=$('.folder-open');
folders.click(function(e){

	$(this).toggleClass('folder');
	$(this).toggleClass('folder-open');
	$(this).children().toggle(10000);


});
*/



/*
folders=$('.map-site .folder-open');

folders.addEventListener('click', function(e){
	$(this).classList.toggle('folder');
	$(this).classList.toggle('folder-open');
});
*/




/*
let wnDescr = document.querySelectorAll('#whats-new-descr');
if(wnDescr){
	let wnLis


};
*/



























});
