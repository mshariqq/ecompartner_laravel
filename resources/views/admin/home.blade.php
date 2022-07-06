@extends('layouts.admin')

{{-- @section('CustomStyles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cutsom-normal.css') }}"/>>
@endsection --}}

@section('content')


<div class="page-header">
    <h4>My Admin Dashboard</h4>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="owl-carousel owl-carousel2 owl-theme mb-5">
            <div class="item">
                <div class="card mb-0">
                    <div class="row">
                        <div class="col-4">
                            <div class="feature">
                                <div class="fa-stack fa-lg fa-2x icon bg-primary-transparent">
                                    <i class="si si-briefcase  fa-stack-1x text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card-body p-3  d-flex">
                                <div>
                                    <p class="text-muted mb-1">Total COD</p>
                                    <h2 class="mb-0 text-dark">{{$data['total_income']}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-0">
                    <div class="row">
                        <div class="col-4">
                            <div class="feature">
                                <div class="fa-stack fa-lg fa-2x icon bg-success-transparent">
                                    <i class="si si-drawer fa-stack-1x text-success"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card-body p-3  d-flex">
                                <div>
                                    <p class="text-muted mb-1">Total Confirmed</p>
                                    <h2 class="mb-0 text-dark">{{$data['total_confirmed']}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-0">
                    <div class="row">
                        <div class="col-4">
                            <div class="feature">
                                <div class="fa-stack fa-lg fa-2x icon bg-pink-transparent">
                                    <i class="si si-layers fa-stack-1x text-pink"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card-body p-3  d-flex">
                                <div>
                                    <p class="text-muted mb-1">Total Delivered</p>
                                    <h2 class="mb-0 text-dark">{{$data['total_revenue']}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-0">
                    <div class="row">
                        <div class="col-4">
                            <div class="feature">
                                <div class="fa-stack fa-lg fa-2x icon bg-warning-transparent">
                                    <i class="si si-chart fa-stack-1x text-warning"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card-body p-3  d-flex">
                                <div>
                                    <p class="text-muted mb-1">Total Pending</p>
                                    <h2 class="mb-0 text-dark">{{$data['total_pending_cod']}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Blue analytics box --}}
<div class="row">
    <div class="col-md-12">
        <div class="card card-bgimg br-7">
            <div class="row">
                <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                    <div class="card-body text-center">
                        <h5 class="text-white">Total Leads</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">{{$data['total_leads']}}</h2>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                    <div class="card-body text-center">
                        <h5 class="text-white">Total Orders</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">{{$data['total_orders']}}</h2>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                    <div class="card-body text-center">
                        <h5 class="text-white">Total Delivered</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">{{$data['total_delivered_orders']}}</h2>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                    <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">{{$data['total_outfordeivery_orders']}}</h2>
                        <span class="text-white">Out for Delivery</span>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                    <div class="card-body text-center">
                        <h5 class="text-white">Total Pending</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">{{$data['total_pending_orders']}}</h2>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                    <div class="card-body text-center">
                        <h5 class="text-white">Total Cancelled</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">{{ $data['total_cancelled_orders'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- orders analytics --}}
<div class="row">
    <div class="col-sm-12 col-lg-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex clearfix">
                    <div class="text-left mt-3">
                        <p class="card-text text-muted mb-1">Total Leads</p>
                        <h2 class="mb-0 text-dark mainvalue">{{$data['total_leads_count']}}</h2>
                    </div>
                    <div class="ml-auto">
                        <span class="bg-primary-transparent icon-service text-primary ">
                            <i class="si si-briefcase  fs-2"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex clearfix">
                    <div class="text-left mt-3">
                        <p class="card-text text-muted mb-1">Total Confirmed</p>
                        <h2 class="mb-0 text-dark mainvalue">{{$data['total_confirmed_orders']}}</h2>
                    </div>
                    <div class="ml-auto">
                        <span class="bg-success-transparent icon-service text-success">
                            <i class="si si-layers fs-2"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex clearfix">
                    <div class="text-left mt-3">
                        <p class="card-text text-muted mb-1">Total Delivered</p>
                        <h2 class="mb-0 text-dark mainvalue">{{$data['total_delivered_orders']}}</h2>
                    </div>
                    <div class="ml-auto">
                        <span class="bg-danger-transparent icon-service text-danger">
                            <i class="si si-plane  fs-2"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex clearfix">
                    <div class="text-left mt-3">
                        <p class="card-text text-muted mb-1">Total Pending</p>
                        <h2 class="mb-0 text-dark mainvalue">{{$data['total_pending_orders']}}</h2>
                    </div>
                    <div class="ml-auto">
                        <span class="bg-warning-transparent icon-service text-warning">
                            <i class="si si-call-out  fs-2"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- last week --}}
<div class="row">
    <div class="col-lg-9 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Last 7 days <span class="text-indigo">Leads Imported vs Orders Confirmed</span></h3>
            </div>
            <div class="card-body">
                <canvas id="leadsOrders" class=" h-200"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-12">
            <div class="card card-counter bg-gradient-success">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <i class="si si-people mt-3 mb-0 text-white-transparent"></i>
                        </div>
                        <div class="col-8 text-center">
                            <div class="mt-4 mb-0 text-white">
                                <h2 class="mb-0">{{$data['total_sellers']}}</h2>
                                <p class="text-white mt-1">Total Sellers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card card-counter bg-gradient-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <i class="si si-paper-plane mt-3 mb-0 text-white-transparent"></i>
                        </div>
                        <div class="col-8 text-center">
                            <div class="mt-4 mb-0 text-white">
                                <h2 class="mb-0">{{$data['total_leads']}}</h2>
                                <p class="text-white mt-1">Total Leads</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
</div>

<script>
var cDates =<?php echo json_encode($data['LvsO']['dates'] );?>;
var cLeads =<?php echo json_encode($data['LvsO']['leads'] );?>;
var cOrders =<?php echo json_encode($data['LvsO']['orders'] );?>;

    var ctx = document.getElementById("leadsOrders");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: cDates,
			type: 'line',
			defaultFontFamily: 'Montserrat',
			datasets: [{
				label: "Leads",
				data: cLeads,
				backgroundColor: 'transparent',
				borderColor: '#7B68EE',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#7B68EE',
			}, {
				label: "Orders",
				data: cOrders,
				backgroundColor: 'transparent',
				borderColor: '#228B22',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#228B22',
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#000',
				bodyFontColor: '#000',
				backgroundColor: '#fff',
				titleFontFamily: 'Montserrat',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 3,
				intersect: false,
			},
			legend: {
				display: false,
				labels: {
					usePointStyle: true,
					fontFamily: 'Montserrat',
				},
			},
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "#bbc1ca",
					 },
					display: true,
					gridLines: {
						display: false,
						drawBorder: false
					},
					scaleLabel: {
						display: false,
						labelString: 'Month',
						fontColor: 'rgba(0,0,0,0.61)'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "#bbc1ca",
					 },
					display: true,
					gridLines: {
						display: false,
						drawBorder: false
					},
					scaleLabel: {
						display: true,
						labelString: 'Value',
						fontColor: 'rgba(0,0,0,0.61)'
					}
				}]
			},
			title: {
				display: false,
				text: 'Normal Legend'
			}
		}
	});
</script>

@endsection
