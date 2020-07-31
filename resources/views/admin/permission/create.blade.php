@extends('admin.layouts.app')

@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Admin Permission</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Create Permission</li>
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
                <h3 class="card-title">Permission</h3>
              </div>
			  @include('inc.messages')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('permission.store') }}" method="post">
				  {{ csrf_field() }}
                <div class="col-lg-6">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Permission</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Permission">
                  </div>
				  
				  <div class="form-group">
                    <label for="for">Permission for</label>
                    <select type="text" class="form-control" id="for" name="for" >
						<option selected disabled>Select Permission for</option>
						<option value="user">User</option>
						<option value="other">Other</option>
					</select>
                  </div>
				  
                <!-- /.card-body -->
		  
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('permission.index') }}" class="btn btn-warning">Back</a>
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