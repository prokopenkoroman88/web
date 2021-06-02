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
        <ul>
            <li><a href="/softtaxi">SoftTAXI</a></li>
            <li><a href="/gen">Генеалогия</a></li>
            <li><a href="/shop">Магазин</a></li>
            <li><a href="/resume">Поиск работы</a></li>
            <li><a href="/soc-net">Соц сеть</a></li>
            <li>Сервисы:
                <ul>
                    <li><a href="https://squoosh.app/">png to webp</a></li>
                    <li><a href="https://9elements.github.io/fancy-border-radius/#90.38.64.14--.">fancy-border-radius</a></li>
                    <li><a href="https://lorempixel.com/200/200/">случ картинка 200 на 200</a></li>
                    <li><a href="https://css.in.ua/html/tag/iframe">css in ua</a></li>
                    <li><a href="https://coderoad.ru/list">CodeRoad</a></li>
                    <li><a href="https://dev.w3.org/html5/html-author/charref">Символы</a></li>
                    <li><a href="https://onlinecorrector.com.ua/uk/">OnlineCorrector</a></li>
                    <li><a href="">Karta Ukrajiny</a></li>
                    <li><a href="https://ridni.org/karta/%D0%BF%D1%80%D0%BE%D0%BA%D0%BE%D0%BF%D0%B5%D0%BD%D0%BA%D0%BE">Де живуть Прокопенки?</a></li>
                    <li>кто звонил:
                        <ul>
                            <li><a href="https://www.telguarder.com/ua/number/0731519204">telguarder.com</a></li>
                            <li><a href="https://www.telefonnyjdovidnyk.com.ua/nomer/0731519204">telefonnyjdovidnyk.com.ua</a></li>
                        </ul>
                    </li>
                </ul>
            </li>  
            <li>Примеры других сайтов:
                 <ul>
                     <li><a href="https://jaya.digital/home">jaya landing</a></li>
                     <li><a href="http://coffee2go.com.ua">Coffee To Go</a></li>
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
