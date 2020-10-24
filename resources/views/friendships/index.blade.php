@extends('layouts.app')

@section('custom')
    <link rel="stylesheet" href="css/custom.css">
@endsection

@section('content')
    <div class="container">
        @foreach ($friendshipRequests as $friendshipRequest)
            <accept-friendship-btn
                :sender="{{ $friendshipRequest->sender }}"
                friendship-status="{{ $friendshipRequest->status }}"
            ></accept-friendship-btn>
        @endforeach
    </div>
@endsection