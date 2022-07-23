@extends('layouts.admin')

{{-- @section('CustomStyles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cutsom-normal.css') }}"/>>
@endsection --}}

@section('content')

<div class="page-header">
    <h2> <i class="fa fa-history" aria-hidden="true"></i> Product Purchases History</h2>
</div>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
        @if (count($purchases) < 1)
                        <p class="text-danger">No Products Found !</p>
        @else
            <table class="bg-white shadow table table-striped table-bordered">
                <thead class="bg-primary">
                    <tr>
                        {{-- <th>View</th> --}}
                        <th>Seller Info</th>
                        <th>Product</th>
                        <th>Stock before</th>
                        <th>Stock purchase</th>
                        <th>Stock after</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $item)
                        <tr id="TR{{$item->id}}">
                            {{-- <td>
                                <a href="http://" class="btn btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                            </td> --}}
                            <td>                                
                                <a href="#" class="btn btn-sm btn-indigo mb-2"> {{$item->product->warehouse->name}} <i class="fa fa-eye" aria-hidden="true"></i> </a>
                                <br>
                                <a class="btn btn-danger btn-sm" href="{{route('admin.sellers.profile', $item->seller->id)}}">{{$item->seller->name}} <i class="fa fa-user" aria-hidden="true"></i></a>

                            </td>

                            <td>
                                <img width="auto" height="100px" src="{{url($item->product->photo)}}" alt="">
                                <br>
                                Name : <span class="text-primary"> {{ $item->product->name }} </span>
                                <br>
                                Price : <span class="text-indigo">{{$item->product->price}}</span>
                                
                            </td>
                            <td>
                                <span class="tag bg-danger">
                                    @php
                                    echo $item->product->stock + $item->qty;
                                 @endphp
                                </span>
                            
                            </td>
                            <td>
                                <span class="tag bg-primary">
                                    @php
                                    echo $item->qty;
                                 @endphp
                                </span>
                                
                            </td>
                            <td>
                                <span class="tag bg-success">
                                    @php
                                    echo $item->product->stock;
                                 @endphp
                                </span>
                            </td>
                            
                            <td>
                                <span class="tag bg-light text-dark border">{{$item->created_at}}</span>
                               
                            </td>
                        
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    {{ $purchases->links() }}
                </tfoot>
            </table>
        @endif
        
        </div>

    </div>
</div>

@endsection
