<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="root_url" content="{{ url( '/' ) }}">
	<meta name="api_token" content="{{ csrf_token() }}">
	<title>Careers in Metro - Find Jobs In Your Reach</title>
	<link rel="icon" href="{{ url( 'assets/img/logos/favicon.png' ) }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ url( 'assets/plugins/css/nprogress.css' ) }}">
	<link rel="stylesheet" href="{{ url( 'assets/css/jquery-ui-1.12.1.css' ) }}">
	<link rel="stylesheet" href="{{ url( 'assets/css/responsive-dojo.min.css' ) }}">
	<link rel="stylesheet" href="{{ url( 'assets/css/admin.min.css' ) }}">
	@yield( 'inner-styles' )
</head>
<body class="{{ $page_name . '-page' }}">
	
	<main id="main-wrapper" class="row">
		@include( 'includes.admins.sidebar' )
		<section id="main-section">
			@include( 'includes.admins.topbar' )
			@yield( 'content' )
		</section> {{-- end of #main-section --}}
		@include( 'includes.notif' )
	</main> {{-- end of #main-wrapper --}}
	
	<script src="{{ url( 'assets/js/jquery-1.12.4.min.js' ) }}"></script>
	<script src="{{ url( 'assets/js/jquery-ui-1.12.1.min.js' ) }}"></script>
	<script src="{{ url( 'assets/plugins/js/initialize.js' ) }}"></script>
	<script src="{{ url( 'assets/plugins/js/actual.min.js' ) }}"></script>
	<script src="{{ url( 'assets/plugins/js/nprogress.js' ) }}"></script>
	<script src="{{ url( 'assets/js/responsive-dojo.js' ) }}"></script>
	<script src="{{ url( 'assets/js/main.js' ) }}"></script>
	@yield( 'inner-scripts' )
</body>
</html>