<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="{{ $name }}" class="col-md-4 control-label">{{ $label }}</label>

    <div class="col-md-7">
        <textarea name="{{ $name }}" id="{{ $name }}" rows="3" class="form-control" required autofocus>{{ old($name, isset($value) ? $value : '') }}</textarea>

        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>