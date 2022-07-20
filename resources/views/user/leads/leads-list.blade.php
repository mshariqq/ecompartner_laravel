@extends('layouts.app')
@section('content')

<div class="page-header bg-white p-3 shadow">
    <h4 class="mb-0 float-left">Showing Your Leads Lists: <span class="text-primary">{{count($llist)}}</span> <br> <small class="text-muted">Note: Click on eye button to view leads</small> </h4>
        {{$llist->links()}}
</div>

<div class="row">
    <div class="col-12">
        <table class="table table-striped bg-white shadow">
            <thead class="bg-primary">
                <tr>
                    <th>List Name</th>
                    <th>Leads Count</th>
                    <th>Status</th>
                    <th>Time</th>
                </tr>
                
            </thead>
            <tbody>
                @foreach ($llist as $item)
                    <tr>
                        <td>
                            <b>{{$item->name}}</b>
                            <br>
                            <a href="{{url('seller/leads/' . $item->id)}}" class="btn btn-primary btn-sm mr-md-2"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="http://" class="btn btn-danger btn-sm mr-md-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                        <td>{{ $ll_leads[$item->id] }} <span class="text-muted">Leads</span></td>
                        <td>
                                @if ($item->status == 'processing')
                                <span class="tag bg-success text-white p-1 text-capitalize">{{$item->status}}</span>
                            @elseif($item->status == 'pending')
                                <span class="text-dark tag bg-orange text-capitalize">{{$item->status}}</span>
                            
                            @else
                                <span class="text-dark tag bg-orange text-capitalize">{{$item->status}}</span>

                            @endif
                            
                        </td>
                        <td>
                            <i class="fa fa-history" aria-hidden="true"></i> Imported {{$item->created_at}} 
                            <br> Last Update {{$item->updated_at}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection