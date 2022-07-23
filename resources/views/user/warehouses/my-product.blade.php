@extends('layouts.app')

{{-- @section('CustomStyles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cutsom-normal.css') }}"/>>
@endsection --}}

@section('content')

<div class="page-header">
    <h2>Showing all Products from your all Warehouses </h2>
   
</div>

<div class="row">

    <div class="col-12">
        <div class="table-responsive">
        @if (count($warehouse) < 1)
                <p class="text-danger">No Products Found !</p>
        @else
        
            <table class="bg-white shadow table table-striped table-bordered">
                <thead class="bg-primary">
                    <tr>
                        {{-- <th>View</th> --}}
                        <th width="17%">Action</th>
                        <th>Warehouse</th>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Details</th>
                        <th>Price</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($warehouse as $item1)
                        @php
                            $products = \App\Product::where('warehouse_id', $item1->id)->get();
                        @endphp
                        @foreach ($products as $item)
                            <tr id="TR{{$item->id}}">
                           
                            <td>               
                                <img width="auto" height="100px" src="{{url($item->photo)}}" alt="">
                                             
                            <td>
                                    {{$item->warehouse->name}}
                            </td>

                            <td>
                                <span class="text-primary"> #{{$item->id}} {{ $item->name }} </span>
                                <br>
                                @if ($item->status == 'pending')
                                    <span class="tag bg-warning border text-dark">Pending</span>
                                @elseif($item->status == 'rejected')
                                    <span class="tag bg-danger border">Rejected </span>
                                @elseif($item->status == 'active')
                                    <span class="tag bg-success border">Active</span>
                                @else
                                    <span class="tag bg-light border text-dark">{{$item->status}}</span>
                                @endif
                                
                            </td>
                            <td>
                                {{$item->stock}}
                            </td>
                            <td>
                                {!! $item->description !!}
                                
                            </td>
                            <td>
                                {{$item->price}}
                                
                            </td>
                            <td>
                                <span class="tag bg-light text-dark border">{{$item->created_at}}</span>
                                <br>                                <a class="btn btn-primary btn-sm" href="{{url('seller/warehouses/products')}}/{{$item1->id}}">view warehouse <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>    
                                <br>
                                <a href="{{route('warehouses.product.request-stock', $item->id)}}" class="btn btn-orange mt-1">Request Stock <i class="fa fa-question" aria-hidden="true"></i> </a>                        
                            </td>

                            </td>
                        
                            </tr>
                        @endforeach
                       
                    @endforeach
                    
                </tbody>
                <tfoot>
                    {{ $warehouse->links() }}
                </tfoot>
            </table>
        @endif
        
        </div>

    </div>
</div>

@endsection
