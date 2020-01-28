<div class="btn-group" data="group">
	@can('view', $data)
	    <a class="btn btn-outline-primary" href="{{ route('roles.show', $data) }}" data-toggle="tooltip" title="edit">
	    	<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $data)
	    <a class="btn btn-outline-success" href="{{ route('roles.edit', $data) }}" data-toggle="tooltip" title="edit">
	    	<i class="fa fa-edit"></i>
		</a>
	@endcan

</div>
