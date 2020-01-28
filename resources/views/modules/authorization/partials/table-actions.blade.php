<div class="btn-group" role="group">
	@can('view', $role)
	    <a class="btn btn-outline-primary" href="{{ route('roles.show', $role) }}" data-toggle="tooltip" title="edit">
	    	<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $role)
	    <a class="btn btn-outline-success" href="{{ route('roles.edit', $role) }}" data-toggle="tooltip" title="edit">
	    	<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $role)
	    <a class="btn btn-outline-danger" href="{{ route('roles.confirm-delete', $role) }}" data-toggle="tooltip" title="delete">
	    	<i class="fa fa-trash"></i>
		</a>
	@endcan
</div>
