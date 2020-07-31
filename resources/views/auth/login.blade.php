@extends('layouts.master')

@section('title')
    PremiumCash :: Login Page
@endsection

@section('styles')
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center" style="padding: 5em 0">
        <div  class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <h2 class="sign_up">Login</h2>
            <p class="enter_personal">Please enter your login details</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control nine-height @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control nine-height @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                

                <div class="form-group row mb-0">
                    <div class="col-md-2 col-md-offset-5">
                        <button type="submit" class="btn btn-blue">
                            {{ __('Login') }}
                        </button>
					</div>
                </div>

          <div class="clearfix"></div>
    
          <p class="text-center lost-acct"><a href="{{ route('password.request') }}" class="text-warning">Lost your password?</a> | <a href="{{ route('register') }}" class="text-warning">{{ __('Not Yet Registered?') }}</a></p>

         </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<!-- Toastr -->
<script src="{{ URL::to('plugins/toastr/toastr.min.js') }}"></script>
<!-- jQuery -->
@if (!empty($regMessage))
<script type="text/javascript">

    toastr.error('Account Suspended. Pls contact our team if you think this may have been in error');
    toastr.options.timeOut = 5000;
    toastr.options.fadeOut = 4000;

</script>
@endif

@endsection