<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{URL::asset('assets/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{URL::asset('assets/css/all.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{URL::asset('assets/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{URL::asset('assets/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<!-- /core JS files -->
</head>

<body>

	<!-- Page content -->
	<div class="page-content">
		@yield('content')
	</div>
	<!-- /page content -->

</body>
</html>