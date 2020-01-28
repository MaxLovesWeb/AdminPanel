
@extends('role::layouts.master')

@section('content')

<div class="row">
    <div class="col-lg">
        
        @card(['type' => 'default', 'header' => __('roles')])

        	@datatable(['ajax' => $table['route'], 'columns' => $table['columns']])

        @endcard
    </div>
</div>

@endsection