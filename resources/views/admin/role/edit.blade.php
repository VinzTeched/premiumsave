@extends('admin.layouts.app')

@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Admin Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Role</li>
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
                <h3 class="card-title">Roles</h3>
              </div>
			  @include('inc.messages')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('role.update', $role->id) }}" method="post">
				  {{ csrf_field() }}
				  {{ method_field('PUT') }}
                <!--div class="col-lg-6"-->
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Role Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Role Title" value="{{ $role->name }}">
                  </div>
				   <div class="row">
				  <div class="col-lg-4 col-sm-4 col-md-4">
				  <label for="post">User Permission</label>
				  @foreach ($permissions as $permission)
				  @if ($permission->for == 'user')
				  <div class="col-lg-6">
                      <div class="icheck-primary">
                        <input type="checkbox" name="permission[]" id="user{{ $loop->index + 1 }}" 
						value="{{ $permission->id }}"
						@foreach($role->permission as $role_permit)
							@if ($role_permit->id == $permission->id)
								checked
							@endif
						@endforeach >
						
                        <label for="user{{ $loop->index + 1 }}">{{ $permission->name }}
                        </label>
                      </div>
                    </div>
					@endif
					@endforeach
				</div>

				<div class="col-lg-4 col-sm-4 col-md-4">
				  <label for="post">Other Permission</label>
				  @foreach ($permissions as $permission)
				  @if ($permission->for == 'other')
				  <div class="col-lg-6">
                      <div class="icheck-primary">
                        <input type="checkbox" name="permission[]" id="other{{ $loop->index + 1 }}" 
						value="{{ $permission->id }}" 
						@foreach($role->permission as $role_permit)
							@if ($role_permit->id == $permission->id)
								checked
							@endif
						@endforeach >
						
                        <label for="other{{ $loop->index + 1 }}">{{ $permission->name }}
                        </label>
                      </div>
                    </div>
					@endif
					@endforeach
				</div>
				</div>
                <!-- /.card-body -->
		  
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('role.index') }}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card >
		  </div-->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection