
@if(count($permissions))
    <select class="form-control">
        @foreach($permissions as $permission)

            <option value="{{ $permission->slug }}">{{ $permission->slug }}</option>

        @endforeach
    </select>
@else
    @component('bootstrap::badge', ['type' => 'danger', 'pill' => true])
        {{ __('no permissions added') }}
    @endcomponent
@endif
