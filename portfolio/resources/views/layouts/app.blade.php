<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     {{-- {{ config('app.name', 'Laravel') }}  --}}
    <title>@yield('title')</title>

    <!-- Scripts -->
    @yield('jsbefore')
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link href="//fonts.gstatic.com" rel="dns-prefetch">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    @yield('css')
{{--     @section('css')
    @endsection --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"  href="#"> <span class="caret"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
{{-- 
                                    <a class="dropdown-item" href="{{ route('setlocale',['lang'=>'en']) }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                       >
                                        EN
                                    </a>                                    
 --}}
                                    @foreach(App\Http\Middleware\LocaleMiddleware::$languages as $lang=>$info)
                                    <a class="dropdown-item" href="{{ route('setlocale',['lang'=>$lang]) }}"
                                       >
                                       <img src="https://flagcdn.com/{{$info[0]}}.svg" width="30" alt="{{ $info[1] }}"> {{ $info[1] }}
                                    </a>
                                    @endforeach

                                </div>                                    
                            </li>
                    </ul>
                </div>
            </div>



        </nav>
        @yield('breadcrumbs')
        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            @section('footer')
            @endsection
        </footer>
    </div>
    @yield('jsafter')
    {{-- @section('js')
    @endsection --}}
</body>
</html>