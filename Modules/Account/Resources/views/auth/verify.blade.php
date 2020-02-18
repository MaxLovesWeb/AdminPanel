@extends('account::layouts.unverified')

@section('unverified')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('account::auth.verify_message') }}</div>

                    <div class="card-body">
                        @include('account::auth.verification-notice')
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection


