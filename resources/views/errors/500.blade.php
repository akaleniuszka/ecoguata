@extends('errors::illustrated-layout')

@section('title', __('Server Error'))
@section('image')
    <img src="{{ asset('/img/500.svg') }}" class="img-fluid" alt="500">
@endsection
@section('code', '500')
@section('message', __('Server Error'))
