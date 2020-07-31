@extends('layouts.app')

@section('title')
    Premiumcash | My Account 
@endsection

@section('content')
   
<!-- ========== MAIN CONTENT ========== -->
	<!-- main-menu-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-md-4 p-sm-2">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h5 class="m-0 text-dark">My Account</h5>
            <p class="main-color text-bold">Update your personal information.</p>
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
    <section class="content" style="color:#da32a4">
      <div class="container">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-md-12">
        @include('inc.messages')
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

                <h3 class="text-center"><span class="text-primary">Account Type:</span> Regular</h3>
                <h5 class="text-center"><span class="text-primary">Your ID:</span> {{ Auth::user()->ref_no }}</h5>

                <ul class="nav nav-tabs" id="accountUpdate">
                  <li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <a class="btn btn-main nav-link active" data-form="generalForm" id="myprofile" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">General Information</a>
                  </li>
                  <li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <a class="btn btn-main nav-link" id="bankdetails" data-form="bankForm"data-toggle="pill" href="#bankdetail" role="tab" aria-controls="bank" aria-selected="false">Bank Details</a>
                  </li>
                  <li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <a class="btn btn-main nav-link" id="changepassword" data-toggle="pill" href="#passwordchange" data-form="passwordForm" role="tab" aria-controls="password" aria-selected="false">Change Password</a>
                  </li>
                  <li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <a class="btn btn-main nav-link" id="transaction" data-toggle="pill" href="#transactions" role="tab" aria-controls="transaction" aria-selected="false">Transactions</a>
                  </li>
                </ul>
                <div class="tab-content mt-3 p-2" id="accountUpdateContent">
                  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="myprofile">

            <form  action="{{ route('update-account.update', Auth::user()->id) }}" id="generalForm" method="POST">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                    <div class="row">
                      <input type="hidden" name="profilecheck" value="1">
                      <div class="col-sm-6">
                      <div class="form-group"><label>Email</label>
                        <input name="email" class="form-control" placeholder="Email" readonly="" type="text" value="{{ $user->email }}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group"><label>Name</label>
                        <input name="email" class="form-control" placeholder="Email" readonly="" type="text" value="{{ $user->name }}" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                        <p class="text-bold mr-df">Account Type</p>
                      <div class="form-group">
                        <input name="type" class="form-control" placeholder="Email" readonly="" type="text" value="Regular" id="type">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <style type="text/css">
                      .PhoneNumberInput { position: relative; }
                      #phone_prefix { position: absolute; left: 0px; top: 0px; color: #777; padding-right: 0px; width: 80px; height: 38px; }
                      #phonenumber { position: relative; left: 0; top: 0; padding-left: 85px; }
                      .mr-df{
                        margin-bottom: .4em;
                      }
                    </style>
                    <p class="text-bold mr-df">Phone Number</p>
                      <div class="form-group PhoneNumberInput"><input id="phonenumber" type="number" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ $user->phonenumber }}" required autocomplete="phonenumber" placeholder="Phonenumber" >
            <select name="phone_prefix" class="form-control" id="phone_prefix">
              <option selected="" value="{{ $user->phoneprefix }}">{{ $user->phoneprefix }}</option>
              <option value="+234">+234</option>
              <option value="+1">+1</option>
              <option value="+1 264">+1 264</option>
              <option value="+1 284">+1 284</option>
              <option value="+1 345">+1 345</option>
              <option value="+1 599">+1 599</option>
              <option value="+1 664">+1 664</option>
              <option value="+1 670">+1 670</option>
              <option value="+1 671">+1 671</option>
              <option value="+1 684">+1 684</option>
              <option value="+20">+20</option>
              <option value="+211">+211</option>
              <option value="+212">+212</option>
              <option value="+213">+213</option>
              <option value="+216">+216</option>
              <option value="+218">+218</option>
              <option value="+220">+220</option>
              <option value="+221">+221</option>
              <option value="+222">+222</option>
              <option value="+223">+223</option>
              <option value="+224">+224</option>
              <option value="+225">+225</option>
              <option value="+226">+226</option>
              <option value="+227">+227</option>
              <option value="+228">+228</option>
              <option value="+229">+229</option>
              <option value="+230">+230</option>
              <option value="+231">+231</option>
              <option value="+232">+232</option>
              <option value="+233">+233</option>
              <option value="+236">+236</option>
              <option value="+237">+237</option>
              <option value="+238">+238</option>
              <option value="+239">+239</option>
              <option value="+240">+240</option>
              <option value="+241">+241</option>
              <option value="+242">+242</option>
              <option value="+243">+243</option>
              <option value="+244">+244</option>
              <option value="+245">+245</option>
              <option value="+248">+248</option>
              <option value="+249">+249</option>
              <option value="+250">+250</option>
              <option value="+251">+251</option>
              <option value="+252">+252</option>
              <option value="+253">+253</option>
              <option value="+254">+254</option>
              <option value="+255">+255</option>
              <option value="+256">+256</option>
              <option value="+257">+257</option>
              <option value="+258">+258</option>
              <option value="+260">+260</option>
              <option value="+261">+261</option>
              <option value="+262">+262</option>
              <option value="+263">+263</option>
              <option value="+264">+264</option>
              <option value="+265">+265</option>
              <option value="+266">+266</option>
              <option value="+267">+267</option>
              <option value="+268">+268</option>
              <option value="+269">+269</option>
              <option value="+27">+27</option>
              <option value="+290">+290</option>
              <option value="+291">+291</option>
              <option value="+297">+297</option>
              <option value="+298">+298</option>
              <option value="+299">+299</option>
              <option value="+30">+30</option>
              <option value="+31">+31</option>
              <option value="+32">+32</option>
              <option value="+33">+33</option>
              <option value="+34">+34</option>
              <option value="+350">+350</option>
              <option value="+351">+351</option>
              <option value="+352">+352</option>
              <option value="+353">+353</option>
              <option value="+354">+354</option>
              <option value="+355">+355</option>
              <option value="+356">+356</option>
              <option value="+357">+357</option>
              <option value="+358">+358</option>
              <option value="+359">+359</option>
              <option value="+36">+36</option>
              <option value="+370">+370</option>
              <option value="+371">+371</option>
              <option value="+372">+372</option>
              <option value="+373">+373</option>
              <option value="+374">+374</option>
              <option value="+375">+375</option>
              <option value="+376">+376</option>
              <option value="+377">+377</option>
              <option value="+378">+378</option>
              <option value="+380">+380</option>
              <option value="+381">+381</option>
              <option value="+382">+382</option>
              <option value="+385">+385</option>
              <option value="+386">+386</option>
              <option value="+387">+387</option>
              <option value="+389">+389</option>
              <option value="+39">+39</option>
              <option value="+40">+40</option>
              <option value="+41">+41</option>
              <option value="+420">+420</option>
              <option value="+421">+421</option>
              <option value="+423">+423</option>
              <option value="+43">+43</option>
              <option value="+44">+44</option>
              <option value="+45">+45</option>
              <option value="+46">+46</option>
              <option value="+47">+47</option>
              <option value="+48">+48</option>
              <option value="+49">+49</option>
              <option value="+500">+500</option>
              <option value="+501">+501</option>
              <option value="+502">+502</option>
              <option value="+503">+503</option>
              <option value="+504">+504</option>
              <option value="+505">+505</option>
              <option value="+506">+506</option>
              <option value="+507">+507</option>
              <option value="+508">+508</option>
              <option value="+509">+509</option>
              <option value="+51">+51</option>
              <option value="+52">+52</option>
              <option value="+53">+53</option>
              <option value="+54">+54</option>
              <option value="+55">+55</option>
              <option value="+56">+56</option>
              <option value="+57">+57</option>
              <option value="+58">+58</option>
              <option value="+590">+590</option>
              <option value="+591">+591</option>
              <option value="+592">+592</option>
              <option value="+593">+593</option>
              <option value="+595">+595</option>
              <option value="+597">+597</option>
              <option value="+598">+598</option>
              <option value="+599">+599</option>
              <option value="+60">+60</option>
              <option value="+61">+61</option>
              <option value="+62">+62</option>
              <option value="+63">+63</option>
              <option value="+64">+64</option>
              <option value="+65">+65</option>
              <option value="+66">+66</option>
              <option value="+670">+670</option>
              <option value="+672">+672</option>
              <option value="+673">+673</option>
              <option value="+674">+674</option>
              <option value="+675">+675</option>
              <option value="+677">+677</option>
              <option value="+678">+678</option>
              <option value="+679">+679</option>
              <option value="+680">+680</option>
              <option value="+682">+682</option>
              <option value="+683">+683</option>
              <option value="+685">+685</option>
              <option value="+686">+686</option>
              <option value="+687">+687</option>
              <option value="+688">+688</option>
              <option value="+689">+689</option>
              <option value="+690">+690</option>
              <option value="+691">+691</option>
              <option value="+692">+692</option>
              <option value="+7">+7</option>
              <option value="+81">+81</option>
              <option value="+82">+82</option>
              <option value="+84">+84</option>
              <option value="+850">+850</option>
              <option value="+852">+852</option>
              <option value="+853">+853</option>
              <option value="+855">+855</option>
              <option value="+856">+856</option>
              <option value="+86">+86</option>
              <option value="+870">+870</option>
              <option value="+880">+880</option>
              <option value="+886">+886</option>
              <option value="+90">+90</option>
              <option value="+91">+91</option>
              <option value="+92">+92</option>
              <option value="+93">+93</option>
              <option value="+94">+94</option>
              <option value="+95">+95</option>
              <option value="+960">+960</option>
              <option value="+961">+961</option>
              <option value="+962">+962</option>
              <option value="+963">+963</option>
              <option value="+964">+964</option>
              <option value="+965">+965</option>
              <option value="+966">+966</option>
              <option value="+967">+967</option>
              <option value="+968">+968</option>
              <option value="+971">+971</option>
              <option value="+972">+972</option>
              <option value="+973">+973</option>
              <option value="+974">+974</option>
              <option value="+975">+975</option>
              <option value="+976">+976</option>
              <option value="+977">+977</option>
              <option value="+98">+98</option>
              <option value="+992">+992</option>
              <option value="+993">+993</option>
              <option value="+994">+994</option>
              <option value="+995">+995</option>
              <option value="+996">+996</option>
              <option value="+998">+998</option>
            </select>
                      </div>
                    </form>
                    </div>
                  </div>
                  </div>
                  <div class="tab-pane fade" id="bankdetail" role="tabpanel" aria-labelledby="bankdetails">

            <form  action="{{ route('updateBank', Auth::user()->id) }}" id="bankForm" method="POST">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                <div class="form-group row">

                  <div class="col-md-12"><label>Account Name</label></div>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control nine-height @error('name') is-invalid @enderror" name="acctname" value="{{ $user->name }}" required placeholder="Account Name">

                        @error('name')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12"><label>Account Number</label></div>
                    <div class="col-md-6">
                        <input id="account" type="tel" class="form-control nine-height @error('account') is-invalid @enderror" name="account" value="{{ $user->account_no }}" required placeholder="Account Number" maxlength="10" minlength="10">

                        @error('account')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12"><label>Bank</label></div>
                    <div class="col-md-6">
                        
                  <select class="form-control nine-height" required="required" name="bank" id="bank">
                    <option value="{{ $user->bank }}">{{ $user->bank }}</option>
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
                  </form>
                </div> 
                  </div>
                  <div class="tab-pane fade" id="passwordchange" role="tabpanel" aria-labelledby="changepassword">

            <form action="{{ route('updatePassword', Auth::user()->id) }}" id="passwordForm" method="POST">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                     <div class="col-sm-6">
                      <div class="form-group">
                        <div class="col-md-12"><label>Old Password</label></div>
                        <input name="password" class="form-control" placeholder="Old Password" type="password" value="" id="password">
                      </div>
                      <div class="form-group">
                        <div class="col-md-12"><label>New Password</label></div>
                        <input name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password" type="password" value="" id="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <div class="col-md-12"><label>Confirm Password</label></div>
                        <input name="password_confirmation" required autocomplete="new-password" class="form-control" placeholder="Confirm New Password" type="password" value="" id="password">
                      </div>
                    </form>
                    </div> 
                  </div>
                  <div class="tab-pane fade" id="transactions" role="tabpanel" aria-labelledby="transaction">
                     
        <div class="row">

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Transaction</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="button" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-center text-dark">
                  <thead class="background-main">
                    <tr>
                      <th>No</th>
                      <th>Amount</th>
                      <th>Receiver</th>
                      <th>Type</th>
                      <th>Receiver Phone</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($deposits as $deposit)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $deposit->amount }}</td>
                      <td>{{ $deposit->receivername }}</td>
                      <td>Donations</td>
                      <td>{{ $deposit->receiverphone }}</td>
                      <td>{{ $deposit->created_at }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row --> 
                  </div>
                </div>
      <div style="display:none;" id="activeFormID" data-value="generalForm"></div>
        <div class="clearfix"></div>
         <div class="col-sm-12 btnaccount">
            <button type="reset" id="reset" class="btn btn-main" role="button"><i class="fa fa-retweet"></i> Reset</button>
            <button type="submit" id="save" class="btn btn-mainer" role="button"><i class="fa fa-download"></i> {{ __('Save') }}</button>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div>
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  


@endsection

@section('scripts')

<script type="text/javascript">
  $(document).ready(function(){
  
    $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
      $('#activeFormID').attr('data-value', e.target.getAttribute('data-form'));
    });

    $('#save').click(function (e) {
        e.preventDefault();
        var activeFormID = $('#activeFormID').attr('data-value');
        var form = $('#' + activeFormID);
        form.submit();
    });
      
    $('#reset').click(function (e) {
        e.preventDefault();
        var activeFormID = $('#activeFormID').attr('data-value');
        var form = $('#' + activeFormID);
        form[0].reset();
    });

  });

</script>

<!--script type="text/javascript">
    $(document).ready(function () {
        $('#save').click(function (e) {
            e.preventDefault();
            form.submit();
        });
        $('#reset').click(function (e) {
            e.preventDefault();
            form[0].reset();
        });
    });
</script-->
@endsection
