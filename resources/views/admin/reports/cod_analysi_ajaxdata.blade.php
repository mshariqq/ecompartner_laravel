@if ($isLeads)
<h4>Showing Leads <span class="text-primary">{{count($orders)}}</span> </h4>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="bg-white shadow table table-striped table-bordered table-nowrap text-nowrap">
                <thead class="bg-primary">
                    <tr>
                        {{-- <th>View</th> --}}
                        <th width="17%">Change Status</th>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Delivery Address</th>
                        <th>Product Id</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>COD Currency</th>
                        <th>COD Amount</th>
                        <th>Pieces</th>
                        <th>Shipment Description</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr id="TR{{$item->id}}">
                            {{-- <td>
                                <a href="http://" class="btn btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                               </td> --}}
                               <td>
                                <p class="">Imported : <b>{{$item->created_at->diffForHumans()}}</b></p>

                                <div class="form-group">
                                  <select onchange="changeStatus(this, '{{$item->id}}')" class="form-control" name="status" id="">
                                    <option value="draft">Change Status</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="no response">No Response</option>
                                    <option value="cancelled">Cancelled</option>
                                   
                                  </select>
                                </div>
                               </td>
                            <td id="tdStatus{{$item->id}}">
                                    @if ($item->status == 'confirmed')
                                        <span class="text-white tag bg-primary p-1 text-capitalize">{{$item->status}}</span>
                                    @elseif($item->status == 'no response')
                                        <span class="text-white tag bg-orange text- text-capitalize">{{$item->status}}</span>
                                    @elseif($item->status == 'cancelled')
                                        <span class="text-white tag bg-danger text-capitalize">{{$item->status}}</span>
                                    @else
                                        <span class="bg-warning text-dark tag text-capitalize">{{$item->status}}</span>
 
                                    @endif
                            </td>

                            <td>
                                <span class="text-primary"> {{ $item->name }} </span>
                                
                            </td>
                           <td>{{$item->delivery_address}}</td>
                           <td>
                                
                                @php
                                   $product = \App\Product::find($item->product_id);
                                   if($product){
                                    echo "<span class='text-indigo'> #" . $product->id . $product->name."</span>";
                                   }else {
                                    // if no product
                                    echo "<span class='text-danger'>No Product Found</span>";
                                   }
                                @endphp
                           </td>
                           <td>{{$item->city}}</td>
                           <td>{{$item->phone_number}}</td>
                           <td>{{$item->country}}</td>
                           <td>{{$item->cod_currency}}</td>
                           <td>{{$item->cod_amount}}</td>
                           <td>{{$item->pieces}}</td>
                           <td>{{$item->shipment_description}}</td>
                            {{-- <td>{{$item->created_at->diffForHumans()}}</td> --}}
                           
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>

    </div>
</div>

<script>
    function changeStatus(select, id){
        var elID = "#TR" + id;
        $(select).addClass('bg-primary');
        var tdStatus = "#tdStatus" + id;
        var status = $(select).val();

        $.ajax({
            url: '{{url("admin/sellers/lead/ajax/change-status")}}' + "/" + id + "/" + status,
            method: 'get',
            success: function(res){
                // var rp = JSON.parse(res);
                if(res.code == 200 || res.code == '200'){
                    $(select).addClass('bg-success');
                    $(tdStatus).html(status);

                }else{
                    alert(res.msg);
                    $(select).addClass('bg-danger');

                }
            },
            error: function(res){
                console.log(res);
                alert('Something went wrong, please check console');
                    $(select).addClass('bg-danger');
                
            }
        });
    }
</script>
@else

<div class="page-header">
    <h2 class="float-left">Showing Orders <span class="text-orange">{{count($orders)}}</span>
        
    </h2>
    <p class="float-right text-end text-right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
            <i class="fa fa-download" aria-hidden="true"></i>
            Export Orders 
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
        <div class="table-responsive">
            <table class="bg-white shadow table table-striped table-bordered  text-nowrap">
                <thead class="bg-primary">
                    <tr>
                        {{-- <th>View</th> --}}
                        <th>Change Status</th>
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
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr id="TR{{$item->id}}">
                            {{-- <td>
                                <a href="http://" class="btn btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                               </td> --}}
                               <td>
                                <p class="">Converted : <b>{{$item->created_at}}</b></p>

                                <div class="form-group">
                                  <select onchange="changeStatus(this, '{{$item->id}}')" class="form-control" name="status" id="">
                                    <option value="null">Change Status</option>
                                    {{-- <option value="pending">Pending</option> --}}
                                    <option value="packing">Packing</option>
                                    <option value="out for delivery">Out for Delivery</option>
                                    <option value="delivered">Delivered</option>
                                    {{-- <option value="reschedule">Reschedule</option> --}}
                                    <option value="cancelled">Cancelled</option>
                                  </select>
                                </div>
                                
                               
                               </td>
                               <td>
                                <a href="{{route('admin.sellers.profile', $item->seller->id)}}"> <i class="fa fa-user" aria-hidden="true"></i> {{$item->seller->name}}</a>
                                

                               </td>
                               <td>
                                {{
                                    $item->tracking_id
                                }}
                               </td>
                              
                            <td id="tdStatus{{$item->id}}">
                                @if ($item->status == 'confirmed')
                                    <span class="tag bg-primary text-white p-1 text-capitalize">{{$item->status}}</span>
                                @elseif($item->status == 'delivered')
                                    <span class="tag bg-success text-white text-capitalize">{{$item->status}}</span>
                                @elseif($item->status == 'cancelled')
                                    <span class="tag bg-danger text-white text-capitalize">{{$item->status}}</span>
                                @elseif($item->status == 'packing')
                                    <span class="tag bg-warning text-dark text-capitalize">{{$item->status}}</span>
                                @else
                                    <span class="tag bg-orange text-dark text-capitalize">{{$item->status}}</span>

                                @endif

                            </td>

                            <td>
                                <span class="text-primary"> {{ $item->name }} </span>
                                
                            </td>
                           <td>{{$item->delivery_address}}</td>
                           <td>{{$item->city}}</td>
                           <td>{{$item->phone_number}}</td>
                           <td>{{$item->country}}</td>
                           <td>{{$item->cod_currency}}</td>
                           <td>{{$item->cod_amount}}</td>
                           <td>{{$item->pieces}}</td>
                           <td>{{$item->shipment_description}}</td>
                            {{-- <td>{{$item->created_at->diffForHumans()}}</td> --}}
                           
                        </tr>
                    @endforeach
                </tbody>
               
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
                url: "{{route('admins.orders.export')}}",
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
    function changeStatus(select, id){
        var elID = "#TR" + id;
        $(select).addClass('bg-primary');
        var tdStatus = "#tdStatus" + id;
        var status = $(select).val();

        $.ajax({
            url: '{{url("admin/sellers/orders/ajax/change-status")}}' + "/" + id + "/" + status,
            method: 'get',
            success: function(res){
                // var rp = JSON.parse(res);
                if(res.code == 200 || res.code == '200'){
                    $(select).addClass('bg-success');
                    $(tdStatus).html(status);

                }else{
                    alert('Something went wrong, please check console');
                    $(select).addClass('bg-danger');

                }
            },
            error: function(res){
                console.log(res);
                alert('Something went wrong, please check console');
                    $(select).addClass('bg-danger');
                
            }
        });
    }
</script>
@endif
