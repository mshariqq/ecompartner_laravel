@extends('layouts.app')
@section('content')
<div class="page-header">
    <h4>My Profile</h4>
</div>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="list-group">
              <a class="list-group-item list-group-item-action" href="{{ route('seller.profile') }}">
                 <i class="fe fe-user"></i> Profile
              </a>
              <a class="list-group-item list-group-item-action" href="{{ route('seller.profile.password') }}">
                <i class="fe fe-lock"></i> Change Password
              </a>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Change your Password</div>
            <div class="card-body">
                @include('components.admin.messages')
                <form method="POST" action="{{ route('seller.profile.password.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label">{{ __('Current Password') }}</label>
                        <div class="col-md-6">
                            <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="Old Password">
                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label">{{ __('New Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-primary">
                                <i class="fe fe-upload"></i>
                            {{ __('Update Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection