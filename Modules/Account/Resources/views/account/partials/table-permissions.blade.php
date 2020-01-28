<select class="form-control">
	@foreach($permissions as $permission)
		
		<option value="{{ $permission->slug }}">{{ $permission->slug }}</option>
			
	@endforeach
</select>
