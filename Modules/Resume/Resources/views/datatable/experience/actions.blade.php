<div class="btn-group" role="group">
	@can('view',  $experience)
		<a class="btn btn-outline-primary" href="{{ route('experiences.show', $experience) }}" data-toggle="tooltip" title="{!! __('template::buttons.show') !!}">
			<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $experience)
		<a class="btn btn-outline-success" href="{{ route('experiences.edit', $experience) }}" data-toggle="tooltip" title="{!! __('template::buttons.edit') !!}">
			<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $experience)
		<button class="btn btn-outline-danger" type="button"
				data-toggle="modal" data-target="#experiences-{{ $experience->getKey() }}-modal" data-title="data title for experiences"
				data-message="data-message for experiences">
			<i class="fa fa-trash"></i>
		</button>
	@endcan
</div>

@include('template::partials.delete-modal', [
	'form_id' => 'experiences-'.$experience->getKey().'-destroy-form',
	'route' => route('experiences.destroy', $experience),
	'modal_id' => 'experiences-'.$experience->getKey().'-modal'
])
