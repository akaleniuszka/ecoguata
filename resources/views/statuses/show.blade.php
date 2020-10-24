@extends('layouts.app')

@section('custom')
    <link rel="stylesheet" href="css/custom.css">
@endsection

@section('content')
    <div class="container">
        {{-- {{ dd($status) }} --}}
        {{-- {{ dd(json_encode($status)) }} --}}
        <status-list-item
            :status="{{ json_encode($status) }}"
        ></status-list-item>
    </div>
@endsection