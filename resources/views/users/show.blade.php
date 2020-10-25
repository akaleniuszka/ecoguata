@extends('layouts.app')

@section('custom')
    <link rel="stylesheet" href="css/custom.css">
@endsection

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12" style="background: url(/img/landscape.jpg); background-size: cover; background-repeat: no-repeat;">
                @include('partials.user')
            </div>
            <div class="col-md-4 mt-1 mx-auto">
                <friendship-btn
                    dusk="request-friendship"
                    class="btn btn-primary btn-block"
                    :recipient="{{ $user }}"
                ></friendship-btn>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card border-0 bg-light mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Personal information') }}</h5>
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="txtFirstName">{{ __('First Name:') }}</label>
                                    <input type="text" class="form-control" id="txtFirstName" name="txtFirstName" value="{{ $user->first_name }}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txtLastName">{{ __('Last Name:') }}</label>
                                    <input type="text" class="form-control" id="txtLastName" name="txtLastName" value="{{ $user->last_name }}" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="txtUserName">{{ __('Username:') }}</label>
                                    <input type="text" class="form-control" id="txtUserName" name="txtUserName" value="{{ $user->name }}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txtEmail">{{ __('Email:') }}</label>
                                    <input type="text" class="form-control" id="txtEmail" name="txtEmail" value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h5>{{ __('Recent travels') }}</h5>
                <status-list
                    url="{{ route('users.statuses.index', $user) }}"
                ></status-list>
            </div>
        </div>
    </div>
@endsection