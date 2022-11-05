@extends('layouts.app')

{{-- @section('CustomStyles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cutsom-normal.css') }}"/>>
@endsection --}}

@section('content')

<div class="page-header">
    <h2>Your Purchase Requests </h2>
</div>

<div class="row">

    <div class="col-12">
        <div class="table-responsive">
        @if (count($reqs) < 1)
                <p class="text-danger">No Requests !</p>
        @else
        
            <table class="bg-white shadow table table-striped table-bordered">
                <thead class="bg-primary">
                    <tr>
                        {{-- <th>View</th> --}}
                        <th width="17%">Product</th>
                        <th>Requested Stock</th>
                        <th>Status</th>
                        <th>Requested Date</th>
                        <th>Cancel</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reqs as $item)
                       
                        <tr>
                            <td>{{$item->product->name}}</td>
                            <td>{{$item->qty}}</td>
                            <td><span class="tag bg-light p-1 border text-dark">{{$item->status}}</span></td>
                            <td>
                                <span class="tag bg-light text-dark border">{{$item->created_at}}</span>
                            </td>
                            <td>
                                {{-- <a href="http://" class="btn btn-danger"> <i class="fa fa-backward" aria-hidden="true"></i> Cancel</a> --}}
                            </td>
                        </tr>
                       
                    @endforeach
                    
                </tbody>
                <tfoot>
                    {{ $reqs->links() }}
                </tfoot>
            </table>
        @endif
        
        </div>

    </div>
</div>

@endsection
