@if(count($educations))
	<select class="form-control">
		@foreach($educations as $education)
			<option value="{{ $education->id }}">{{ $education->title }}</option>
		@endforeach
	</select>
@else
	@component('bootstrap::badge', ['type' => 'success'])
	    {{ __('no educations') }}
	@endcomponent
@endif
