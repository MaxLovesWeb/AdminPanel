<div class="btn-group" role="group">
	@can('view', $account)
	    <a class="btn btn-outline-primary" href="{{ route('accounts.show', $account) }}" data-toggle="tooltip" title="edit">
	    	<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $account)
	    <a class="btn btn-outline-success" href="{{ route('accounts.edit', $account) }}" data-toggle="tooltip" title="edit">
	    	<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $account)
	    <a class="btn btn-outline-danger" href="{{ route('accounts.confirm-delete', $account) }}" data-toggle="tooltip" title="delete">
	    	<i class="fa fa-trash"></i>
		</a>
	@endcan
</div>
