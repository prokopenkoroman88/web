<span class="popup-input">
<?php
$item = $model::find($id);
//$path= $model::path();
$fields = $model::$fields;
?>

<input class="choiced-id" type="hidden" name="{{$fieldName}}" value="{{$id ?? 0}}"/>

<span class="choiced-text">
	{{$item->displayName ?? '<не выбрано>'}}
</span>
<input class="popup-btn-open" type="button" value="..."/>
<div class="popup-window">
<?php
   //$item = $this->model::find($id);;
	$items = $model::all();

//require_once ('../resources/views/tables/custom/ViewFuncs.php'); //!!!!!!!!
//require_once ('../resources/views/tables/custom/ViewFuncs.php'); //!!!!!!!!
	$actions=['select'];

	//dd($model::getTable());
	//!!//$table=$item->getTable();//='place_kinds'
	$it = new $model();

	$table=$it->getTable();
	//$table=$model  //'Place_kinds';
?>
{{view('common.tables.layouts.list',compact('path','fields','items','actions','table','id')) }}
	<p class="popup-bottom-panel">
		<input class="popup-btn-ok" type="button" value="ok">
		<input class="popup-btn-cancel" type="button" value="X" >
	</p>
</div>	
</span>