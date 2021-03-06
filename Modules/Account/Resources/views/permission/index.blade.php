@extends('account::layouts.master')

@section('content')

    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Permissions')}}
                    </h3>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="permission-management-content-below-tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="vert-tabs-permissions-tab" data-toggle="pill" href="#vert-tabs-permissions" role="tab" aria-controls="vert-tabs-permissions" aria-selected="false">Permissions</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="permission-management-content-below-tabContent">

                        <div class="tab-pane fade text-left fade show active" id="vert-tabs-permissions" role="tabpanel" aria-labelledby="vert-tabs-permissions-tab">
                            <div class="card-body">
                                @datatable(['builder' => $datatables['permissions']])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
