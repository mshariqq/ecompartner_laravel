@extends('layouts.admin')

{{-- @section('CustomStyles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cutsom-normal.css') }}"/>>
@endsection --}}

@section('content')

<div class="page-header">
    <h2>Showing All Orders imported by their respective Sellers
        <br>
        <small style="font-size: 16px" class="text-orange">Note : Scroll the table horizontally for more columns <i class="fa fa-align-right" aria-hidden="true"></i> </small>


    </h2>
    
</div>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="bg-white shadow table table-striped table-bordered  text-nowrap">
                <thead class="bg-dark">
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
                                <p class="">Converted : <b>{{$item->created_at->diffForHumans()}}</b></p>

                                <div class="form-group">
                                  <select onchange="changeStatus(this, '{{$item->id}}')" class="form-control" name="status" id="">
                                    <option value="null">Change Status</option>
                                    {{-- <option value="pending">Pending</option> --}}
                                    <option value="packing">Packing</option>
                                    <option value="out for deivery">Out for Delivery</option>
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
                                        <span class="tag bg-indigo text-white p-1 text-capitalize">{{$item->status}}</span>
                                    @elseif($item->status == 'delivered')
                                        <span class="tag bg-success text-dark text-capitalize">{{$item->status}}</span>
                                    @elseif($item->status == 'cancelled')
                                        <span class="tag bg-danger text-white text-capitalize">{{$item->status}}</span>
                                    @else
                                        <span class="tag bg-dark text-orange text-capitalize">{{$item->status}}</span>
 
                                    @endif
                                    <br>

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
