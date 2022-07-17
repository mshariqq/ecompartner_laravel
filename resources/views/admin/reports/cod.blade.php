@extends('layouts.admin')

@section('content')

<div class="page-header">
    <h4 class="mb-0 float-left"> <a href="{{route('leads.leads-list.index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a> Income / COD Report   </h4>
    
</div>
<div class="row row-cards">
    
    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
        <div class="card">
            <div class="card-body text-center list-icons">
                <i class="si si-basket-loaded text-secondary"></i>
                <p class="card-text mt-3 mb-3">TOTAL CONFIRMED INCOME</p>
                <p class="h1 text-center  text-secondary">{{number_format($data['tl_confirmed'])}} {{env('APP_CURRENCY')}}</p>
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
                                <h2 class="counter text-primary mb-0">{{number_format($data['tl_cod'])}} {{env('APP_CURRENCY')}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-4 mb-4">
                            <div class="counter-status">
                                <div class="counter-icon text-warning">
                                    <i class="si si-rocket"></i>
                                </div>
                                <h5 class="text-muted">TOTAL PENDING</h5>
                                <h2 class="counter text-indigo  mb-0">{{number_format($data['tl_pending'])}} {{env('APP_CURRENCY')}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6  mt-4 mb-4">
                            <div class="counter-statuss">
                                <div class="counter-icon text-primary">
                                    <i class="si si-docs"></i>
                                </div>
                                <h5 class="text-muted">TOTAL DELIVERED</h5>
                                <h2 class="counter text-success  mb-0">{{number_format($data['tl_delivered'])}} {{env('APP_CURRENCY')}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-4 mb-4">
                            <div class="counter-status">
                                <div class="counter-icon text-success">
                                    <i class="si si-graph"></i>
                                </div>
                                <h5 class="text-muted">TOTAL CANCELLED</h5>
                                <h2 class="counter text-danger  mb-0">{{number_format($data['tl_cancelled'])}} {{env('APP_CURRENCY')}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
