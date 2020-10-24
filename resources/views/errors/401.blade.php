@extends('errors::illustrated-layout')

@section('title', __('Unauthorized'))
@section('image')
    <img src="{{ asset('/img/401.svg') }}" class="img-fluid" alt="401">
@endsection
@section('code', '401')
@section('message', __('Unauthorized'))
