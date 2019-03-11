@extends('layouts.admin')
@section('title', 'Add Country')
@section('css')
<link rel="stylesheet" href="{{asset('adminlte/components/select2/dist/css/select2.min.css')}}">

@endsection
@section('content')

<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Select2</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <form method="POST" action="{{ route('admin.countries.store') }}" enctype="multipart/form-data">
    @csrf
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter a name">
        </div>
        <!-- /.form-group -->
        <div class="form-group">
          <label for="exampleInputFile">Flag</label>
          <input type="file" name="flag">

          <p class="help-block">Example block-level help text here.</p>
        </div>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
        <div class="form-group">
          <label>Language</label>
          <select class="form-control select2" name="languages[]" multiple="multiple" data-placeholder="Select a language"
                  style="width: 100%;">
            @foreach ($languages as $language)
              <option value="{{ $language->id }}">{{ $language->name }}</option>
            @endforeach
          </select>
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
</div>
</form>
@endsection
@section('script')
<script src="{{asset('adminlte/components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>

@endsection
