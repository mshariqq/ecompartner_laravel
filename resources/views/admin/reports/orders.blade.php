@extends('layouts.admin')

@section('content')

<div class="page-header">
    <h2>Orders Reports</h2>
</div>

<div class="row row-cards">
    <div class="col-sm-12 col-lg-6 col-md-6 col-xl-3 ">
        <div class="card card-img-holder">
            <div class="card-body">
                <p class="card-text text-dark font-weight-semibold mb-1">Total Orders</p>
                <div class="clearfix">
                    <div class="float-left  mt-2">
                        <h1>50</h1>
                    </div>
                    <div class="float-right text-right">
                        <span class="pie" data-peity="{ &quot;fill&quot;: [&quot;#6352a0&quot;, &quot;#ebe9f7&quot;]}" style="display: none;">226,134</span><svg class="peity" height="50" width="50"><path d="M 25 0 A 25 25 0 1 1 7.016504991533726 42.36645926147494 L 25 25" fill="#6352a0"></path><path d="M 7.016504991533726 42.36645926147494 A 25 25 0 0 1 24.999999999999996 0 L 25 25" fill="#ebe9f7"></path></svg>
                    </div>
                </div>
                <div class="progress progress-md mt-1 h-2">
                    <div class="progress-bar w-70 bg-gradient-primary"></div>
                </div>
            </div>
        </div>
    </div><!-- col end -->
    <div class="col-sm-12 col-lg-6 col-md-6 col-xl-3">
        <div class="card card-img-holder">
            <div class="card-body">
                <p class="card-text text-dark font-weight-semibold mb-1">Orders Confirmed</p>
                <div class="clearfix">
                    <div class="float-left  mt-2">
                        <h1>25</h1>
                    </div>
                    <div class="float-right text-right">
                        <span class="pie" data-peity="{ &quot;fill&quot;: [&quot;#32cafe&quot;, &quot;#ebe9f7&quot;]}" style="display: none;">1,4</span><svg class="peity" height="50" width="50"><path d="M 25 0 A 25 25 0 0 1 48.77641290737884 17.274575140626315 L 25 25" fill="#32cafe"></path><path d="M 48.77641290737884 17.274575140626315 A 25 25 0 1 1 24.999999999999996 0 L 25 25" fill="#ebe9f7"></path></svg>
                    </div>
                </div>
                <div class="progress progress-md mt-1 h-2">
                    <div class="progress-bar w-50  bg-gradient-secondary"></div>
                </div>
            </div>
        </div>
    </div><!-- col end -->
    <div class="col-sm-12 col-lg-6 col-md-6 col-xl-3">
        <div class="card card-img-holder">
            <div class="card-body">
                <p class="card-text text-dark font-weight-semibold mb-1">Packing / Out for Delivery</p>
                <div class="clearfix">
                    <div class="float-left  mt-2">
                        <h1>4</h1>
                    </div>
                    <div class="float-right text-right">
                        <span class="pie" data-peity="{ &quot;fill&quot;: [&quot;#5ed84f&quot;, &quot;#ebe9f7&quot;]}" style="display: none;">0.52/1.561</span><svg class="peity" height="50" width="50"><path d="M 25 0 A 25 25 0 0 1 46.667386863494265 37.47094008115171 L 25 25" fill="#5ed84f"></path><path d="M 46.667386863494265 37.47094008115171 A 25 25 0 1 1 24.999999999999996 0 L 25 25" fill="#ebe9f7"></path></svg>
                    </div>
                </div>
                <div class="progress progress-md mt-1 h-2">
                    <div class="progress-bar w-30 bg-gradient-success"></div>
                </div>
            </div>
        </div>
    </div><!-- col end -->
    <div class="col-sm-12 col-lg-6 col-md-6 col-xl-3">
        <div class="card card-img-holder">
            <div class="card-body">
                <p class="card-text text-dark font-weight-semibold mb-1">Total Delivered</p>
                <div class="clearfix">
                    <div class="float-left  mt-2">
                        <h1>6</h1>
                    </div>
                    <div class="float-right text-right">
                        <span class="pie" data-peity="{ &quot;fill&quot;: [&quot;#fdb901&quot;, &quot;#ebe9f7&quot;]}" style="display: none;">0.52,1.041</span><svg class="peity" height="50" width="50"><path d="M 25 0 A 25 25 0 0 1 46.667386863494265 37.47094008115171 L 25 25" fill="#fdb901"></path><path d="M 46.667386863494265 37.47094008115171 A 25 25 0 1 1 24.999999999999996 0 L 25 25" fill="#ebe9f7"></path></svg>
                    </div>
                </div>
                <div class="progress progress-md mt-1 h-2">
                    <div class="progress-bar  progress-bar-animated w-60 bg-warning"></div>
                </div>
            </div>
        </div>
    </div><!-- col end -->
</div>

<div class="row ">
    <div class="col-xl-3 col-md-6">
        <div class="card shadow text-center">
            <div class="card-body">
                <h5 class="mb-3 font-weight-600">Confirmed Leads</h5>
                <div class="chart-circle" data-value="0.75" data-thickness="10" data-color="rgb(96, 82, 159,0.9)"><canvas width="112" height="112"></canvas>
                    <div class="chart-circle-value"><div class="text-xl">75% </div></div>
                </div>
            </div>
        </div>
    </div><!-- col end -->
    <div class="col-xl-3 col-md-6">
        <div class="card shadow text-center">
            <div class="card-body">
                <h5 class="mb-3 font-weight-600">No Reponse Leads</h5>
                <div class="chart-circle" data-value="0.55" data-thickness="10" data-color="rgb(219,112,147,0.9)"><canvas width="112" height="112"></canvas>
                    <div class="chart-circle-value"><div class="text-xl">55%</div></div>
                </div>
            </div>
        </div>
    </div><!-- col end -->
    <div class="col-xl-3 col-md-6">
        <div class="card shadow text-center">
            <div class="card-body">
                <h5 class="mb-3 font-weight-600">Cancelled Leads</h5>
                <div class="chart-circle" data-value="0.30" data-thickness="10" data-color="rgb(255, 204, 0, 0.9)"><canvas width="112" height="112"></canvas>
                    <div class="chart-circle-value"><div class="text-xl">30%</div></div>
                </div>
            </div>
        </div>
    </div><!-- col end -->
    <div class="col-xl-3 col-md-6">
        <div class="card shadow text-center">
            <div class="card-body">
                <h5 class="mb-3 font-weight-600">Leads vs Order</h5>
                <div class="chart-circle" data-value="0.45" data-thickness="10" data-color="rgb(34, 192, 60,0.9)"><canvas width="112" height="112"></canvas>
                    <div class="chart-circle-value"><div class="text-xl">45%</div></div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
