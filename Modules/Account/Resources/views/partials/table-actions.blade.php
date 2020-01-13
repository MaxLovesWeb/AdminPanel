<div class="btn-group" role="group">
	@can('update', $account)
	    <a class="btn btn-outline-success" href="{{ route('accounts.edit', ['account' => $id]) }}" data-toggle="tooltip" title="edit">
	    	<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $user)
	    <a class="btn btn-outline-danger" href="{{ route('users.confirm-delete', ['user' => $user['id']]) }}" data-toggle="tooltip" title="delete">
	    	<i class="fa fa-trash"></i>
		</a>
	@endcan
</div>
