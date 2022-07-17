@extends('layouts.admin-auth')

@section('content')

<div class="page-content">
    <div class="container text-center text-dark">
        <div class="row">
            <div class="col-lg-4 d-block mx-auto">
                <div class="row">
                    <form method="POST" action="{{ route('admin.login.submit') }}" class="col-xl-12 col-md-12 col-md-12">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-6">
                                    <img src="{{ asset('frontend/Images/logo-blue.svg')}}" class="" alt="">
                                </div>
                                <h3>Admin Login</h3>
                                <p class="text-muted">Sign In to your Admin account</p>
                                <div class="input-group mb-3">
                                    <span class="input-group-addon bg-white"><i class="fa fa-user"></i></span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    {{-- <input type="text" class="form-control" placeholder="Email"> --}}
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-addon bg-white"><i class="fa fa-unlock-alt"></i></span>
                                    {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                    <div class="col-12">
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link box-shadow-0 px-0" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                        {{-- <a href="forgot-password.html" class="btn btn-link box-shadow-0 px-0">Forgot password?</a> --}}
                                    </div>
                                </div>
                                {{-- <div class="mt-6 btn-list">
                                    <button type="button" class="btn btn-icon btn-facebook"><i class="fa fa-facebook"></i></button>
                                    <button type="button" class="btn btn-icon btn-google"><i class="fa fa-google"></i></button>
                                    <button type="button" class="btn btn-icon btn-twitter"><i class="fa fa-twitter"></i></button>
                                    <button type="button" class="btn btn-icon btn-dribbble"><i class="fa fa-dribbble"></i></button>
                                </div>
                                <br> --}}

                                {{-- <div class="col-12">
                                    <p class="text-center">Don't have an account? <a href="{{route('register')}}">Register</a> </p>
                                </div> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADMIN LOGIN</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
