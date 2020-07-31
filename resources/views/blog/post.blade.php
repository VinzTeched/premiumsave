@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ URL::to('assets/css/prism.css') }}">
@endsection

@section('title')
    M3 :: {{  $post->title }}
@endsection

@section('content')

    <div id="wrapper">
        <div class="content-user" style="margin-top:5.2em">
          <div class="container">
            <div class="row">
               <div class="col-lg-12">
        @foreach($post->categories as $category)
        <a class="text-blue h6 mb-0" href="{{ route('category', $category->name) }}">{{ $category['name'] }}</a>
        @endforeach
				@foreach($post->departments as $department)
				/ <a class="text-blue h6 mb-0" href="{{ route('department', $department->slug) }}">{{ $department['name'] }}</a>
				@endforeach
                  <div class="hpanel">
                     <div class="panel-heading hbuilt h-bg-navy-blue-reverse text-white">
                        <div class="panel-tools">
                           <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                           <a class="fullscreen"><i class="fa fa-expand"></i></a>
                        </div>
						{{  $post->title }} @include('inc.messages')
                     </div>
                     <div class="panel-body">
           @forelse($buys as $buy)
                        <center><a class="btn btn-success btn-sm mt-2" download href="{{ Storage::disk('local')->url($post->image ) }}">Download </a></center>
           @empty
                        <center><a class="btn btn-success btn-sm mt-2" href="{{ route('buy.show', $post->id) }}">Get the Complete Project <i class="fa fa-angle-double-right"></i></a></center>
           @endforelse
                        <p>
                           {!! htmlspecialchars_decode($post->body) !!}
                        </p>
                     </div>
                     <div class="panel-footer">
					 @forelse($buys as $buy)
                        <a class="btn btn-success btn-sm mt-2" download href="{{ Storage::disk('local')->url($post->image ) }}">Download </a>
					 @empty
                        <a class="btn btn-success btn-sm mt-2" href="{{ route('buy.show', $post->id) }}">Download <i class="fa fa-lock"></i></a>
					 @endforelse
                     </div>
					 <!--div class="panel-footer">
					 @foreach($buys as $buy)
					 @if($buy->book_id == $post->id && $buy->userid == Auth::user()->id && $buy->status == 1)
                        <a class="btn btn-blue btn-sm mt-2" download href="{{ Storage::disk('local')->url($post->image ) }}">Download </a>
					 @else
                        <a class="btn btn-blue btn-sm mt-2" href="{{ route('buy.show', $post->id) }}">Download <i class="fa fa-lock"></i></a>
					 @endif 
					 @endforeach
                     </div-->
                  </div>
				  <ul class="list-inline text-center mb-0">
					@foreach($post->tags as $tag)
					  <li class="list-inline-item pb-3">
						<a class="u-label u-label--xs u-label--secondary" href="{{ route('school', $tag->slug) }}">{{ $tag['name'] }}</a>
					  </li>
					@endforeach
					</ul>
               </div>
               </div>
               <div class="row">
                <div class='col-lg-12'>
                 <center>
                  <p class="alert alert-success mr-4 ml-4 mt-5">You Either Get What You Want or You Get Your Money Back. Terms and Conditions Apply</p>
                  <img src="/images/100-money-back-guarantee.png" class="img-respnsive" height="100">
                  <br/>
                  <div class="sharethis-inline-share-buttons"></div>

                 </center>
               </br>
               </div>
               </div>
               </div>
@endsection

@section('footerSection')
<script src="{{ asset('assets/js/prism.js') }}"></script>
@endsection
