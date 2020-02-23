@if(count($users))
	<select class="form-control">
		@foreach($users as $user)
			<option value="{{ $user->id }}">{{ $user->name }}</option>
		@endforeach
	</select>
@else
	@component('bootstrap::badge', ['type' => 'success'])
	    {{ __('no users') }}
	@endcomponent
@endif
