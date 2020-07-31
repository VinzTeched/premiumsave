@extends('admin.layouts.app')


@section('headSection')

  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

@endsection

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Withdrawal Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">withdrawal Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
           <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table Showing Withdrawal</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-1">
              <table id="example1" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Amount</th>
                  <th>Withdrawer</th>
                  <th>Payer</th>
                  <th>Status</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
				@foreach($withdrawals as $withdrawal)
					<tr>
					  <td>{{ $loop->index + 1 }}</td>
					  <td>&#8358;{{ $withdrawal->amount }}</td>
            <td>{{ $withdrawal->name }}</td>
            <td>@if($withdrawal->selected == 1) {{ $withdrawal->name }} @else Not Peered @endif</td>
					  <td>@if($withdrawal->status == 1) Paid @else Not Paid @endif</td>
            <td>{{ $withdrawal->created_at }}</td>
					</tr>
				@endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Amount</th>
                  <th>Withdrawer</th>
                  <th>Payer</th>
                  <th>Status</th>
                  <th>Date</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('footerSection')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection