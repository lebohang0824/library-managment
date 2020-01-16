<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Umuzi - Book Hub</title>
		<meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">

		<link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
		
		<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

		<link rel="stylesheet" href="{{ asset('css/aos.css') }}">

		<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

		<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
		<link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">

		
		<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
		<link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	</head>
	<body>

		@include('partials.nav')

		@yield('main')
		<script type="text/javascript">
			window.username = '{{ Auth::check() ? Auth::user()->surname : false }}';
		</script>
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
		<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
		<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
		<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
		<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('js/aos.js') }}"></script>
		<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
		<script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
		<script src="{{ asset('js/scrollax.min.js') }}"></script>
		<script src="{{ asset('js/main.js') }}"></script>
		@yield('script')
	</body>
</html>
