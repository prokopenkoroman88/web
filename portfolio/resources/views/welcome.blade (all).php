<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .map-menu ul{
               display: none;
                 /*visibility: hidden;*/
            }
            .map-menu li:hover>ul{
                display: block;
               /* visibility: visible;*/
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" style="background-color: #caffee; border-radius:20px;">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        <h1>Мои проекты</h1>
        {{-- галерея? --}}
        <ul class="map-menu">
            <li><a href="/softtaxi">SoftTAXI</a></li>
            <li><a href="/gen">Генеалогия</a></li>
            <li><a href="/map/karta">Карта</a></li>
            <li><a href="/shop">Магазин</a></li>
            <li><a href="/job">Поиск работы</a>
                <ul>
                    <li><a href="https://freelance.ua/uk/users/verstka/?page=50">Freelance.ua  (((((((</a> {{--  prokopenkoroman88  fu6Bz9hEC68%Qv^ --}}
                    </li>
                    <li><a href="https://freelancepax.com">freelancepax.com ((((</a></li>
                    <li><a href="https://free-lance.com.ua/">free-lance com ua 75 грн((((</a></li>
                    <li><a href="https://freelancehunt.com/blog/chi-povinien-frilansier-platiti-podatki/">chi-povinien-frilansier-platiti-podatki</a></li>
                    <li><a href="https://freelancehunt.com/blog/summary-chto-eto-i-zachiem-iegho-dobavliat-v-rieziumie/">summary-chto-eto-i-zachiem-iegho-dobavliat-v-rieziumie</a></li>
                    <li><a href="https://grc.ua/article/29047?utm_source=email&utm_medium=email&utm_campaign=vis_20921&utm_content=1st_vis_20921%20">Лайфхаки в офісі: як стати своїм у колективі</a></li>
                </ul>
            </li>
            <li><a href="/soc-net">Соц сеть</a></li>
            <li>Сервисы:
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
            <li><a href="/resources/views/softtaxi.blade.php">на мое SoftTAXI без роутов</a></li> 
            <li>Информация с JW:
                 <ul>
                     <li><a href="https://wol.jw.org/ru/wol/d/r2/lp-u/1200273864">Недостающие звенья</a></li>
                     <li><a href="https://wol.jw.org/ru/wol/d/r2/lp-u/1200272045#h=1:0">Эволюция</a></li>
                     <li><a href="https://wol.jw.org/ru/wol/d/r2/lp-u/1101985015#h=122:0-124:155">Слово - ископаемым</a></li>
                 </ul>
            </li>

            <li>журналы:
                 <ul>
                     <li><a href="https://www.the-scientist.com/tag/evolution">the scientist</a></li>
                     <li><a href="https://www.newscientist.com/">new scientist</a></li>
                     <li><a href="https://www.popmech.ru/science/731813-neandertalcy-primaty-i-hudozhniki/">neandertalcy-primaty-i-hudozhniki</a></li>
                     <li><a href=""></a></li>
                 </ul>
             </li> 

        </ul>
{{-- 

text-overflow: elipsis


 --}}
{{-- 

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>

 --}}

<!--
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5882199.473709078!2d26.467169125768002!3d49.22440731825652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d1d9c154700e8f%3A0x1068488f64010!2z0KPQutGA0LDRl9C90LA!5e0!3m2!1suk!2sua!4v1601739355916!5m2!1suk!2sua" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
-->
        </div>
    </body>
</html>
