@if(count($companies))
	<select class="form-control select2">
		@foreach($companies as $company)
			<option value="{{ $company->id }}">{{ $company->name }}</option>
		@endforeach
	</select>

@else
	@component('bootstrap::badge', ['type' => 'success'])
	    {{ __('no companies') }}
	@endcomponent
@endif
