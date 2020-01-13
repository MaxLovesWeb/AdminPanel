<div class="form-group">

    <label for="{{ $name }}" class="col-form-label">{{ $label ?? '' }}</label>

    <select class="form-control @error($name) is-invalid @enderror {{ $class ?? '' }}" "{{ $disabled ?? '' }}" {{ $required ?? required }} name="{{ $name }}" {{ isset($multiple) ?: multiple }}>
    	@foreach($options as $option)
 			<option value="{{ $option['value'] }}" selected="{{ isset($option['selected']) ? 'selected' : '' }}" disabled="{{ isset($option['disabled']) ? 'disabled' : '' }}">{{ $option['key'] }}</option>
 		@endforeach
	</select>

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
</div>