@extends('layouts.app')

@section('title')
    Premiumsave | User Dashboard 
@endsection

@section('content')
   
<!-- ========== MAIN CONTENT ========== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-md-4 p-sm-2">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h5 class="m-0 text-dark">Dashboard</h5>
            <p class="main-color text-bold">What's new here</p>
          </div><!-- /.col -->
          <div class="col-sm-6 invisible-md">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">My Account</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- Info boxes -->
        <ul class="nav mb-3">
          <li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <a class="btn btn-main nav-link">Amount to Withdraw:
              @if(!empty($amountToWithdraw))
                &#8358;{{ $amountToWithdraw->earning }}.00
              @else
              &#8358;0.00
              @endif</a>
          </li>
          <li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <a class="btn btn-mainer nav-link">Total Donations: 
            @forelse($total_deposits as $total_deposit)
              &#8358;{{ $total_deposit->total }}.00
              @empty
              &#8358;0.00
            @endforelse</a>
          </a>
          </li>
          <li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <a class="btn btn-main nav-link">Total Withdrawals:
            @forelse($total_withdrawals as $total_withdrawal)
              &#8358;{{ $total_withdrawal->total }}.00
              @empty
              &#8358;0.00
            @endforelse
          </a>
          </li>

          <li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <a class="btn btn-mainer nav-link">Referral Earnings:
            @forelse($total_bonuses as $total_bonus)
              &#8358;{{ $total_bonus->total }}.00
              @empty
              &#8358;0.00
            @endforelse
          </a>
          </li>
        </ul>
        <div class="row">
          <div class="col-12 col-md-12">

        @include('inc.messages')

      @if(Auth::user()->status == null)
        @if(!empty($bonuses))
        <!---- During Pay --->
        @if($bonuses->notify == null)

          <div class="row" id="duringInvestment">
            <div class="col-md-6">
                <!-- Profile Image -->
              <div class="card card-primary card-outline background-main pb-2">

                <div class="card-body box-profile text-center">
                  <h5 class="mb-3">Make Payment to Complete your Investment</h5>
                  <h5 class="mb-3">Amount: &#8358;{{ $bonuses->amount }}.00</h5>
                  <h6 class="mb-3">Status: @if($bonuses->status != null) Paid @else Not Paid @endif</h6>
                  <h5 class="mb-3" id="getting-started" style="color: #ff8888"></h5>
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#viewBonus">View Bank Details</button>
                  
                </div>
                <div class="card-footer text-center">
                  <button class="btn btn-mainer" data-toggle="modal" data-target="#bonusPaid">I've Paid</button>
                </div>
              </div>
            </div>
          </div>
        @endif
        <!------ close ----->
        
        <!---- After Pay --->
        @if($bonuses->notify == 1)

          <div class="row" id="duringInvestment">
            <div class="col-md-6">
                <!-- Profile Image -->
              <div class="card card-primary card-outline background-main pb-2">

                <div class="card-body box-profile text-center " style="overflow-y: hidden;">
                  <h5 class="mb-3">Make Payment to Complete your Investment</h5>
                  <h5 class="mb-3">Amount: &#8358;{{ $bonuses->amount }}.00</h5>
                  <h6 class="mb-3">Status: @if($bonuses->status != null) Paid @else Notified Paid. Awaiting confirmation @endif</h6>
                  <a href="{{ Storage::disk('local')->url($bonuses->image) }}"><img src="{{ Storage::disk('local')->url($bonuses->image) }}" width="100%" height="100%"></a>
                  

                </div>
                <div class="card-footer text-center">
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#viewBonus">View Bank Details</button>
                </div>
              </div>
            </div>
          </div>
          @endif
        @else


        <div class="card card-primary card-outline background-main">
          <div class="card-body box-profile">
            <div class="row" id="beforeInvestment">
              <div class="col-md-8">
                <h5>Make an Investment</h5>
                <p>You can make an investment to start earning by clicking the  'Make an Investment' button.</p>
              </div>
              <div class="col-md-4 activate-acct">
                <a href="#" role="tab" class="btn btn-mainer" data-toggle="modal" data-target="#modal-default">
                  <span class="fa fa-arrow-up"></span> Make an Investment
                </a>
              </div>
            </div> 
          </div>
          <!-- /.card-body -->
        </div>
        @endif

        @else

            <!-- Invest -->
          @if(!empty($commits))
            @if($commits->invest == null && $commits->notify == null)
            <div class="card card-primary card-outline background-main">

              <div class="card-body box-profile">
                <div class="row" id="beforeInvestment">
                  <div class="col-md-8">
                    <h5>Make an Investment</h5>
                    <p>You can make an investment to start earning by clicking the  'Make an Investment' button.</p>
                  </div>
                  <div class="col-md-4 activate-acct">
                    <a href="#" role="tab" class="btn btn-mainer" data-toggle="modal" data-target="#modal-default">
                      <span class="fa fa-arrow-up"></span> Make an Investment
                    </a>
                  </div>
                </div> 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        @endif
        <!--- close --->

        <!---- During Pay --->
        @if($commits->invest==1 && $commits->notify == null)

          <div class="row" id="duringInvestment">
            <div class="col-md-6">
                <!-- Profile Image -->
              <div class="card card-primary card-outline background-main pb-2">

                <div class="card-body box-profile text-center">
                  <h5 class="mb-3">Make Payment to Complete your Investment</h5>
                  <h5 class="mb-3">Amount: &#8358;{{ $commits->amount }}.00</h5>
                  <h6 class="mb-3">Status: @if($commits->status != null) Paid @else Not Paid @endif</h6>
                  <h5 class="mb-3" id="getting-started" style="color: #ff8888"></h5>
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#viewDetails">View Bank Details</button>
                  
                </div>
                <div class="card-footer text-center">
                  <button class="btn btn-mainer" data-toggle="modal" data-target="#paidDetails">I've Paid</button>
                </div>
              </div>
            </div>
          </div>
          @endif
        <!------ close ----->

        <!---- After Pay --->
        @if($commits->notify == 1 && $commits->paidStatus == null)
          <div class="row" id="duringInvestment">
            <div class="col-md-6">
                <!-- Profile Image -->
              <div class="card card-primary card-outline background-main pb-2">

                <div class="card-body box-profile text-center " style="overflow-y: hidden;">
                  <h5 class="mb-3">Make Payment to Complete your Investment</h5>
                  <h5 class="mb-3">Amount: &#8358;{{ $commits->amount }}.00</h5>
                  <h6 class="mb-3">Status: @if($commits->status != null) Paid @else Notified Paid. Awaiting confirmation @endif</h6>
                  <a href="{{ Storage::disk('local')->url($commits->image) }}"><img src="{{ Storage::disk('local')->url($commits->image) }}" width="100%" height="100%"></a>
                  

                </div>
                <div class="card-footer text-center">
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#viewDetails">View Bank Details</button>
                </div>
              </div>
            </div>
          </div>
          @endif

        @else
      <!---- After Approval --->
        @if(!empty($commit_paid))
          @if(!empty($accounts))
          <div class="row" id="duringInvestment">
            <div class="col-md-6">
                <!-- Profile Image -->
              <div class="card card-primary card-outline background-main pb-2">

                <div class="card-body box-profile text-center " style="overflow-y: hidden;">
                  <h5 class="mb-3">Investment Profile</h5><hr>
                  <h6 class="mb-3">Amount Paid: &#8358;{{ $accounts->pendingTransaction }}.00</h6>
                  <h6 class="mb-3">Amount to Receive: &#8358;{{ $accounts->earning }}.00</h6>
                  <h6 class="mb-3">Time to Withdraw: {{ $accounts->collection_date }}</h6>
                  <h6 class="mb-3">Time Created: {{ $accounts->created_at }}</h6>
                  <h6>Recommitment: <span class="text-success">Success</span></h6>
                </div>
              </div>
            </div>
          </div>
          @else
          <div class="row" id="duringInvestment">
            <div class="col-md-6">
                <!-- Profile Image -->
              <div class="card card-primary card-outline background-main pb-2">

                <div class="card-body box-profile text-center " style="overflow-y: hidden;">
                  <h5 class="mb-3">Investment Profile</h5><hr>
                  <h6 class="mb-3">Amount Paid: &#8358;{{ $commit_paid->pendingTransaction }}.00</h6>
                  <h6 class="mb-3">Amount to Receive: &#8358;{{ $commit_paid->earning }}.00</h6>
                  <h6 class="mb-3">Time to Withdraw: {{ $commit_paid->collection_date }}</h6>
                  <h6 class="mb-3">Time Created: {{ $commit_paid->created_at }}</h6>
                  <h6>Hi {{ Auth::user()->name }}, You need to recommit. <small>You need to pay your recommitment for your next withdrawal. You can increase your investment amount if you like to earn more</small></h6>
                </div>
                <div class="card-footer text-center">
                  <button type="button" class="btn btn-mainer" data-toggle="modal" data-target="#payRecommit">Recommit Now</button>
                </div>
              </div>
            </div>
          </div>
          @endif
          @else
        <!------ close ----->

        <div class="card card-primary card-outline background-main">
          <div class="card-body box-profile">
                <div class="row" id="beforeInvestment">
                  <div class="col-md-8">
                    <h5>Make an Investment</h5>
                    <p>You can make an investment to start earning by clicking the  'Make an Investment' button.</p>
                  </div>
                  <div class="col-md-4 activate-acct">
                    <a href="#" role="tab" class="btn btn-mainer" data-toggle="modal" data-target="#modal-default">
                      <span class="fa fa-arrow-up"></span> Make an Investment
                    </a>
                  </div>
                </div> 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        @endif

        
        <!---- Withdrawal ------>
        @if(!empty($withdrawals))
        @if($withdrawals->selected == null && $withdrawals->status == null)
        <div class="row" id="duringInvestment">
            <div class="col-md-6">
                <!-- Profile Image -->
              <div class="card card-primary card-outline background-main pb-2">

                <div class="card-body box-profile text-center">
                  <h5 class="mb-3">You have requested a Withdrawal</h5>
                  <h5 class="mb-3">Amount: &#8358;{{ $withdrawals->amount }}.00</h5>
                  <h6 class="mb-3">Status: Waiting to be peered for payment</h6>
                  
                </div>
              </div>
            </div>
          </div>
        @elseif ($withdrawals->selected == 1 && $withdrawals->hepaid == null)
        <div class="row" id="duringInvestment">
            <div class="col-md-6">
                <!-- Profile Image -->
             <div class="card card-primary card-outline background-main pb-2">

                <div class="card-body box-profile text-center">
                  <h5 class="mb-3">You have requested a Withdrawal</h5>
                  <h5 class="mb-3">Amount: &#8358;{{ $withdrawals->amount }}.00</h5>
                  <h6 class="mb-3">Status: You have been peered for payment</h6>
                  <h6 class="mb-3">Contact {{ $withdrawals->payername }} with <a href="tel:{{ $withdrawals->payerphone }}">{{ $withdrawals->payerphone }}</a> to pay you.</h6>
                  
                </div>
              </div>
            </div>
          </div>
          @elseif ($withdrawals->hepaid == 1)
        <div class="row" id="duringInvestment">
            <div class="col-md-6">
                <!-- Profile Image -->
              <div class="card card-primary card-outline background-main pb-2">

                <div class="card-body box-profile text-center" style="overflow-y: hidden;">
                  <h5 class="mb-3">Transaction Notification</h5>
                  <h5 class="mb-3">Amount: &#8358;{{ $withdrawals->reamount }}.00</h5>
                  <h6 class="mb-3">Payer Name: {{ $withdrawals->payername }}</h6><p>If you don't confirm you will be unable to request further withdrawals</p>
                  <p>Didn't receive this payment? then file a report.</p>

                  <a href="{{ Storage::disk('local')->url($findpayer->image) }}"><img src="{{ Storage::disk('local')->url($findpayer->image) }}" height="100%" width="100%"></a>
                  
                </div>
                <div class="card-footer">
                  <a href="{{ route('contact') }}" class="btn float-left btn-default">File Report</a>
                  <form method="post" action="{{ route('deposit-confirm.update', $withdrawals->id) }}">    
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="id">
                    @if(!empty($accounts))
                    <input type="hidden" name="commitmentID" value="{{ $accounts->id }}">
                    @endif
                    <input type="hidden" name="status" value="1">
                    <input type="hidden" name="depositid" value="{{ $findpayer->id }}">
                    <input type="hidden" name="payid" value="{{ $findpayer->payid }}">
                    <input type="hidden" name="amount" value="{{ $findpayer->pendingTransaction }}">
                    <button class="btn float-right btn-mainer" type="submit" onclick="return confirm(&#39;You are about to notify the system that you have received ₦{{ $withdrawals->reamount }}.00 from {{ $withdrawals-> payername }}. Do you want to proceed with this?&#39;);">Confirm Payment</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endif
          @else
        <div class="row" id="duringInvestment">
            <div class="col-md-12">
                <!-- Profile Image -->
          <div class="card card-primary card-outline background-main">
            <div class="card-body box-profile">
                <div class="row" id="beforeInvestment">
                  <div class="col-md-8">
                    <h5>Withdraw your Earnings</h5>
                    <p>You will need to make an investment before withdrawing any amount</p>
                  </div>
                  <div class="col-md-4 activate-acct">
                    <a href="#" role="tab" class="btn btn-mainer" data-toggle="modal" data-target="#modal-withdraw">
                      <span class="fa fa-arrow-up"></span> Make a Withdrawal
                    </a>
                  </div>
                </div> 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        @endif
        <!-- withdrawal -->

        @endif

        @if(!empty($bonus_referral))

          <div class="row" id="MyReferralBonus">
            <div class="col-md-6">
                <!-- Profile Image -->
              <div class="card card-primary card-outline background-main pb-2">

                <div class="card-body box-profile text-center" style="overflow-y: hidden;">
                  <h5 class="mb-3">Transaction Notification (Referral Bonus)</h5>
                  <h5 class="mb-3">Amount: &#8358;{{ $bonus_referral->amount }}.00</h5>
                  <h6 class="mb-3">Payer Name: {{ $bonus_referral->payername }}</h6>
                  <p>You have received a payment notification from this user</p>
                  <p>Didn't receive this payment? then file a report.</p>
                  <a href="{{ Storage::disk('local')->url($bonus_referral->image) }}"><img src="{{ Storage::disk('local')->url($bonus_referral->image) }}" height="100%" width="100%"></a>

                </div>
                <div class="card-footer">
                  <a href="#" class="btn float-left btn-default">File Report</a>
                  <form method="post" action="{{ route('referralbonus', $bonus_referral->id) }}">    
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="id">
                    <input type="hidden" name="status" value="1">
                    <input type="hidden" name="payment" value="{{ $bonus_referral->payment }}">
                    <input type="hidden" name="pendingTransaction" value="{{ $bonus_referral->pendingTransaction }}">
                    <input type="hidden" name="payid" value="{{ $bonus_referral->payid }}">
                    <input type="hidden" name="amount" value="{{ $bonus_referral->amount }}">
                    <button class="btn float-right btn-mainer" type="submit" onclick="return confirm(&#39;You are about to notify the system that you have received ₦{{ $bonus_referral->amount }}.00 from {{ $bonus_referral->payername }}. Do you want to proceed with this?&#39;);">Confirm Payment</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endif
      @endif

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @if(!empty($commits))
    @if($commits->invest==1 || $commits->notify == 1)
      <div class="modal fade" id="viewDetails">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title main-color">Pay to</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center text-bold">
              <p>Account Name: {{ $commits->receivername }}</p>
              <p>Account Number: {{ $commits->receiveraccount }}</p>
              <p>Bank Name: {{ $commits->receiverbank }}</p>
              <p>Phonenumber: <a href="tel:{{ $commits->receiverphone }}">{{ $commits->receiverphone }}</a></p>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-mainer" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      @endif
     @endif


      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title main-color">Make an Investment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('commitment.store') }}" method="post">
              {{ csrf_field() }}

              <input  type="hidden" name="userid" value="{{ Auth::user()->id }}">
              <input  type="hidden" name="upline" value="{{ Auth::user()->upline }}">
              <input  type="hidden" name="status" value="{{ Auth::user()->status }}">
              <input  type="hidden" name="payername" value="{{ Auth::user()->name }}">
              <input  type="hidden" name="payerphone" value="{{ Auth::user()->phoneprefix }}{{ Auth::user()->phonenumber }}">
              <input  type="hidden" name="invest" value="1">

              <div class="form-group">
                <label>Choose Amount to Invest</label>
                <select class="form-control" required="required" name="amount" id="amount">
                  <option value="">Select an Amount</option>
                  <option value="5000">&#8358;5000</option>
                  <option value="7500">&#8358;7,500</option>
                  <option value="10000">&#8358;10,000</option>
                  <option value="15000">&#8358;15,000</option>
                  <option value="20000">&#8358;20,000</option>
                  <option value="25000">&#8358;25,000</option>
                  <option value="30000">&#8358;30,000</option>
                  <option value="30000">&#8358;35,000</option>
                  <option value="40000">&#8358;40,000</option>
                  <option value="45000">&#8358;45,000</option>
                  <option value="50000">&#8358;50,000</option>
                  <option value="60000">&#8358;60,000</option>
                  <option value="70000">&#8358;70,000</option>
                  <option value="80000">&#8358;80,000</option>
                  <option value="90000">&#8358;90,000</option>
                  <option value="100000">&#8358;100,000</option>
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="Submit" class="btn btn-mainer">Submit Form</button>
            </div>
          </div>
        </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      @if(!empty($commit_paid))
      <div class="modal fade" id="payRecommit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title main-color">Make a Recommitment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('recommitment.update', $commit_paid->id) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('PUT') }}

              <input  type="hidden" name="userid" value="{{ Auth::user()->id }}">
              <input  type="hidden" name="upline" value="{{ Auth::user()->upline }}">
              <input  type="hidden" name="status" value="{{ Auth::user()->status }}">
              <input  type="hidden" name="payername" value="{{ Auth::user()->name }}">
              <input  type="hidden" name="recommit" value="{{ $commit_paid->recommit }}">
              <input  type="hidden" name="payerphone" value="{{ Auth::user()->phoneprefix }}{{ Auth::user()->phonenumber }}">
              <input  type="hidden" name="invest" value="1">

              <div class="form-group">
                <label>Choose Amount to Invest</label>
                <select class="form-control" required="required" name="amount" id="amount">
                  <option value="">Select an Amount</option>
                  <option value="5000">&#8358;5000</option>
                  <option value="7500">&#8358;7,500</option>
                  <option value="10000">&#8358;10,000</option>
                  <option value="15000">&#8358;15,000</option>
                  <option value="20000">&#8358;20,000</option>
                  <option value="25000">&#8358;25,000</option>
                  <option value="30000">&#8358;35,000</option>
                  <option value="40000">&#8358;40,000</option>
                  <option value="45000">&#8358;45,000</option>
                  <option value="50000">&#8358;50,000</option>
                  <option value="60000">&#8358;60,000</option>
                  <option value="70000">&#8358;70,000</option>
                  <option value="80000">&#8358;80,000</option>
                  <option value="90000">&#8358;90,000</option>
                  <option value="100000">&#8358;100,000</option>
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="Submit" class="btn btn-mainer">Submit Form</button>
            </div>
          </div>
        </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      @endif

      <!------- Withdrawal ---------->
      @forelse($earnings as $earning)
      <div class="modal fade" id="modal-withdraw">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title main-color">Make a Withdrawal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('withdrawal.store') }}" method="post">
              {{ csrf_field() }}

              <input  type="hidden" name="userid" value="{{ Auth::user()->id }}">
              <input  type="hidden" name="account_name" value="{{ Auth::user()->account_name }}">
              <input  type="hidden" name="account_no" value="{{ Auth::user()->account_no }}">
              <input  type="hidden" name="bank" value="{{ Auth::user()->bank }}">
              <input  type="hidden" name="phone" value="{{ Auth::user()->phoneprefix }}{{ Auth::user()->phonenumber }}">

              <div class="form-group">
                <label>Withdrawal Amount (&#8358;):</label>
                @if(!empty($amountToWithdraw))
                <input type="text" name="myamount" required id="amount" readonly value="{{ $amountToWithdraw->earning }}" class="form-control">
                  @else
                  <input type="text" name="amount" value="0.00">
                @endif
              </div>
              <p><a href="#">Would you like to edit your payment details?</a></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="Submit" class="btn btn-mainer">Submit Form</button>
            </div>
          </div>
        </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @empty
      <div class="modal fade" id="modal-withdraw">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title main-color">Notification</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="text-danger">You cannot withdraw now !!!</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- Withdrawal -->
      @endforelse

      @if(!empty($commits))
      <div class="modal fade" id="paidDetails">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title main-color">Means of Payment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p style="color: red; font-weight: normal; font-size: 14px;">It is Imperative you select this option correctly so that your payment can be confirmed.</p>
              <form action="{{ route('commitment.update', $commits->id) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}

              <input type="hidden" name="payid" value="{{ Auth::user()->id }}">
              <input type="hidden" name="payerphone" value="{{ Auth::user()->phoneprefix }}{{ Auth::user()->phonenumber }}">
              <input type="hidden" name="payername" value="{{ Auth::user()->name }}">
              <input type="hidden" name="receiveid" value="{{ $commits->receiverid }}">
              <input type="hidden" name="tableid" value="{{ $commits->deptableid }}">
              <input type="hidden" name="receivename" value="{{ $commits->receivername }}">
              <input type="hidden" name="notify" value="1">
              <input type="hidden" name="hepaid" value="1">
              <input type="hidden" name="activestatus" value="{{ Auth::user()->status }}">
              
              <input  type="hidden" name="amount" value="{{ $commits->amount }}">

              <div class="form-group">
                <label>What medium did you pay with</label>
                <select class="form-control" required="required" name="medium" id="mediumImage" data-toggle="tooltip" data-placement="bottom" title="Select your medium of this payment">
                  <option value="">Medium of this payment</option>
                  <option value="Bank Deposit">Bank Deposit</option>
                  <option value="Mobile Transfer with USSD Code">Mobile Transfer with USSD Code</option>
                  <option value="Mobile Transfer with My Bank Application">Mobile Transfer with My Bank Application</option>
                  <option value="Internet Banking">Internet Banking</option>
                  <option value="Transfer from Over the Counter">Transfer from Over the Counter</option>
                  <option value="ATM Transfer">ATM Transfer</option>
                  <option value="POS Transfer">POS Transfer</option>
                </select>
              </div>
            <div class="form-group">
              <select class="form-control" name="payBank" id="payBankImage" data-toggle="tooltip" data-placement="bottom" title="Select your medium of this payment" style="display: none;">
                <option value="">Bank you Transferred From</option>
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
                <option value="others">Bank is not Listed</option>
               </select>
             </div>

             <div class="form-group">
                <label for="pop">Upload your Prove of Payment</label>
                <input type="file" name="pop" required="required" id="popImage" accept="image/*">
                <div id="popUploadImage"></div>
            </div>
            </div>
            <div class="modal-footer justify-content-between">    
            <hr>
              <button class="btn btn-mainer btn-md" name="pay" type="submit" onclick="return confirm(&#39;You are about to notify the system that you have paid {{ $commits->receivername}} the sum of ₦{{ $commits->amount }}.00. Do you want to proceed with this?&#39;);"> I Paid with the above details</button>
            </div>
          </div>
        </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endif
      <!-- /.modal -->

      @if(!empty($bonuses))
      <div class="modal fade" id="bonusPaid">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title main-color">Means of Payment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p style="color: red; font-weight: normal; font-size: 14px;">It is Imperative you select this option correctly so that your payment can be confirmed.</p>
              <form action="{{ route('bonuses.update', $bonuses->id) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}

              <input type="hidden" name="payid" value="{{ Auth::user()->id }}">
              <input type="hidden" name="payerphone" value="{{ Auth::user()->phoneprefix }}{{ Auth::user()->phonenumber }}">
              <input type="hidden" name="payername" value="{{ Auth::user()->name }}">
              <input type="hidden" name="receivename" value="{{ $bonuses->receivername }}">
              <input type="hidden" name="receiveid" value="{{ $bonuses->receiverid }}">
              
              <input  type="hidden" name="amount" value="{{ $bonuses->amount }}">

              <div class="form-group">
                <label>What medium did you pay with</label>
                <select class="form-control" required="required" name="medium" id="mediumImage" data-toggle="tooltip" data-placement="bottom" title="Select your medium of this payment">
                  <option value="">Medium of this payment</option>
                  <option value="Bank Deposit">Bank Deposit</option>
                  <option value="Mobile Transfer with USSD Code">Mobile Transfer with USSD Code</option>
                  <option value="Mobile Transfer with My Bank Application">Mobile Transfer with My Bank Application</option>
                  <option value="Internet Banking">Internet Banking</option>
                  <option value="Transfer from Over the Counter">Transfer from Over the Counter</option>
                  <option value="ATM Transfer">ATM Transfer</option>
                  <option value="POS Transfer">POS Transfer</option>
                </select>
              </div>
            <div class="form-group">
              <select class="form-control" name="payBank" id="payBankImage" data-toggle="tooltip" data-placement="bottom" title="Select your medium of this payment" style="display: none;">
                <option value="">Bank you Transferred From</option>
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
                <option value="others">Bank is not Listed</option>
               </select>
             </div>

             <div class="form-group">
                <label for="pop">Upload your Prove of Payment</label>
                <input type="file" name="pop" required="required" id="popImage" accept="image/*">
                <div id="popUploadImage"></div>
            </div>
            </div>
            <div class="modal-footer justify-content-between">    
            <hr>
              <button class="btn btn-mainer btn-md" name="pay" type="submit" onclick="return confirm(&#39;You are about to notify the system that you have paid {{ $bonuses->receivername}} the sum of ₦{{ $bonuses->amount }}.00. Do you want to proceed with this?&#39;);"> I Paid with the above details</button>
            </div>
          </div>
        </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="viewBonus">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title main-color">Pay to</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center text-bold">
              <p>Account Name: {{ $bonuses->receivername }}</p>
              <p>Account Number: {{ $bonuses->receiveraccount }}</p>
              <p>Bank Name: {{ $bonuses->receiverbank }}</p>
              <p>Phonenumber: <a href="tel:{{ $bonuses->receiverphone }}">{{ $bonuses->receiverphone }}</a></p>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-mainer" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      @endif
      <!-- /.modal -->


@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/jquery.countdown.min.js') }}"></script>
@if(!empty($commits))
<script type="text/javascript">
  $(document).ready(function(){
  $("#getting-started").countdown('{{ $commits->created_at->addDays(1) }}', function(event) {
    $(this).text(
      event.strftime('Time Left: %I:%M:%S')
    );
  });
});
</script>
@endif
  <script type="text/javascript">
      $("#mediumImage").change(displayBankImage);
      $(document).ready(displayBankImage);
      function displayBankImage(){
          var mediumImage = $('#mediumImage').val();
          if(mediumImage == '' || mediumImage == 'Bank Deposit' || mediumImage == 'POS Transfer'){
              $("#payBankImage").hide();
              $("#payBankImage").removeAttr("required");
          }else{
              $("#payBankImage").show();
              $("#payBankImage").attr("required","required");
          }
      }
  </script>

  <script type="text/javascript">
      function filePreviewImage(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#popUploadImage + img').remove();
                  $('#popUploadImage + img').remove();
                  /*$('#popUploadImage').after('<img class="img-thumbnail hidden-sm hidden-md hidden-lg" src="'+e.target.result+'" style="max-width:230px;" />');*/
                  $('#popUploadImage').after('<img class="img-thumbnail hidden-xs" src="'+e.target.result+'" style="max-width:400px;" />');
              };
              reader.readAsDataURL(input.files[0]);
          }
      }
      $("#popImage").change(function () {
          filePreviewImage(this);
      });
  </script>


<script type="text/javascript">
    $(document).ready(
          function(){
                      });
</script>

@endsection
