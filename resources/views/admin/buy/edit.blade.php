@extends('admin.layouts.app')

@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Donation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Approve Donation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   <!-- Main content -->
    <section class="content">
       @include('inc.messages')

      <div class="row" id="duringInvestment">
            <div class="col-md-6">
                <!-- Profile Image -->
              <div class="card card-primary card-outline background-main pb-2">
              @if($deposit->notify == 1)
                <div class="card-body box-profile text-center" style="overflow-y: hidden;">
                  <h5 class="mb-3">Transaction Notification</h5>
                  <h5 class="mb-3">Amount: &#8358;{{ $deposit->amount }}.00</h5>
                  <h5 class="mb-3">Status : @if($deposit->status == 1) Confirmed @else Not Confirmed @endif </h5>
                  <h6 class="mb-3">Payer Name: {{ $usered->name }}</h6>
                  <h6 class="mb-3">Receiver Name: {{ $deposit->receivername }}</h6>
                  <a href="{{ Storage::disk('local')->url($deposit->image) }}"><img src="{{ Storage::disk('local')->url($deposit->image) }}" height="100%" width="100%"></a>
                </div>
                @else

                <div class="card-body box-profile text-center" style="overflow-y: hidden;">
                  <h5 class="mb-3">Transaction Notification</h5>
                  <h6 class="mb-3">Payer Name: {{ $usered->name }}</h6>
                  <h5 class="mb-3">Amount: &#8358;{{ $deposit->amount }}.00</h5>
                  <h5 class="mb-3">Status : Not Paid yet </h5>
                  <h6 class="mb-3">Receiver Name: {{ $deposit->receivername }}</h6>

                </div>

              @endif
                <div class="card-footer">
                  <a href="{{ route('purchase.index') }}" class="btn float-left btn-default">Back</a>
                  @if($deposit->notify == 1 && $deposit->status == null)
                  <form method="post" action="{{ route('purchase.update', $deposit->id) }}">    
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="id">
                    <input type="hidden" name="status" value="1">
                    <input type="hidden" name="nooftimes" value="1">
                    <input type="hidden" name="amount" value="{{ $deposit->amount }}">
                    <input type="hidden" name="userid" value="{{ $deposit->payid }}">
                    <input type="hidden" name="depositid" value="{{ $deposit->id }}">
                    <button class="btn float-right btn-mainer" type="submit" onclick="return confirm(&#39;Do you want to approve payment for user?&#39;);">Confirm Payment</button>
                  </form>
                  @endif
                </div>
              </div>
            </div>
          </div>
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection