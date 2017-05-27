
<form class="form-horizontal" role="form" method="POST" action="{{ $action }}">

    {{ csrf_field() }}

    {{ $slot }}

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-success btn-block">
                {{ $submit }}
            </button>
        </div>
    </div>

</form>
