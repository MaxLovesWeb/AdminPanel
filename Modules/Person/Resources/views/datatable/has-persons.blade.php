@if(count($persons))
	<select class="form-control">
		@foreach($persons as $person)
			<option value="{{ $person->id }}">{{ $person->name }}</option>
		@endforeach
	</select>
@else
	@component('bootstrap::badge', ['type' => 'success'])
	    {{ __('no persons') }}
	@endcomponent
@endif
