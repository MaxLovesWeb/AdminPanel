@extends('addresses::layouts.master')

@section('content')

    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Addresses')}}
                    </h3>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="address-management-content-below-tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="vert-tabs-address-tab" data-toggle="pill" href="#vert-tabs-address" role="tab" aria-controls="vert-tabs-address" aria-selected="false">Addresses</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="address-management-content-below-tabContent">

                        <div class="tab-pane fade text-left fade show active" id="vert-tabs-address" role="tabpanel" aria-labelledby="vert-tabs-address-tab">
                            <div class="card-body">
                                @datatable(['builder' => $datatables['addresses']])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
