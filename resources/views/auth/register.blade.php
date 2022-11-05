@extends('layouts.app-auth')

@section('content')

<div class="page-content">
    <div class="container text-center text-dark">
        <div class="row">
            <div class="col-lg-4 d-block mx-auto">
                <div class="row">
                    <form method="POST" action="{{ route('register') }}" class="col-xl-12 col-md-12 col-md-12">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-6">
                                    <img src="{{ asset('frontend/Images/logo-blue.svg')}}" class="" alt="">
                                </div>
                                <h3>Register</h3>
                                <p class="text-muted">Create New Account</p>
                                {{-- name --}}
                                <div class="input-group mb-3">
                                    <span class="input-group-addon bg-white"><i class="fa fa-user w-4"></i></span>
                                    <input placeholder="Username" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- <input type="text" class="form-control" placeholder="Entername"> --}}
                                </div>
                                {{-- email --}}
                                <div class="input-group mb-4">
                                    <span class="input-group-addon bg-white"><i class="fa fa-envelope  w-4"></i></span>
                                    <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- <input type="text" class="form-control" placeholder="Enter Email"> --}}
                                </div>
                               
                                <div class="input-group mb-4">
                                    <span class="input-group-addon bg-white"><i class="fa fa-unlock-alt  w-4"></i></span>
                                    <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon bg-white"><i class="fa fa-unlock-alt  w-4"></i></span>
                                    <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                </div>
                                <div class="form-group mt-5">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" />
                                        <span class="custom-control-label">Agree the <a href="{{route('view.page', 'terms-conditions')}}">terms and policy</a></span>
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block px-4">Create a new account <i class="fa fa-caret-right" aria-hidden="true"></i> </button>
                                    </div>
                                </div>
                                <p class="mt-3 text-indigo">
                                    or
                                </p>
                                {{-- <div class="mt-6 btn-list">
                                    <button type="button" class="btn btn-icon btn-facebook"><i class="fa fa-facebook"></i></button>
                                    <button type="button" class="btn btn-icon btn-google"><i class="fa fa-google"></i></button>
                                    <button type="button" class="btn btn-icon btn-twitter"><i class="fa fa-twitter"></i></button>
                                    <button type="button" class="btn btn-icon btn-dribbble"><i class="fa fa-dribbble"></i></button>
                                </div> --}}
                                <p class="col-12 mt-5">
                                    Already have an Account? <br>
                                    <a href="{{route('login')}}" class="btn btn-gradient-primary">Login <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                                </p>
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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">

                           <label for="name" class="col-md-4 control-label text-md-right">Register With</label>

                           <div class="col-md-6">

                               <a href="{{ url('login/facebook') }}" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook-square" style="font-size:24px"></i></a>

                               <a href="{{ url('login/twitter') }}" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter-square" style="font-size:24px"></i></a>

                               <a href="{{ url('login/google') }}" class="btn btn-social-icon btn-google"><i class="fa fa-google" style="font-size:24px"></i></a>
                           </div>

                       </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
