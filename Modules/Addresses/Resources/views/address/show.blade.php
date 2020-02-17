@extends('addresses::layouts.master')

@section('content')


    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Show Address')}}

                    </h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <ul class="nav nav-tabs" id="address-data-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-address-tab" data-toggle="pill" href="#tabs-address" role="tab" aria-controls="tabs-address" aria-selected="true">Address</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="address-data-content-below-tabContent">
                                <div class="tab-pane text-left fade show active" id="tabs-address" role="tabpanel" aria-labelledby="tabs-address-tab">
                                    <div class="card-body">
                                        {!! form($form) !!}
                                        <div class="btn-toolbar justify-content-between" role="group">
                                            <a class="btn btn-outline-primary" role="button" href="{{ route('addresses.edit', $address) }}" type="button">Edit</a>
                                            @include('account::forms.destroy', ['url' => route('addresses.destroy', $address)])
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-8">
                            {!! Mapper::render() !!}
                        </div>
                    </div>
                </div>
            </div><!-- /.card -->
        </div>
    </div>


@endsection
