@extends('layouts.master')

@section('title')
    MoneyMakingMachine | Home 
@endsection

@section('content')
   
<!-- ========== MAIN CONTENT ========== -->
	<!-- main-menu-->

    <div id="wrapper" style="margin-top:5.2em">
		<div class="normalheader transition">
            <div class="hpanel">
               <div class="panel-body no-back">
                  <a class="small-header-action" href="#">
                     <div class="clip-header">
                        <i class="fa fa-arrow-up"></i>
                     </div>
                  </a>
                  <div id="hbreadcrumb" class="pull-right m-t-lg">
                     <ol class="hbreadcrumb breadcrumb">
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li>
                           <span>User</span>
                        </li>
                        <li class="active">
                           <span>Withdrawal</span>
                        </li>
                     </ol>
                  </div>
                  <h2 class="font-light m-b-xs">
                     Withdrawal
                  </h2>
                  <small>Make a withdrawal to your Account.</small>
               </div>
            </div>
         </div>
        <div class="content-user">
		   <div class="container">
			   <div class="row">
               <div class="col-lg-6">
                  <div class="hpanel">
                     <div class="panel-heading">
                        <div class="panel-tools">
                           <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                           <a class="closebox"><i class="fa fa-times"></i></a>
                        </div>
						Withdrawal Form
                      </div>
                     <div class="panel-body">
                        <p>
                           Please Fill the Following Fields @include('inc.messages')
                        </p>
                        <form action="{{ route('withdrawal.store') }}" method="post">
						{{ csrf_field() }}
						<input  type="hidden" name="userid" value="{{ Auth::user()->id }}">
						@forelse($withdrawals as $key => $row)
						<input  type="hidden" name="amt" value="{{ $depots[$key]->total - $row['total'] }}">
						 @empty
                   
                   @foreach($depots as $depot)
                  <input  type="hidden" name="amt" value="{{ $depot->total }}">
                   @endforeach
						 
						@endforelse


                   @foreach($torals as $toral)
                  <input  type="hidden" name="ref_money" value="{{ $toral->total }}">
                   @endforeach

                   @foreach($buys as $buy)
                  <input  type="hidden" name="ref_moneys" value="{{ $buy->total }}">
                   @endforeach

						
						   <div class="m-t-md mb-3">
							   <label for="amount">Amount (&#8358;)</label>
							   <input id="amount" type="tel" name="amount" placeholder="200">
							</div>
						    <div class="form-group mb-5">
								<label class="control-label">Payment Method</label>
								<select class="form-control" name="method" style="height:40px;border: 1px solid #e9eff5;padding: 9px 30px;border-radius: 4px;" >
								   <option value=' '>-- Please Select --</option>
									<option value='1'>Bank Deposit</option>
									<option value='2'>Paystack</option>
								   </select>
								</select>
                            </div>
                           <div>
                              <button class="btn btn-sm btn-blue m-t-n-xs" type="submit"><strong class="text-white">Submit</strong></button>
							  <a href="{{ route('home') }}" class="btn btn-sm btn-warning m-t-n-xs"><strong class="text-blue">Back</a></strong>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            </div>

@endsection

@section('scripts')

@endsection
