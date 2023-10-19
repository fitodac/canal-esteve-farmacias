<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title inertia>{{ config('app.name', 'Esteve') }}</title>

		<link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('favicon/apple-touch-icon.png') }}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('favicon/favicon-32x32.png') }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('favicon/favicon-16x16.png') }}">
		<link rel="manifest" href="{{ URL::asset('favicon/site.webmanifest') }}">

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

		<!-- Scripts -->
		@routes
		@vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
		@inertiaHead
	</head>
	<body class="font-sans antialiased">
		@inertia
        <script src="{{ asset('tarteaucitron/tarteaucitron.js') }}"></script>
        <script src="{{ asset('tarteaucitron/cookie.js') }}" defer></script>
	</body>
</html>
