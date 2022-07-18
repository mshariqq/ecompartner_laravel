@extends('layouts.admin')

@section('content')
<style>
    .blockAjaxText{
        cursor: pointer;
        transition: 0.5s
    }
    .blockAjaxText:hover{
        color: orange;
        cursor: pointer;
        transition: 0.5s
    }
</style>

<div class="page-header">
    <h2 class="mb-0 float-left"> Cod Analysis   </h2>
</div>

@if ($filter)
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Filter Successful</strong>
</div>
@endif


{{-- date range --}}
<div class="row row-cards">
    {{-- filter --}}
    <div class="col-12">
        <div class="card">
            
            <form  action="{{route('admin.reports.cod-analysis.filter')}}" method="GET" class="card-body">
                <div class="row">
                    @csrf
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                          <label for="">From Date</label>
                          <input type="date" name="from" id="fromDate" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                          <label for="">To Date</label>
                          <input type="date" name="to" id="toDate" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                          <button id="filterNowBtn" type="submit" class="mt-5 btn btn-primary">Filter Now <i class="fa fa-filter" aria-hidden="true"></i></button>
                            <div class="progress mt-5" id="ExportSubmitSpinner" style="display: none">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Please Wait...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
          
        </div>
    </div>

    {{-- data blocks --}}
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card card-counter bg-gradient-primary ">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <i class="fa fa-usd text-white-transparent" aria-hidden="true"></i>
                    </div>
                    <div class="col-8 text-center">
                        <div class="mt-4 mb-0 text-white">
                            <h2 onclick="fetchAjaxData('total-cod')" class="mb-0 blockAjaxText">{{$data['tl_cod']}}</h2>
                            <p class="text-white mt-1">Total COD </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card card-counter bg-gradient-primary ">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <i class="fa fa-usd text-white-transparent" aria-hidden="true"></i>
                    </div>
                    <div class="col-8 text-center">
                        <div class="mt-4 mb-0 text-white">
                            <h2 onclick="fetchAjaxData('delivered')" class="mb-0 blockAjaxText">{{$data['tl_delivered']}}</h2>
                            <p class="text-white mt-1">Delivered COD </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card card-counter bg-gradient-primary ">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <i class="fa fa-usd text-white-transparent" aria-hidden="true"></i>
                    </div>
                    <div class="col-8 text-center">
                        <div class="mt-4 mb-0 text-white">
                            <h2 onclick="fetchAjaxData('pending')" class="mb-0 blockAjaxText">{{$data['tl_pending']}}</h2>
                            <p class="text-white mt-1">Pending COD </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card card-counter bg-gradient-primary ">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <i class="fa fa-usd text-white-transparent" aria-hidden="true"></i>
                    </div>
                    <div class="col-8 text-center">
                        <div class="mt-4 mb-0 text-white">
                            <h2 onclick="fetchAjaxData('confirmed')" class="mb-0 blockAjaxText">{{$data['tl_confirmed']}}</h2>
                            <p class="text-white mt-1">Confirmed COD </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card card-counter bg-gradient-primary ">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <i class="fa fa-usd text-white-transparent" aria-hidden="true"></i>
                    </div>
                    <div class="col-8 text-center">
                        <div class="mt-4 mb-0 text-white">
                            <h2 onclick="fetchAjaxData('out for delivery')" class="mb-0 blockAjaxText">{{$data['tl_ofd']}}</h2>
                            <p class="text-white mt-1">OFD COD </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card card-counter bg-gradient-primary ">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <i class="fa fa-usd text-white-transparent" aria-hidden="true"></i>
                    </div>
                    <div class="col-8 text-center">
                        <div class="mt-4 mb-0 text-white">
                            <h2 onclick="fetchAjaxData('cancelled')" class="mb-0 blockAjaxText">{{$data['tl_cancelled']}}</h2>
                            <p class="text-white mt-1">Cancelled COD </p>
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

</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Today's COD Details
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card bg-indigo">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h6 class="text-white">Total COD</h6>
                                        <h2 class="text-white m-0 ">{{$data['td_cod']}}</h2>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="text-white display-6"><i class="fa fa-file-text-o fa-2x"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card bg-info">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h6 class="text-white">Confirmed COD</h6>
                                        <h2 class="text-white m-0 ">{{$data['td_confirmed']}}</h2>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="text-white display-6"><i class="fa fa-check-circle fa-2x"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card bg-success">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h6 class="text-white">Pending COD</h6>
                                        <h2 class="text-white m-0 ">{{$data['td_pending']}} {{env("APP_CURRENCY")}}</h2>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="text-white display-6"><i class="fa fa-phone fa-2x"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card bg-orange">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h6 class="text-white">Cancelled COD</h6>
                                        <h2 class="text-white m-0 ">{{$data['td_cancelled']}} {{env("APP_CURRENCY")}}</h2>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="text-white display-6"><i class="fa fa-close fa-2x"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>
    function fetchAjaxData(condition){
        $("#ajaxDataContent").html("");
        $('#ajaxData').show();
        $('#ajaxDataCondition').html(" "+condition);
        var input = {};
        input.condition = condition;
        input._token = "{{csrf_token()}}";
        $.ajax({
            type: "POST",
            url: "{{route('admin.reports.cod-analysis.ajax.datafetch')}}",
            data: input,
            success: function (response) {
                $('#ajaxDataLoader').hide();
                $("#ajaxDataContent").html(response);
                
            }
        });
    }
</script>

@endsection
