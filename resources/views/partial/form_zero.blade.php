
<form class="form-horizontal" role="form" method="POST" action="{{ $action }}"
    @isset($enctype) enctype="{{ $enctype }}"@endisset>

    {{ csrf_field() }}
    @isset($method)
        <input type="hidden" name="_method" value="{{$method}}" >
    @endisset

    {{ $slot }}


    <div class="form-group">
        <div class="col-md-7 col-md-offset-4">
            <button type="submit" class="btn btn-success btn-block">
                {{ $submit }}
            </button>
        </div>
    </div>

</form>
