@extends('users.layout')

@section('content')

<div class="row">

    <div class="col-lg">

        @card(['type' => 'default', 'header' => __('User Update')])


            {!! form($form) !!}

        
        @endcard
        
    </div>

</div>

<div class="row">

    <div class="col-lg">

    	@card(['type' => 'default'])


            <div class="form-group">
        		<button class="form-control"><a href="{{ route('password.reset', csrf_token()) }}">{{ __('Change your Password ?') }} </a></button>
        	</div>

        
        @endcard

        	
        
    </div>

</div>

@endsection