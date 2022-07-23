<!doctype html>
<!-- 
		Developer	: Md Shariqq Ahmed
		Website		: www.shariqq.com 
		Copyright	: Ecompartner
-->
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="Hogo– Creative Admin Multipurpose Responsive Bootstrap4 Dashboard HTML Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="html admin template, bootstrap admin template premium, premium responsive admin template, admin dashboard template bootstrap, bootstrap simple admin template premium, web admin template, bootstrap admin template, premium admin template html5, best bootstrap admin template, premium admin panel template, admin template"/>

		<!-- Favicon -->
		<link rel="icon" href="{{ asset('assets/images/brand/favicon.ico')}}" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico')}}" />
		<!-- Title -->
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{config('app.name')}}</title>
		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">

		<!-- Dashboard css -->
		<link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

		<!-- Horizontal-menu css -->
		<link href="{{ asset('assets/plugins/horizontal-menu/dropdown-effects/fade-down.css')}}" rel="stylesheet">
		<link href="{{ asset('assets/plugins/horizontal-menu/horizontalmenu.css')}}" rel="stylesheet">

		<!--Daterangepicker css-->
		<link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

		<!-- Rightsidebar css -->
		<link href="{{ asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

		<!-- Sidebar Accordions css -->
		<link href="{{ asset('assets/plugins/accordion1/css/easy-responsive-tabs.css')}}" rel="stylesheet">

		<!-- Owl Theme css-->
		<link href="{{ asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">

		<!-- Morris  Charts css-->
		<link href="{{ asset('assets/plugins/morris/morris.css')}}" rel="stylesheet" />

		<!---Font icons css-->
		<link href="{{ asset('assets/plugins/iconfonts/plugin.css')}}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/iconfonts/icons.css')}}" rel="stylesheet" />
		<link  href="{{ asset('assets/fonts/fonts/font-awesome.min.css')}}" rel="stylesheet">

		<!-- Jquery js-->
		<script src="{{ asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
		
	</head>
	<body class="app sidebar-mini rtl">

		<!--Global-Loader-->
		<div id="global-loader">
			<img src="{{ asset('assets/images/icons/loader.svg')}}" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">
				<!--app-header-->
				<div class="app-header header bg-primary text-white hor-topheader d-flex">
					<div class="container">
						<div class="d-flex">
						    <a class="header-brand" href="{{url('admin')}}">
								<img src="{{ asset('frontend/Images/logo.svg')}}" class="header-brand-img main-logo" alt="Hogo logo">
								<img src="{{ asset('frontend/Images/logo.svg')}}" class="header-brand-img icon-logo" alt="Hogo logo">
							</a><!-- logo-->
							<a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a>
							<a href="#" data-toggle="search" class="nav-link nav-link  navsearch"><i class="fa fa-search"></i></a><!-- search icon -->
							
							<div class="d-flex order-lg-2 ml-auto header-rightmenu">
								<div class="dropdown">
									<a  class="nav-link icon full-screen-link" id="fullscreen-button">
										<i class="fe fe-maximize-2"></i>
									</a>
								</div><!-- full-screen -->
								<div class="dropdown header-notify">
									<a class="nav-link icon" data-toggle="dropdown" aria-expanded="false">
										<i class="fe fe-bell "></i>
										{{-- <span class="pulse bg-success"></span> --}}
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
										<a href="#" class="dropdown-item text-center">0 New Notifications</a>
										<div class="dropdown-divider"></div>
										
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item text-center">View all Notifications</a>
									</div>
								</div><!-- notifications -->
								<div class="dropdown header-user">
									<a class="nav-link leading-none siderbar-link"  data-toggle="sidebar-right" data-target=".sidebar-right">
										<span class="mr-3 d-none d-lg-block ">
											<span class="text-white"><span class="ml-2">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span></span>
										</span>
										<span class="avatar avatar-md brround"><img src="{{ asset('assets/images/users/female/33.png')}}" alt="Profile-img" class="avatar avatar-md brround"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="header-user text-center mt-4 pb-4">
											<span class="avatar avatar-xxl brround"><img src="{{ asset('assets/images/users/female/33.png')}}" alt="Profile-img" class="avatar avatar-xxl brround"></span>
											<a href="#" class="dropdown-item text-center font-weight-semibold user h3 mb-0">{{ auth()->user()->name }}</a>
											<small>XXXX</small>
										</div>

										<a class="dropdown-item" href="#">
											<i class="dropdown-icon mdi mdi-account-outline "></i> Spruko technologies
										</a>
										<a class="dropdown-item" href="#">
											<i class="dropdown-icon  mdi mdi-account-plus"></i> Add another Account
										</a>
										<div class="card-body border-top">
											<div class="row">
												<div class="col-6 text-center">
													<a class="" href=""><i class="dropdown-icon mdi  mdi-message-outline fs-30 m-0 leading-tight"></i></a>
													<div>Inbox</div>
												</div>
												<div class="col-6 text-center">
													<a class="" href="{{route('admin.logout')}}"><i class="dropdown-icon mdi mdi-logout-variant fs-30 m-0 leading-tight"></i></a>
													<div>Sign out</div>
												</div>
											</div>
										</div>
									</div>
								</div><!-- profile -->
								<div class="dropdown">
									<a  class="nav-link icon siderbar-link" data-toggle="sidebar-right" data-target=".sidebar-right">
										<i class="fe fe-more-horizontal"></i>
									</a>
								</div><!-- Right-siebar-->
							</div>
						</div>
					</div>
				</div>
				<!--app-header end-->

				<!-- Horizontal-menu -->
				<div class="horizontal-main hor-menu clearfix">
					<div class="horizontal-mainwrapper container clearfix">
						<nav class="horizontalMenu clearfix">
							<ul class="horizontalMenu-list">
								<li aria-haspopup="true"><a href="{{url('/admin')}}" class="sub-icon"><i class="pe pe-7s-monitor hor-icon"></i> Dashboard </a>
									
								</li>
                                <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="si si-people"></i> Sellers <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('admin.sellers.all')}}">All Sellers</a></li>
										<li aria-haspopup="true"><a href="{{route('admin.sellers.add')}}">Add Seller</a></li>
										
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-group"></i> Leads <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('admin.leads.all')}}">All Leads</a></li>
										<li aria-haspopup="true"><a href="{{route('admin.leads.import')}}">Import Leads</a></li>
										
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fe fe-box"></i> Orders <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('admin.orders.all')}}">All Orders</a></li>
										{{-- <li aria-haspopup="true"><a href="chart-morris.html">Reports</a></li> --}}
										
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="zmdi zmdi-home"></i> Warehouse & Purchases <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('admin.warehouse.all')}}">Warehouses</a></li>
										<li aria-haspopup="true"><a href="{{route('admin.warehouse.products.all')}}">Products</a></li>
										<li aria-haspopup="true"><a href="{{route('admins.purchase.requests')}}">Purchase Requests by Sellers</a></li>
										<li aria-haspopup="true"><a href="{{route('admin.warehouse.product-purchases')}}">Purchase History</a></li>
										
									</ul>
								</li>

								<li aria-haspopup="true"><a href="#" class="sub-icon "><i class="si si-chart"></i> Reports <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('admin.reports.cod-analysis')}}">COD Analysis</a></li>
									</ul>
								</li>
								
							</ul>
						</nav>
						<!--Nav end -->
					</div>
				</div>
				<!-- Horizontal-menu end -->

				<!--Header submenu -->
				<div class="bg-white p-3 header-secondary header-submenu">
					<div class="container ">
						<div class="row">
							<div class="col">
								<div class="d-flex">
                                    <h5 class="mb-0">Admin Logged in as <span class="text-primary">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span></h5>
								</div>
							</div>
							<div class="col col-auto">
								<b>
									<span class="text-orange">
										@php
										$dt = new DateTime();
										echo $dt->format('d F D Y,  H:i:s A');
										@endphp
									</span>
								</b>
								{{-- <a class="btn btn-light mt-4 mt-sm-0" href="#"><i class="fe fe-help-circle mr-1 mt-1"></i>  Support</a> --}}
								{{-- <a class="btn btn-success mt-4 mt-sm-0" href="#"><i class="fe fe-plus mr-1 mt-1"></i> Add New</a> --}}
							</div>
						</div>
					</div>
				</div>
				<!--End Header submenu -->

                <!-- app-content-->
				<div class="container content-area">
					<div class="side-app">
						@if (\Session::has('success'))
						<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
							<p>{!! \Session::get('success') !!}</p>						
						</div>
							
						@elseif (\Session::has('error'))
						<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
							<p>{!! \Session::get('error') !!}</p>						
						</div>
						@endif

						@php
							$purchaseReqs = \App\PurchaseRequest::where('status', 'pending')->count();
							$products = \App\Product::where('status', 'pending')->count();
						@endphp
						@if ($purchaseReqs > 0)
							<div class="row">
								<div class="col-12 pt-2">
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											<span class="sr-only">Close</span>
										</button>
										<strong> <i class="fa fa-bell-o" aria-hidden="true"></i> Hey, New Stock Requests from Sellers!</strong> 
										<a href="{{route('admins.purchase.requests')}}" class="btn btn-primary">Open <i class="fa fa-eye" aria-hidden="true"></i> </a>
									</div>
								</div>
							</div>
						@elseif($products > 0)
						<div class="row">
							<div class="col-12 pt-2">
								<div class="alert alert-warning border alert-dismissible fade show" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										<span class="sr-only">Close</span>
									</button>
									<strong> <i class="fa fa-bell-o" aria-hidden="true"></i> New Products Requests from Sellers!</strong> 
									<a href="{{route('admin.warehouse.products.all', 'pending')}}" class="btn btn-primary">Check <i class="fa fa-eye" aria-hidden="true"></i> </a>
								</div>
							</div>
						</div>
						@endif
						
                        @yield('content')
					</div><!--End side app-->

					<!-- Right-sidebar-->
					<div class="sidebar sidebar-right sidebar-animate">
						<div class="card-body p-0">
							<div class="col-12">
									
								<a href="{{url('/admin')}}" class="dropdown-item text-primary">
									You are logged in <b>Admin Panel</b></a>
							</div>
							<div class="header-user text-center mt-4 pb-4">
								<span class="avatar avatar-xxl brround"><img src="{{ asset('assets/images/users/female/33.png')}}" alt="Profile-img" class="avatar avatar-xxl brround"></span>
								<div class="dropdown-item text-center font-weight-semibold user h3 mb-0"><span class="text-primary">{{ auth()->user()->name }}</span></div>
								<small>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</small>
								
							</div>
							<a class="dropdown-item text-center  border-top" href="{{route('admin.profile')}}">
								<i class="fe fe-user "></i>
								My Profile
							</a>
							
							<div class="card-body border-top">
								<div class="row justify-content-center">
								
									{{-- <div class="col-4 text-center">
										<a class="" href=""><i class="dropdown-icon mdi  mdi-message-outline fs-30 m-0 leading-tight"></i></a>
										<div>Inbox</div>
									</div>
									<div class="col-4 text-center">
										<a class="" href=""><i class="dropdown-icon mdi mdi-tune fs-30 m-0 leading-tight"></i></a>
										<div>Settings</div>
									</div> --}}
									<div class="col-md-4 col-12"></div>
									<div class="col-md-4 col-12 text-center">
										<a class="" href="{{route('admin.logout')}}"><i class="dropdown-icon mdi mdi-logout-variant fs-30 m-0 leading-tight"></i></a>
										<div>Sign out</div>
									</div>
									<div class="col-md-4 col-12"></div>
								</div>
							</div>
						</div>
						
					</div><!-- End Rightsidebar-->

					<!--footer-->
					<footer class="footer">
						<div class="container">
							<div class="row align-items-center flex-row-reverse">
								<div class="col-lg-12 col-sm-12   text-center">
									Copyright © 2022 <a href="#">Ecompartner</a>. Developed by <a href="https://www.shariqq.com/">Shariqq</a> All rights reserved.
								</div>
							</div>
						</div>
					</footer>
					<!-- End Footer-->

				</div>
				<!-- End app-content-->
			</div>
		</div>
		<!-- End Page -->

		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

		<!--Bootstrap.min js-->
		<script src="{{ asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--Jquery Sparkline js-->
		<script src="{{ asset('assets/js/vendors/jquery.sparkline.min.js')}}"></script>

		<!-- Chart Circle js-->
		<script src="{{ asset('assets/js/vendors/circle-progress.min.js')}}"></script>

		<!-- Star Rating js-->
		<script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!--Moment js-->
		<script src="{{ asset('assets/plugins/moment/moment.min.js')}}"></script>

		<!-- Daterangepicker js-->
		<script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

		<!-- Horizontal-menu js -->
		<script src="{{ asset('assets/plugins/horizontal-menu/horizontalmenu.js')}}"></script>

		<!-- Sidebar Accordions js -->
		<script src="{{ asset('assets/plugins/accordion1/js/easyResponsiveTabs.js')}}"></script>

		<!-- Custom scroll bar js-->
		<script src="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
		<!-- Rightsidebar js -->
		<script src="{{ asset('assets/plugins/sidebar/sidebar.js')}}"></script>
		<!--Owl Carousel js -->
		<script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.js')}}"></script>
		<script src="{{ asset('assets/plugins/owl-carousel/owl-main.js')}}"></script>

		<!-- Custom js-->
		<script src="{{ asset('assets/js/custom.js')}}"></script>

	</body>
</html>