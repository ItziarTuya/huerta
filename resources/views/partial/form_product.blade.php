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

<div class="form-group">
  <label class="col-md-4 control-label" for="category">Category</label>
  <div class="col-md-6">
    <input type="text" name="category" placeholder="" class="form-control">
  </div>
</div>


{{-- Image update

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
 --}}
<div class="form-group">
  <label class="col-md-4 control-label" for="price">Price</label>
  <div class="col-md-6">
    <input type="number" name="price" min="0" placeholder="" class="form-control">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="stock">Stock (quantity)</label>
  <div class="col-md-6">
    <input type="number" name="stock" min="1" class="form-control">
  </div>
</div>