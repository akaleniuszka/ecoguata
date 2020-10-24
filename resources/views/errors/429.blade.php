@extends('errors::illustrated-layout')

@section('title', __('Too Many Requests'))
@section('image')
    <img src="{{ asset('/img/429.svg') }}" class="img-fluid" alt="429">
@endsection
@section('code', '429')
@section('message', __('Too Many Requests'))
