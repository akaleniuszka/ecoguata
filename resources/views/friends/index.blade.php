@extends('layouts.app')

@section('custom')
    <link rel="stylesheet" href="css/custom.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @forelse ($friends as $friend)
                <div class="col-md-3">
                    <div class="card border-0 bg-light shadow-sm">
                        <div class="card-body">
                            @include('partials.user', ['user' => $friend])
                        </div>
                    </div>
                </div>
            @empty
                {{ __('You don\'t have any friends yet!') }}
            @endforelse
        </div>
    </div>
@endsection