@extends('users.layout')

@section('content')

<div class="row">
    <div class="col-lg">

        <div class="card card-primary card-outline card-tabs">

            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#user-data" role="tab" aria-selected="true">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#user-permissions" role="tab"  aria-selected="false">Permissions</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="user-data" role="tabpanel">
                        
                        {!! form($userForm) !!}

        
                    </div>
                    <div class="tab-pane fade" id="user-permissions" role="tabpanel">

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="row">

    <div class="col-lg-6">

    	@card(['type' => 'default'])


            <div class="form-group">
        		<button class="form-control"><a href="{{ route('password.reset', csrf_token()) }}">{{ __('Change your Password ?') }} </a></button>
        	</div>

        
        @endcard
        
    </div>
    <div class="col-lg-6">

        @card(['type' => 'default'])


            <div class="form-group">
                <button class="form-control"><a href="{{ route('users.confirm-delete', $user) }}">{{ __('Delete User ?') }} </a></button>
            </div>

        
        @endcard
        
    </div>

</div>

@endsection