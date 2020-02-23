@extends('resume::layouts.master')

@section('content')

    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Resume')}}
                    </h3>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="resume-management-content-below-tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="vert-tabs-resume-tab" data-toggle="pill" href="#vert-tabs-resume" role="tab" aria-controls="vert-tabs-resume" aria-selected="false">Resume</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="resume-management-content-below-tabContent">

                        <div class="tab-pane fade text-left fade show active" id="vert-tabs-resume" role="tabpanel" aria-labelledby="vert-tabs-resume-tab">
                            <div class="card-body">
                                @datatable(['builder' => $datatables['resume']])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
