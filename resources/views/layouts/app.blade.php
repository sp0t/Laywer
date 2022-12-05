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
	<link href="{{URL::asset('assets/global_assets/css/icons/fontawesome/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{URL::asset('assets/css/all.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{URL::asset('assets/css/ajax-working.css')}}" rel="stylesheet" type="text/css">

	@yield('styles')
	<!-- /global stylesheets -->
	<style type="text/css">
		.content-border-style{
			border-top-color: #2196f3;
    		border-top-width: 2px;			
		}

		.buttons-styles{
			background-color: #e09434;
    		border-color: #996c34;
		}
	</style>

	<!-- Core JS files -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
	<script src="{{URL::asset('assets/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{URL::asset('assets/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script src="{{URL::asset('assets/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
	<script src="{{URL::asset('assets/global_assets/js/plugins/notifications/jgrowl.min.js') }}"></script>
	<script src="{{URL::asset('assets/global_assets/js/plugins/notifications/noty.min.js') }}"></script>

	
	<script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/jquery.bootstrap-growl.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ajax-working.js?ver=10072022') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/extra_jgrowl_noty.js?ver=10072022') }}"></script>
	<script src="{{ asset('assets/global_assets/js/plugins/forms/validation/validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/global_assets/js/plugins/ui/bootstrap-confirmation.js') }}"></script>

	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
	
	@yield('jsfiles')
	<script src="{{URL::asset('assets/js/app.js')}}"></script>

	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-lg navbar-dark navbar-static">
		<div class="d-flex flex-1 d-lg-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-paragraph-justify3"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-transmission"></i>
			</button>
		</div>

		<div class="navbar-brand text-center text-lg-left">
			<a href="index.html" class="d-inline-block">
				<img src="{{URL::asset('assets/img/Untitled.png')}}" class="d-none d-sm-block" alt="">
				<img src="{{URL::asset('assets/img/logo.png')}}" class="d-sm-none" alt="">
			</a>
		</div>

		<div class="collapse navbar-collapse order-2 order-lg-1" id="navbar-mobile">
			<span class="badge badge-success my-3 my-lg-0 ml-lg-3">Online</span>
		</div>

		<ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">
			<li class="nav-item nav-item-dropdown-lg dropdown">
				<a href="#" class="navbar-nav-link navbar-nav-link-toggler" data-toggle="dropdown">
					<i class="icon-bell2"></i>
					<span class="badge badge-warning badge-pill ml-auto ml-lg-0">2</span>
				</a>
				
				<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-lg-350">
					<div class="dropdown-content-header">
						<span class="font-weight-semibold">Messages</span>
						<a href="#" class="text-body"><i class="icon-compose"></i></a>
					</div>

					<div class="dropdown-content-body dropdown-scrollable">
						<ul class="media-list">
							<li class="media">
								<div class="mr-3 position-relative">
									<img src="{{URL::asset('assets/global_assets/images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
								</div>

								<div class="media-body">
									<div class="media-title">
										<a href="#">
											<span class="font-weight-semibold">James Alexander</span>
											<span class="text-muted float-right font-size-sm">04:58</span>
										</a>
									</div>

									<span class="text-muted">who knows, maybe that would be the best thing for me...</span>
								</div>
							</li>

							<li class="media">
								<div class="mr-3 position-relative">
									<img src="{{URL::asset('assets/global_assets/images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
								</div>

								<div class="media-body">
									<div class="media-title">
										<a href="#">
											<span class="font-weight-semibold">Margo Baker</span>
											<span class="text-muted float-right font-size-sm">12:16</span>
										</a>
									</div>

									<span class="text-muted">That was something he was unable to do because...</span>
								</div>
							</li>

							<li class="media">
								<div class="mr-3">
									<img src="{{URL::asset('assets/global_assets/images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
								</div>
								<div class="media-body">
									<div class="media-title">
										<a href="#">
											<span class="font-weight-semibold">Jeremy Victorino</span>
											<span class="text-muted float-right font-size-sm">22:48</span>
										</a>
									</div>

									<span class="text-muted">But that would be extremely strained and suspicious...</span>
								</div>
							</li>

							<li class="media">
								<div class="mr-3">
									<img src="{{URL::asset('assets/global_assets/images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
								</div>
								<div class="media-body">
									<div class="media-title">
										<a href="#">
											<span class="font-weight-semibold">Beatrix Diaz</span>
											<span class="text-muted float-right font-size-sm">Tue</span>
										</a>
									</div>

									<span class="text-muted">What a strenuous career it is that I've chosen...</span>
								</div>
							</li>

							<li class="media">
								<div class="mr-3">
									<img src="{{URL::asset('assets/global_assets/images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
								</div>
								<div class="media-body">
									<div class="media-title">
										<a href="#">
											<span class="font-weight-semibold">Richard Vango</span>
											<span class="text-muted float-right font-size-sm">Mon</span>
										</a>
									</div>
									
									<span class="text-muted">Other travelling salesmen live a life of luxury...</span>
								</div>
							</li>
						</ul>
					</div>

					<div class="dropdown-content-footer justify-content-center p-0">
						<a href="#" class="btn btn-light btn-block border-0 rounded-top-0" data-popup="tooltip" title="Load more"><i class="icon-menu7"></i></a>
					</div>
				</div>
			</li>

			<li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
				<a href="#" class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100" data-toggle="dropdown">
					<img src="{{URL::asset('assets/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-pill mr-lg-2" height="34" alt="">
					<span class="d-none d-lg-inline-block">Victoria</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
					<a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
					<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-primary badge-pill ml-auto">58</span></a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
					<a href="{{ route('login.logout'); }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
				</div>
			</li>
		</ul>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-section sidebar-user my-1">
					<div class="sidebar-section-body">
						<div class="media">
							<a href="#" class="mr-3">
								<img src="{{URL::asset('assets/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle" alt="">
							</a>

							<div class="media-body">
								<div class="font-weight-semibold">Victoria Baker</div>
								<div class="font-size-sm line-height-sm opacity-50">
									Senior developer
								</div>
							</div>

							<div class="ml-3 align-self-center">
								<button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
									<i class="icon-transmission"></i>
								</button>

								<button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
									<i class="icon-cross2"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
					@include('layouts.side_menu')
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Page header -->
				<div class="page-header page-header-light">
				    
				    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
				        <div class="d-flex">
				            <div class="breadcrumb">
				                <a href="{{ route('dashboard.index'); }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
				                @yield('breadcrumb')
				                
				            </div>

				            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
				        </div>

				        <div class="header-elements d-none">
				            <div class="breadcrumb justify-content-center">
				                

				                <div class="breadcrumb-elements-item dropdown p-0">
				                    

				                    
				                </div>
				            </div>
				        </div>
				    </div>
				</div>				
				<!-- /page header -->


				<!-- Content area -->
				@yield('content')
				<!-- /content area -->


				<!-- Footer -->
				<div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
					<div class="text-center d-lg-none w-100">
						<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
							<i class="icon-unfold mr-2"></i>
							Footer
						</button>
					</div>

					<div class="navbar-collapse collapse" id="navbar-footer">
						<span class="navbar-text">
							Developed by <a href="https://syncbridge.com/" target="_blank">Syncbridge.com</a>
						</span>
					</div>
				</div>
				<!-- /footer -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	@yield('scripts')
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#mysummernote").summernote();
			$('.dropdown-toggle').dropdown();
		});
	</script>
</body>
</html>
