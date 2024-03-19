<!DOCTYPE html>
<html lang="en">
	<head>
        <title> Login | {{ config('app.name') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<meta charset="utf-8" />

		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        @yield('styles')
	</head>
	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('assets/media/illustrations/unitedpalms-1/14.png') }})">
				@yield('content')
			</div>
		</div>
		<script>var hostUrl = "assets/";</script>

		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/custom/authentication/sign-in/general.js?t=').time() }}"></script>
        @yield('scripts')
	</body>
</html>
