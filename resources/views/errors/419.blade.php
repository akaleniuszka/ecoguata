@extends('errors::illustrated-layout')

@section('title', __('Page Expired'))
@section('image')
    <img src="{{ asset('/img/419.svg') }}" class="img-fluid" alt="419">
@endsection
@section('code', '419')
@section('message', __('Page Expired'))
