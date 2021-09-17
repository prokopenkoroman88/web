@extends('admin.mainpanel')
 
@section('title')Services
@endsection

@section('content')
@parent

<h2>Services</h2>
<?php
//*
$lang=App\Http\Middleware\LocaleMiddleware::getLocale();
if($lang)$lang.='\\';
//*/
?>
<nav class="adaptive-menu">
	<ul>
{{-- 		<li><a href="\service\{{$lang}}excel">Excel</a></li>
		<li><a href="">second</a></li>
		<li><a href="">third</a></li>
 --}}
		<li>Мои:
			<li><a href="\service\{{$lang}}excel">Excel</a></li>
			<li><a href="">second</a></li>
			<li><a href="">third</a></li> 			
		</li>
		<li>Другие:
			<ul>


                    <li><a href="https://www.online-convert.com/ru">online-convert</a></li>
                    <li><a href="https://squoosh.app/">png to webp</a></li>
                    <li><a href="https://onlinepngtools.com/create-transparent-png">transparent-png</a></li>
                    <li><a href="https://9elements.github.io/fancy-border-radius/#90.38.64.14--.">fancy-border-radius</a></li>
                    <li><a href="https://lorempixel.com/200/200/">случ картинка 200 на 200</a></li>
                    <li><a href="https://uk.reactjs.org/docs/create-a-new-react-app.html">uk.reactjs.org</a></li>
                    <li><a href="https://css.in.ua/html/tag/iframe">css in ua</a></li>
                    <li><a href="https://coderoad.ru/list">CodeRoad</a></li>
                    <li><a href="https://dev.w3.org/html5/html-author/charref">Символы</a></li>
					<li><a href="https://validator.w3.org/">Валидный ли код?</a></li>
					<li><a href="https://search.google.com/test/rich-results">Проверка расширенных результатов itemscope itemprop</a></li>
					<li><a href="https://plusone.com.ua/research/">останнє дослідження української аудиторії Facebook та Instagram</a></li>
					<li><a href="https://decomments.com/">Найпотужніший та супергнучкий плагін для WordPress-коментарів</a></li>
					<li><a href="http://mistape.com/">Плагін для WordPress, що дозволяє відвідувачам повідомляти вас про помилки</a></li>
					<li><a href="https://www.dmosk.ru/polezno.php?review=driver-power-state-failure">BSoD dmosk</a></li>
					<li>українське
						<ul>
							<li><a href="https://onlinecorrector.com.ua/uk/">OnlineCorrector</a></li>
							<li><a href="https://slovnyk.me/dict/newsum/%D0%BF%D0%BE%D0%B7%D0%BE%D0%B2">Словник української мови у 20 томах</a></li>
							<li><a href="/karta">Karta Ukrajiny</a></li>
							<li><a href="https://zrada.org/hot/25-mova/503-jazyk-kievskoj-rusi.html">Язык Киевской Руси</a></li>
							<li><a href="https://zrada.org/history/2-naukovij-pidhid/910-proishozhdenie-dvujazychija-v-ukraine-rusi-ot-anatolija-zheleznogo.html">2-Язык </a></li>
							<li><a href="http://litopys.org.ua/pivtorak/pivt11.htm">Живуча помилка Ломоносова</a></li>
							<li><a href="https://ridni.org/karta/%D0%BF%D1%80%D0%BE%D0%BA%D0%BE%D0%BF%D0%B5%D0%BD%D0%BA%D0%BE">Де живуть Прокопенки?</a></li>
						</ul>
					</li>
					<li>кто звонил:
                        <ul>
                            <li><a href="https://www.telguarder.com/ua/number/0731519204">telguarder.com</a></li>
                            <li><a href="https://www.telefonnyjdovidnyk.com.ua/nomer/0731519204">telefonnyjdovidnyk.com.ua</a></li>
                        </ul>
                    </li>
                    <li>Отзывы:
                        <ul>
                            <li><a href="https://eto-razvod.ru/review/freelancehunt/#i-5">eto-razvod.ru</a></li>
                            <li><a href="https://www.otzyvua.net/uk/freelancehuntcom">otzyvua.net</a></li>
                        </ul>
                    </li>


 				
 			</ul>
 		</li>




            <li>Примеры других сайтов:
                 <ul>
                     <li><a href="https://jaya.digital/home">jaya landing</a></li>
                     <li><a href="http://coffee2go.com.ua">Coffee To Go</a></li>
					 <li><a href="https://www.wondershare.com/windows10/download-and-install-windows-10.html">SVG справа</a></li>
                     <li><a href="https://glasses.ua/">glasses.ua (Павел Шульга)</a></li>
                     <li><a href="https://koitechs.com/">подсветка фонариком</a></li>
                     <li><a href="https://liniavikon.com.ua/ua/statti/pro-vikna/zaklynylo-plastykove-vikno-scho-robyty/">liniavikon.com.ua - Передзвонити і чат</a></li>
                     <li><a href="https://deco.agency/uk/">Создавали на WordPress stb.ua prm.ua jetsetter.ua</a></li>
                     <li><a href="https://taventures.vc/">taventures.vc</a></li>
                     <li><a href="https://codevery.com/ua/">от курсора разлетаются волны!!!</a></li>
					 <li><a href="https://axels.com.ua/">от курсора разлетаются пылинки!!!</a></li>
                     <li><a href="https://resume.io/?gclid=CjwKCAjw7fuJBhBdEiwA2lLMYajpqzJ-hfAUply8Ekjj-ZbTmVkrIpUix1GvVavLI2C4J0wRkd-jRRoChdAQAvD_BwE">transform-style: preserve-3d</a></li>
                     <li><a href="https://jobs.ua/resume_sample/resume_advice/81">Поворот пункта меню</a></li>
                     <li><a href=""></a></li>
                 </ul>
             </li> 

 	</ul>
</nav>


@endsection