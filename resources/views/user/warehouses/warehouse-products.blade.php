@extends('layouts.app')

{{-- @section('CustomStyles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cutsom-normal.css') }}"/>>
@endsection --}}

@section('content')

<div class="page-header">
    <h4>Product from <b class="text-indigo">{{$warehouse->name}} <span class="tag bg-primary">{{$warehouse->location}}</span></b></h4>
    <p class="float-right text-end text-right">
        <a href="{{url('seller/warehouses/products/new')}}/{{$warehouse->id}}" class="btn btn-primary">Add New Product <i class="fa fa-plus" aria-hidden="true"></i> </a>
    </p>
</div>

<div class="row">
    <div class="col-12">
        @if (\Session::has('success'))
            <h4 class="text-success">{!! \Session::get('success') !!}</h4>
        @endif
        @if(\Session::has('errors'))
        <h4 class="text-danger"> <i class="fa fa-times-circle" aria-hidden="true"></i> {!! \Session::get('errors') !!}</h4>
        @endif
    </div>
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
                                <img width="auto" height="100px" src="{{url($item->photo)}}" alt="">
                                <br>                           
                                <a href="#" class="btn btn-sm btn-primary mb-2"> View Warehouse <i class="fa fa-eye" aria-hidden="true"></i> </a>
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
