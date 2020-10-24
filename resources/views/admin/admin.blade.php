@extends('adminlte::page')

@section('title', 'Dashboard Administrador')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

{{-- @section('custom')
    <link rel="stylesheet" href="css/custom.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @auth
                <div class="col-md-3 d-none d-md-block">
                    <div class="card border-0 bg-light shadow-sm">
                        <img src="/upload/avatars/{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="card-img-top">
                        <div class="card-body">
                            <div class="card-block text-center">
                                <h5 class="card-title text-center mb-0">
                                    {{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }}
                                </h5>
                                <p class="lead"><small>{{ '@'.Auth::user()->name }}</small></p>
                                <a href="{{ route('users.edit', Auth::user()) }}" class="mx-auto">
                                    <small><i class="fas fa-user-edit"></i> {{ __('Edit profile') }}</small>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="card border-0 bg-light mb-3 shadow-sm">
                        <status-form></status-form>
                    </div>
                    <status-list></status-list>
                </div>
            @endauth
            @guest
                <div class="col-md-8 mx-auto">
                    <div class="card border-0 bg-light mb-3 shadow-sm">
                        <status-form></status-form>
                    </div>
                    <status-list></status-list>
                </div>
            @endguest
        </div>
    </div>
@endsection --}}