@extends('resume::layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/cropper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/mime-icons.min.css') }}">
    <style>{!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/css/lfm.css')) !!}</style>
    @endpush

@section('content')


    <iframe src="/laravel-filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>

    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <i class="fas fa-edit"></i>
                    {{ __('Edit Resume')}}
                </div>

                <div class="card-body">
                    <div class="row">

                        <textarea id="my-editor" name="content" class="form-control">{!! $resume->title !!}</textarea>


                        <div class="col-5">
                            <ul class="nav nav-tabs" id="resume-data-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-resume-tab" data-toggle="pill" href="#tabs-resume" role="tab" aria-controls="tabs-resume" aria-selected="true">Resume</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-add-contact-tab" data-toggle="pill" href="#tabs-add-contact" role="tab" aria-controls="tabs-add-contact" aria-selected="false">Add Contact</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-add-edu-tab" data-toggle="pill" href="#tabs-add-edu" role="tab" aria-controls="tabs-add-edu" aria-selected="false">Add Education</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-add-experience-tab" data-toggle="pill" href="#tabs-add-experience" role="tab" aria-controls="tabs-add-experience" aria-selected="false">Add Experience</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-add-training-tab" data-toggle="pill" href="#tabs-add-training" role="tab" aria-controls="tabs-add-training" aria-selected="false">Add Training</a>
                                </li>


                            </ul>

                            <div class="tab-content" id="resume-data-content-below-tabContent">
                                <div class="tab-pane text-left fade show active" id="tabs-resume" role="tabpanel" aria-labelledby="tabs-resume-tab">
                                    <div class="card-body">
                                        {!! form($forms['resume'])  !!}
                                    </div>
                                </div>
                                <div class="tab-pane text-left fade" id="tabs-add-contact" role="tabpanel" aria-labelledby="tabs-add-contact-tab">
                                    <div class="card-body">
                                        {!! form($forms['contact'])  !!}
                                    </div>
                                </div>

                                <div class="tab-pane text-left fade" id="tabs-add-edu" role="tabpanel" aria-labelledby="tabs-add-edu-tab">
                                    <div class="card-body">
                                        {!! form($forms['edu'])  !!}
                                    </div>
                                </div>
                                <div class="tab-pane text-left fade" id="tabs-add-experience" role="tabpanel" aria-labelledby="tabs-add-experience-tab">
                                    <div class="card-body">
                                        {!! form($forms['experience'])  !!}
                                    </div>
                                </div>
                                <div class="tab-pane text-left fade" id="tabs-add-training" role="tabpanel" aria-labelledby="tabs-add-training-tab">
                                    <div class="card-body">
                                        {!! form($forms['training'])  !!}
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-7">

                            <ul class="nav nav-tabs" id="resume-content-below-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-person-tab" data-toggle="pill" href="#tabs-person" role="tab" aria-controls="tabs-person" aria-selected="true">Person</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-addresses-tab" data-toggle="pill" href="#tabs-addresses" role="tab" aria-controls="tabs-addresses" aria-selected="false">Addresses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-contacts-tab" data-toggle="pill" href="#tabs-contacts" role="tab" aria-controls="tabs-contacts" aria-selected="false">Contacts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-edus-tab" data-toggle="pill" href="#tabs-edus" role="tab" aria-controls="tabs-edus" aria-selected="false">Educations</a>
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
                                <div class="tab-pane fade" id="tabs-addresses" role="tabpanel" aria-labelledby="tabs-addresses-tab">
                                    <div class="card-body">
                                        @datatable(['builder' => $datatables['addresses']])
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-contacts" role="tabpanel" aria-labelledby="tabs-contacts-tab">
                                    <div class="card-body">
                                        @datatable(['builder' => $datatables['contacts']])
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-edus" role="tabpanel" aria-labelledby="tabs-edus-tab">
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

@push('js')

    <script src="{{ asset('vendor/laravel-filemanager/js/cropper.min.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/dropzone.min.js') }}"></script>
    <script>
        var lang = {!! json_encode(trans('laravel-filemanager::lfm')) !!};
        var actions = [
            // {
            //   name: 'use',
            //   icon: 'check',
            //   label: 'Confirm',
            //   multiple: true
            // },
            {
                name: 'rename',
                icon: 'edit',
                label: lang['menu-rename'],
                multiple: false
            },
            {
                name: 'download',
                icon: 'download',
                label: lang['menu-download'],
                multiple: true
            },
            // {
            //   name: 'preview',
            //   icon: 'image',
            //   label: lang['menu-view'],
            //   multiple: true
            // },
            {
                name: 'move',
                icon: 'paste',
                label: lang['menu-move'],
                multiple: true
            },
            {
                name: 'resize',
                icon: 'arrows-alt',
                label: lang['menu-resize'],
                multiple: false
            },
            {
                name: 'crop',
                icon: 'crop',
                label: lang['menu-crop'],
                multiple: false
            },
            {
                name: 'trash',
                icon: 'trash',
                label: lang['menu-delete'],
                multiple: true
            },
        ];
        var sortings = [
            {
                by: 'alphabetic',
                icon: 'sort-alpha-down',
                label: lang['nav-sort-alphabetic']
            },
            {
                by: 'time',
                icon: 'sort-numeric-down',
                label: lang['nav-sort-time']
            }
        ];
    </script>

    <script>{!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/script.js')) !!}</script>
    {{-- Use the line below instead of the above if you need to cache the script. --}}
     <script src="{{ asset('vendor/laravel-filemanager/js/script.js') }}"></script>
    <script>
        Dropzone.options.uploadForm = {
            paramName: "upload[]", // The name that will be used to transfer the file
            uploadMultiple: false,
            parallelUploads: 5,
            timeout:0,
            clickable: '#upload-button',
            dictDefaultMessage: lang['message-drop'],
            init: function() {
                var _this = this; // For the closure
                this.on('success', function(file, response) {
                    if (response == 'OK') {
                        loadFolders();
                    } else {
                        this.defaultOptions.error(file, response.join('\n'));
                    }
                });
            },
        }
    </script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>

    <script type="text/javascript">

        var route_prefix = "/filemanager";

        var options = {
            height: 100,
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        };

        //$('textarea.my-editor').ckeditor(options);

        $(function() {

            ClassicEditor
                .create( document.querySelector( '#my-editor' ) )
                .then( editor => {
                    console.log( editor );
                } )
                .catch( error => {
                    console.error( error );
                } );

            $(".select2Tags").each(function(index, element) {
                $(this).select2({
                    tags: true,
                    width: "100%",
                    //placeholder: 'Choice a company OR input a name',
                    allowClear: true
                });
            });





    });

    </script>




@endpush

