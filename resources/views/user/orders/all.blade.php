@extends('layouts.app')
@section('title', "My Orders")
@section('content')

<div class="page-header bg-white p-3 shadow">
    <h4 class="mb-0 float-left"> <a href="{{route('leads.leads-list.index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a> Showing Orders from your Leads   </h4>
    <p class="float-right text-end text-right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#modelId">
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

<div class="row">
    <div class="col-12">
        
        <p style="font-size: 16px" class="text-orange">Note : Scroll the table horizontally for more columns <i class="fa fa-align-right" aria-hidden="true"></i> </p>

    </div>
    <div class="col-12">
       <div class="table-responsive">
        <table id="example" class="table table-striped bg-white table-bordered shadow text-nowrap">
            <thead class="bg-dark">
                <tr>
                    <th>Status</th>
                    <th>Tracking ID</th>
                    <th>Name</th>
                    <th>Delivery Address</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>COD Currency</th>
                    <th>COD Amount</th>
                    <th>Pieces</th>
                    <th>Shipment Desc</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    <tr>
                        <td>
                            @if ($item->status == 'confirmed')
                            <span class="tag bg-indigo text-white p-1 text-capitalize">{{$item->status}}</span>
                        @elseif($item->status == 'delivered')
                            <span class="tag bg-success text-dark text-capitalize">{{$item->status}}</span>
                        @elseif($item->status == 'cancelled')
                            <span class="tag bg-danger text-white text-capitalize">{{$item->status}}</span>
                        @else
                            <span class="tag bg-dark text-orange text-capitalize">{{$item->status}}</span>

                        @endif
                        </td>
                        <td>{{$item->tracking_id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->delivery_address}}</td>
                        <td>{{$item->city}}</td>
                        <td>{{$item->phone_number}}</td>
                        <td>{{$item->country}}</td>
                        <td>{{$item->cod_currency}}</td>
                        <td>{{$item->cod_amount}}</td>
                        <td>{{$item->pieces}}</td>
                        <td>{{$item->shipment_description}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                {{$orders->links()}}
            </tfoot>
        </table>
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