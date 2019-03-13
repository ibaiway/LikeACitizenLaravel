@extends('layouts.admin')
@section('title', 'Apps')
@section('css')
<link rel="stylesheet" href="{{asset('adminlte/components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('adminlte/components/datatables-extra/buttons.dataTables.min.css')}}">

@endsection
@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Table With Full Features</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="appTable" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Name</th>
            <th>Cities</th>
            <th>Platforms </th>
            <th>something</th>
            <th>something</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($apps as $app)
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
                <td>nothing</td>
                <td>nothing</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Name</th>
            <th>Cities</th>
            <th>Platforms </th>
            <th>something</th>
            <th>something</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

@endsection
@section('script')
<script src="{{asset('adminlte/components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('adminlte/components/datatables-extra/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('adminlte/components/datatables-extra/buttons.html5.min.js')}}"></script>
<script src="{{asset('adminlte/components/datatables-extra/pdfmake.min.js')}}"></script>
<script src="{{asset('adminlte/components/datatables-extra/vfs_fonts.js')}}"></script>

<script>
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
