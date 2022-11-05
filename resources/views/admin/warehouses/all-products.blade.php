@extends('layouts.admin')

{{-- @section('CustomStyles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cutsom-normal.css') }}"/>>
@endsection --}}

@section('content')

<div class="page-header">
    <h2>Showing All Products of Warehouses</h2>
</div>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
        @if (count($products) < 1)
                        <p class="text-danger">No Products Found !</p>
        @else
            <table class="bg-white shadow table table-striped table-bordered">
                <thead class="bg-primary">
                    <tr>
                        {{-- <th>View</th> --}}
                        <th width="17%">Action</th>
                        <th>Warehouse</th>
                        <th>Seller</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr id="TR{{$item->id}}">
                            {{-- <td>
                                <a href="http://" class="btn btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                            </td> --}}
                            <td>                                
                                <a href="#" class="btn btn-sm btn-dark mb-2"> View Warehouse <i class="fa fa-eye" aria-hidden="true"></i> </a>
                                
                                <a href="{{url('admin/warehouse/buy-stock/product/'.$item->id)}}" target="_blank" class="btn btn-sm btn-indigo mb-2">Buy Stocks <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
                                <img width="auto" height="100px" src="{{url($item->photo)}}" alt="">

                            </td>
                            <td>
                                    {{$item->warehouse->name}}
                            </td>
                            <td>
                                <a href="{{route('admin.sellers.profile', $item->warehouse->seller->id)}}" target="_blank">{{$item->warehouse->seller->name}}</a>
                            </td>

                            <td>
                                
                                <span class="text-primary"> #{{$item->id}} <br> {{ $item->name }} </span>
                                
                            </td>
                            <td>
                                {!! $item->description !!}
                                
                            </td>
                            <td>
                                <span class="tag bg-indigo">{{$item->stock}}</span>
                            </td>
                            <td>
                               <span class="tag bg-success"> {{$item->price}}</span>
                                
                            </td>
                            <td>
                                <span class="tag bg-light text-dark">{{$item->created_at}}</span>
                                
                                <br>
                                @if ($item->status == 'pending')
                                    <span class="tag bg-warning border text-dark">Pending</span>
                                    <br>
                                    <a href="{{route('admin.warehouse.product.approval', [$item->id, 'approve'])}}" class=" mt-md-1 btn btn-success btn-sm">Approve Product <i class="fa fa-check-circle" aria-hidden="true"></i> </a>
                                    <br>
                                    <a href="{{route('admin.warehouse.product.approval', [$item->id, 'reject'])}}" class="mt-md-1 btn btn-danger btn-sm"> Reject <i class="fa fa-times-circle" aria-hidden="true"></i> </a>
                                @elseif($item->status == 'rejected')
                                    <span class="tag bg-danger border">Rejected </span>
                                @elseif($item->status == 'active')
                                    <span class="tag bg-success border">Active</span>
                                @else
                                    <span class="tag bg-light border text-dark">{{$item->status}}</span>
                                @endif
                            </td>
                        
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    {{ $products->links() }}
                </tfoot>
            </table>
        @endif
        
        </div>

    </div>
</div>

@endsection
