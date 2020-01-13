<div class="form-group">

	@if( $type != 'hidden')
    	<label for="{{ $name }}" class="col-form-label">{{ $label ?? '' }}</label>
    @endif

    <input id="{{ $name }}" type="{{ $type ?? 'text' }}" class="form-control @error($name) is-invalid @enderror {{ $class ?? '' }}" name="{{ $name }}" value="{{ $value }}" required="{{ isset($required) ? 'required' : '' }}" disabled="{{ isset($disabled) ? 'disabled' : '' }}">

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>

<div class="form-group">

    {{ Form::label('first_name', null, ['class' => 'control-label']) }}
    {{ Form::text('first_name', old('first_name'), ['class' => 'form-control']) }}
    
</div>