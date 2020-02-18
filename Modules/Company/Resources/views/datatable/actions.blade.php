<div class="btn-group" role="group">
	@can('view', $company)
		<a class="btn btn-outline-primary" href="{{ route('companies.show', $company) }}" data-toggle="tooltip" title="{!! __('template::buttons.show') !!}">
			<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $company)
		<a class="btn btn-outline-success" href="{{ route('companies.edit', $company) }}" data-toggle="tooltip" title="{!! __('template::buttons.edit') !!}">
			<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $company)
		<button class="btn btn-outline-danger" type="button"
				data-toggle="modal" data-target="#roles-{{ $company->getKey() }}-modal" data-title="data title for role"
				data-message="data-message for role">
			<i class="fa fa-trash"></i>
		</button>
	@endcan
</div>

@include('template::partials.delete-modal', [
	'form_id' => 'companies-'.$company->getKey().'-destroy-form',
	'route' => route('companies.destroy', $company),
	'modal_id' => 'companies-'.$company->getKey().'-modal'
])
