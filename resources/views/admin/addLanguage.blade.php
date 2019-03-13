@extends('layouts.admin')
@section('title', 'Add Language')

@section('content')

<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Select2</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div>
<form method="POST" action="{{ route('admin.languages.store') }}">
  <!-- /.box-header -->
@csrf
  <div class="box-body">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter a name">
        </div>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
      <div class="col-md-3">
        <div class="form-group">
          <label>Original Name</label>
          <input type="text" name="originalName" class="form-control" placeholder="Enter name written in language">
        </div>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
        <div class="form-group">
          <label>PromoLink</label>
          <input type="text" name="promoLink" class="form-control" placeholder="Enter a link">
        </div>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary pull-right">Add</button>
  </div>
</form>
</div>

@endsection
