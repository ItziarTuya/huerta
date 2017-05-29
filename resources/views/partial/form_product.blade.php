<form action="{{ url('producer.product.store') }}" enctype="multipart/form-data" method="POST"> {{-- habría que modificar en form_zero el tema del enctype, meterlo en un slot, porque al llevar imagenes hay que modificarlo. enctype="multipart/form-data"--}}

  <div class="form-group">
    <label class="col-md-4 control-label" for="name">Name</label>
    <div class="col-md-6">
      <input type="text" name="name" placeholder="" class="form-control" required autofocus>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="description">Description</label>
    <div class="col-md-6">
      <input type="text" name="description" placeholder="" class="form-control">
    </div>
  </div>


  {{-- Image update --}}

    @if (count($errors))
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
  </div>
  <img src="/images/{{ Session::get('path') }}">
  @endif

  <div class="form-group">
    <label class="col-md-4 control-label"  for="image">Image</label>
    <div class="col-md-6">
      <input type="file" name="image" placeholder="" class="form-control">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="price">Price</label>
    <div class="col-md-6">
      <input type="text" name="price" placeholder="" class="form-control">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="stock">Stock (quantity)</label>
    <div class="col-md-6">
      <input type="text" name="stock" placeholder="" class="form-control">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label"  for="status">Status (published)</label>
    <div class="col-md-6">
        <input type="radio" name="status" class="input-xlarge"> No
        <input type="radio" name="status" checked class="input-xlarge"> Yes
    </div>
  </div>
</form>