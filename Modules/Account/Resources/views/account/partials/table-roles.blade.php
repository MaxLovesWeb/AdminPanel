<select class="form-control">
	@foreach($roles as $role)
		<option value="{{ $role->id }}">{{ $role->name }}</option>
	@endforeach
</select>