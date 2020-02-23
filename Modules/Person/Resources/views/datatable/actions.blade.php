<div class="btn-group" role="group">
	@can('view',  $person)
		<a class="btn btn-outline-primary" href="{{ route('persons.show', $person) }}" data-toggle="tooltip" title="{!! __('template::buttons.show') !!}">
			<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $person)
		<a class="btn btn-outline-success" href="{{ route('persons.edit', $person) }}" data-toggle="tooltip" title="{!! __('template::buttons.edit') !!}">
			<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $person)
		<button class="btn btn-outline-danger" type="button"
				data-toggle="modal" data-target="#persons-{{ $person->getKey() }}-modal" data-title="data title for persons"
				data-message="data-message for persons">
			<i class="fa fa-trash"></i>
		</button>
	@endcan
</div>

@include('template::partials.delete-modal', [
	'form_id' => 'persons-'.$person->getKey().'-destroy-form',
	'route' => route('persons.destroy', $person),
	'modal_id' => 'persons-'.$person->getKey().'-modal'
])
