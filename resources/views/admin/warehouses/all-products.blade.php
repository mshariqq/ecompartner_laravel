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
                <thead class="bg-dark">
                    <tr>
                        {{-- <th>View</th> --}}
                        <th width="17%">Action</th>
                        <th>Warehouse</th>
                        <th>Name</th>
                        <th>Details</th>
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
                                
                                <a href="http://" class="btn btn-sm btn-indigo mb-2">Buy Stocks <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
                                <img width="auto" height="100px" src="{{url($item->photo)}}" alt="">

                            </td>
                            <td>
                                    {{$item->warehouse->name}}
                            </td>

                            <td>
                                
                                <span class="text-primary"> {{ $item->name }} </span>
                                
                            </td>
                            <td>
                                {!! $item->description !!}
                                
                            </td>
                            <td>
                                {{$item->price}}
                                
                            </td>
                            <td>{{$item->created_at->diffForHumans()}}</td>
                        
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
