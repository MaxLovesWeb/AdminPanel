@extends('company::layouts.master')

@section('content')

<div class="row">

    <div class="col-lg">

    	@card(['type' => 'default', 'header' => __('Role Destroy')])

    		{!! form($form) !!}

    	@endcard

    </div>

</div>

@endsection
