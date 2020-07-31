@extends('layouts.errorpages')

@section('title')
    Premiumsave :: Error 500 Page
@endsection

@section('content')

      <section class="content">
        <div class="error-page p-2">
         <i class="pe-7s-way text-success big-icon"></i>
         <h2 class="headline text-danger"> 500</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i>Internal Server Error</h3>

         <p>
            The server encountered something unexpected that didn't allow it to complete the request. We apologize.
         </p>
       </div>
         <div class=back-link>
            <a id=animation-btn href=/ class="btn btn-success">Back to Home</a>
        </div>
      </div>
    </section>
@endsection