@extends('layouts.app')
@section('content')

		<!-- WYSIWYG Editor css -->
		<link href="{{ asset('assets/plugins/wysiwyag/richtext.css')}}" rel="stylesheet" />

		<!--Summernote css-->
		<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css')}}">

<div class="page-header bg-white p-3 shadow">
    <h4 class="mb-0 float-left"> Add new Product to the warehouse <b class="text-blue">{{$warehouse->name}}</b>  </h4>
    <p class="mb-0 float-right"><a href="{{route("warehouses.all")}}" class="btn btn-round btn-primary"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Browse Warehouses</a></p>
</div>

<form action="{{route('warehouses.product.insert')}}" method="POST" class="row" enctype="multipart/form-data">
    <div class="col-12">
        @if (\Session::has('success'))
            <h4 class="text-success">{!! \Session::get('success') !!}</h4>
        @endif
        @if(\Session::has('errors'))
        <h4 class="text-danger"> <i class="fa fa-times-circle" aria-hidden="true"></i> {!! \Session::get('errors') !!}</h4>
        @endif
    </div>
    <div class="col-md-8 col-12">
        @csrf
        <input type="hidden" name="warehouse_id" value="{{$warehouse->id}}">
        <div class="card ">
            
          <div class="card-body">
              <div class="form-group">
                <label for="">Product Name</label>
                <input required type="text" name="name" id="" class="form-control" placeholder="Enter a name for your new warehouse">
              </div>
              <div class="form-group">
                <textarea id="elm1" name="description"></textarea>

              </div>
              
          </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-md-3">
            <label for="">Stock</label>
            <input required type="number" name="stock" id="" class="form-control bg-white text-primary" placeholder="">
        </div>
        <div class="form-group mb-md-3">
            <label for="">Price</label>
            <input required type="number" name="price" id="" class="form-control bg-white text-primary" placeholder="">
        </div>
        <div class="form-group mb-md-3">
            <label for="">Photo</label>
            <input required type="file" name="photo" id="" class="form-control bg-white text-primary" placeholder="">
        </div>
        <div class="form-group mb-md-3">
          <label for=""></label>
          <select required class="form-control bg-white text-dark" name="status" id="">
            <option>Select Status</option>
            <option>Active</option>
            <option>In Active</option>
          </select>
        </div>
        <div class="input-group">
            <button class="btn btn-orange" type="submit">Publish Now <i class="fa fa-upload" aria-hidden="true"></i> </button>
        </div>
    </div>
</form>

{{-- <script src="{{ asset('assets/plugins/wysiwyag/jquery.richtext.js')}}"></script> --}}
{{-- <script src="{{ asset('assets/plugins/wysiwyag/richText1.js')}}"></script> --}}
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js')}}"></script>

<script src="{{ asset('assets/js/formeditor.js')}}"></script>

@endsection