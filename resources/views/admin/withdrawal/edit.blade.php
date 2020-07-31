@extends('admin.layouts.app')

@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Withdrawal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Approve withdrawal</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
			 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Withdrawal</h3>
              </div>
			  @include('inc.messages')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('confirm-withdrawal.update', $withdrawal->id) }}" method="post">
				  {{ csrf_field() }}
				  {{ method_field('PUT') }}
                <div class="col-lg-6">
                <div class="card-body">
                  <div class="form-group">
				  @foreach($usered as $user)
                    <label for="name">User: {{ $user->name }}</label>
                    <input type="hidden" class="form-control" id="name" name="userid" value="{{ $withdrawal->userid }}">
				  @endforeach
                  </div>
				  
				  <div class="form-group">
                    <label>Amount: &#8358;{{ $withdrawal->amount }}</label>
                    <input type="hidden" class="form-control" name="amount" value="{{ $withdrawal->amount }}">
                  </div>

				  <div class="form-group">
                    <label>Status:  @if($withdrawal->status ==0)Not Approved @endif</label>
                    <input type="hidden" class="form-control" name="status" value="1">
                  </div>
				  
				  <div class="form-group">
                    <label>Date: {{ $withdrawal->created_at }}</label>
                    <input type="hidden" class="form-control" name="created" value="{{ $withdrawal->created_at }}">
                  </div>
				  
                <!-- /.card-body -->
		  
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Approve</button>
                  <a href="{{ route('confirm-withdrawal.index') }}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
		  </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection