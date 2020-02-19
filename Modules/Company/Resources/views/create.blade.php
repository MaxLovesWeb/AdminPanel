@extends('company::layouts.master')

@section('content')


    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Create Company')}}

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
                                        {!! form($forms['company']) !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-8">

                            <ul class="nav nav-tabs" id="users-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-companies-tab" data-toggle="pill" href="#tabs-companies" role="tab" aria-controls="tabs-roles" aria-selected="true">Companies</a>
                                </li>


                            </ul>

                            <div class="tab-content" id="users-content-below-tabContent">
                                <div class="tab-pane text-left fade show active" id="tabs-companies" role="tabpanel" aria-labelledby="tabs-companies-tab">

                                    <div class="card-body">
                                        @datatable(['builder' => $datatables['companies']])
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

