@extends('company::layouts.master')

@section('content')


    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Show Company')}}

                    </h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <ul class="nav nav-tabs" id="company-data-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-company-tab" data-toggle="pill" href="#tabs-company" role="tab" aria-controls="tabs-company" aria-selected="true">Company</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="company-data-content-below-tabContent">
                                <div class="tab-pane text-left fade show active" id="tabs-company" role="tabpanel" aria-labelledby="tabs-company-tab">
                                    <div class="card-body">
                                        {!! form($form) !!}
                                        <a class="btn btn-default form-control" role="button" href="{{ route('companies.edit', $company) }}" type="button">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">

                            <ul class="nav nav-tabs" id="users-content-below-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-users-tab" data-toggle="pill" href="#tabs-users" role="tab" aria-controls="tabs-users" aria-selected="false">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-addresses-tab" data-toggle="pill" href="#tabs-addresses" role="tab" aria-controls="tabs-addresses" aria-selected="false">Addresses</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="users-content-below-tabContent">

                                <div class="tab-pane fade show active" id="tabs-users" role="tabpanel" aria-labelledby="tabs-users-tab">
                                    <div class="card-body">
                                        @datatable(['builder' => $datatables['users']])
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-addresses" role="tabpanel" aria-labelledby="tabs-addresses-tab">
                                    <div class="card-body">
                                        @datatable(['builder' => $datatables['addresses']])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.card -->
        </div>
    </div>


@endsection

