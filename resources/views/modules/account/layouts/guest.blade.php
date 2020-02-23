@extends('adminlte::page')

@section('content_header')
    <h5> {!! config('account.guest') !!} </h5>
@stop

@section('content')

    <div class="row justify-content-md-center">
        @yield('guest')
    </div>

@endsection
