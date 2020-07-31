@extends('layouts.master')

@section('title')
    Softworkpro | Deposit
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
                           <span>Deposit</span>
                        </li>
                     </ol>
                  </div>
                  <h2 class="font-light m-b-xs">
                     Deposit
                  </h2>
                  <small>Make a deposit to your Account.</small>
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
						Deposit Form
                      </div>
                     <div class="panel-body">
                         <p>
                           We have two method of depositing to account <br>1. Bank Deposit: You are provided with a designated account in which you can make payment and then confirmed for payment by the provision of your evidence of payment. <br>2. Online Deposit: A stressful and secure way of depositing using your debit and credit cards.
                        </p>
                         <p>
                           Kindly choose your preferred choice below
                        </p>

                         <p>
                           @include('inc.messages')
                        </p>

                      <div class="form-group mb-5">
                        <label class="control-label">Select Payment Method</label>
                        <select class="form-control" name="method" id="method" style="height:40px;border: 1px solid #e9eff5;padding: 9px 30px;border-radius: 4px;" >
                           <option value=''>-- Please Select --</option>
                           <option value='1'>Bank Deposit</option>
                           <option value='2'>Online Deposit</option>
                           </select>
                        </select>
                       </div>

              <!--div id="deposit" class="a-hidden-field" style="display: none;">

               <p>
                  Please Fill the Following Fields
               </p>
               <form action="{{ route('deposit.store') }}" method="post">
                  {{ csrf_field() }}
                  <input  type="hidden" name="userid" value="{{ Auth::user()->id }}">
                  
                     <div class="m-t-md mb-3">
                        <label for="amount">Amount (&#8358;)</label>
                        <input id="amount" type="tel" name="amount" placeholder="200">
                     </div>
                           <div>
                              <button class="btn btn-sm btn-blue m-t-n-xs" type="submit"><strong class="text-white">Submit</strong></button>
                       <a href="{{ route('home') }}" class="btn btn-sm btn-warning m-t-n-xs"><strong class="text-blue">Back</a></strong>
                           </div>
                        </div-->

            <div id="paystax" class="a-hidden-field" style="display: none;">

               <p style="color: #faa">
                  ***Please Fill the Following Fields to Proceed with online deposit using your Credit and Debit cards*** <br>
                  <img src="/images/secured_by_paystack.png">
               </p>

                  <form  method="post">
						{{ csrf_field() }}
						<input  type="hidden" name="userid" value="{{ Auth::user()->id }}">
						
						   <div class="m-t-md mb-3">
                        <label for="amount">Amount (&#8358;)</label>
                        <input id="amount" type="tel" name="amount" placeholder="200">
                     </div>

                     <div class="m-t-md mb-3">
							   <label for="amount">Email </label>
							   <input type="tel" name="email" id="email" placeholder="myemail@gmail.com" value="{{ Auth::user()->email }}">
							</div><br>
                           <div>

                        <script src="https://js.paystack.co/v1/inline.js"></script>
                        <button type="post" onclick="payWithPaystack()" class="btn btn-sm btn-blue m-t-n-xs" > Proceed to Online Payment </button> 

							  <a href="{{ route('home') }}" class="btn btn-sm btn-warning m-t-n-xs"><strong class="text-blue">Back</a></strong>
                           </div>
                        </div>
                        </form>
                        <script>

                          function payWithPaystack(){
                            var handler = PaystackPop.setup({
                              key: 'pk_test_99ef17b4306cae534c5fd7ceaba913f2e87e01e2',
                              email: @php if(isset($_POST['post'])){$_POST['email']} @endphp,
                              amount: @php if(isset($_POST['post'])){$_POST['amount']} @endphp,
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
         if (this.value == '1') 
         {
            $('#deposit').show();
            $('#paystax').hide();
         }
         else if (this.value == '2') 
         {
            $('#deposit').hide();
            $('#paystax').show();
         }
         else{
            alert('Please Select Your Payment Method')
         }
      });
   });

</script>
@endsection
