@extends('errors::illustrated-layout')

@section('title', __('Forbidden'))
@section('image')
    <img src="{{ asset('/img/403.svg') }}" class="img-fluid" alt="403">
@endsection
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
