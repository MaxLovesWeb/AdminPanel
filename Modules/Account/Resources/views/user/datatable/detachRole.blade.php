
<div class="btn-group" role="group">
	@can('view', $role)
		<a class="btn btn-outline-primary" href="{{ route('roles.show', $role) }}" data-toggle="tooltip" title="edit">
			<i class="fa fa-eye"></i>
		</a>
	@endcan
</div>
