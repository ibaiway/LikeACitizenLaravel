@extends('layouts.admin')
@section('title', $city->name)
@section('css')
<link rel="stylesheet" href="{{asset('adminlte/components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('adminlte/components/datatables-extra/buttons.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('adminlte/components/select2/dist/css/select2.min.css')}}">

@endsection
@section('content')
<div class="row">
  <div class="col-md-4">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-black" style="background: url('{{Storage::url($city->headerImage)}}') center center;">
        <h3 class="widget-user-username">{{$city->name}}</h3>
        <h5 class="widget-user-desc">{{$city->country->name}}</h5>
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">{{$city->apps->count()}}</h5>
              <span class="description-text">APPS</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">13,000</h5>
              <span class="description-text">FOLLOWERS</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">35</h5>
              <span class="description-text">PRODUCTS</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
  <!-- /.col -->
  <div class="col-md-8">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Apps</a></li>
        <li><a href="#tab_2" data-toggle="tab">Update</a></li>
        <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            Dropdown <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
          </ul>
        </li>
        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <table id="appTable" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Cities</th>
              <th>Platforms </th>
              <th>Categories</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($city->apps as $app)
                <tr>
                  <td><a href="{{ route('admin.apps.show', ['id' => $app->id ]) }}">{{ $app->name }}</a></td>
                  <td>{{ $app->cities()->count() }}</td>
                  <td>
                    @isset ($app->appleLink)
                        <span class="label label-info">iOS</span>
                    @endisset
                    @isset ($app->googleLink)
                        <span class="label label-success">Android</span>
                    @endisset
                  </td>
                  <td>
                  @foreach ($app->categories as $category)
                  <a href="{{ route('admin.categories.show', ['id' => $category->id ]) }}"><span class="label label-primary">{{  $category->name }}</span></a>
                  @endforeach
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>Name</th>
              <th>Cities</th>
              <th>Platforms </th>
              <th>Categories</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
        <div class="box box-default">
          <form method="POST" action="{{ route('admin.cities.update', ['id' => $city->id ]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" placeholder="{{$city->name}}">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="exampleInputFile">Header Image</label>
                  <input type="file" name="headerImage">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Country</label>
                  <select class="form-control select2" id="countrySelect" name="country" multiple="multiple" data-placeholder="Select a Country"
                          style="width: 100%;">
                    @foreach ($countries as $country)
                      @if ($country->id == $city->country->id)
                      <option selected="selected" value="{{ $country->id }}">{{ $country->name }}</option>
                      @else
                      <option value="{{ $country->id }}">{{ $country->name }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Apps</label>
                  <select class="form-control select2" id="appSelect" name="apps[]" multiple="multiple" data-placeholder="Select Apps"
                          style="width: 100%;">
                      @foreach ($apps as $app)
                        @if ($city->apps->contains($app->id))
                        <option selected="selected" value="{{ $app->id }}">{{ $app->name }}</option>
                        @else
                        <option value="{{ $app->id }}">{{ $app->name }}</option>
                        @endif
                      @endforeach
                  </select>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right">Save</button>
          </div>
        </div>
        </form>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
          when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          It has survived not only five centuries, but also the leap into electronic typesetting,
          remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
          sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
          like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
@endsection
@section('script')
<script src="{{asset('adminlte/components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('adminlte/components/datatables-extra/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('adminlte/components/datatables-extra/buttons.html5.min.js')}}"></script>
<script src="{{asset('adminlte/components/datatables-extra/pdfmake.min.js')}}"></script>
<script src="{{asset('adminlte/components/datatables-extra/vfs_fonts.js')}}"></script>
<script src="{{asset('adminlte/components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
$(function () {
  //Initialize Select2 Elements
  $('#countrySelect').select2({
maximumSelectionLength: 1
});
  $('#appSelect').select2();
});
$(document).ready(function() {

  $('#appTable').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'pageLength',
              {
                  extend: 'pdf',
                  messageTop: 'The information on this document is private and owned by LikeACitizen.',
                  messageBottom: 'The information on this document is private and owned by LikeACitizen.',
                  filename:document.title+' {{now()}}'
              },
              {
                text: 'Add new',
                action: function ( e, dt, node, config ) {
                  window.location.href = "{{ route('admin.apps.create') }}";
;
                }
            },
          ]
      } );
})
</script>

@endsection
