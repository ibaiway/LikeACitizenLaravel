@extends('layouts.admin')
@section('title', 'Languages')
@section('css')
<link rel="stylesheet" href="{{asset('adminlte/components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

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
            <th>Countries Official</th>
            <th>Countries Co-Offical</th>
            <th>PromoLink</th>
            <th>CSS grade</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($languages as $language)
              <tr>
                <td>{{ $language->name }}</td>
                <td>{{ $language->countries()->count() }}</td>
                <td>{{ $language->countries()->with('official')->count() }}</td>
                <td>{{ $language->promoLink }}</td>
                <td>X</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Name</th>
            <th>Countries Official</th>
            <th>Countries Co-Offical</th>
            <th>PromoLink</th>
            <th>CSS grade</th>
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
<script>
  $(function () {
    $('#languageTable').DataTable()
  })
</script>

@endsection
