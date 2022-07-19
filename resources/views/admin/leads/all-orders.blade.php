@extends('layouts.admin')

{{-- @section('CustomStyles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cutsom-normal.css') }}"/>>
@endsection --}}

@section('content')

<div class="page-header">
    <h2>Showing All Leads imported by their respective Sellers</h2>
</div>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="bg-white shadow table table-striped table-bordered">
                <thead class="bg-primary">
                    <tr>
                        {{-- <th>View</th> --}}
                        <th width="17%">Change Status</th>
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
                                <p class="">Imported : <b>{{$item->created_at->diffForHumans()}}</b></p>

                                <div class="form-group">
                                  <select onchange="changeStatus(this, '{{$item->id}}')" class="form-control" name="status" id="">
                                    <option value="draft">Change Status</option>
                                    <option value="packing">Packing</option>
                                    <option value="out for delivery">Out for Delivery</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="reschedule">Reschedule</option>
                                    <option value="cancelled">Cancelled</option>
                                  </select>
                                </div>
                               </td>
                            <td id="tdStatus{{$item->id}}">
                                    @if ($item->status == 'packing')
                                        <span class="text-white tag bg-primary p-1 text-capitalize">{{$item->status}}</span>
                                    @elseif($item->status == 'delivered')
                                        <span class="text-dark tag bg-success text-capitalize">{{$item->status}}</span>
                                    @elseif($item->status == 'cancelled')
                                        <span class="text-white bg-danger tag text-capitalize">{{$item->status}}</span>
                                    @else
                                        <span class="text-primary text-capitalize">{{$item->status}}</span>
 
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
                <tfoot>
                    {{ $orders->links() }}
                </tfoot>
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
@endsection
