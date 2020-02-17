<div class="btn-group" role="group">
	@can('view', $address)
	    <a class="btn btn-outline-primary" href="{{ route('addresses.show', $address) }}" data-toggle="tooltip" title="edit">
	    	<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $address)
	    <a class="btn btn-outline-success" href="{{ route('addresses.edit', $address) }}" data-toggle="tooltip" title="edit">
	    	<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $address)
	    <a class="btn btn-outline-danger" href="{{ route('addresses.destroy', $address) }}" data-toggle="tooltip" title="delete">
	    	<i class="fa fa-trash"></i>
		</a>
	@endcan
</div>
