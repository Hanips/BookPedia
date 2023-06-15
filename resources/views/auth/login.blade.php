@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-4 text-center">
            <a href="{{ url('/') }}" class="navbar-brand ms-4 ms-lg-0">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="{{ asset('landingpage/img/bp.png') }}" style="width: 8%; height:5%;" alt=""> &nbsp;&nbsp;&nbsp;
                    <h3 class="fw-bold text-primary mb-0">Book<span class="text-secondary">Pedia</span></h3>
                </div>
            </a>
            <div class="card p-3 shadow mt-4">
                <div class="card-body">
                    <h3 class="fw-bold text-dark">Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-12 col-form-label text-start">{{ __('Email') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-12 col-form-label text-start">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ingat Saya') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>                        
                    </form>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="me-2">Belum punya akun?</span>
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    Register
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
