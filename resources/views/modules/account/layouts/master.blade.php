@extends('template::layouts.page')

@section('content_header')
    <h5> {!! config('account.name') !!} </h5>
@stop

@section('settings_dropdown')
    @include('account::settings.credentials')
@stop

@section('content_top_nav_right')
    @include('account::auth.logout')
@stop
