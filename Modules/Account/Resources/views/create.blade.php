@extends('account::layouts.master')

@section('content')

<div class="row">

    <div class="col-lg">

    	@card(['type' => 'default', 'header' => __('Account Create')])

    		{!! form($form) !!}

    	@endcard
        
    </div>

</div>

@endsection