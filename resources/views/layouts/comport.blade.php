<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<script src="/js/app.js" defer></script>
<link rel="shortcut icon" href="/assets/images/logo/favicon.png" type="image/x-icon">

<link rel="stylesheet" href="/assets/css/animate-3.7.0.css">
<link rel="stylesheet" href="/assets/css/font-awesome-4.7.0.min.css">
<link rel="stylesheet" href="/assets/fonts/flat-icon/flaticon.css">
<link rel="stylesheet" href="/assets/css/bootstrap-4.1.3.min.css">
<link rel="stylesheet" href="/assets/css/owl-carousel.min.css">
<link rel="stylesheet" href="/assets/css/nice-select.css">
@yield('css-style')
<link rel="stylesheet" href="/assets/css/style.css">
<link href="/css/app.css" rel="stylesheet">
</head>
<body>
	<div id="app">
		<div class="preloader">
			<div class="spinner"></div>
		</div>

		@if(Request::is('site/*') || Request::is('site'))

			@if(Route::currentRouteName() === 'site_home')
				@include('inccomport.site-header')
			@elseif(Route::currentRouteName() === 'site_blog_home' || Route::currentRouteName() === 'site_blog_details')
				@include('inccomport.site-header-blog')
			@else
				@include('inccomport.site-header-single')
			@endif

		@else

			@guest

				@include('inccomport.header')

			@else

				@if(Auth::user()->is_admin == 1)
					@include('inccomport.header-admin')
				@else
					@include('inccomport.header-user')
				@endif

			@endguest

		@endif


		<div style="min-height: 600px;">
			@yield('top-block')
			<div class="container py-3">
				<div>
					@include('inccomport.messages')
				</div>
				@yield('content')
			</div>
		</div>

		@if(Request::is('site') || Request::is('site/*') || Request::is('index'))
			@include('inccomport.footer')
		@else
			@include('inccomport.footer-in')
		@endif

		<script src="/assets/js/vendorscript/jquery-2.2.4.min.js"></script>
		<script src="/assets/js/popper.min.js"></script>
		<script src="/assets/js/vendorscript/bootstrap-4.1.3.min.js"></script>
		<script src="/assets/js/vendorscript/wow.min.js"></script>
		<script src="/assets/js/vendorscript/owl-carousel.min.js"></script>
		<script src="/assets/js/vendorscript/jquery.nice-select.min.js"></script>
		@yield('js-script')
		<script src="/assets/js/vendorscript/ion.rangeSlider.js"></script>
		<script src="/assets/js/main.js"></script>

		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-23581568-13');
		</script>
	</div>
</body>