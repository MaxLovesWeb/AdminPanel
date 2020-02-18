@extends('account::layouts.guest')

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )
@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('guest')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ $dashboard_url ?? '' }}">{!! config('account.logo', '<b>Admin</b>LTE') !!}</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{ __('account::auth.login_message') }}</p>
                {!! form($form) !!}
                <p class="mt-2 mb-1">
                    <a href="{{ $password_reset_url }}">
                        {{ __('account::auth.i_forgot_my_password') }}
                    </a>
                </p>
                @if ($register_url)
                    <p class="mb-0">
                        <a href="{{ $register_url }}">
                            {{ __('account::auth.register_a_new_membership') }}
                        </a>
                    </p>
                @endif
            </div>
        </div>
    </div>

@endsection
