<?php

//namespace resources\views\tables\custom;
//namespace Resources\Views\Tables\Custom;
//namespace App\;



	function printArr($a,$tree){
		//$tree='ul>li>a' 'tr>td'

	}


	function printTHs($aCol){
		$s='';
		foreach ($aCol as $key => $col) {
			$s.="<th>$col</th>";
		};
		return $s;
	}



	function printTR($aCol){
		$s='';
		foreach ($aCol as $key => $col) {
			$s.="<td>$col</td>";
		};
		// [Copy][Edit][Del]   ????
		$s="<tr>$s</tr>";
		return $s;

	};


/*

<tr>
	<td></td>
	<td>{{}}</td>	
	<td>{{}}</td>	
	<td>{{}}</td>	
</tr>

*/

/*

class ViewFuncs()
{

	public function a(){
		return '<th>1</th>';
	}


	public static function printTHs($aCol){
		$s='';
		foreach ($aCol as $key => $col) {
			$s.="<th>$col</th>";
		};
		return $s;
	}



}

*/

?>