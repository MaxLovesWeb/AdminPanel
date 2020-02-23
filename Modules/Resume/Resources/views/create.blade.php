@extends('resume::layouts.master')

@section('content')


    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Create Resume')}}

                    </h3>
                </div>
                <div class="card-body">



                    <div class="row">
                        <div class="col-4">
                            <ul class="nav nav-tabs" id="resume-data-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-resume-tab" data-toggle="pill" href="#tabs-resume" role="tab" aria-controls="tabs-resume" aria-selected="true">Resume</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="resume-data-content-below-tabContent">
                                <div class="tab-pane text-left fade show active" id="tabs-resume" role="tabpanel" aria-labelledby="tabs-resume-tab">
                                    <div class="card-body">
                                        {!! form($forms['resume']) !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-8">

                            <ul class="nav nav-tabs" id="resume-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-resume-tab" data-toggle="pill" href="#tabs-resume" role="tab" aria-controls="tabs-resume" aria-selected="true">Resume</a>
                                </li>


                            </ul>

                            <div class="tab-content" id="resume-content-below-tabContent">
                                <div class="tab-pane text-left fade show active" id="tabs-resume" role="tabpanel" aria-labelledby="tabs-resume-tab">

                                    <div class="card-body">
                                        @datatable(['builder' => $datatables['resume']])
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

