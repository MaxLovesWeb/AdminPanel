@if(count($experiences))
	<select class="form-control">
		@foreach($experiences as $experience)
			<option value="{{ $experience->id }}">{{ $experience->title }}</option>
		@endforeach
	</select>
@else
	@component('bootstrap::badge', ['type' => 'success'])
	    {{ __('no experiences') }}
	@endcomponent
@endif
