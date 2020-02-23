<div class="btn-group" role="group">
	@can('view',  $training)
		<a class="btn btn-outline-primary" href="{{ route('trainings.show', $training) }}" data-toggle="tooltip" title="{!! __('template::buttons.show') !!}">
			<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $training)
		<a class="btn btn-outline-success" href="{{ route('trainings.edit', $training) }}" data-toggle="tooltip" title="{!! __('template::buttons.edit') !!}">
			<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $training)
		<button class="btn btn-outline-danger" type="button"
				data-toggle="modal" data-target="#trainings-{{ $training->getKey() }}-modal" data-title="data title for trainings"
				data-message="data-message for trainings">
			<i class="fa fa-trash"></i>
		</button>
	@endcan
</div>

@include('template::partials.delete-modal', [
	'form_id' => 'trainings-'.$training->getKey().'-destroy-form',
	'route' => route('trainings.destroy', $training),
	'modal_id' => 'trainings-'.$training->getKey().'-modal'
])
