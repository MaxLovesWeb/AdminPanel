@if(count($roles))
	<select class="form-control">
		@foreach($roles as $role)
			<option value="{{ $role->id }}">{{ $role->name }}</option>
		@endforeach
	</select>
@else
	@component('bootstrap::badge', ['type' => 'success'])
	    {{ __('no roles') }}
	@endcomponent
@endif
