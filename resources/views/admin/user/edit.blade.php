@extends('admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
@endsection

@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Edit User</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
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
                <h3 class="card-title">Edit User</h3>
              </div>
			  @include('inc.messages')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('user.update', $user->id) }}" method="post">
				  {{ csrf_field() }}
				  {{ method_field('PUT') }}
                <div class="col-lg-6">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="@if(old('name')){{ old('name') }} @else{{ $user->name }} @endif">
                  </div>
				  
				  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="@if(old('email')){{ old('email') }} @else{{ $user->email }} @endif">
                  </div>
				  
				  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="@if(old('phone')){{ old('phone') }} @else{{ $user->phone }} @endif">
                  </div>

				  <div class="form-group">
				  <label>Admin Status</label>
					<div class="row">
					<div class="col-lg-3">
						<div class="icheck-primary">
                        <input type="checkbox" name="status" id="status" @if(old('status') || $user->status ==1)checked @endif value="1">
                        <label for="status">Status
                        </label>
                      </div>
                     </div>
                    </div>
                   </div>
				  
				  <div class="form-group">
				  <label>Assign Role</label>
				  <div class="row">
				  @foreach ($roles as $role)
					<div class="col-lg-3">
                      <div class="icheck-primary">
                        <input type="checkbox" name="role[]" id="coll{{ $loop->index + 1 }}" value="{{ $role->id }}" 
						@foreach($user->roles as $user_role)
							@if($user_role->id == $role->id)
								checked
							@endif
						@endforeach
						>
                        <label for="coll{{ $loop->index + 1 }}">{{ $role->name }}
                        </label>
                      </div>
                    </div>
				  @endforeach
				   </div>
				  
				  
                <!-- /.card-body -->
		  
                <div class="form-group mt-2">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
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