@extends('layouts.app')

{{-- @section('CustomStyles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cutsom-normal.css') }}"/>>
@endsection --}}

@section('content')

<div class="page-header">
    <h4> <a href="{{route('warehouses.products')}}"> <i class="fa fa-arrow-left" aria-hidden="true"></i> </a> Request Stock for your Product  </h4>
</div>

<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                
                <a href="{{route('warehouses.products.inside', $product->warehouse->id)}}">{{$product->warehouse->name}}</a>
            </div>
            <div class="card-body">
                <h4>{{$product->name}}</h4>
                <img width="auto" class="border tag" height="200px" src="{{url($product->photo)}}" alt="">
                <p>   {!! $product->description !!}
                </p>
            </div>
            
        </div>
    </div>
    <form action="{{route('warehouses.product.request-stock.insert')}}" method="POST" class="col-md-4 col-12">
        @csrf
        <div class="form-group">
            <p>Available Quantity you have in your Warehouse</p>
            <h3 class="text-orange">{{$product->stock}}</h3>
        </div>
        <div class="form-group ">
          <label for="">Request Stock Quantity</label>
          <input name="product_id" type="hidden" value="{{$product->id}}">
          <input required type="number" name="qty" id="" class="bg-white form-control" placeholder="0" aria-describedby="helpId">
        </div>
        <div class="form-group text-right">
            <p class="text-right"><button class="btn btn-primary" type="submit">Request Now <i class="fa fa-arrow-right" aria-hidden="true"></i> </button></p>
        </div>
        <br>
        <br>
        <p>Note: It's upto the admin to confirm your request or reject it</p>
    </form>
</div>

@endsection