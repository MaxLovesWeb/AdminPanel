

<select class="form-control select2">
	@foreach($companies as $company)
		<option value="{{ $company->id }}">{{ $company->name }}</option>
	@endforeach
</select>
