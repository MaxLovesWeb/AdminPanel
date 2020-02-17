<div class="btn-group" role="group">
	@can('view', $permission)
	    <a class="btn btn-outline-primary" href="{{ route('permissions.show', $permission) }}" data-toggle="tooltip" title="edit">
	    	<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $permission)
	    <a class="btn btn-outline-success" href="{{ route('permissions.edit', $permission) }}" data-toggle="tooltip" title="edit">
	    	<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $permission)
	    <a class="btn btn-outline-danger" href="{{ route('permissions.destroy', $permission) }}" data-toggle="tooltip" title="delete">
	    	<i class="fa fa-trash"></i>
		</a>
	@endcan
</div>
