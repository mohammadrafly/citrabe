<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CITRA | Backend</title>
	<link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
	@stack('css')

  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
</head>
<body>
	<div class="main-wrapper">

		@include('partials.sidebar')
	
		<div class="page-wrapper">
				
			@include('partials.navbar')

			<div class="page-content">

				@include('partials.message')

				@section('breadcrumb')
				@show

				@yield('content')

			</div>

			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
				<p class="text-muted text-center text-md-left">Copyright © 2021 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>. All rights reserved</p>
				<p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
			</footer>
	
		</div>
	</div>

	<script src="{{ asset(mix('js/app.js')) }}"></script>
	@stack('scripts')
  </body>
</html>