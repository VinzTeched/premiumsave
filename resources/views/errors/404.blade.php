@extends('layouts.errorpages')

@section('title')
    Premiumsave :: Error 404 Page
@endsection

@section('content')
  <!-- ========== MAIN ========== -->
      <section class="content">
        <div class="error-page p-2">
         <i class="pe-7s-way text-success big-icon"></i>
         <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

         <strong>Page Not Found</strong>
         <p>
            Sorry, but the page you are looking for has not been found. Try checking the URL for error, then hit the refresh button on your browser or try found something else in our website.
         </p>
       </div>
         <div class=back-link>
            <a id=animation-btn href=/ class="btn btn-success">Back to Home</a>
        </div>
      </div>
    </section>
  <!-- ========== END MAIN ========== -->
@endsection