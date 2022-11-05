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
                        <th width="10%">Thumb</th>
                        <th width="30%">Details</th>
                        <th>Warehouse</th>
                        <th>Stock</th>

                        <th>Price</th>
                        {{-- extra details will show conversions, cost per lead, screenshots --}}
                        <th>Extra Details</th>
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
                                        {{-- id --}}

                                        ID: # {{$item->id}}
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
                                        <br>
                                        <img style="margin-top: 10px" width="auto" height="100px" src="{{url($item->photo)}}" alt="">



                                    </td>
                                    <td>
                                        <p>
                                            <span class="font-weight-bold">Name: </span> {{$item->name}}
                                        </p>
                                        <p>
                                            <span class="font-weight-bold">Description: </span> {!! $item->description !!}
                                        </p>
                                        {{-- {!! $item->description !!} --}}

                                    </td>

                                    <td>
                                            {{$item->warehouse->name}}
                                    </td>

                                    <td>
                                       <span class="tag bg-success">
                                        {{$item->stock}}
                                       </span>
                                    </td>


                                    <td>
                                        <span class="tag bg-light text-indigo font-weight-bold">
                                            {{$item->price}}
                                        </span>

                                    </td>

                                    {{-- extra details show conversion, cost per lead and json decode screenshots array --}}
                                    <td>
                                        <p>
                                            <span class="text-dark">Conversion: </span> <b>{{$item->conversion}}</b>
                                        </p>
                                        <p>
                                            <span class="text-dark">Cost Per Lead: </span> <b>{{$item->cost_per_lead}} $</b>
                                        </p>
                                        <div class="row">
                                            {{-- json decode the screenshots array only if it is not null or empty --}}
                                            @if ($item->screenshots != null && $item->screenshots != "")
                                                @foreach (json_decode($item->screenshots) as $screenshot)
                                                    <div class="col-4">
                                                        {{-- click to download the image --}}
                                                        <a href="{{url($screenshot)}}" target="_blank">
                                                            <img width="100%" height="auto" src="{{url($screenshot)}}" alt="">
                                                        </a>
                                                        {{-- <img class="border" width="auto" height="100%" src="{{url($screenshot)}}" alt=""> --}}
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </td>

                                    <td>
                                        <span class="tag bg-light text-dark border">{{$item->created_at}}</span>
                                        <br>                                <a class="btn btn-primary btn-sm" href="{{url('seller/warehouses/products')}}/{{$item1->id}}">view warehouse <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                                        <br>
                                        <a href="{{route('warehouses.product.request-stock', $item->id)}}" class="btn btn-orange mt-1">Request Stock <i class="fa fa-question" aria-hidden="true"></i> </a>
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
