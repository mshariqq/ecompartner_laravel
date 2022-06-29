<!doctype html>
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
		<title>Seller Panel - Aissa</title>

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

				<!-- Charts js-->
				<script src="{{ asset('assets/plugins/chart/chart.bundle.js')}}"></script>
				<script src="{{ asset('assets/plugins/chart/utils.js')}}"></script>
		
				<!-- Charts js-->
				<script src="{{asset('assets/plugins/chart/chart.bundle.js')}}"></script>
				<script src="{{asset('assets/plugins/chart/chart.extension.js')}}"></script>
				
				<script src="{{ asset('assets/js/chartjs.js')}}"></script>

	</head>
	<body class="app sidebar-mini rtl">

		<!--Global-Loader-->
		<div id="global-loader">
			<img src="{{ asset('assets/images/icons/loader.svg')}}" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">
				<!--app-header-->
				<div class="app-header header hor-topheader d-flex">
					<div class="container">
						<div class="d-flex">
						    <a class="header-brand" href="index.html">
								<img src="{{ asset('assets/images/brand/logo.png')}}" class="header-brand-img main-logo" alt="Hogo logo">
								<img src="{{ asset('assets/images/brand/icon.png')}}" class="header-brand-img icon-logo" alt="Hogo logo">
							</a><!-- logo-->
							<a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a>
							<a href="#" data-toggle="search" class="nav-link nav-link  navsearch"><i class="fa fa-search"></i></a><!-- search icon -->
							<div class="header-form">
								<form class="form-inline">
									<div class="search-element mr-3">
										<input class="form-control" type="search" placeholder="Search" aria-label="Search">
										<span class="Search-icon"><i class="fa fa-search"></i></span>
									</div>
								</form><!-- search-bar -->
							</div>
                            <ul class="nav navbar">
                                <li>You are logged in <b>Seller Panel</b></li>
                            </ul>   
							{{-- <ul class="nav navbar-nav horizontal-nav header-nav">
								<li class="mega-dropdown nav-item">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
										<i class="fe fe-grid mr-2"></i>UI Kit <i class="fa fa-angle-down ml-1"></i>
									</a>
									<ul class="dropdown-menu mega-dropdown-menu container row p-5">
										<li>
											<div class="row">
												<div class="col-md-4">
													<div class="">
														<div class="card-body p-0 relative">
															<div class="arrow-ribbon">Comming Events</div>
															<img class="" alt="img" src="{{ asset('assets/images/photos/32.jpg')}}">
															<div class="btn-absolute">
																<a class="btn btn-primary btn-pill btn-sm" href="#">More info</a>
																<span id="timer-countercallback1" class="h5 text-white float-right mb-0 mt-1"></span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-2">
													<h4  class="mb-3">Pages</h4>
													<a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Client Support</a>
													<a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> About Us</a>
													<a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Calendar</a>
													<a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Add New Pages</a>
													<a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Login Pages</a>
												</div>
												<div class="col-2">
													<h4  class="mb-3">Pages</h4>
													<a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Documentation</a>
													<a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Multi Pages</a>
													<a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Edit Profile</a>
													<a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Mail Settings</a>
													<a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Default Setting</a>
												</div>
												<div class="col-md-4">
													<h4  class="mb-3">Current projects</h4>
													<div class="overflow-hidden">
														<div class="card-body p-0">
															<div class="list-group list-lg-group list-group-flush">
																<a class="list-group-item list-group-item-action overflow-hidden pl-0 pr-0 pb-4" href="#">
																	<div class="d-flex">
																		<img class="avatar-xl br-7 mr-3" src="{{ asset('assets/images/photos/33.jpg')}}" alt="Image description">
																		<div class="media-body">
																			<div class="align-items-center">
																				<h5 class="mb-0">
																					Wordpress project
																				</h5>
																			</div>
																			<div class="mb-2 mt-2">
																				<p class="mb-2">Project Status<span class="float-right text-default">85%</span></p>
																				<div class="progress progress-sm mb-0 h-1">
																					<div class="progress-bar progress-bar-striped progress-bar-animated bg-success w-85"></div>
																				</div>
																			</div>
																		</div>
																	</div>
																</a>
																<a class="list-group-item list-group-item-action overflow-hidden pl-0 pr-0 pt-4" href="#">
																	<div class="d-flex">
																		<img class="avatar-xl br-7 mr-3" src="{{ asset('assets/images/photos/34.jpg')}}" alt="Image description">
																		<div class="media-body">
																			<div class="align-items-center">
																				<h5 class="mb-0">
																					Html project
																				</h5>
																			</div>
																			<div class="mb-2 mt-2">
																				<p class="mb-2">Project Status<span class="float-right text-default">75%</span></p>
																				<div class="progress progress-sm mb-0 h-1">
																					<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-75"></div>
																				</div>
																			</div>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
							</ul> --}}
							{{-- <ul class="nav header-nav">

								<li class="nav-item dropdown header-option m-2">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
										<i class="fe fe-settings mr-2"></i>Settings
									</a>
									<div class="dropdown-menu dropdown-menu-left">
										<a class="dropdown-item" href="#">Option 1</a>
										<a class="dropdown-item" href="#">Option 2</a>
										<a class="dropdown-item" href="#">Option 3</a>
										<a class="dropdown-item" href="#">Option 4</a>
										<a class="dropdown-item" href="#">Option 5</a>

									</div>
								</li>
							</ul> --}}
							<div class="d-flex order-lg-2 ml-auto header-rightmenu">
								<div class="dropdown">
									<a  class="nav-link icon full-screen-link" id="fullscreen-button">
										<i class="fe fe-maximize-2"></i>
									</a>
								</div><!-- full-screen -->
								<div class="dropdown header-notify">
									<a class="nav-link icon" data-toggle="dropdown" aria-expanded="false">
										<i class="fe fe-bell "></i>
										<span class="pulse bg-success"></span>
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
											<span class="text-gray-white"><span class="ml-2">{{ auth()->user()->name }}</span></span>
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
													<a class="" href="{{route('user.logout')}}"><i class="dropdown-icon mdi mdi-logout-variant fs-30 m-0 leading-tight"></i></a>
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
								<li aria-haspopup="true"><a href="{{url('/home')}}" class="sub-icon active"><i class="typcn typcn-device-desktop hor-icon"></i> Dashboard </a>
									
								</li>
								<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-th-large-outline hor-icon"></i> Leads <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('leads.leads-list.index')}}">All Leads</a></li>
										<li aria-haspopup="true"><a href="{{route('leads.import')}}">Import Leads</a></li>
										
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-chart-pie-outline"></i> Orders <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route("orders.all")}}">Browse Orders</a></li>
										{{-- <li aria-haspopup="true"><a href="chart-morris.html">Reports</a></li> --}}
										
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-briefcase"></i> Warehouse </a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('warehouses.all')}}">My Warehouses</a></li>
										<li aria-haspopup="true"><a href="{{route('warehouses.products')}}">My Products</a></li>
										
									</ul>
								</li>

								<li aria-haspopup="true"><a href="#" class="sub-icon "><i class="typcn typcn-cog-outline"></i> Reports <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="profile.html">Orders</a></li>
										<li aria-haspopup="true"><a href="editprofile.html">Leads</a></li>

										<li aria-haspopup="true" ><a href="construction.html">Warehouse</a></li>
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
                                    <h3 class="mb-0 mt-2">Welcome Back <span class="text-primary">{{ auth()->user()->name }}</span></h3>
									{{-- <a class="btn btn-danger" href="#"><i class="fe fe-rotate-cw mr-1 mt-1"></i> Upgrade </a> --}}
								</div>
							</div>
							<div class="col col-auto">
								<a class="btn btn-light mt-4 mt-sm-0" href="#"><i class="fe fe-help-circle mr-1 mt-1"></i>  Support</a>
								<a class="btn btn-success mt-4 mt-sm-0" href="#"><i class="fe fe-plus mr-1 mt-1"></i> Add New</a>
							</div>
						</div>
					</div>
				</div><!--End Header submenu -->

                <!-- app-content-->
				<div class="container content-area">
					<div class="side-app">
						@if (\Session::has('success'))
							<div class="alert alert-success">
								<p>{!! \Session::get('success') !!}</p>
							</div>
						@elseif (\Session::has('error'))
							<div class="alert alert-danger">
								<p>{!! \Session::get('error') !!}</p>
							</div>
						@endif
                        @yield('content')
					</div><!--End side app-->

					<!-- Right-sidebar-->
					<div class="sidebar sidebar-right sidebar-animate">
						<div class="tab-menu-heading siderbar-tabs border-0">
							<div class="tabs-menu ">
								<!-- Tabs -->
								<ul class="nav panel-tabs">
									<li class=""><a href="#tab"  class="active" data-toggle="tab">Profile</a></li>
									<li class=""><a href="#tab1" data-toggle="tab">Chat</a></li>
									<li><a href="#tab2" data-toggle="tab">Activity</a></li>
									<li><a href="#tab3" data-toggle="tab">Todo</a></li>
								</ul>
							</div>
						</div>
						<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
							<div class="tab-content border-top">
								<div class="tab-pane active " id="tab">
									<div class="card-body p-0">
										<div class="header-user text-center mt-4 pb-4">
											<span class="avatar avatar-xxl brround"><img src="{{ asset('assets/images/users/female/33.png')}}" alt="Profile-img" class="avatar avatar-xxl brround"></span>
											<div class="dropdown-item text-center font-weight-semibold user h3 mb-0"><span class="text-primary">{{ auth()->user()->name }}</span></div>
											<small>Web Designer</small>
											<div class="card-body">
												<div class="form-group ">
													<label class="form-label  text-left">Offline/Online</label>
													<select class="form-control select2 " data-placeholder="Choose one">
														<option label="Choose one">
														</option>
														<option value="1">Online</option>
														<option value="2">Offline</option>
													</select>
												</div>
												<div class="form-group ">
													<label class="form-label text-left">Website</label>
													<select class="form-control select2 " data-placeholder="Choose one">
														<option label="Choose one">
														</option>
														<option value="1">Spruko.com</option>
														<option value="2">sprukosoft.com</option>
														<option value="3">sprukotechnologies.com</option>
														<option value="4">sprukoinfo.com</option>
														<option value="5">sprukotech.com</option>
													</select>
												</div>
											</div>
										</div>
										<a class="dropdown-item  border-top" href="#">
											<i class="dropdown-icon mdi mdi-account-outline "></i> Spruko technologies
										</a>
										<a class="dropdown-item border-top" href="#">
											<i class="dropdown-icon  mdi mdi-account-plus"></i> Add another Account
										</a>
										<div class="card-body border-top">
											<div class="row">
												<div class="col-4 text-center">
													<a class="" href=""><i class="dropdown-icon mdi  mdi-message-outline fs-30 m-0 leading-tight"></i></a>
													<div>Inbox</div>
												</div>
												<div class="col-4 text-center">
													<a class="" href=""><i class="dropdown-icon mdi mdi-tune fs-30 m-0 leading-tight"></i></a>
													<div>Settings</div>
												</div>
												<div class="col-4 text-center">
													<a class="" href="{{route('user.logout')}}"><i class="dropdown-icon mdi mdi-logout-variant fs-30 m-0 leading-tight"></i></a>
													<div>Sign out</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab1">
									<div class="chat">
										<div class="contacts_card">
											<div class="input-group p-3">
												<input type="text" placeholder="Search..." class="form-control search">
												<div class="input-group-prepend">
													<span class="input-group-text search_btn  "><i class="fa fa-search"></i></span>
												</div>
											</div>
											<ul class="contacts mb-0">
												<li class="active">
													<div class="d-flex bd-highlight">
														<div class="img_cont">
															<img src="{{ asset('assets/images/users/male/3.jpg')}}" class="rounded-circle user_img" alt="img">
															<span class="online_icon"></span>
														</div>
														<div class="user_info">
															<h6 class="mt-1 mb-0 ">Maryam Naz</h6>
															<small class="text-muted">Maryam is online</small>
														</div>
														<div class="float-right text-right ml-auto mt-auto mb-auto"><small>01-02-2019</small></div>
													</div>
												</li>
												<li>
													<div class="d-flex bd-highlight">
														<div class="img_cont">
															<img src="{{ asset('assets/images/users/female/1.jpg')}}" class="rounded-circle user_img" alt="img">

														</div>
														<div class="user_info">
															<h6 class="mt-1 mb-0 ">Sahar Darya</h6>
															<small class="text-muted">Sahar left 7 mins ago</small>
														</div>
														<div class="float-right text-right ml-auto mt-auto mb-auto"><small>01-02-2019</small></div>
													</div>
												</li>
												<li>
													<div class="d-flex bd-highlight">
														<div class="img_cont">
															<img src="{{ asset('assets/images/users/female/9.jpg')}}" class="rounded-circle user_img" alt="img">
															<span class="online_icon"></span>
														</div>
														<div class="user_info">
															<h6 class="mt-1 mb-0 ">Maryam Naz</h6>
															<small class="text-muted">Maryam is online</small>
														</div>
														<div class="float-right text-right ml-auto mt-auto mb-auto"><small>01-02-2019</small></div>
													</div>
												</li>
												<li>
													<div class="d-flex bd-highlight">
														<div class="img_cont">
															<img src="{{ asset('assets/images/users/female/12.jpg')}}" class="rounded-circle user_img" alt="img">

														</div>
														<div class="user_info">
															<h6 class="mt-1 mb-0 ">Yolduz Rafi</h6>
															<small class="text-muted">Yolduz is online</small>
														</div>
														<div class="float-right text-right ml-auto mt-auto mb-auto"><small>02-02-2019</small></div>
													</div>
												</li>
												<li>
													<div class="d-flex bd-highlight">
														<div class="img_cont">
															<img src="{{ asset('assets/images/users/male/15.jpg')}}" class="rounded-circle user_img" alt="img">
															<span class="online_icon"></span>
														</div>
														<div class="user_info">
															<h6 class="mt-1 mb-0 ">Nargis Hawa</h6>
															<small class="text-muted">Nargis left 30 mins ago</small>
														</div>
														<div class="float-right text-right ml-auto mt-auto mb-auto"><small>02-02-2019</small></div>
													</div>
												</li>
												<li>
													<div class="d-flex bd-highlight">
														<div class="img_cont">
															<img src="{{ asset('assets/images/users/male/17.jpg')}}" class="rounded-circle user_img" alt="img">
															<span class="online_icon"></span>
														</div>
														<div class="user_info">
															<h6 class="mt-1 mb-0 ">Khadija Mehr</h6>
															<small class="text-muted">Khadija left 50 mins ago</small>
														</div>
														<div class="float-right text-right ml-auto mt-auto mb-auto"><small>03-02-2019</small></div>
													</div>
												</li>
												<li>
													<div class="d-flex bd-highlight">
														<div class="img_cont">
															<img src="{{ asset('assets/images/users/female/18.jpg')}}" class="rounded-circle user_img" alt="img">

														</div>
														<div class="user_info">
															<h6 class="mt-1 mb-0 ">Khadija Mehr</h6>
															<small class="text-muted">Khadija left 50 mins ago</small>
														</div>
														<div class="float-right text-right ml-auto mt-auto mb-auto"><small>03-02-2019</small></div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="tab-pane  " id="tab2">
									<div class="list d-flex align-items-center border-bottom p-4">
										<div class="">
											<span class="avatar bg-primary brround avatar-md">CH</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>New Websites is Created</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">30 mins ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="list d-flex align-items-center border-bottom p-4">
										<div class="">
											<span class="avatar bg-danger brround avatar-md">N</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>Prepare For the Next Project</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">2 hours ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="list d-flex align-items-center border-bottom p-4">
										<div class="">
											<span class="avatar bg-info brround avatar-md">S</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>Decide the live Discussion Time</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">3 hours ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="list d-flex align-items-center border-bottom p-4">
										<div class="">
											<span class="avatar bg-warning brround avatar-md">K</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>Team Review meeting at yesterday at 3:00 pm</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">4 hours ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="list d-flex align-items-center border-bottom p-4">
										<div class="">
											<span class="avatar bg-success brround avatar-md">R</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>Prepare for Presentation</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">1 days ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="list d-flex align-items-center  border-bottom p-4">
										<div class="">
											<span class="avatar bg-pink brround avatar-md">MS</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>Prepare for Presentation</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">1 days ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="list d-flex align-items-center border-bottom p-4">
										<div class="">
											<span class="avatar bg-purple brround avatar-md">L</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>Prepare for Presentation</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">45 mintues ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="list d-flex align-items-center p-4">
										<div class="">
											<span class="avatar bg-blue brround avatar-md">U</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>Prepare for Presentation</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">2 days ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab3">
									<div class="">
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
												<span class="custom-control-label">Do Even More..</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2" checked="">
												<span class="custom-control-label">Find an idea.</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox3" value="option3" checked="">
												<span class="custom-control-label">Hangout with friends</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox4" value="option4" >
												<span class="custom-control-label">Do Something else</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox5" value="option5" >
												<span class="custom-control-label">Eat healthy, Eat Fresh..</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox6" value="option6" checked="">
												<span class="custom-control-label">Finsh something more..</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox7" value="option7" checked="">
												<span class="custom-control-label">Do something more</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox8" value="option8" >
												<span class="custom-control-label">Updated more files</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox9" value="option9" >
												<span class="custom-control-label">System updated</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top border-bottom">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox10" value="option10" >
												<span class="custom-control-label">Settings Changings...</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="text-center pt-5">
											<a href="#" class="btn btn-primary btn-pill">Upgrade more</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- End Rightsidebar-->

					<!--footer-->
					<footer class="footer">
						<div class="container">
							<div class="row align-items-center flex-row-reverse">
								<div class="col-lg-12 col-sm-12   text-center">
									Copyright © 2019 <a href="#">Aissa</a>. Developed by <a href="https://www.shariqq.com/">Shariqq</a> All rights reserved.
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

		<!--Owl Carousel js -->
		<script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.js')}}"></script>
		<script src="{{ asset('assets/plugins/owl-carousel/owl-main.js')}}"></script>

		<!-- Rightsidebar js -->
		<script src="{{ asset('assets/plugins/sidebar/sidebar.js')}}"></script>

		<!--Time Counter js-->
		<script src="{{ asset('assets/plugins/counters/jquery.missofis-countdown.js')}}"></script>
		<script src="{{ asset('assets/plugins/counters/counter.js')}}"></script>

		<!-- Custom js-->
		<script src="{{ asset('assets/js/custom.js')}}"></script>

	</body>
</html>