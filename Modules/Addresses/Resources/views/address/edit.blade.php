@extends('addresses::layouts.master')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Edit Address')}}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body col-4">
                            {!! form_start($forms['address']) !!}

                            <div class="row">
                                <div class="col-4">
                                    {!! form_row($forms['address']->is_primary) !!}
                                </div>
                                <div class="col-4">
                                    {!! form_row($forms['address']->is_shipping) !!}
                                </div>
                                <div class="col-4">
                                    {!! form_row($forms['address']->is_billing) !!}
                                </div>
                            </div>

                            {!! form_rest($forms['address']) !!}

                        </div>
                        <div class="card-body col-8">
                            {!! $gmaps !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

