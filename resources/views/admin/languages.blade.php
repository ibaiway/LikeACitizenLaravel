@extends('layouts.admin')
@section('title', 'Languages')
@section('css')
<link rel="stylesheet" href="{{asset('adminlte/components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

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
        <table id="languageTable" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Name</th>
            <th>Countries</th>
            <th>Countries Official</th>
            <th>Countries Co-Offical</th>
            <th>PromoLink</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($languages as $language)
              <tr>
                <td><a href="{{ route('admin.languages.show', ['id' => $language->id ]) }}">{{ $language->name }}</a></td>
                <td>{{ $language->countries()->count() }}</td>
                <td>{{ $language->countries()->whereOfficial(true)->count() }}</td>
                <td>{{ $language->countries()->whereCoofficial(true)->count() }}</td>
                <td>{{ $language->promoLink }}</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Name</th>
            <th>Countries</th>
            <th>Countries Official</th>
            <th>Countries Co-Offical</th>
            <th>PromoLink</th>
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
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script>
$(function () {
  $('#languageTable').DataTable( {
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
                  window.location.href = "{{ route('admin.languages.create') }}";
;
                }
            },
          ]
      } );
})
</script>

@endsection
