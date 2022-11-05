@extends('layouts.app')
@section('content')

<div class="page-header bg-white p-3 shadow">
    <h4 class="mb-0 float-left"> Create new Warehouse  </h4>
    <p class="mb-0 float-right"><a href="{{route("warehouses.all")}}" class="btn btn-round btn-primary"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Browse Warehouses</a></p>
</div>

<div class="row">
    <form action="{{route('warehouses.insert')}}" method="POST" class="col-md-6">
        @csrf
        <div class="card ">
          <img class="card-img-top" src="holder.js/100px180/" alt="">
          <div class="card-body">
              <div class="form-group">
                <label for="">Warehouse Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Enter a name for your new warehouse">
              </div>
              <div class="form-group">
                <label for="">Warehouse Country</label>
                <input type="text" name="location" id="" class="form-control" placeholder="Ex: UAE, KSA KWI">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                  <option value="active">Active</option>
                  <option value="inactive">In active</option>
                </select>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-success">Create Now <i class="fa fa-arrow-right" aria-hidden="true"></i> </button>
              </div>
          </div>
        </div>
    </form>
</div>

@endsection