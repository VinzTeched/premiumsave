@extends('layouts.master')

@section('title')
    M3 :: Projects Page
@endsection

@section('content')

  <!-- ========== MAIN ========== -->

    <div id="wrapper">
        <div class="content-user" style="margin-top:5.2em">
			<div class="container">
		
            <div class="row">
            	<div class="col-lg-12">
            		@include('inc.messages')
            		@if($searched)
            			<p class="alert alert-primary mr-4 ml-4 mt-5">{{ $searched }}</p>
            		@endif
            	</div>
            </div>
			  <div class="form-group">
				 <div class="col-sm-12">
				 <form action="{{ route('search') }}" method="POST" role="search">
							{{ csrf_field() }}
					<div class="input-group m-b">
						
							<input type="text" name="search" class="form-control" id="search" placeholder="Search Website" > 
							<span class="input-group-btn"> 
								<button type="submit" class="btn btn-sm btn-primary">Go!</button> 
							</span>
						
					</div>
				 </div>
			  </div>
			  </form>
            <div class="row">
					
					 @forelse($roles as $post)
               <div class="col-md-3">
                  <div class="hpanel">
                     <div class="panel-body">
                        <div class="text-center">
                           <h2 class="m-b-xs"><i class="fa fa-pdf"></i> {{ $post->title }}</h2>
                           <p class="font-bold text-success">{{ $post->created_at->diffForHumans() }}</p>
                           <div style="height:50px;max-height:50px;overflow:hidden">
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
               
						@empty
						<div class="col-lg-12">
							<div class="text-center">
	                           <h2 class="m-b-xs"><i class="fa fa-pdf"></i> Search Not Found</h2>
	                        </div>
                        </div>

					@endforelse
              
			   
            </div>
			 <div class="u-space-2-bottom"></div>
          <!-- Pagination -->
		  {{ $roles->links() }}  
          <!-- End Pagination -->
        </div>
            </div>
@endsection