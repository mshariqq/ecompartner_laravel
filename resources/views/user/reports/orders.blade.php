@extends('layouts.app')

@section('content')

<div class="page-header">
    <h4 class="mb-0 float-left"> <a href="{{route('leads.leads-list.index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a> Orders Report   </h4>
    <p class="float-right text-end text-right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-gradient-primary" data-toggle="modal" data-target="#modelId">
          Export Orders <i class="fa fa-file-excel-o" aria-hidden="true"></i>
        </button>
        {{-- <a href="" target="__blank" class="btn btn-indigo"> <i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Orders</a> --}}
    </p>
            <!-- export modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Export Options</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="">From Date</label>
                              <input type="date" name="from" id="inpFrom" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">To Date</label>
                                <input type="date" name="from" id="inpTo" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                              <label for="">Status <small class="text-muted">Optional</small> </label>
                              <select name="status" class="form-control" name="" id="inpStatus">
                                <option selected value="all">All</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="delivered">Delivered</option>
                                <option value="cancelled">Cancelled</option>
                              </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button id="ExportSubmit" type="button" class="btn btn-primary">Export <i class="fa fa-arrow-right" aria-hidden="true"></i> </button>
                            <button style="display: none" id="ExportSubmitSpinner" class="btn btn-primary col-md-4"> 
                                <div class="progress progress-md mb-3">
                                    <div class="progress-bar progress-bar-indeterminate bg-success"></div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
</div>
<div class="row row-cards">
    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
        <div class="card">
            <div class="card-body text-center list-icons">
                <i class="si si-briefcase text-primary"></i>
                <p class="card-text mt-3 mb-3">TOTAL OUT FOR DELIVERY</p>
                <p class="h1 text-center  text-primary">{{$data['tl_ofd']}}</p>
            </div>
        </div>
    </div><!-- col end -->
    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
        <div class="card">
            <div class="card-body text-center list-icons">
                <i class="si si-basket-loaded text-secondary"></i>
                <p class="card-text mt-3 mb-3">TOTAL CONFIRMED</p>
                <p class="h1 text-center  text-secondary">{{$data['tl_confirmed']}}</p>
            </div>
        </div>
    </div><!-- col end -->
    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
        <div class="card">
            <div class="card-body text-center list-icons">
                <i class="si si-folder-alt text-warning"></i>
                <p class="card-text mt-3 mb-3">TOTAL LEADS IMPORTED</p>
                <p class="h1 text-center  text-warning">{{$data['tl_leads']}}</p>
            </div>
        </div>
    </div><!-- col end -->
    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
        <div class="card">
            <div class="card-body text-center list-icons">
                <i class="si si-eye text-success"></i>
                <p class="card-text mt-3 mb-3">TOTAL COD</p>
                <p class="h1 text-center text-success">{{ number_format($data['tl_cod']) }} {{env('APP_CURRENCY')}}</p>
            </div>
        </div>
    </div><!-- col end -->
</div>


<div class="row ">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-body p-4 text-dark">
                <div class="statistics-info">
                    <div class="row text-center">
                        <div class="col-lg-3 col-md-6 mt-4 mb-4">
                            <div class="counter-status">
                                <div class="counter-icon text-danger">
                                    <i class="si si-people"></i>
                                </div>
                                <h5 class="text-muted">TOTAL</h5>
                                <h2 class="counter text-primary mb-0">{{count($data['orders'])}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-4 mb-4">
                            <div class="counter-status">
                                <div class="counter-icon text-warning">
                                    <i class="si si-rocket"></i>
                                </div>
                                <h5 class="text-muted">TOTAL PENDING</h5>
                                <h2 class="counter text-primary  mb-0">{{$data['tl_pending']}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6  mt-4 mb-4">
                            <div class="counter-statuss">
                                <div class="counter-icon text-primary">
                                    <i class="si si-docs"></i>
                                </div>
                                <h5 class="text-muted">TOTAL DELIVERED</h5>
                                <h2 class="counter text-primary  mb-0">{{$data['tl_delivered']}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-4 mb-4">
                            <div class="counter-status">
                                <div class="counter-icon text-success">
                                    <i class="si si-graph"></i>
                                </div>
                                <h5 class="text-muted">TOTAL CANCELLED</h5>
                                <h2 class="counter text-primary  mb-0">{{$data['tl_cancelled']}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div 
class="col-12" id="OrdersExportHiddenTable" 
style="max-height: 1px; max-width: 1px;overflow: hidden"
>

    <table>
        <thead class="table table-striped">
            <th>Seller</th>
            <th>Tracking ID</th>
            <th>Status</th>
            <th>Name</th>
            <th>Delivery Address</th>
            <th>City</th>
            <th>Phone</th>
            <th>Country</th>
            <th>COD Currency</th>
            <th>COD Amount</th>
            <th>Pieces</th>
            <th>Shipment Description</th>
        </thead>
        <tbody id="ExportOrdersTableBody">

        </tbody>
    </table>

</div>
</div>
<script>
    $(document).ready(function(){
    // if document ready

    // if export submit
    $('#ExportSubmit').on('click', function(){
        // show spinner
        $("#ExportSubmitSpinner").show();
        $(this).hide();

        // collect data
        var input = {};
        input.from = $('#inpFrom').val();
        input.to = $('#inpTo').val();
        input.status = $('#inpStatus').val();
        input._token = "{{csrf_token()}}";

        // ajax
        $.ajax({
            type: "POST",
            url: "{{route('orders.export')}}",
            data: input,
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                if(response == 'empty'){
                    alert("No Orders found for the given Options");
                    $("#ExportSubmitSpinner").hide();
                    $("#ExportSubmit").show();
                    return true;
                }else{
                    $("#ExportOrdersTableBody").html(response);

                    var printContents = document.getElementById('OrdersExportHiddenTable').innerHTML;
                    var originalContents = document.body.innerHTML;
                    
                    var head = '<html><head><title>Ecompartner-orders-with-dates- '+input.from+'-and-'+input.to+'</title>' + $("head").html()  + ' <style>body{background-color:white !important;} table{width: 100%;} thead{width: 100%;background-color: #eee;} th{border: 1px solid; #aaa;padding: 5px} td{padding: 5px; border: 1px solid #aaa;} @page { size: 1800px;margin: 1cm 1cm 1cm 1cm; }</style></head>';
                    document.body.innerHTML = head +"<body>" + printContents + "</body>";
                    window.print();
                    document.body.innerHTML = originalContents;
                    window.location.reload();
                    return true;
                }
            }
        });
    });
});
</script>

@endsection
