
<div class="content site-map">
{{-- 

	<h1 itemscope itemtype="http://schema.org/Organization"style="font-size: 1em;">
		<p class="capture capt-0">
			<span itemprop="url" content="http://softtaxi.com.ua">
				<strong itemprop="description" style="background-color:#eeeeee;">
				Разработка<br>
				программного<br>
				обеспечения</strong>
			</span>
		</p>
	</h1>
 --}}
<?php
	$latest = App\Product::all();

?>
<div>
<ul class="list">
 <li class="folder folder-opened"><span></span>Карта сайта

    <ul>
    	<li class="page"><span></span><a href="/">Последние новости</a>
    	</li>
	    <li class="folder folder-opened"><span></span><a href="/products">Проекты</a>
	        <ul >            
	            @foreach($latest as $p)
	                <li class="folder folder-closed"><span></span><a href="/product/{{$p->slug}}">{{$p->name}}</a>

						<ul>
							<?php
$pReleases = App\Release::where('product_id','=',$p->id)->get();
							?>
							@foreach($pReleases as $pRelease)
								<li class="page"><span></span><a href="/whatsnew/{{$p->slug}}/{{$pRelease->version}}">{{$pRelease->version}}</a></li>

							@endforeach
						</ul>
	                </li>
	            @endforeach
	        </ul>
	    </li>
	    <li class="folder folder-closed"><span></span>
	    	<a href="/contacts">Контакты</a>
	    	<ul>
				<li class="page"><span></span>
					<a href="/contacts#schedule">Режим работы</a>
				</li>
				<li class="page"><span></span>
					<a href="/contacts#question">Написать разработчику</a>
				</li>		
	    	</ul>
	    </li>
	        
	</ul>
 </li>
</ul>
</div>

<?php
$lastRelease = App\Release::where('created_at','<>','0')->orderBy('created_at','DESC')->first();
?>
{{-- 
<h6>Последнее обновление сайта - {{$lastRelease->created_at}}</h6>
 --}}


	<h4 itemscope itemtype="http://schema.org/CreativeWork" style="font-size: 1em;">
		<p class="capture capt-0">
			<span>
				<strong style="font-weight:normal; background-color:#eeeeee;" 
				itemprop="datePublished" content="{{$lastRelease->creatingDate}}">
				Последнее обновление сайта - {{$lastRelease->creatingDateHuman}}
				</strong>
			</span>
		</p>
	</h4>


</div>

