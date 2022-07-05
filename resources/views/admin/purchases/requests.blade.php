@extends('layouts.admin')
@section('content')

<div class="page-header">
    <h2> <i class="si si-user-following" aria-hidden="true"></i> Purchase Stock Requests by sellers</h2>
</div>

<div class="row">
    @foreach ($reqs as $item)
        <div class="col-md-4">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="media mt-0">
                        <figure class="rounded-circle align-self-start mb-0">
                            <img src="{{ asset('assets/images/users/female/18.jpg')}}" alt="Generic placeholder image" class="avatar brround avatar-md mr-3">
                        </figure>
                        <div class="media-body">
                            <h5 class="time-title p-0 font-weight-semibold leading-normal mb-0"><a href="{{route('admin.sellers.profile', $item->seller->id)}}">{{$item->seller->name}}</a></h5>
                            {{$item->seller->country}}
                        </div>
                        @if ($item->status == 'pending' || $item->status == 'rejected' )
                        <a href="{{route('admins.purchase.requests.confirm', $item->id)}}" class="btn btn-success d-none d-sm-block mr-2"><i class="fa fa-check"></i> </a>
                        
                        <a href="{{route('admins.purchase.requests.reject', $item->id)}}" class="btn btn-danger d-none d-sm-block"><i class="fa fa-times"></i> </a>
                        @endif

                    </div>
                    <br>
                    @if ($item->status == 'pending')
                        <span class="tag bg-warning">Pending</span>
                    @elseif($item->status == 'rejected')
                        <span class="tag bg-danger">Rejected</span>
                    @else  
                        <span class="tag bg-success">Confirmed</span>
                    @endif
                    <br>
                    New Stock Request: <b><span class="text-primary"> {{$item->qty}} </span></b>
                    <br>
                    Request Date : <b>{{$item->created_at->diffForHumans()}}</b>
                    

                </div>
                <div class="card-footer border-top">
                    <div class="media">
                        <figure class="rounded-circle align-self-start mb-0">
                            <img width="200px" height="200px" src="{{ url($item->product->photo)}}" alt="product" class=" mr-3">
                        </figure>
                        <div class="media-body">
                            <h5 class="time-title p-0 font-weight-semibold leading-normal mb-0">{{$item->product->name}}</h5>
                            Price : <b>{{$item->product->price}}</b> 
                            <br>
                            Current Stock : <b>{{$item->product->stock}}</b>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>

    @endforeach
    <div class="col-12">
        {!! $reqs->links() !!}
    </div>
</div>

@endsection