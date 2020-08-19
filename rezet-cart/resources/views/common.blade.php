<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>rezet-cart</title>
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	
<main>
	@yield('content')
</main>

	<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>