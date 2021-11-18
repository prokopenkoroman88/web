
<?php
//$href $item['url']
//$text $item['table']
//$count $item['label']

	$url = $_SERVER['REQUEST_URI']; // "/admin/releases"

	//$active = ($url==$href)?'active':'';
	$active = (strpos($url,$href)!==false)?'active':'';

	$has_count = (isset($count))?'has-count':'';

?>
	<li class="nav-item {{$active}} {{$has_count}} nowrap">
		<a href="{{$href}}" class="nav-link ">
			<span class="link-text">{!!$text!!}</span>
		</a>
	@if(isset($count))
		<span class="elem-count">{{$count}}</span>
	@endif
	</li>

