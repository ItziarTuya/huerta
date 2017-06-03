<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="{{ $name }}" class="col-md-4 control-label">{{ $label }}</label>

    <div class="col-md-7">
        <input id="{{ $name }}" type="{{ $type }}" class="form-control" name="{{ $name }}" @isset($min) step="any" min="{{ $min }}" @endisset value="{{ old($name, isset($value) ? $value : '') }}" autofocus>

        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>