<?php
namespace App;
use Session;

	function path($id=0,$field=''){
		//"cart.product_{$p->id}.quan"
		$res='cart';
		if($id)$res.=".product_$id";
		if($field)$res.=".$field";
		return $res;
	}

class Cart{

	public function get($id=0,$field=''){
		return Session::get(path($id,$field));
	}
	public function put($id,$field,$value){
		return Session::put(path($id,$field),$value);
	}
	public function forget($id=0){
		return Session::forget(path($id));
	}

	public function add($p, $quan){//$product, $quan
		//объект продукта, и кол-во

		//добавлять кол-во, если есть

		if( $this->get($p->id) ){
			//edit
			$quan+=$this->get($p->id,'quan');
			if($quan>0 && $quan<=50)
				$this->put($p->id,'quan',$quan);//кол-во
		}
		else{//new
			$this->put($p->id,'id',$p->id);
			$this->put($p->id,'name',$p->name);
			$this->put($p->id,'descr',$p->descr);

			$this->put($p->id,'price',$p->price);
			$this->put($p->id,'img',$p->img);
			$this->put($p->id,'quan',$quan);

		};
		$this->totalSum();

	}
/*
	public function readProducts(){//+31.3.20
		return = Session::get("cart");
	}

	public function readTotal(){//+31.3.20
		return = Session::get("total");
	}
*/
	public function clear(){
		Session::forget('cart');//удалить сессию 'cart'
		Session::forget('total');
	}

	public function remove($id){
		$this->forget($id);//удалить сессию 'cart'
		$this->totalSum();
	}

	public function totalSum(){
		$sum = 0;

		foreach ($this->get() as $p) {
			//dd($p);
			$sum += ($p['price'] * $p['quan']);
		};

		Session::put('total',$sum);//отдельная сессия на общую сумму
		//return
	}


}
