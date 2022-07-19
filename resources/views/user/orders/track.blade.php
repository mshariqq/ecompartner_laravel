@extends('layouts.app')
@section('content')

<div class="page-header">
    <h4>Track your Order with Tracking ID</h4>
</div>

<div class="row">
    @if ($is_data)
    @php
    
    $item = $orders;
@endphp
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-success text-white">
                Order details for <b>{{$orders->tracking_id}}</b>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped bg-white table-bordered shadow text-nowrap">
                        <thead class="bg-primary">
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
                        </tbody>
                       
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    @endif
    <div class="col-md-4 col-12">
        <div class="card">
            <div class="card-header">
                Enter the AWB Tracking ID of order
            </div>
            <form class="card-body" action="{{route('orders.track.data')}}" method="POST">
                @csrf
               <div class="form-group">
                 <label for="">Tracking ID</label>
                 <input type="text" name="id" class="form-control" placeholder="" aria-describedby="helpId">
                 <small id="helpId" class="text-muted">Ex: AWB109KJ22</small>
               </div>
               <div class="form-group text-right text-end">
                <p class="text-end text-right">
                    <button type="submit" class="btn btn-primary">Track Now <i class="fa fa-search-minus" aria-hidden="true"></i> </button>
                </p>
               </div>
            </form>
            
        </div>
    </div>

    
</div>


@endsection