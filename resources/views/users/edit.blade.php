@extends('users.layout')

@section('content')

<div class="row">

    <div class="col-lg">

    	@card(['type' => 'default', 'header' => __('User Data Update')])
	
			@form(['url' => route('users.update', $user), 'method' => 'PUT'])

                <div class="form-group">
                    {{ Form::label('name', null, ['class' => 'control-label']) }}
                    {{ Form::text('name', $user->name, ['class' => 'form-control', 'required' => 'required']) }}
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('email', null, ['class' => 'control-label']) }}
                    {{ Form::text('email', $user->email, ['class' => 'form-control', 'required' => 'required']) }}
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('password', null, ['class' => 'control-label']) }}
                    {{ Form::password('password', ['class' => 'form-control', 'required' => 'required' ]) }}
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    {{ link_to_route('password.reset', 'Change Password', session()->getId(), []) }}
                </div>

                <div class="form-group">
                    {{ Form::submit('Update!') }}
                </div>

            @endform

    	@endcard
        
    </div>

</div>

@endsection