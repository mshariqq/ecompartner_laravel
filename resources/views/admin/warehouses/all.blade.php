@extends('layouts.admin')

{{-- @section('CustomStyles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cutsom-normal.css') }}"/>>
@endsection --}}

@section('content')

<div class="page-header">
    <h2>Showing All Warehouses of sellers</h2>
</div>

<div class="row">
    @foreach ($warehouses as $item)
    <div class="col-md-3">
        <div class="card">
            <div class="row">
                <div class="col-4">
                    <div class="feature" style="height: 100%">
                        <div class="fa-stack fa-lg fa-2x icon bg-green">
                            <i class="fa fa-home fa-stack-1x text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body p-3  d-flex">
                        <div>
                            <p class="text-primary mb-1"><a href="#">{{$item->name}}</a></p>
                            <h2 class="mb-0 text-dark"><b class="text-orange">{{ \App\Product::where('warehouse_id', $item->id)->get()->count() }}</b> <small style="font-size: 18px">Products</small> </h2>
                            <p>Owner : <b>{{$item->seller->name}}</b></p>
                            <p>{{$item->created_at->diffForHumans()}}</p>

                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        
    </div>

@endforeach
</div>

@endsection
