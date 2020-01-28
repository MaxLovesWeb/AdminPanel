<div class="btn-group" role="group">

	@can('view', $user)
	    <a class="btn btn-outline-primary" href="{{ route('users.show', $user) }}" data-toggle="tooltip" title="show">
	    	<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $user)
	    <a class="btn btn-outline-success" href="{{ route('users.edit', $user) }}" data-toggle="tooltip" title="edit">
	    	<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $user)
	    <a class="btn btn-outline-danger" href="{{ route('users.confirm-delete', $user) }}" data-toggle="tooltip" title="delete">
	    	<i class="fa fa-trash"></i>
		</a>
	@endcan
</div>
