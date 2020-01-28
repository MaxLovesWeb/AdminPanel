<!--
<select class="form-control">
	@foreach($permissions as $group)
		<optgroup label="{{ $group->getName() }}">
			@foreach($group->getPermissions() as $permission)
				<option value="{{ $permission->getKey() }}">{{ $permission->getKey() }}</option>
			@endforeach
		</optgroup>
	@endforeach
</select>
-->