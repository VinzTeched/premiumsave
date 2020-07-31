@extends('layouts.master')

@section('title')
    M3 :: Uploads
@endsection

@section('content')

  <!-- ========== MAIN ========== -->

    <div id="wrapper">
        <div class="content-user" style="margin-top:5.2em">
			<div class="container">
			@include('inc.messages')
			
			  <div class="form-group">
			  <form action="{{ route('search') }}" method="POST" role="search">
							{{ csrf_field() }}
				 <div class="col-sm-12">
					<div class="input-group m-b">
						
							<input type="text" name="search" id="search" class="form-control" placeholder="Search Website" > 
							<span class="input-group-btn"> 
								<button type="submit" class="btn btn-sm btn-primary">Go!</button> 
							</span>
						</form>
					</div>
				 </div>
			  </div>
		
            <div class="row">
			@foreach($posts as $post)
               <div class="col-md-3">
                  <div class="hpanel">
                     <div class="panel-body">
                        <div class="text-center">
						   @if(Auth::guest())  
								<h2 class="m-b-xs"><a href="{{ route('book', $post->slug) }}"><i class="fa fa-pdf"></i> {{ $post->title }}</a></h2>
							@else
								<h2 class="m-b-xs"><a href="{{ route('post', $post->slug) }}"><i class="fa fa-pdf"></i> {{ $post->title }}</a></h2>
							@endif
							   <p class="font-bold text-success">{{ $post->created_at->diffForHumans() }}</p>
							   <div style="height:50px;max-height:50px;overflow:hidden;">
							   <p class="small mb-2" >
								  {!! htmlspecialchars_decode($post->body) !!}
							   </p>
						   </div>
						@if(Auth::guest())  
                           <a class="btn btn-blue btn-sm mt-2" href="{{ route('book', $post->slug) }}">View | Download</a>
						@else
                           <a class="btn btn-blue btn-sm mt-2" href="{{ route('post', $post->slug) }}">View | Download</a>
						@endif
                        </div>
                     </div>
                  </div>
               </div>
              
			   @endforeach
            </div>
			 <div class="u-space-2-bottom"></div>
          <!-- Pagination -->
			{{ $posts->links() }}  
          <!-- End Pagination -->
        </div>
            </div>
@endsection