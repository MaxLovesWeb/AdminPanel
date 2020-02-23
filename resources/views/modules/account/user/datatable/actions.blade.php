<div class="btn-group" role="group">
	@can('view', $user)
		<a class="btn btn-outline-primary" href="{{ route('users.show', $user) }}" data-toggle="tooltip" title="{!! __('template::buttons.show') !!}">
			<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $user)
		<a class="btn btn-outline-success" href="{{ route('users.edit', $user) }}" data-toggle="tooltip" title="{!! __('template::buttons.edit') !!}">
			<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $user)
		<button class="btn btn-outline-danger" type="button"
				data-toggle="modal" data-target="#users-{{ $user->getKey() }}-modal" data-title="data title for users"
				data-message="data-message for users">
			<i class="fa fa-trash"></i>
		</button>
	@endcan
</div>

@include('template::partials.delete-modal', [
	'form_id' => 'users-'.$user->getKey().'-destroy-form',
	'route' => route('users.destroy', $user),
	'modal_id' => 'users-'.$user->getKey().'-modal'
])

