@extends('admin.layouts.app')

@section('headSection')

  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/prism.css') }}">

@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
			 <div class="card card-primary">
              <div class="card-header mb-3">
                <h3 class="card-title">Edit Post</h3>
              </div>
			  	@include('inc.messages')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
				  {{ csrf_field()}}
					  {{ method_field('PATCH') }} 
					  <!-- put/patch -->
                <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
				
                  <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $post->title }}">
                  </div>
				  
				    
				  <div class="form-group">
					 <label>Select Department</label>
					<select class="select2" multiple="" data-placeholder="Select Department" style="width: 100%;" name="departments[]">
						@foreach($departments as $department)
							<option value="{{ $department->id }}"
							@foreach($post->departments as $postDepartments)
									@if($postDepartments->id == $department->id)
										selected
									@endif
								@endforeach
							>{{ $department->name }}</option>
						@endforeach
					</select>
				  </div>
				  
				  
				  <div class="form-group">
                    <label for="file">Upload File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="file">
                        <label class="custom-file-label" for="file">Choose file</label>
                      </div>
                    </div>
                  </div>
				  
				  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="publish" value="1" name="status" @if($post->status == 1) checked @endif>
                    <label class="form-check-label" for="publish">Mark as Free</label>
                  </div>
				  
                  </div>
				  
				 <div class="col-lg-6">
				  <div class="form-group">
					 <label>Select Tags</label>
					<select class="select2" multiple="" data-placeholder="Select Tags" style="width: 100%;" name="tags[]">
						@foreach($tags as $tag)
							<option value="{{ $tag->id }}"
								@foreach($post->tags as $postTag)
									@if($postTag->id == $tag->id)
										selected
									@endif
								@endforeach
							>{{ $tag->name }}</option>
						@endforeach
					</select>
				  </div>
				  
				  <div class="form-group">
					 <label>Select Categories</label>
					<select class="form-control" name="category" required>
							<option value=" " disable="disable" >-- Select Category --</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}"
							@foreach($post->categories as $postCategories)
									@if($postCategories->id == $category->id)
										selected
									@endif
								@endforeach
							>{{ $category->name }}</option>
						@endforeach
					</select>
				  </div>
				  
				  <div class="form-group">
					 <label>Select Course</label>
					<select class="select2" multiple="" data-placeholder="Select Course" style="width: 100%;" name="courses[]">
						@foreach($courses as $courses)
							<option value="{{ $courses->id }}"
							@foreach($post->courses as $postCourses)
									@if($postCourses->id == $courses->id)
										selected
									@endif
								@endforeach
							>{{ $courses->name }}</option>
						@endforeach
					</select>
				  </div>
				  
				  
                  </div>
          
                  
                </div>
                </div>
                <!-- /.card-body -->
		  <div class="card ">
            <div class="card-header">
              <h3 class="card-title">
                Write Post
                <small>Simple and fast</small>
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea name="body" id="editor1"
                          style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $post->body }}</textarea>
              </div>
            </div>
          </div>
		  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
				  <a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('footerSection')
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>

<script src="{{ asset('assets/js/prism.js') }}"></script>

<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
$(document).ready(function(){
    $('.select2').select2();
  });
  
    $(function () {
    
	CKEDITOR.replace('editor1');
	
  })
  
  	$(document).ready(function () {
		bsCustomFileInput.init();
	});
  
</script>

@endsection