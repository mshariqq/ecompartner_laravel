@extends('layouts.app')
@section('content')

<div class="page-header bg-white p-3 shadow">
    <h4 class="mb-0 float-left"> <a href="{{route('leads.leads-list.index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a> Showing Leads for the List  <span class="text-primary"> {{$leads_list->name}}</span> </h4>
    <p class="mb-0 float-right"><a href="#" class="btn btn-sm btn-primary"> <i class="fa fa-download" aria-hidden="true"></i> Export</a></p>
</div>

<div class="row">
    <div class="col-12">
        <table id="example" class="table table-striped bg-white table-bordered shadow">
            <thead class="bg-primary">
                <tr>
                    <th>Imported On</th>
                    <th>Status</th>
                    <th>Name</th>
                    <th>Delivery Address</th>
                    <th>City</th>
                    <th>Product ID</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>COD Currency</th>
                    <th>COD Amount</th>
                    <th>Pieces</th>
                    <th>Shipment Desc</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $item)
                    <tr>
                        <td>
                            {{$item->created_at}}
                        </td>
                        <td>
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
                        <td>{{$item->name}}</td>
                        <td>{{$item->delivery_address}}</td>
                        <td>{{$item->city}}</td>
                        <td>
                            {{$item->product_id}}
                            <br>
                            @php
                               $product = \App\Product::find($item->product_id);
                               if($product){
                                echo "<span class='text-indigo'>".$product->name."</span>";
                               }else {
                                // if no product
                                echo "<span class='text-danger'>No Product Found</span>";
                               }
                            @endphp
                       </td>
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
                {{$leads->links()}}
            </tfoot>
        </table>
    </div>
</div>

@endsection