@extends('person::layouts.master')

@section('content')

    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('persons')}}
                    </h3>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="person-management-content-below-tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="vert-tabs-persons-tab" data-toggle="pill" href="#vert-tabs-persons" role="tab" aria-controls="vert-tabs-persons" aria-selected="false">Persons</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="person-management-content-below-tabContent">

                        <div class="tab-pane fade text-left fade show active" id="vert-tabs-persons" role="tabpanel" aria-labelledby="vert-tabs-persons-tab">
                            <div class="card-body">
                                @datatable(['builder' => $datatables['persons']])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

