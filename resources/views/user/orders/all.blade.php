@extends('layouts.app')
@section('content')

<div class="page-header bg-white p-3 shadow">
    <h4 class="mb-0 float-left"> <a href="{{route('leads.leads-list.index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a> Showing Orders from your Leads   </h4>
    <p class="mb-0 float-right"><a href="#" class="btn btn-sm btn-primary"> <i class="fa fa-download" aria-hidden="true"></i> Export</a></p>
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
</div>

@endsection