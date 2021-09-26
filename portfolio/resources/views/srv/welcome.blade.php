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




{{-- !!!!!!!!!!!!!!!!!!!!!!  Примеры микроразметки !!!!!!!!!!!!!!!!!!!!!!!!
- -}}


<section>
  <h2>ItemProps:</h2>  

<h3><a href="https://iprospect.com.ua/uk/seo/">iprospect.com.ua</a></h3>









<h4>Головна /Пошукова оптимізація /Технічна оптимізація</h4>
<div class=breadcrumbs>
	<div class=container>
		<ul itemscope itemtype=http://schema.org/BreadcrumbList>
			<li itemprop=itemListElement itemscope itemtype=http://schema.org/ListItem>
				<a itemscope itemtype=http://schema.org/Thing itemprop=item id=https://iprospect.com.ua/uk/ href=https://iprospect.com.ua/uk/ >
					<span itemprop=name>Головна</span>
				</a>
				<meta itemprop="position" content="1"> /
			</li>
			<li itemprop=itemListElement itemscope itemtype=http://schema.org/ListItem>
				<a itemscope itemtype=http://schema.org/Thing itemprop=item id=https://iprospect.com.ua/uk/seo/ href=https://iprospect.com.ua/uk/seo/ >
					<span itemprop=name>Пошукова оптимізація</span>
				</a>
				<meta itemprop="position" content="2"> /
			</li>
			<li itemprop=itemListElement itemscope itemtype=http://schema.org/ListItem>
				<span itemscope itemtype=http://schema.org/Thing itemprop=item>
					<span itemprop=name>Технічна оптимізація</span>
				</span>
				<meta itemprop="position" content="3">
			</li>
		</ul>
	</div>
</div>










<div class=col-md-8 itemscope itemtype=https://schema.org/FAQPage>
    <div class=wrap itemscope itemprop=mainEntity itemtype=https://schema.org/Question>
        <div class=title itemprop=name>👨🏻‍💻 Який у вас досвід в просуванні сайтів? 🚀</div>
        <div class=excerpt itemscope itemprop=acceptedAnswer itemtype=https://schema.org/Answer>
            <div class="inner typography" itemprop=text>
                <p>Наша компанія вже 3 роки просуває проекти різних розмірів і складності, починаючи від невеликих інформаційних проектів і стартапів, закінчуючи e-commerce проектами світового рівня. Досвід наших співробітників від 3 до 8 років у сфері SEO. З відгуками наших клієнтів ви можете ознайомитися на 
                    <a href=https://iprospect.com.ua/uk/ target=_blank rel=noopener>головній сторінці</a> сайту.
                </p>
            </div>
        </div>
    </div>
    <div class=wrap itemscope itemprop=mainEntity itemtype=https://schema.org/Question>
        <div class=title itemprop=name>🔝 Скільки коштує просування сайту? 💰</div>
        <div class=excerpt itemscope itemprop=acceptedAnswer itemtype=https://schema.org/Answer>
            <div class="inner typography" itemprop=text>
                <p>Залежить від рівня конкуренції у ніші. З урахуванням вартості якісного контенту і посилань з хороших майданчиків, вартість просування проекту починається від 25000 грн. у місяць. Але, для кожного проекту вона розраховується окремо з урахуванням всіх його особливостей.</p>
            </div>
        </div>
    </div>
    <div class=wrap itemscope itemprop=mainEntity itemtype=https://schema.org/Question>
        <div class=title itemprop=name>🔧 Що я отримаю від SEO оптимізації сайту? 📊</div>
        <div class=excerpt itemscope itemprop=acceptedAnswer itemtype=https://schema.org/Answer>
            <div class="inner typography" itemprop=text>
                <p>Підвищення кількості користувачів, які щомісяця відвідують сайт і, з часом, значне скорочення ціни залучення 1 користувача. Поліпшення користувацького досвіду – повторні заходи користувачів на сайт, зростання повторних продажів і LTV. Поліпшення технічного стану сторінок сайту і підвищення показника конверсії оптимізованих сторінок.</p>
            </div>
        </div>
    </div>
    <div class=wrap itemscope itemprop=mainEntity itemtype=https://schema.org/Question>
        <div class=title itemprop=name>🤔 Чим ви кращі за інших? 🥇</div>
        <div class=excerpt itemscope itemprop=acceptedAnswer itemtype=https://schema.org/Answer>
            <div class="inner typography" itemprop=text>
                <p>У нас над проектом працює команда фахівців, що складається з SEO Team Lead, Senior SEO, Senior Link Builder, аналітика і редактора. До кожного проекту індивідуальний підхід, ніяких шаблонних скриптів і софту, вбудованого в ваш сайт. У кожного з фахівців більше 3-х років досвіду – ніяких Junior. Також у нас є доступ до кейсів будь-якої ніші та технологій всіх наших офісів в 55 країнах.</p>
            </div>
        </div>
    </div>
</div>


</section>





<h3>
<a href="https://seo-akademiya.com/baza-znanij/osnovyi-seo/9-poleznykh-operatorov-poiska-v-google/?utm_source=message&utm_medium=link&utm_campaign=date">seo-akademiya</a>
</h3>
            <ul  class="navbar-nav w-100 justify-content-between" itemscope itemtype="https://www.schema.org/SiteNavigationElement" role="menu"><li id="m-id-2" class="first" itemprop="name" role="menuitem"><a href="/about/" title="О проекте"  itemprop="url">О проекте</a></li>
<li id="m-id-107" itemprop="name" role="menuitem"><a href="/produktyi-akademii-seo/" title="Курсы Академии SEO"  itemprop="url">Курсы</a></li>
<li id="m-id-1707" itemprop="name" role="menuitem"><a href="/uslugi-akademii-seo/" title="Услуги Академии SEO"  itemprop="url">Услуги</a></li>
<li id="m-id-32" class="active" itemprop="name" role="menuitem"><a href="/baza-znanij/" title="База знаний"  itemprop="url">База знаний</a></li>
<li id="m-id-5" itemprop="name" role="menuitem"><a href="/keys/" title="Ученики"  itemprop="url">Ученики</a></li>
<li id="m-id-6" class="last" itemprop="name" role="menuitem"><a href="/contact/" title="Контакты"  itemprop="url">Контакты</a></li>
</ul>



        <ul class="messengers-list d-flex flex-row flex-lg-column flex-xxl-row flex-nowrap align-items-center justify-content-center justify-content-md-end justify-content-lg-end mb-md-1">
            <li>
                <a href="viber://chat?number=+380938174245">
                    <img loading="lazy" class="messengers-img" src="/site-assets/dist/images/viber.svg">
                </a>
            </li>
            <li>
                <a href="tg://resolve?domain=VasilHab">
                    <img loading="lazy" class="messengers-img" src="/site-assets/dist/images/telegram.svg">
                </a>
            </li>
            <li>
                <a href="whatsapp://send?phone=380938174245">
                    <img loading="lazy" class="messengers-img" src="/site-assets/dist/images/whatsapp.svg">
                </a>
            </li>
        </ul>



<ul class="breadcrumb seo-breadcrumb-v2" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
  <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="B_crumb" >
    <a class="B_crumb" itemprop="item" rel="Главная" href="/">
        <span itemprop="name">Главная</span>
    </a>
    <meta itemprop="position" content="1">
</li>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="B_crumb" >
    <a class="B_crumb" itemprop="item" rel="База знаний" href="https://seo-akademiya.com/baza-znanij/">
        <span itemprop="name">База знаний</span>
    </a>
    <meta itemprop="position" content="2">
</li>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="B_crumb" >
    <a class="B_crumb" itemprop="item" rel="Основы SEO" href="https://seo-akademiya.com/baza-znanij/osnovyi-seo/">
        <span itemprop="name">Основы SEO</span>
    </a>
    <meta itemprop="position" content="3">
</li>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
    <span itemprop="name" class="B_currentCrumb">9 полезных операторов поиска в Google</span>
    <div itemprop="item" itemscope itemtype="https://schema.org/Thing"> <link itemprop="url" href="https://seo-akademiya.com/baza-znanij/osnovyi-seo/9-poleznykh-operatorov-poiska-v-google/"></div>
    <meta itemprop="position" content="4">
</li>
</ul>


<div itemprop="inLanguage" itemscope itemtype="https://schema.org/Language">
        <meta itemprop="name" content="Russian">
        <meta itemprop="alternateName" content="ru">
</div>

<p> title:=meta itemprop="name": </p>
<meta itemprop="name" content="Поисковые операторы в Google: секреты эффективного поиска - Академия SEO (СЕО)">
    
<link itemprop="url" href="https://seo-akademiya.com/baza-znanij/osnovyi-seo/9-poleznykh-operatorov-poiska-v-google/">
    

<article class="article-body" itemprop="articleBody"><h2>article header</h2><p>text</p></article>





https://laconica.com/contact/

	<ul class="contact-info-list clearfix">
        <li>
            <div class="title">Email</div>
            <a class="email" href="mailto:hello@laconica.com">hello@laconica.com</a>
        </li>
        <li>
            <div class="title">Address</div>
            <a href="https://goo.gl/maps/vZLtWRE36yPbaiscA" class="address" target="_blank">
                Glinki 2, Most-City <br>
                Dnipro, 49000 <br>
                Ukraine
            </a>
        </li>
        <li>
            <div class="title">Social</div>
            <div class="social-icons-wrapper">
                <a href="https://www.instagram.com/laconica_studio/" class="inst" target="_blank">
                    <img src="https://laconica.solutions/static/version1573310180/frontend/Laconica/laconica/en_US/images/about-insta@2x.png" alt="instagram">
                </a>
                <a href="https://www.facebook.com/laconicastudio/" class="facebook" target="_blank">
                    <img src="https://laconica.solutions/static/version1573310180/frontend/Laconica/laconica/en_US/images/about-fb@2x.png" alt="facebook&quot;&quot;">
                </a>
                <a href="https://www.linkedin.com/company/laconica/" class="linkedin" target="_blank">
                    <img src="https://laconica.solutions/static/version1573310180/frontend/Laconica/laconica/en_US/images/about-li@2x.png" alt="linkedin">
                </a>
            </div>
        </li>
    </ul>
<p>
	<img src="https://laconica.solutions/static/version1573310180/frontend/Laconica/laconica/en_US/images/icons/payments-icons.svg" alt="alt">
</p>
<ul>
	<li><a href="https://www.instagram.com/laconica_studio/" target="_blank"><i class="instagram"></i></a></li>
	<li><a href="https://www.facebook.com/laconicastudio/" target="_blank"><i class="facebook"></i></a></li>
	<li><a href="https://www.linkedin.com/company/laconica/" target="_blank"><i class="linkedin"></i></a></li>
</ul>


<script type="text/javascript"> 
//<![CDATA[ 
	var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.comodo.com/" : "http://www.trustlogo.com/");
	//document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script>






hromadske.ua
lupa:
<svg class="Search-iconSearch"
 width="24"
 height="24" 
 viewBox="0 0 24 24" 
 fill="none" 
 xmlns="http://www.w3.org/2000/svg">
	<circle
	 cx="10.526" 
	 cy="10.447" 
	 r="5.075" 
	 transform="rotate(-45 10.526 10.447)" 
	 stroke="#191A1E" 
	 stroke-width="1.5"
	></circle>
	<path
	 stroke="#191A1E" 
	 stroke-width="1.5" 
	 d="M14.53 14.214l5 5"
	></path>
</svg>


3 horiz lines:
<svg
 width="24" 
 height="24" 
 viewBox="0 0 24 24" 
 fill="none" 
 xmlns="http://www.w3.org/2000/svg">
 	<path
 	 fill="#191A1E" 
 	 d="M4 5.25h16v1.5H4zM4 11.25h16v1.5H4zM4 17.25h16v1.5H4z"
 	></path>
</svg>



privat24 cart:
<svg height="24px" width="24px" version="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
	<g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
		<path d="M0 0h24v24H0z"></path>
		<path d="M22 9.497h-3.42L14.868 3l-1.736.992 3.145 5.505H7.723l3.145-5.504L9.132 3 5.42 9.497H2v2h1.198l1.826 8.217a1 1 0 0 0 .976.783h12a.998.998 0 0 0 .976-.783l1.826-8.217H22v-2zm-4.802 9H6.802l-1.556-7h13.507l-1.555 7z" fill="#8dc641"></path>
	</g>
</svg>








{{- -  --}}



@endsection