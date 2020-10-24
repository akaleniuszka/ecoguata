@extends('errors::illustrated-layout')

@section('title', __('Forbidden'))
@section('image')
    <img src="{{ asset('/img/404.svg') }}" class="img-fluid" alt="404">
@endsection
@section('code', '404')
@section('message', __($exception->getMessage() ?: 'Not Found'))
