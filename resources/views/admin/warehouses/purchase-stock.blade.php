@extends('layouts.admin')

{{-- @section('CustomStyles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cutsom-normal.css') }}"/>>
@endsection --}}

@section('content')

<div class="page-header">
    <h2>Purchase stock for product 
        <span class="text-primary">{{$product->name}}</span>    
    </h2>
</div>

<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                {{$product->name}}
            </div>
            <div class="card-body">
                <img width="auto" class="border tag" height="200px" src="{{url($product->photo)}}" alt="">
                <p>                {!! $product->description !!}
                </p>
            </div>
            
        </div>
    </div>
    <form action="{{url('admin/warehouse/buy-stock/product/store')}}" method="POST" class="col-md-4 col-12">
        @csrf
        <div class="form-group">
            <p>Available Quantity from seller</p>
            <h3 class="text-orange">{{$product->stock}}</h3>
        </div>
        <div class="form-group ">
          <label for="">Stock Quantity</label>
          <input name="id" type="hidden" value="{{$product->id}}">
          <input required type="number" name="qty" id="" min="0" max="{{$product->stock}}" class="bg-white form-control" placeholder="0" aria-describedby="helpId">
        </div>
        <div class="form-group text-right">
            <p class="text-right"><button class="btn btn-primary" type="submit">Purchase Now <i class="fa fa-arrow-right" aria-hidden="true"></i> </button></p>
        </div>
    </form>
</div>

@endsection
