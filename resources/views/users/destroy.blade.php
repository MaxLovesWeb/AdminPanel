@extends('users.layout')

@section('content')

<div class="row">

    <div class="col-lg">

    	@card(['type' => 'default', 'header' => __('User Destroy')])

            {!! form($form) !!}

    	@endcard
        
    </div>

</div>

@endsection