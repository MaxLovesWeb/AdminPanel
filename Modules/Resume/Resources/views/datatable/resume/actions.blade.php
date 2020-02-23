<div class="btn-group" role="group">
	@can('view',  $resume)
		<a class="btn btn-outline-primary" href="{{ route('resume.show', $resume) }}" data-toggle="tooltip" title="{!! __('template::buttons.show') !!}">
			<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $resume)
		<a class="btn btn-outline-success" href="{{ route('resume.edit', $resume) }}" data-toggle="tooltip" title="{!! __('template::buttons.edit') !!}">
			<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $resume)
		<button class="btn btn-outline-danger" type="button"
				data-toggle="modal" data-target="#resume-{{ $resume->getKey() }}-modal" data-title="data title for resume"
				data-message="data-message for resume">
			<i class="fa fa-trash"></i>
		</button>
	@endcan
</div>

@include('template::partials.delete-modal', [
	'form_id' => 'resume-'.$resume->getKey().'-destroy-form',
	'route' => route('resume.destroy', $resume),
	'modal_id' => 'resume-'.$resume->getKey().'-modal'
])
