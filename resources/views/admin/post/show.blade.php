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
            <h3>Post Page</h3>
			@can('posts.create', Auth::user())
			<a class="float-right btn btn-success" href="{{ route('post.create') }}"><i class="fa fa-plus"></i> Add New</a>
			@endcan
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Post Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table Showing all Posts</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive ">
              <table id="example1" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>Created At</th>
				@can('posts.update', Auth::user())
                  <th>Edit</th>
				@endcan
				@can('posts.delete', Auth::user())
                  <th>Delete</th>
				@endcan
                </tr>
                </thead>
                <tbody>
				@foreach($posts as $post)
					<tr>
					  <td>{{ $loop->index + 1 }}</td>
					  <td>{{ $post->title }}</td>
					  <td>{{ $post->slug }}</td>
					  <td>{{ $post->created_at }}</td>
					  @can('posts.update', Auth::user())
					  <td><a href="{{ route('post.edit', $post->id) }}"><i class="fa fa-edit"></i></a></td>
					  @endcan
					  @can('posts.delete', Auth::user())
					  <form id="delete-form-{{ $post->id }}" method="post" action="{{ route('post.destroy', $post->id) }}" style="display: none">
						{{ csrf_field() }}
							{{ method_field('DELETE') }}
					  </form>
						<td><a href="" onclick="
												if(
													confirm('Are you sure, you want to delete this?')){
														event.preventDefault();
														document.getElementById('delete-form-{{ $post->id }}').submit();
														}else{
															event.preventDefault();
															}">
															<i class="fa fa-trash"></i></a></td>
						@endcan
					</tr>
				@endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>Created At</th>
				  @can('posts.update', Auth::user())
				  <th>Edit</th>
				  @endcan
				  @can('posts.delete', Auth::user())
                  <th>Delete</th>
				  @endcan
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