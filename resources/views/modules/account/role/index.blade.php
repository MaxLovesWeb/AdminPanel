@extends('account::layouts.master')

@section('content')

    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Roles')}}
                    </h3>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="user-management-content-below-tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="vert-tabs-roles-tab" data-toggle="pill" href="#vert-tabs-roles" role="tab" aria-controls="vert-tabs-roles" aria-selected="false">Roles</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="user-management-content-below-tabContent">

                        <div class="tab-pane fade text-left fade show active" id="vert-tabs-roles" role="tabpanel" aria-labelledby="vert-tabs-roles-tab">
                            <div class="card-body">
                                @datatable(['builder' => $datatables['roles']])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
