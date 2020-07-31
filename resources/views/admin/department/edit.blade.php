@extends('admin.layouts.app')

@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Department</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Create Department</li>
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
                <h3 class="card-title">Department</h3>
              </div>
			  @include('inc.messages')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('department.update', $department->id) }}" method="post">
				  {{ csrf_field() }}
				  {{ method_field('PUT') }}
                <div class="col-lg-6">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">School Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="School Title" value="{{ $department->name }}">
                  </div>
				  
                <!-- /.card-body -->
		  
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('department.index') }}" class="btn btn-warning">Back</a>
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