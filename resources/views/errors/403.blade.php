@extends('layouts.errorpages')

@section('title')
    Premiumsave :: Error 403 Page
@endsection

@section('content')
  <!-- ========== MAIN ========== -->
     <div class="error-container">
         <i class="pe-7s-way text-success big-icon"></i>
         <h1>403</h1>
         <strong>Page cannot be <span class="font-weight-bold">accessed</span></strong>
         <p class="mb-0">Oops! You are unauthorised to access this page</p>
            <p>If you think this is a problem with us, please <a href="#">tell us</a>.
         </p>
         <div class=back-link>
            <a id=animation-btn href=/ class="btn btn-success">Back to Home</a>
        </div>
      </div>

      <section class="content">
        <div class="error-page p-2">
         <i class="pe-7s-way text-success big-icon"></i>
         <h2 class="headline text-warning"> 403</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Page cannot be accessed </h3>

         <strong>Page Not Found</strong>

         <p class="mb-0">Oops! You are unauthorised to access this page</p>
            <p>If you think this is a problem with us, please <a href="{{ route('contact') }}">tell us</a>.
         </p>
       </div>
         <div class=back-link>
            <a id=animation-btn href=/ class="btn btn-success">Back to Home</a>
        </div>
      </div>
    </section>

  <!-- ========== END MAIN ========== -->
@endsection