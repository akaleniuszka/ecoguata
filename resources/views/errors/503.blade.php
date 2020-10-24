@extends('errors::illustrated-layout')

@section('title', __('Service Unavailable'))
@section('image')
    <img src="{{ asset('/img/503.svg') }}" class="img-fluid" alt="503">
@endsection
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))
