@extends('account::layouts.master')

@section('content')

<div class="row">
    <div class="col-lg">
        
        @card(['type' => 'default', 'header' => __('accounts')])

        	@datatable(['ajax' => $table['route'], 'columns' => $table['columns']])

        @endcard
    </div>
</div>

@endsection