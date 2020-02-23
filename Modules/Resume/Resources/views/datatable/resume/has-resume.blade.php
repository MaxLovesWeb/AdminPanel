@if(count($resumes))
	<select class="form-control">
		@foreach($resumes as $resume)
			<option value="{{ $resume->id }}">{{ $resume->title }}</option>
		@endforeach
	</select>
@else
	@component('bootstrap::badge', ['type' => 'success'])
	    {{ __('no resumes') }}
	@endcomponent
@endif
