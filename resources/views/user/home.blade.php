@extends('layouts.app')


@section('content')
<style>
    .blockAjaxText{
        cursor: pointer;
        transition: 0.5s;
    }
    .blockAjaxText:hover{
        color: orange !important;
        cursor: pointer;
        transition: 0.5s;
    }
    .goToCodAnalysis{
        cursor: pointer;
        transition: 0.5s;

    }

</style>
<!-- ECharts js -->
<script src="{{ asset('assets/plugins/echarts/echarts.js')}}"></script>

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
                                    <i class="pe pe-7s-credit  fa-stack-1x text-dark"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 goToCodAnalysis">
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
                                <div class="fa-stack fa-lg fa-2x icon bg-info-transparent">
                                    <i class="pe pe-7s-credit fa-stack-1x text-dark"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 goToCodAnalysis">
                            <div class="card-body p-3  d-flex">
                                <div>
                                    <p class="text-muted mb-1">Total Confirmed</p>
                                    <h2 class="mb-0 text-dark">{{$data['total_confirmed_cod']}}</h2>
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
                                    <i class="pe pe-7s-credit fa-stack-1x text-dark"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 goToCodAnalysis">
                            <div class="card-body p-3  d-flex">
                                <div>
                                    <p class="text-muted mb-1">Total Delivered</p>
                                    <h2 class="mb-0 text-dark">{{$data['total_delivered_cod']}}</h2>
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
                                    <i class="pe pe-7s-credit fa-stack-1x text-dark"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 goToCodAnalysis">
                            <div class="card-body p-3  d-flex">
                                <div>
                                    <p class="text-muted mb-1">Total OFD</p>
                                    <h2 class="mb-0 text-dark">{{$data['total_ofd_cod']}}</h2>
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
                                    <i class="pe pe-7s-credit fa-stack-1x text-dark"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 goToCodAnalysis">
                            <div class="card-body p-3  d-flex">
                                <div>
                                    <p class="text-muted mb-1">Total Packing</p>
                                    <h2 class="mb-0 text-dark">{{$data['total_packing_cod']}}</h2>
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
                                <div class="fa-stack fa-lg fa-2x icon bg-danger-transparent">
                                    <i class="pe pe-7s-credit fa-stack-1x text-dark"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 goToCodAnalysis">
                            <div class="card-body p-3  d-flex">
                                <div>
                                    <p class="text-muted mb-1">Total Cancelled</p>
                                    <h2 class="mb-0 text-dark">{{$data['total_cancelled_cod']}}</h2>
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
                        <div>
                            <i class="si si-graph mr-1 text-danger"></i><span class="text-white">
                            <a class="text-white" href="{{route('leads.leads-list.index')}}">More Details <i class="si si-arrow-right-circle text-warning" aria-hidden="true"></i> </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                    <div class="card-body text-center">
                        <h5 class="text-white">Total Orders</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">{{$data['total_orders']}}</h2>
                        <div>
                            <i class="si si-graph mr-1 text-danger"></i><span class="text-white">
                            <a class="text-white" href="{{route('orders.all', false)}}">More Details <i class="si si-arrow-right-circle text-warning" aria-hidden="true"></i> </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                    <div class="card-body text-center">
                        <h5 class="text-white">Total Delivered</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">{{$data['total_delivered_orders']}}</h2>
                        <div>
                            <i class="si si-graph mr-1 text-danger"></i><span class="text-white">
                            <a class="text-white" href="{{route('orders.all', 'delivered')}}">More Details <i class="si si-arrow-right-circle text-warning" aria-hidden="true"></i> </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                    <div class="card-body text-center">
                        <h5 class="text-white">Total OFD</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">{{$data['total_outfordelivery_orders']}}</h2>
                        
                        <div>
                            <i class="si si-graph mr-1 text-danger"></i><span class="text-white">
                            <a class="text-white" href="{{route('orders.all', 'out for delivery')}}">More Details <i class="si si-arrow-right-circle text-warning" aria-hidden="true"></i> </a>
                            </span>
                        </div>                    
                    </div>
                </div>
                
                <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                    <div class="card-body text-center">
                        <h5 class="text-white">Total Cancelled</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">{{ $data['total_cancelled_orders'] }}</h2>
                        <div>
                            <i class="si si-graph mr-1 text-danger"></i><span class="text-white">
                            <a class="text-white" href="{{route('orders.all', 'cancelled')}}">More Details <i class="si si-arrow-right-circle text-warning" aria-hidden="true"></i> </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                    <div class="card-body text-center">
                        <h5 class="text-white">Total Packing</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">{{$data['total_packing_orders']}}</h2>
                        <div>
                            <i class="si si-graph mr-1 text-danger"></i><span class="text-white">
                            <a class="text-white" href="{{route('orders.all', 'packing')}}">More Details <i class="si si-arrow-right-circle text-warning" aria-hidden="true"></i> </a>
                            </span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

{{-- orders analytics --}}
<div class="row" id="TDrow">
    <div class="col-12">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="">Today's Delivery</label>
                <input type="date" id="TDdate" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="col-md-3 ">
                <button id="TDfilterBtn" type="submit" class="btn btn-primary mt-md-5">Fetch <i class="fa fa-server" aria-hidden="true"></i> </button>
            </div>
        </div>
        
       
    </div>

    <div class="col-lg-12">
        <div class="card ">
            <div class="card-body p-4 text-dark">
                <div class="statistics-info">
                    <div class="row text-center">
                        <div class="col-lg-2 col-md-3 mt-4 mb-4">
                            <div class="counter-status">
                                <div class="counter-icon text-danger">
                                    <i class="fe fe-box"></i>
                                </div>
                                <h5 class="text-muted">Total Orders</h5>
                                <h2 onclick="fetchAjaxData('Total Orders')" id="TDleads" class="counter mb-0 blockAjaxText text-dark mainvalue">{{$data['total_orders']}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 mt-4 mb-4">
                            <div class="counter-status">
                                <div class="counter-icon text-warning">
                                    <i class="fe fe-box"></i>
                                </div>
                                <h5 class="text-muted">Total Confirmed</h5>
                                <h2 onclick="fetchAjaxData('confirmed')" id="TDconfirmed" class="mb-0 blockAjaxText text-dark mainvalue">{{$data['total_confirmed_orders']}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 mt-4 mb-4">
                            <div class="counter-statuss">
                                <div class="counter-icon text-primary">
                                    <i class="fe fe-box"></i>
                                </div>
                                <h5 class="text-muted">Total Delivered</h5>
                                <h2 onclick="fetchAjaxData('delivered')" id="TDdelivered" class="mb-0 blockAjaxText text-dark mainvalue">{{$data['total_delivered_orders']}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 mt-4 mb-4">
                            <div class="counter-status">
                                <div class="counter-icon text-success">
                                    <i class="fe fe-box"></i>
                                </div>
                                <h5 class="text-muted">Total OFD</h5>
                                <h2 onclick="fetchAjaxData('out for delivery')" id="TDpending" class="mb-0 blockAjaxText text-dark mainvalue">{{$data['total_outfordelivery_orders']}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 mt-4 mb-4">
                            <div class="counter-status">
                                <div class="counter-icon text-success">
                                    <i class="fe fe-box"></i>
                                </div>
                                <h5 class="text-muted">Total Cancelled</h5>
                                <h2 onclick="fetchAjaxData('cancelled')" id="TDcancelled" class="mb-0 blockAjaxText text-dark mainvalue">{{$data['total_cancelled_orders']}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 mt-4 mb-4">
                            <div class="counter-status">
                                <div class="counter-icon text-success">
                                    <i class="fe fe-box"></i>
                                </div>
                                <h5 class="text-muted">Total Packing</h5>
                                <h2 onclick="fetchAjaxData('packing')" id="TDpacking" class="mb-0 blockAjaxText text-dark mainvalue">{{$data['total_packing_orders']}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        {{-- ajax data grid --}}
        <div style="display: none" id="ajaxData" class="col-12 mb-0">
            <div class="card">
                <div class="card-header">
                    Showing data for <span id="ajaxDataCondition" class="pl-2 text-primary"></span>
                </div>
                <div class="card-body">
                    <div class="progress" id="ajaxDataLoader">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 25%;"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Fteching......</div>
                    </div>
                    <div class="col-12" id="ajaxDataContent">
    
                    </div>
                </div>
               
            </div>
        </div>
    {{-- <div class="col-sm-12 col-lg-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex clearfix">
                    <div class="text-left mt-3">
                        <p class="card-text text-muted mb-1">Total Leads</p>
                        <h2 id="TDleads" class="mb-0 text-dark mainvalue">{{$data['total_leads_count']}}</h2>
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
                        <h2 id="TDconfirmed" class="mb-0 text-dark mainvalue">{{$data['total_confirmed_orders']}}</h2>
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
                        <h2 id="TDdelivered" class="mb-0 text-dark mainvalue">{{$data['total_delivered_orders']}}</h2>
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
                        <h2 id="TDpending" class="mb-0 text-dark mainvalue">{{$data['total_pending_orders']}}</h2>
                    </div>
                    <div class="ml-auto">
                        <span class="bg-warning-transparent icon-service text-warning">
                            <i class="si si-call-out  fs-2"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Last 7 days Leads Import vs Orders confirmed</h3>
            </div>
            <div class="card-body">
                <div id="echart1" class="chartsh chart-dropshadow"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Demographics</h3>
            </div>
            <div class="card-body">
                <div id="echart-1" class="chartsh chart-dropshadow"></div>
            </div>
        </div>
    </div>
</div>

{{-- last week --}}
{{-- <div class="row">
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
    
</div> --}}

<script>
        var dataFilterWithDate = false;

    $(document).ready(function(){
        // calls functions to init
        barChart7daysLeadsOrders();
        radarCircleChart();

        $("#TDfilterBtn").on('click', function(){
            var date = $("#TDdate").val();
            dataFilterWithDate = true;

            $(this).removeClass('btn-indigo');
            $(this).addClass('btn-dark');

            $("#TDrow").addClass("bg-light shadow-lg");
            $.ajax({
                type: "POST",
                url: "{{route('dashboard.today-filter')}}",
                data: {date:date,_token: "{{ csrf_token() }}",},
                success: function (response) {

                    $('#TDleads').html(response.data.leads);
                    $('#TDconfirmed').html(response.data.confirmed);
                    $('#TDdelivered').html(response.data.delivered);
                    $('#TDpending').html(response.data.pending);
                    $('#TDcancelled').html(response.data.cancelled);
                    $('#TDpacking').html(response.data.packing);

                    $("#TDfilterBtn").removeClass('btn-dark');
                    $('#TDfilterBtn').addClass('btn-indigo');
                    $("#TDrow").removeClass("bg-light shadow-lg");
                }
            });
        });

        $('.goToCodAnalysis').on('click', function(){
            window.location.href = "{{route('reports.cod-analysis')}}";
        });
    });

    function fetchAjaxData(condition){
        $("#ajaxDataContent").html("");
        $('#ajaxData').show();
        $('#ajaxDataCondition').html(" "+condition);
        var input = {};
        input.condition = condition;
        input._token = "{{csrf_token()}}";
        if(dataFilterWithDate == true){
            input.date = $("#TDdate").val();
        }
        $.ajax({
            type: "POST",
            url: "{{route('dashboard.ajax.datafetch')}}",
            data: input,
            success: function (response) {
                $('#ajaxDataLoader').hide();
                $("#ajaxDataContent").html(response);
                
            }
        });
    }


    // 7 days leads vs order
    function barChart7daysLeadsOrders(){
        var cDates = @php echo json_encode($data['LvsO']['dates'] ) @endphp;
        var cLeads = @php echo json_encode($data['LvsO']['leads'] ) @endphp;
        var cOrders = @php echo json_encode($data['LvsO']['orders'] ) @endphp;

        var chartdata = [
            {
            name: 'leads',
            type: 'bar',
            data: cLeads,
            smooth: true
            },
            {
            name: 'orders',
            type: 'bar',
            smooth:true,
            data: cOrders
            },
           
        ];

        var chart = document.getElementById('echart1');
        var barChart = echarts.init(chart);

        var option = {
            grid: {
            top: '6',
            right: '0',
            bottom: '17',
            left: '25',
            },
            xAxis: {
            data: cDates,
            axisLine: {
                lineStyle: {
                color: 'rgba(0,0,0,0.05)'
                }
            },
            axisLabel: {
                fontSize: 10,
                color: '#54595f'
            }
            },
            tooltip: {
                show: true,
                showContent: true,
                alwaysShowContent: true,
                triggerOn: 'mousemove',
                trigger: 'axis',
                axisPointer:
                {
                    label: {
                        show: false,
                    }
                }

            },
            yAxis: {
            splitLine: {
                lineStyle: {
                color: 'rgba(0,0,0,0.05)'
                }
            },
            axisLine: {
                lineStyle: {
                color: 'rgba(0,0,0,0.05)'
                }
            },
            axisLabel: {
                fontSize: 10,
                color: '#aaa'
            }
            },
            series: chartdata,
            color:[ '#1753fc ','#fa626b', '#32cafe',]
        };

        barChart.setOption(option);
    }
    
    function radarCircleChart(){
        var myChart2 = echarts.init(document.getElementById('echart-1'));
        var option2 = {
            title: {
                text: '',
                subtext: '',
                x: 'center'
            },
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                x: 'center',
                y: 'bottom',
                data: ['My Products', 'My Leads', 'My Orders', 'My Warehouses'],
                textStyle: {
                    color: 'rgba(0,0,0,0.3)'
                }
            },
            toolbox: {
                show: true,
                feature: {
                    mark: {
                        show: true
                    },
                    dataView: {
                        show: true,
                        readOnly: false
                    },
                    magicType: {
                        show: true,
                        type: ['pie']
                    },
                    restore: {
                        show: true
                    },
                    saveAsImage: {
                        show: true
                    }
                }
            },
            calculable: true,
            series: [{
                name: '',
                type: 'pie',
                radius: [20, 110],
                center: ['50%', '50%'],
                roseType: 'radius',
                label: {
                    normal: {
                        show: false
                    },
                    emphasis: {
                        show: true
                    }
                },
                lableLine: {
                    normal: {
                        show: false
                    },
                    emphasis: {
                        show: true
                    }
                },
                data: [{
                    value: {{$data['total_products']}},
                    name: 'My Products'
                },
                {
                    value: {{$data['total_leads']}},
                    name: 'My Leads'
                }, {
                    value: {{$data['total_orders']}},
                    name: 'My Orders'
                }, {
                    value: {{$data['total_warehouses']}},
                    name: 'My Warehouses'
                }
                ]
            }, ],
            color: ['#ed00c3', ' #00b3ff', '#00d9bf', '#fc0']
        };
        myChart2.setOption(option2);
    }
</script>

@endsection
