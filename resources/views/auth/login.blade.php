@extends('layouts.app')

@section('social')
    <link rel="stylesheet" href="css/social.css">
@endsection

@section('custom')
    <link rel="stylesheet" href="css/custom.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 bg-light px-4 py-2">
                <div class="card-body">
                    <h2 class="card-title font-weight-bold">Login</h2>
                    <p class="font-italic">Los campos marcados con asteriscos (*) son requeridos.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email"><strong>Email *</strong></label>
                                        <input id="email" type="email" class="form-control border-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Tu email...">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password"><strong>Contraseña *</strong></label>
                                        <input id="password" type="password" class="form-control border-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Tu contraseña...">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary btn-block" dusk="login-btn">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </form>
                            <p class="text-divider"><span>O puede ingresar a través de sus redes sociales</span></p>
                            <div class="row">
                                <div class="col-2 text-center">
                                    <a class="btn btn-social-icon btn-facebook rounded-circle" href="{{route('redirectToProvider', ['facebook'])}}">
                                        <span class="fa fa-facebook text-white"></span>
                                    </a>
                                </div>
                                <div class="col-2 text-center">
                                    <a class="btn btn-social-icon btn-google rounded-circle" href="{{route('redirectToProvider', ['google'])}}">
                                        <span class="fa fa-google text-white"></span>
                                    </a>
                                </div>
                                <div class="col-2 text-center">
                                    <a class="btn btn-social-icon btn-twitter rounded-circle" href="{{route('redirectToProvider', ['twitter'])}}">
                                        <span class="fa fa-twitter text-white"></span>
                                    </a>
                                </div>
                                <div class="col-2 text-center">
                                    <a class="btn btn-social-icon btn-instagram rounded-circle" href="{{route('redirectToProvider', ['instagram'])}}">
                                        <span class="fa fa-instagram text-white"></span>
                                    </a>
                                </div>
                                <div class="col-2 text-center">
                                    <a class="btn btn-social-icon btn-github rounded-circle" href="{{route('redirectToProvider', ['github'])}}">
                                        <span class="fa fa-github text-white"></span>
                                    </a>
                                </div>
                                <div class="col-2 text-center">
                                    <a class="btn btn-social-icon btn-linkedin rounded-circle" href="{{route('redirectToProvider', ['linkedin'])}}">
                                        <span class="fa fa-linkedin text-white"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 vertical_center">
                            <img src="/img/city_driver.svg" alt="Ecoguata" width="500">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
