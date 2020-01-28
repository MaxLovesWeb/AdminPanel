@extends('account::layouts.master')

@section('content')

<div class="row">

    <div class="col-lg">

    	@card(['type' => 'default', 'header' => __('Account Show')])

    		{!! form($form) !!}

    	@endcard
        
    </div>

</div>

@endsection