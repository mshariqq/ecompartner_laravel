@extends('layouts.admin')

{{-- @section('CustomStyles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cutsom-normal.css') }}"/>>
@endsection --}}

@section('content')

<div class="page-header">
    <h2>Browse Sellers</h2>
</div>

<div class="row">
    <div class="col-12">
        <table class="bg-white shadow table table-striped table-bordered text-nowrap w-100">
            <thead class="bg-primary">
                <tr>
                    <th>#ID</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Username</th>
                    <th>Created Info</th>
                    <th>Country</th>
                    <th>Profile</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sellers as $item)
                    <tr>
                        <td>
                            #{{$item->id}} <br> 
                        </td>
                        <td>
                            <a href="mailto:{{$item->email}}"> <i class="fa fa-envelope" aria-hidden="true"></i> {{$item->email}}</a>
                        </td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->created_at->diffForHumans()}}</td>
                        <td>{{$item->country}}</td>
                        <td>
                            <a href="{{route('admin.sellers.profile', $item->id)}}" class="btn btn-sm btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                {{ $sellers->links() }}
            </tfoot>
        </table>
    </div>
</div>

@endsection

@section('custom-scripts')
{{-- <script src="{{ asset('js/admin/admins-delete.js') }}" defer></script> --}}
@endsection