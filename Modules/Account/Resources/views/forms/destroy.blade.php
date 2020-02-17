
<a class="btn btn-outline-primary" href="#" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">
    <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
</a>
<form id="destroy-form" action="{{ $url }}" method="POST" style="display: none;">
    @method('delete')
    {{ csrf_field() }}
</form>
