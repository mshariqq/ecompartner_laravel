@extends('layouts.app')
@section('content')
<div class="page-header">
    <h4>My Profile</h4>
</div>
<div class="row justify-content-center">
    <div class="col-md-4">
       <div class="card">
           <div class="list-group" id="myList">
             <a class="list-group-item list-group-item-action" href="{{ route('seller.profile') }}">
                <i class="fe fe-user"></i> My Account Info
             </a>
             <a class="list-group-item list-group-item-action" href="{{ route('seller.profile.password') }}">
                <i class="fe fe-lock"></i> Change Password
             </a>
           </div>
       </div>
   </div>
   <div class="col-md-8">
       <div class="card">
           <div class="card-header">Profile</div>
           <div class="card-body">
               @include('components.admin.messages')
               <form method="POST" id="form-submit" action="{{ route('seller.profile.update', $admin->id) }}">
                   @csrf
                   @method('PUT')
                   
                   <div class="form-group row">
                       <label for="first_name" class="col-md-4 col-form-label ">{{ __('Full Name: ') }}</label>
                       <div class="col-md-6 mr">
                           <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="name" value="{{ $admin->name }}" required autocomplete="Full Name" autofocus>
                           @error('first_name')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="last_name" class="col-md-4 col-form-label ">{{ __('Country: ') }}</label>
                       <div class="col-md-6 mr">
                           <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="country" value="{{ $admin->country }}" required autocomplete="Last Name" autofocus>
                           @error('last_name')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="email" class="col-md-4 col-form-label ">{{ __('Email Address: ') }}</label>
                       <div class="col-md-6 mr">
                           <input id="email" type="text" readonly class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $admin->email }}" required autocomplete="Email" autofocus>
                           @error('email')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="phone" class="col-md-4 col-form-label ">{{ __('Phone Number: ') }}</label>
                       <div class="col-md-6 mr">
                           <input id="phone" type="text"  class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $admin->phone }}" autocomplete="Phone" autofocus>
                           @error('phone')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                       </div>
                   </div>

                   <div class="form-group row mb-0">
                       <div class="col-md-6">
                           <button id="btnSubmit" type="submit" class="btn btn-primary"> <i class="fe fe-upload"></i> Update Account Info </button>
                           
                           {{-- <button id="btnCancel" type="button" class="btn btn-danger">Cancel Changes</button> --}}
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>

@endsection
{{-- 
@section('custom-scripts')
<script src="{{ asset('js/admin/form-submit.js') }}" defer></script>
@endsection --}}