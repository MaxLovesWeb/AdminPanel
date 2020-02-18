<div class="btn-group" role="group">
	@can('view', $permission)
		<a class="btn btn-outline-primary" href="{{ route('permissions.show', $permission) }}" data-toggle="tooltip" title="{!! __('template::buttons.show') !!}">
			<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $permission)
		<a class="btn btn-outline-success" href="{{ route('permissions.edit', $permission) }}" data-toggle="tooltip" title="{!! __('template::buttons.edit') !!}">
			<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $permission)
		<button class="btn btn-outline-danger" type="button"
				data-toggle="modal" data-target="#permissions-{{ $permission->getKey() }}-modal" data-title="data title for permissions"
				data-message="data-message for permissions">
			<i class="fa fa-trash"></i>
		</button>
	@endcan
</div>

@include('template::partials.delete-modal', [
	'form_id' => 'permissions-'.$permission->getKey().'-destroy-form',
	'route' => route('permissions.destroy', $permission),
	'modal_id' => 'permissions-'.$permission->getKey().'-modal'
])
