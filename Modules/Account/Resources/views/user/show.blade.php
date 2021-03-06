@extends('account::layouts.master')

@section('content')


    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Show User')}}

                    </h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <ul class="nav nav-tabs" id="user-data-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-user-tab" data-toggle="pill" href="#tabs-user" role="tab" aria-controls="tabs-user" aria-selected="true">User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-person-tab" data-toggle="pill" href="#tabs-person" role="tab" aria-controls="tabs-person" aria-selected="false">Person</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="user-data-content-below-tabContent">
                                <div class="tab-pane text-left fade show active" id="tabs-user" role="tabpanel" aria-labelledby="tabs-user-tab">
                                    <div class="card-body">

                                        {!! form($forms['user']) !!}

                                        <a class="btn btn-default form-control" role="button" href="{{ route('users.edit', $user) }}" type="button">Edit</a>


                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-person" role="tabpanel" aria-labelledby="tabs-person-tab">
                                    <div class="card-body">

                                        {!! form($forms['person']) !!}
                                        @if ($user->person->getKey())
                                            <a class="btn btn-default form-control" role="button" href="{{ route('persons.edit', $user) }}" type="button">Edit</a>
                                        @else
                                            <a class="btn btn-default form-control" role="button" href="{{ route('persons.create', $user) }}" type="button">Edit</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">

                            <ul class="nav nav-tabs" id="permissions-roles-content-below-tab" role="tablist">
                                <li class="nav-item disabled">
                                    <a class="nav-link disabled" id="tabs-relations-tab" data-toggle="pill" href="#tabs-relations" role="tab" aria-controls="tabs-relations" aria-selected="false">Relations / </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-roles-tab" data-toggle="pill" href="#tabs-roles" role="tab" aria-controls="tabs-roles" aria-selected="true">Roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-permissions-tab" data-toggle="pill" href="#tabs-permissions" role="tab" aria-controls="tabs-permissions" aria-selected="false">Permissions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-addresses-tab" data-toggle="pill" href="#tabs-addresses" role="tab" aria-controls="tabs-addresses" aria-selected="false">Addresses</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="permissions-roles-content-below-tabContent">
                                <div class="tab-pane text-left fade show active" id="tabs-roles" role="tabpanel" aria-labelledby="tabs-roles-tab">

                                    <div class="card-body">
                                        @datatable(['builder' => $datatables['roles']])
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-permissions" role="tabpanel" aria-labelledby="tabs-permissions-tab">
                                    <div class="card-body">
                                        @datatable(['builder' => $datatables['permissions']])
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
