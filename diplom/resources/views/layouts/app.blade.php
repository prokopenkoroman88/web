<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{-- 
    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>

 --}}


 

 {{--
<script src="{{ asset('js/app.js') }}" defer></script>

    // дает открытся окошку Logout, но перекрывает мои скрипты,
    //конфликтует с jQuery
    --}}


{{--
     <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
 --}}



    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!--  -->
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

{{-- 
//убрал для datatables
  --}} 
    
{{--     <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
 --}}
     

{{--
      <script src="/vendor/jquery/jquery.js"></script>
//убрал для datatables
 --}}

{{--  
    <script>
        //+10.3.20 texarea   https://unisharp.github.io/laravel-filemanager/integration
      var options = {
        filebrowserImageBrowseUrl: '/filemanager?type=Images',
        filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/filemanager?type=Files',
        filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
      };

        //https://unisharp.github.io/laravel-filemanager/integration        
        
        //$('textarea').ckeditor(options);//+10.3.20 'textarea[name=describe]'
        CKEDITOR.replace('descr', options);//#describe
        //?//
        //?//$('#lfm').filemanager('image');//+5.3.20  
        $('.select').select2();

    </script>
 --}}


{{--

     <script src="{{ asset('js/app.js') }}" defer></script>


 --}}


    <!-- Fonts -->
    <link href="//fonts.gstatic.com" rel="dns-prefetch">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            {{--  --}}
            <div class="container">

                <p class="capture capt-product" ><strong>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img itemprop="logo" src="/images/logost.gif" alt="SoftTAXI">
                    {{-- config('app.name', 'Laravel') --}}
                </a></strong></p>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">



    <li itemscope itemtype="http://schema.org/Organization"
        class="nav-item"
    {{--  font-size: 0.75em;    --}}
    style=" color:blue;  "


    >

        <span itemprop="url" content="http://softtaxi.com.ua" class="link-text">
            <a href="/" class="nav-link">
                <span itemprop="description" class="link-text" style="background-color:''; font-size: 0.75em; padding-top: 5px;">
                Разработка<br>
                программного<br>
                обеспечения</span>
            </a>
        </span>

    </li>


@if(Auth::user())
    @if(Auth::user()->role=='admin')
                        <li class="nav-item">
                            <span class="link-text">
                                <a href="/admin" class="nav-link" ><span class="link-text">Админу</span></a>
                            </span>
                        </li>

                            {{-- @yield('nav') --}}
                            {{-- +1.4.20 --}}
                        <div class="nav">

                        </div>
    @else

    @endif
@else

@endif
                        @yield('nav')

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><span class="link-text">{{ __('Войти') }}</span></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><span class="link-text">{{ __('Регистрация') }}</span></a>
                                </li>
                            @endif
                        @else
                        {{--  --}}
                            <li class="nav-item {{-- dropdown --}}">
                                <a id="navbarDropdown" class="nav-link {{-- dropdown-toggle --}}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="link-text">
                                    {{ Auth::user()->name }} <span class="caret"></span></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item nav-link " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        console.log('LU');//
                                        let logo=
                                        document.getElementById('logout-form').submit();

                                        console.log(logo);
                                                     "><span class="link-text">
                                        {{ __('Выйти') }}</span>
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                            <li class="nav-item dropdown">

                                    <a class="dropdown-item nav-link" href="{{ route('logout') }}" 
                                       onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><span class="link-text">
                                        {{ __('Выйти') }}</span>
                                    </a>

                            </li>


                        @endguest
                    </ul>
                </div>
            </div>

        </nav>

{{-- 
        <main class="py-4">
            @ yie ld('content')
        </main>
 --}}
        <header class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @yield('header')
                </div>
            </div>
        </header>
        <div class="container-fluid main-container">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    @yield('left_panel')
                </div>
                <main class="col-md-8 py-4" >
                    @yield('content')
                </main>
                <div class="col-md-1">
                    @yield('right_panel')

                </div>
            </div>
        </div>
        <footer class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @yield('footer')
                </div>

                <div class="col-md-6">

<ul class="list">

    <li>
        <a href="https://fontawesome.com/icons?d=gallery&s=regular,solid&m=free">
            <i class="fas fa-cog fa-1x fa-spin"></i>
        fontawesome.com</a>        
    </li>
    <li>
        <a href="http://ho.ua">
        Дружній сайт: безкоштовний хостинг
        </a>        
    </li>   

</ul>

                



                </div>                
            </div>
        </footer>

    </div>
{{--  
    <script src="{{ asset('js/bootstrap.js') }}"></script>
--}}

    <script src="{{ asset('js/script.js') }}"></script>

    @yield('js') {{--  +1.4.20  --}}

</body>
</html>
