@extends('account::layouts.master')

@section('content')

    <div class="row">

        <div class="col-12">

            <div class="card card-primary card-outline">

                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Credentials')}}
                    </h3>
                </div>
                <div class="card-body">

                    <ul class="nav nav-tabs" id="credentials-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="update-identifier-tab" data-toggle="pill" href="#update-identifier" role="tab" aria-controls="update-identifier" aria-selected="true">{{ __('Identifier') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="update-password-tab" data-toggle="pill" href="#update-password" role="tab" aria-controls="update-password" aria-selected="false">{{ __('Password') }}</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="credentials-tab-content">
                        <div class="tab-pane fade show active" id="update-identifier" role="tabpanel" aria-labelledby="update-identifier-tab">
                            {!! form($identifierForm) !!}
                        </div>
                        <div class="tab-pane fade" id="update-password" role="tabpanel" aria-labelledby="update-password-tab">
                            {!! form($passwordForm) !!}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card -->

        </div>
    </div>

@endsection

@push('js')

    <script>

        $(function() {


            /*
                $('[data-toggle="pill"]').click(function(e) {
                    var $this = $(this),
                        loadurl = $this.attr('href'),
                        targ = $this.attr('data-target');

                    $(targ).load(loadurl);
                    $this.tab('show');

                    return false;
                });

                $("button").click(function(){
                    $("#box").load("test-content.html", function(responseTxt, statusTxt, jqXHR){
                        if(statusTxt === "success"){
                            alert("New content loaded successfully!");
                        }
                        if(statusTxt === "error"){
                            alert("Error: " + jqXHR.status + " " + jqXHR.statusText);
                        }
                    });
                });
                */



        });


    </script>

@endpush
