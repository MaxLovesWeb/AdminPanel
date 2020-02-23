@extends('person::layouts.master')

@section('content')


    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Show Person')}}

                    </h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <ul class="nav nav-tabs" id="person-data-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-person-tab" data-toggle="pill" href="#tabs-person" role="tab" aria-controls="tabs-person" aria-selected="true">Person</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-user-tab" data-toggle="pill" href="#tabs-user" role="tab" aria-controls="tabs-user" aria-selected="true">User</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="person-data-content-below-tabContent">
                                <div class="tab-pane text-left fade show active" id="tabs-person" role="tabpanel" aria-labelledby="tabs-person-tab">
                                    <div class="card-body">
                                        {!! form($forms['person']) !!}
                                        <a class="btn btn-default form-control" role="button" href="{{ route('persons.edit', $person) }}" type="button">Edit</a>
                                    </div>
                                </div>

                                <div class="tab-pane text-left fade" id="tabs-user" role="tabpanel" aria-labelledby="tabs-user-tab">
                                    <div class="card-body">
                                        {!! form($forms['user']) !!}
                                        <a class="btn btn-default form-control" role="button" href="{{ route('users.edit', $person->user) }}" type="button">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">

                            <ul class="nav nav-tabs" id="person-content-below-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-addresses-tab" data-toggle="pill" href="#tabs-addresses" role="tab" aria-controls="tabs-addresses" aria-selected="false">Addresses</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="person-content-below-tabContent">


                                <div class="tab-pane fade show active" id="tabs-addresses" role="tabpanel" aria-labelledby="tabs-addresses-tab">
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

