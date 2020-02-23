<div class="btn-group" role="group">
	@can('view',  $education)
		<a class="btn btn-outline-primary" href="{{ route('educations.show', $education) }}" data-toggle="tooltip" title="{!! __('template::buttons.show') !!}">
			<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $education)
		<a class="btn btn-outline-success" href="{{ route('educations.edit', $education) }}" data-toggle="tooltip" title="{!! __('template::buttons.edit') !!}">
			<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $education)
		<button class="btn btn-outline-danger" type="button"
				data-toggle="modal" data-target="#educations-{{ $education->getKey() }}-modal" data-title="data title for educations"
				data-message="data-message for educations">
			<i class="fa fa-trash"></i>
		</button>
	@endcan
</div>

@include('template::partials.delete-modal', [
	'form_id' => 'educations-'.$education->getKey().'-destroy-form',
	'route' => route('educations.destroy', $education),
	'modal_id' => 'educations-'.$education->getKey().'-modal'
])
