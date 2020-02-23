@extends('company::layouts.master')

@section('content')


    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Show Resume')}}

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
                                        {!! form($forms['resume'])  !!}
                                        <a class="btn btn-default form-control" role="button" href="{{ route('resume.edit', $resume) }}" type="button">Edit</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-8">

                            <ul class="nav nav-tabs" id="resume-content-below-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-person-tab" data-toggle="pill" href="#tabs-person" role="tab" aria-controls="tabs-person" aria-selected="true">Person</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-edu-tab" data-toggle="pill" href="#tabs-edu" role="tab" aria-controls="tabs-edu" aria-selected="false">Educations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-experiences-tab" data-toggle="pill" href="#tabs-experiences" role="tab" aria-controls="tabs-experiences" aria-selected="false">Experiences</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-trainings-tab" data-toggle="pill" href="#tabs-trainings" role="tab" aria-controls="tabs-trainings" aria-selected="false">Trainings</a>
                                </li>


                            </ul>

                            <div class="tab-content" id="resume-content-below-tabContent">

                                <div class="tab-pane fade show active" id="tabs-person" role="tabpanel" aria-labelledby="tabs-person-tab">
                                    <div class="card-body">
                                        {!! form($forms['person'])  !!}
                                        <a class="btn btn-default form-control" role="button" href="{{ route('persons.edit', $resume->user->person) }}" type="button">Edit</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="tabs-edu" role="tabpanel" aria-labelledby="tabs-edu-tab">
                                    <div class="card-body">
                                        @datatable(['builder' => $datatables['educations']])
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-experiences" role="tabpanel" aria-labelledby="tabs-experiences-tab">
                                    <div class="card-body">
                                        @datatable(['builder' => $datatables['experiences']])

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-trainings" role="tabpanel" aria-labelledby="tabs-trainings-tab">
                                    <div class="card-body">
                                        @datatable(['builder' => $datatables['trainings']])

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

