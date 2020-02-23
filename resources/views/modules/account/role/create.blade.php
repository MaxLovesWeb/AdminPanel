@extends('account::layouts.master')

@section('content')


    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Create Role')}}

                    </h3>
                </div>
                <div class="card-body">



                    <div class="row">
                        <div class="col-4">
                            <ul class="nav nav-tabs" id="role-data-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-role-tab" data-toggle="pill" href="#tabs-role" role="tab" aria-controls="tabs-role" aria-selected="true">Role</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="role-data-content-below-tabContent">
                                <div class="tab-pane text-left fade show active" id="tabs-role" role="tabpanel" aria-labelledby="tabs-role-tab">
                                    <div class="card-body">
                                        {!! form($forms['role']) !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-8">

                            <ul class="nav nav-tabs" id="permissions-users-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-roles-tab" data-toggle="pill" href="#tabs-roles" role="tab" aria-controls="tabs-roles" aria-selected="true">Roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-permissions-tab" data-toggle="pill" href="#tabs-permissions" role="tab" aria-controls="tabs-permissions" aria-selected="true">Permissions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-users-tab" data-toggle="pill" href="#tabs-users" role="tab" aria-controls="tabs-users" aria-selected="false">Users</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="permissions-users-content-below-tabContent">
                                <div class="tab-pane text-left fade show active" id="tabs-roles" role="tabpanel" aria-labelledby="tabs-roles-tab">

                                    <div class="card-body">
                                        @datatable(['builder' => $datatables['roles']])
                                    </div>
                                </div>
                                <div class="tab-pane text-left fade show active" id="tabs-permissions" role="tabpanel" aria-labelledby="tabs-permissions-tab">

                                    <div class="card-body">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-users" role="tabpanel" aria-labelledby="tabs-users-tab">
                                    <div class="card-body">
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

