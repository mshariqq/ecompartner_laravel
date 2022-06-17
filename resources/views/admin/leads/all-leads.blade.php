@extends('layouts.admin')

{{-- @section('CustomStyles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cutsom-normal.css') }}"/>>
@endsection --}}

@section('content')

<div class="page-header">
    <h2>Showing All imported Leads by their respective Sellers</h2>
</div>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="bg-white shadow table table-striped table-bordered text-nowrap w-100">
                <thead class="bg-dark">
                    <tr>
                        <th>Seller</th>
                        <th>Name</th>
                        <th>Imported Date</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Change Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leads as $item)
                        <tr id="TR{{$item->id}}">
                            <td>
                                <span class="text-primary"> {{ $item->user->name }} </span>
                                <br>
                               <span class="text-muted"> {{$item->user->email}}</span>
                            </td>
                           <td>{{$item->name}}</td>
                            <td>{{$item->created_at->diffForHumans()}}</td>
                           <td id="tdStatus{{$item->id}}">{{$item->status}}</td>
                           <td>
                            <a href="{{url('admin/sellers/leads/orders')}}/{{$item->id}}" class="btn btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                           </td>
                           <td>
                            <div class="form-group">
                              <select onchange="changeStatus(this, '{{$item->id}}')" class="form-control" name="status" id="">
                                <option value="null">Change Status</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="no-response">No Response</option>
                                <option value="cancelled">Cancelled</option>
                              </select>
                            </div>
                           </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    {{ $leads->links() }}
                </tfoot>
            </table>
        </div>

    </div>
</div>

<script>
    function changeStatus(select, id){
        var elID = "#TR" + id;
        $(select).addClass('bg-primary');
        var tdStatus = "#tdStatus" + id;
        var status = $(select).val();

        $.ajax({
            url: '{{url("admin/sellers/leads/ajax/change-status")}}' + "/" + id + "/" + status,
            method: 'get',
            success: function(res){
                // var rp = JSON.parse(res);
                if(res.code == 200 || res.code == '200'){
                    $(select).addClass('bg-success');
                    $(tdStatus).html(status);

                }else{
                    alert('Something went wrong, please check console');
                    $(select).addClass('bg-danger');

                }
            },
            error: function(res){
                console.log(res);
                alert('Something went wrong, please check console');
                    $(select).addClass('bg-danger');
                
            }
        });
    }
</script>
@endsection
