<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Careers in Metro - Find Jobs In Your Reach</title>
	<link rel="icon" href="{{ url( 'assets/img/logos/favicon.png' ) }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ url( 'assets/plugins/css/nprogress.css' ) }}">
	<link rel="stylesheet" href="{{ url( 'assets/css/responsive-dojo.min.css' ) }}">
	<link rel="stylesheet" href="{{ url( 'assets/css/public.min.css' ) }}">
	@yield( 'inner-styles' )
</head>
<body class="{{ $page_name . '-page' }}">
	
	<main id="main-wrapper">
		@include( 'includes.publics.header' )
		<section id="main-section">
			@yield( 'content' )	
		</section> {{-- end of #main-section --}}
		@include( 'includes.publics.footer' )
		@include( 'includes.notif' )
	</main>
	
	<script src="{{ url( 'assets/js/jquery-1.12.4.min.js' ) }}"></script>
	<script src="{{ url( 'assets/plugins/js/initialize.js' ) }}"></script>
	<script src="{{ url( 'assets/plugins/js/actual.min.js' ) }}"></script>
	<script src="{{ url( 'assets/plugins/js/nprogress.js' ) }}"></script>
	<script src="{{ url( 'assets/plugins/js/sticky.js' ) }}"></script>
	<script src="{{ url( 'assets/js/responsive-dojo.js' ) }}"></script>
	<script src="{{ url( 'assets/js/ajax-form.js' ) }}"></script>
	<script src="{{ url( 'assets/js/main.js' ) }}"></script>
	@yield( 'inner-scripts' )
</body>
</html>