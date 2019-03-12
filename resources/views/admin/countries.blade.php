@extends('layouts.admin')
@section('title', 'Countries')
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
        <table id="countryTable" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Name</th>
            <th>Flag</th>
            <th>Cities</th>
            <th>Engine version</th>
            <th>CSS grade</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($countries as $country)
              <tr>
                <td>{{ $country->name }}</td>
                <td>FLAG HERE</td>
                <td>{{ $country->cities()->count() }}</td>
                <td> 4</td>
                <td>X</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Name</th>
            <th>Flag</th>
            <th>Cities</th>
            <th>Engine version</th>
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
    $('#countryTable').DataTable()
  })
</script>

@endsection
