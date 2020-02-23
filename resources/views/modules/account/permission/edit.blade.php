@extends('account::layouts.master')

@section('content')


    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Edit Permission')}}

                    </h3>
                </div>
                <div class="card-body">



                    <div class="row">
                        <div class="col-4">
                            <ul class="nav nav-tabs" id="permission-data-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-permission-tab" data-toggle="pill" href="#tabs-permission" role="tab" aria-controls="tabs-permission" aria-selected="true">Permission</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-sync-roles-tab" data-toggle="pill" href="#tabs-sync-roles" role="tab" aria-controls="tabs-sync-roles" aria-selected="true">Sync Roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-sync-users-tab" data-toggle="pill" href="#tabs-sync-users" role="tab" aria-controls="tabs-sync-users" aria-selected="true">Sync Users</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="permission-data-content-below-tabContent">
                                <div class="tab-pane text-left fade show active" id="tabs-permission" role="tabpanel" aria-labelledby="tabs-permission-tab">
                                    <div class="card-body">
                                        {!! form($forms['permissions']) !!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-sync-roles" role="tabpanel" aria-labelledby="tabs-sync-roles-tab">
                                    <div class="card-body">
                                        {!! form($forms['syncRoles']) !!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-sync-users" role="tabpanel" aria-labelledby="tabs-sync-users-tab">
                                    <div class="card-body">
                                        {!! form($forms['syncUsers']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">

                            <ul class="nav nav-tabs" id="roles-users-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-roles-tab" data-toggle="pill" href="#tabs-roles" role="tab" aria-controls="tabs-roles" aria-selected="true">Roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-users-tab" data-toggle="pill" href="#tabs-users" role="tab" aria-controls="tabs-users" aria-selected="false">Users</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="roles-users-content-below-tabContent">
                                <div class="tab-pane text-left fade show active" id="tabs-roles" role="tabpanel" aria-labelledby="tabs-roles-tab">

                                    <div class="card-body">
                                        @datatable(['builder' => $datatables['roles']])
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-users" role="tabpanel" aria-labelledby="tabs-users-tab">
                                    <div class="card-body">
                                        @datatable(['builder' => $datatables['users']])
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

