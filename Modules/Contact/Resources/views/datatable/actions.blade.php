<div class="btn-group" role="group">
	@can('view',  $contact)
		<a class="btn btn-outline-primary" href="{{ route('companies.show', $contact) }}" data-toggle="tooltip" title="{!! __('template::buttons.show') !!}">
			<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $contact)
		<a class="btn btn-outline-success" href="{{ route('companies.edit', $contact) }}" data-toggle="tooltip" title="{!! __('template::buttons.edit') !!}">
			<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $contact)
		<button class="btn btn-outline-danger" type="button"
				data-toggle="modal" data-target="#companies-{{ $contact->getKey() }}-modal" data-title="data title for contact"
				data-message="data-message for contact">
			<i class="fa fa-trash"></i>
		</button>
	@endcan
</div>

@include('template::partials.delete-modal', [
	'form_id' => 'contacts-'.$contact->getKey().'-destroy-form',
	'route' => route('companies.destroy', $contact),
	'modal_id' => 'contacts-'.$contact->getKey().'-modal'
])
