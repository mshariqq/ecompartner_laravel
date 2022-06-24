@extends('layouts.app')
@section('content')

<div class="page-header bg-white p-3 shadow">
    <h4 class="mb-0 float-left"> Showing Your Warehouses  </h4>
    <p class="mb-0 float-right">
        <a href="{{route("warehouses.new")}}" class="btn btn-round btn-primary"> 
            <i class="fa fa-download" aria-hidden="true"></i> Create New</a>
        </p>
</div>

<div class="row">
    <div class="col-12">
        @if (\Session::has('success'))
            <h4 class="text-success">{!! \Session::get('success') !!}</h4>
        @endif
        @if($errors->any())
        <h4 class="text-danger">{{$errors->all()}}</h4>
        @endif
    </div>
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
                                <p class="text-primary mb-1">
                                    <a href="{{url('seller/warehouses/products')}}/{{$item->id}}">{{$item->name}}</a>
                                    </p>
                                <h2 class="mb-0 text-dark"><b class="text-orange">{{ \App\Product::where('warehouse_id', $item->id)->get()->count() }}</b></h2>
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