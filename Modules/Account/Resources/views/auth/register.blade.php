@extends('account::layouts.guest')

@section('guest')

    <div class="register-box">
        <div class="card">
            <div class="register-logo">
                <a href="{{ $dashboard_url ?? '' }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
            </div>
            <div class="card-body register-card-body">
                <p class="login-box-msg">{{ __('adminlte::adminlte.register_message') }}</p>
                {!! form($form) !!}
                <p class="mt-2 mb-1">
                    <a href="{{ $login_url ?? '' }}">
                        {{ __('adminlte::adminlte.i_already_have_a_membership') }}
                    </a>
                </p>
            </div>
        </div><!-- /.form-box -->
    </div><!-- /.register-box -->

@endsection
