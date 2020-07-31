@extends('layouts.master')

@section('title')
    Premiumcash :: Account Completion
@endsection

@section('styles')
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center" style="padding: 5em 0">
        <div  class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

            <h2 class="sign_up">Add Your Bank Account</h2>
            <p class="enter_personal">Please enter your bank account details here to complete your registration</p>
            <form method="POST" action="{{ route('account.update', Auth::user()->id) }}">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}

                <div class="form-group row">

                    <input type="hidden" id="status" name="status" value="1">

                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control nine-height @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Your Full Name">

                        @error('name')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="account" type="tel" class="form-control nine-height @error('account') is-invalid @enderror" name="account" value="{{ old('account') }}" required placeholder="Account Number" maxlength="10" minlength="10">

                        @error('account')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-12">
                        
                    <select class="form-control nine-height" required="required" name="bank" id="bank">
                            <option value="">Select Bank</option>
                    <option value="Access Bank">Access Bank</option>
                    <option value="Access Bank (Diamond)">Access Bank (Diamond)</option>
                    <option value="ALAT by WEMA">ALAT by WEMA</option>
                    <option value="ASO Savings and Loans">ASO Savings and Loans</option>
                    <option value="Citibank Nigeria">Citibank Nigeria</option>
                    <option value="Ecobank Nigeria">Ecobank Nigeria</option>
                    <option value="Ekondo Microfinance Bank">Ekondo Microfinance Bank</option>
                    <option value="Fidelity Bank">Fidelity Bank</option>
                    <option value="First Bank of Nigeria">First Bank of Nigeria</option>
                    <option value="First City Monument Bank (FCMB)">First City Monument Bank (FCMB)</option>
                    <option value="Guaranty Trust Bank">Guaranty Trust Bank</option>
                    <option value="Heritage Bank">Heritage Bank</option>
                    <option value="Jaiz Bank">Jaiz Bank</option>
                    <option value="Keystone Bank">Keystone Bank</option>
                    <option value="Kuda Bank">Kuda Bank</option>
                    <option value="PAGA (PAGATECH)">PAGA (PAGATECH)</option>
                    <option value="Parallex Bank">Parallex Bank</option>
                    <option value="Polaris Bank">Polaris Bank</option>
                    <option value="Providus Bank">Providus Bank</option>
                    <option value="Stanbic IBTC Bank">Stanbic IBTC Bank</option>
                    <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                    <option value="Sterling Bank">Sterling Bank</option>
                    <option value="Suntrust Bank">Suntrust Bank</option>
                    <option value="Union Bank of Nigeria">Union Bank of Nigeria</option>
                    <option value="United Bank For Africa (UBA)">United Bank For Africa (UBA)</option>
                    <option value="Unity Bank">Unity Bank</option>
                    <option value="Wema Bank">Wema Bank</option>
                    <option value="Zenith Bank">Zenith Bank</option>
                        </select>

                        @error('bank')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                

                <div class="form-group row mb-0">
                    <div class="col-md-2 col-md-offset-4">
                        <button type="submit" class="btn btn-blue" style="position: absolute;">
                            {{ __('Proceed with this details') }}
                        </button>
					</div>
                </div>
<br>
          <div class="clearfix"></div>
    
          <p class="text-center lost-acct" style="margin-top: 2em"><a href="{{ route('password.request') }}" class="text-warning">Lost your password?</a> | <a href="{{ route('register') }}" class="text-warning">{{ __('Not Yet Registered?') }}</a></p>

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

    toastr.success('Account created. Please add your banking details to complete your registration.');
    toastr.options.timeOut = 5000;
    toastr.options.fadeOut = 4000;

</script>
@endif

@endsection
