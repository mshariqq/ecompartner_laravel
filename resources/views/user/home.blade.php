@extends('layouts.app')

@section('content')

    <div class="page-header">
        <h4>Seller Dashboard</h4>
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
                                        <p class="text-muted mb-1">Total Income</p>
                                        <h2 class="mb-0 text-dark">18,367K</h2>
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
                                        <p class="text-muted mb-1">Total Profit</p>
                                        <h2 class="mb-0 text-dark">35%</h2>
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
                                        <p class="text-muted mb-1">Total Revenue</p>
                                        <h2 class="mb-0 text-dark">3,548K</h2>
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
                                        <p class="text-muted mb-1">Total Sales</p>
                                        <h2 class="mb-0 text-dark">9,756</h2>
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
                            <h5 class="text-white">Today</h5>
                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">863</h2>
                             <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Sales</span></div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                        <div class="card-body text-center">
                            <h5 class="text-white">Yesterday</h5>
                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">1,364</h2>
                             <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Sales</span></div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                        <div class="card-body text-center">
                            <h5 class="text-white">Last Week</h5>
                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">3,876</h2>
                             <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Sales</span></div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                        <div class="card-body text-center">
                            <h5 class="text-white">Last Month</h5>
                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">8,547</h2>
                             <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Sales</span></div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                        <div class="card-body text-center">
                            <h5 class="text-white">Last 6Months</h5>
                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">12,976</h2>
                             <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Sales</span></div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                        <div class="card-body text-center">
                            <h5 class="text-white">Last Year</h5>
                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">24,844</h2>
                             <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Sales</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- last week --}}
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Last week</h3>
                </div>
                <div class="card-body">
                    <canvas id="Chart" class=" h-200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Reports Sales</h3>
                </div>
                <div class="card-body">
                    <canvas id="Chart2" class=" h-200"></canvas>
                </div>
            </div>
        </div>
        
    </div>



@endsection