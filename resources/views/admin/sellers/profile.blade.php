@extends('layouts.admin')
@section('content')

<!-- page-header -->
<div class="page-header">
    {{-- <ol class="breadcrumb">
        <!-- breadcrumb -->
        <li class="breadcrumb-item"><a href="{{route('admin.sellers.all')}}">Sellers</a></li>
        <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-user" aria-hidden="true"></i> {{$seller->name}}</li>
    </ol>
    <!-- End breadcrumb -->
    <div class="ml-auto">
        <div class="input-group">
            <a  class="btn btn-primary text-white mr-2"  id="daterange-btn">
                <span>
                    <i class="fa fa-calendar"></i> Events Settings
                </span>
                <i class="fa fa-caret-down"></i>
            </a>
            <a href="#" class="btn btn-secondary text-white" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Rating">
                <span>
                    <i class="fa fa-star"></i>
                </span>
            </a>
        </div>
    </div> --}}
</div> 
<!-- End page-header -->

<!-- row -->
<div class="row">
        <div class="col-md-12">
            <div class="card card-profile  overflow-hidden">
                <div class="card-body text-center profile-bg">
                    <div class=" card-profile">
                        <div class="row justify-content-center">
                            <div class="">
                                <div class="">
                                    <a href="#">
                                        <img src="{{ asset('assets/images/users/female/5.jpg')}}" class="avatar-xxl rounded-circle" alt="profile">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="mt-3 text-white">{{$seller->name}}</h3>
                    <p class="mb-2 text-white">{{$seller->email}}</p>
                    {{-- <div class="text-center mb-4">
                        <span><i class="fa fa-star text-warning"></i></span>
                        <span><i class="fa fa-star text-warning"></i></span>
                        <span><i class="fa fa-star text-warning"></i></span>
                        <span><i class="fa fa-star-half-o text-warning"></i></span>
                        <span><i class="fa fa-star-o text-warning"></i></span>
                    </div> --}}
                    @if ($seller->status == 'blocked')
                    <a href="{{route('admin.sellers.profile.block', [$seller->id, 'false'])}}" class="btn btn-success btn-sm"> <i class="fa fa-history" aria-hidden="true"></i> Unblock</a>

                    @else 
                    <a href="{{route('admin.sellers.profile.block', [$seller->id, 'true'])}}" class="btn btn-danger btn-sm"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Block Seller</a>

                    @endif

                    <a href="mailto:{{$seller->email}}" class="btn btn-primary btn-sm"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send Email</a>
                </div>
                <div class="card-body">
                    <div class="nav-wrapper p-0">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0 active show" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fe fe-users"></i>Leads</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"> <i class="fe fe-home" aria-hidden="true"></i> Warehouses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"> <i class="fe fe-box" aria-hidden="true"></i> Orders</a>
                            </li>
                            {{--<li class="nav-item">
                                <a class="nav-link mb-sm-0 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-5-tab" data-toggle="tab" href="#tabs-icons-text-5" role="tab" aria-controls="tabs-icons-text-5" aria-selected="false"> <i class="fa fa-money" aria-hidden="true"></i> Transactions</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body pb-0">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="table-responsive mb-3">
                                        <table class="table row table-borderless w-100 m-0 border">
                                            <tbody class="col-lg-6 p-0">
                                                <tr>
                                                    <td><strong>Name :</strong> {{$seller->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Email :</strong> {{$seller->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Phone :</strong> {{$seller->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Country :</strong> {{$seller->country}}</td>
                                                </tr>
                                            </tbody>
                                            <tbody class="col-lg-6 p-0">
                                                <tr>
                                                    <td><strong>Status :</strong> <span class="tag border text-dark bg-light">{{$seller->status}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Joined on :</strong> {{$seller->created_at}}</td>
                                                </tr>
                                                @php
                                                        $warehouses = \App\Warehouse::where('seller_id', $seller->id)->count();
                                                        $leads = \App\LeadsList::where('user_id', $seller->id)->get();
                                                        $total_leads = 0;
                                                        foreach ($leads as $key) {
                                                            $total_leads += \App\Lead::where('leads_list_id', $key['id'])->count();
                                                        }
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <strong>Total Leads :  {{$total_leads}}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total Warehouses :</strong>
                                                        {{ $warehouses }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    @foreach ($surveys as $item)
                                        <div class="col-12">
                                            <div class="card border">
                                                <div class="card-header bg-light text-dark">
                                                    Submitted on <span class="ml-md-1 tag border bg-primary text-white">{{$item->created_at}}</span>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">
                                                        <span class="text-primary">Are you already Seller?</span>
                                                        <br>
                                                        <b> - {{$item->q1}}</b>
                                                    </p>
                                                    <hr>
                                                    <p class="card-text">
                                                        <span class="text-primary">What is your capital for this project?</span>
                                                        <br>
                                                        <b> - {{$item->q2}}</b>
                                                    </p>
                                                    <hr>
                                                    <p class="card-text">
                                                        <span class="text-primary">What is your shipment volume per day?</span>
                                                        <br>
                                                        <b> - {{$item->q3}}</b>
                                                    </p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
  
                            
                        </div>
                        <div aria-labelledby="tabs-icons-text-2-tab" class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content content-full-width" id="content">
                                        <!-- begin profile-content -->
                                        <div class="profile-content">
                                            <!-- begin tab-content -->
                                            <div class="tab-content p-0">
                                                <!-- begin #profile-friends tab -->
                                                <div class="tab-pane fade in active show" id="profile-friends">
                                                    <h4 class="mt-0 mb-4">Leads Lists</h4><!-- begin row -->
                                                    @php
                                                        $MyLeads = \App\LeadsList::where('user_id', $seller->id)->paginate(20);
                                                    @endphp
                                                     <table class="bg-white shadow table table-striped table-bordered text-nowrap w-100">
                                                        <thead class="bg-primary">
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
                                                            @foreach ($MyLeads as $item)
                                                                <tr id="TR{{$item->id}}">
                                                                    <td>
                                                                        <span class="text-primary"> {{ $item->user->name }} </span>
                                                                        <br>
                                                                       <span class="text-muted"> {{$item->user->email}}</span>
                                                                    </td>
                                                                   <td>{{$item->name}}</td>
                                                                    <td>{{$item->created_at->diffForHumans()}}</td>
                                                                   <td id="tdStatus{{$item->id}}">
                                                                        @if ($item->status == 'processing')
                                                                            <span class="tag bg-success text-white p-1 text-capitalize">{{$item->status}}</span>
                                                                        @elseif($item->status == 'pending')
                                                                            <span class="text-dark tag bg-orange text-capitalize">{{$item->status}}</span>
                                                                        
                                                                        @else
                                                                            <span class="text-primary text-capitalize">{{$item->status}}</span>
                                        
                                                                        @endif
                                                                            {{-- {{$item->status}} --}}
                                                                </td>
                                                                   <td>
                                                                    <a href="{{url('admin/sellers/leads/lead')}}/{{$item->id}}" class="btn btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                                   </td>
                                                                   <td>
                                                                    <div class="form-group">
                                                                      <select onchange="changeStatus(this, '{{$item->id}}')" class="form-control" name="status" id="">
                                                                        <option value="null">Change Status</option>
                                                                        <option value="processing">Processing</option>
                                                                        <option value="pending">Pending</option>
                                                                      </select>
                                                                    </div>
                                                                   </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            {{ $MyLeads->links() }}
                                                        </tfoot>
                                                    </table>
                                                </div><!-- end #profile-friends tab -->
                                            </div><!-- end tab-content -->
                                        </div><!-- end profile-content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                            @php
                                    $MyWarehouses = \App\Warehouse::where('seller_id', $seller->id)->paginate(20);
                            @endphp
                                   <div class="row">
                                    @foreach ($MyWarehouses as $item)
                                   
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
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
                                                            <p><span class="tag bg-light text-dark border">{{$item->created_at}}</span></p>
                                
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        
                                    </div>
                                
                                @endforeach
                                   </div>
                        </div>
                        <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
                            @php
                                $MyOrders = \App\Order::where('seller_id', $seller->id)->paginate(20);

                            @endphp
                            <table class="bg-white shadow table table-striped table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        {{-- <th>View</th> --}}
                                        <th width="17%">Change Status</th>
                                        <th>Status</th>
                                        <th>Name</th>
                                        <th>Delivery Address</th>
                                        <th>City</th>
                                        <th>Phone</th>
                                        <th>Country</th>
                                        <th>COD Currency</th>
                                        <th>COD Amount</th>
                                        <th>Pieces</th>
                                        <th>Shipment Description</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($MyOrders as $item)
                                        <tr id="TR{{$item->id}}">
                                            {{-- <td>
                                                <a href="http://" class="btn btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                               </td> --}}
                                               <td>
                                                <p class="">Converted : <b>{{$item->created_at->diffForHumans()}}</b></p>
                
                                                <div class="form-group">
                                                  <select onchange="changeStatus(this, '{{$item->id}}')" class="form-control" name="status" id="">
                                                    <option value="null">Change Status</option>
                                                    {{-- <option value="pending">Pending</option> --}}
                                                    <option value="packing">Packing</option>
                                                    <option value="out for delivery">Out for Delivery</option>
                                                    <option value="delivered">Delivered</option>
                                                    {{-- <option value="reschedule">Reschedule</option> --}}
                                                    <option value="cancelled">Cancelled</option>
                                                  </select>
                                                </div>
                                                
                                                <a href="#" class="btn btn-sm btn-primary"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> View Seller <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                                               </td>
                                            <td id="tdStatus{{$item->id}}">
                                                @if ($item->status == 'confirmed')
                                                    <span class="tag bg-primary text-white p-1 text-capitalize">{{$item->status}}</span>
                                                @elseif($item->status == 'delivered')
                                                    <span class="tag bg-success text-white text-capitalize">{{$item->status}}</span>
                                                @elseif($item->status == 'cancelled')
                                                    <span class="tag bg-danger text-white text-capitalize">{{$item->status}}</span>
                                                @elseif($item->status == 'packing')
                                                    <span class="tag bg-warning text-dark text-capitalize">{{$item->status}}</span>
                                                @else
                                                    <span class="tag bg-orange text-dark text-capitalize">{{$item->status}}</span>
            
                                                @endif
                                            </td>
                
                                            <td>
                                                <span class="text-primary"> {{ $item->name }} </span>
                                                
                                            </td>
                                           <td>{{$item->delivery_address}}</td>
                                           <td>{{$item->city}}</td>
                                           <td>{{$item->phone_number}}</td>
                                           <td>{{$item->country}}</td>
                                           <td>{{$item->cod_currency}}</td>
                                           <td>{{$item->cod_amount}}</td>
                                           <td>{{$item->pieces}}</td>
                                           <td>{{$item->shipment_description}}</td>
                                            {{-- <td>{{$item->created_at->diffForHumans()}}</td> --}}
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    {{ $MyOrders->links() }}
                                </tfoot>
                            </table>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- row end -->
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

    function changeStatus(select, id){
        var elID = "#TR" + id;
        $(select).addClass('bg-primary');
        var tdStatus = "#tdStatus" + id;
        var status = $(select).val();

        $.ajax({
            url: '{{url("admin/sellers/orders/ajax/change-status")}}' + "/" + id + "/" + status,
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