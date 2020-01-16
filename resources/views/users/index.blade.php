@extends('users.layout')

@section('content')

<div class="row">
    <div class="col-lg">
        
        @card(['type' => 'default', 'header' => __('Users')])

        	@datatable(['ajax' => $table['route'], 'columns' => $table['columns']])

        @endcard
    </div>
</div>

@endsection