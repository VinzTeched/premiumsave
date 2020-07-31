@extends('layouts.master')

@section('title')
    MoneyMakingMachine | Buy
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
                           <span>Project</span>
                        </li>
                        <li class="active">
                           <span>Buy</span>
                        </li>
                     </ol>
                  </div>
                  <h2 class="font-light m-b-xs">
                     Purchase
                  </h2>
                  <small>Add Project to your Collection.</small>
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
						Purchase
                      </div>
                     <div class="panel-body">
                        <p>
                           @include('inc.messages')
                        </p>
                        <form action="{{ route('buy.store') }}" method="post">
						{{ csrf_field() }}
						<input  type="hidden" name="userid" value="{{ Auth::user()->id }}">
						<input  type="hidden" name="book_id" value="{{ $post->id }}">
						<input  type="hidden" name="slug" value="{{ $post->slug }}">
						@forelse($withdrawals as $key => $row)
						   <input  type="hidden" name="amt" value="{{ $depots[$key]->total - $row['total'] }}">
						@empty
						 
						 @foreach($depots as $depot)
						<input  type="hidden" name="amt" value="{{ $depot->total }}">
						 @endforeach
						 
						@endforelse
						
						   <div class="m-t-md mb-3">
							   <label for="amount">Title</label>
							   <input id="amount" readonly type="tel" name="title" value="{{ $post->title }} " style="cursor:help;background:#eee">
							   
							</div><div class="m-t-md mb-3">
							   <label for="amount">Amount (&#8358;)</label>
							   <input id="amount" readonly type="tel" name="amount" value="@if($post->posted_by == 1) 200 @else 3000 @endif" style="cursor:help;background:#eee">
							</div>
						    <div class="form-group mb-5">
								<label class="control-label">Payment Method</label>
								<select class="form-control" name="method" id="method" style="height:40px;border: 1px solid #e9eff5;padding: 9px 30px;border-radius: 4px;" >
								   <option value=' '>-- Please Select --</option>
									<option value='1'>Bank Deposit</option>
									<option value='2'>Paystack</option>
									<option value='3'>M3 Account</option>
								   </select>
								</select>
                            </div>
                           <div>
                              <button class="btn btn-sm btn-blue m-t-n-xs" type="submit" id="deposit" style="display: none"><strong class="text-white">Submit</strong></button>

                        <script src="https://js.paystack.co/v1/inline.js"></script>
                        <button type="button" onclick="payWithPaystack()" id="paystax" style="display: none"> Pay </button> 

							  <a href="{{ route('post', $post->slug) }}" class="btn btn-sm btn-warning  m-t-n-xs"><strong class="text-blue">Back</a></strong>
                           </div>
                        </form>
                        <script>
                           var email = document.getElementsByTagName('')
                          function payWithPaystack(){
                            var handler = PaystackPop.setup({
                              key: 'pk_test_99ef17b4306cae534c5fd7ceaba913f2e87e01e2',
                              email: 'customer@email.com',
                              amount: 10000,
                              currency: "NGN",
                              ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                              metadata: {
                                 custom_fields: [
                                    {
                                        display_name: "Mobile Number",
                                        variable_name: "mobile_number",
                                        value: "+2348162756220"
                                    }
                                 ]
                              },
                              callback: function(response){
                                  alert('success. transaction ref is ' + response.reference);
                              },
                              onClose: function(){
                                  alert('window closed');
                              }
                            });
                            handler.openIframe();
                          }
                        </script>
                     </div>
                  </div>
               </div>
            </div>
            </div>

@endsection

@section('scripts')

<script type="text/javascript">
   $(document).ready(function(){
      $('#method').on('change', function(){
         if (this.value == '1' || this.value == '3') 
         {
            $('#deposit').show();
            $('#paystax').hide();
         }
         else
         {
            $('#deposit').hide();
            $('#paystax').show();

         }
      });
   });

</script>
@endsection
