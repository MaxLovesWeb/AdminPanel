<div class="btn-group" role="group">
	@can('view', $address)
	    <a class="btn btn-outline-primary" href="{{ route('addresses.show', $address) }}" data-toggle="tooltip" title="edit">
	    	<i class="fa fa-eye"></i>
		</a>
	@endcan

	@can('update', $address)
	    <a class="btn btn-outline-success" href="{{ route('addresses.edit', $address) }}" data-toggle="tooltip" title="edit">
	    	<i class="fa fa-edit"></i>
		</a>
	@endcan

	@can('delete', $address)
	    <button class="btn btn-outline-danger" type="button"
				data-toggle="modal" data-target="#addresses-{{ $address->getKey() }}-modal" data-title="data title for address"
				data-message="data-message for address">
	    	<i class="fa fa-trash"></i>
		</button>
	@endcan
</div>

@include('template::partials.delete-modal', [
	'form_id' => 'address-'.$address->getKey().'-destroy-form',
	'route' => route('addresses.destroy', $address),
	'modal_id' => 'addresses-'.$address->getKey().'-modal'
])
