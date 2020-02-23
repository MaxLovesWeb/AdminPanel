<div class="btn-group" role="group">
	@can('view', $role)
		<a class="btn btn-outline-primary" href="{{ route('roles.show', $role) }}" data-toggle="tooltip" title="{!! __('template::buttons.show') !!}">
			<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $role)
		<a class="btn btn-outline-success" href="{{ route('roles.edit', $role) }}" data-toggle="tooltip" title="{!! __('template::buttons.edit') !!}">
			<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $role)
		<button class="btn btn-outline-danger" type="button"
				data-toggle="modal" data-target="#roles-{{ $role->getKey() }}-modal" data-title="data title for role"
				data-message="data-message for role">
			<i class="fa fa-trash"></i>
		</button>
	@endcan
</div>

@include('template::partials.delete-modal', [
	'form_id' => 'roles-'.$role->getKey().'-destroy-form',
	'route' => route('roles.destroy', $role),
	'modal_id' => 'roles-'.$role->getKey().'-modal'
])
