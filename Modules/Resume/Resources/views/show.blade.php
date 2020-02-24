@extends('template::layouts.master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/resume/css/resume.css') }}">
@endsection

@section('body_data')

    id="page-top"

@endsection

@section('body')


    @include('resume::template.resume', compact('resume'))

@endsection

@push('adminlte_js')

    <!-- Custom scripts for this template -->
    <script src="{{ asset('vendor/resume/js/resume.js') }}"></script>

@endpush

