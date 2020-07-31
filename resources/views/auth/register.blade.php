@extends('layouts.master')

@section('title')
    Premiumsave :: Registration Page
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center" style="padding: 5em 0">
        <div  class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <h2 class="sign_up">Register</h2>
            <p class="enter_personal">Please enter your personal information</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                @if(!empty($referral))
                <input type="hidden" name="upline" value="{{ $referral->ref_no }}">
                <input type="hidden" name="referral" value="{{ $referral->id }}">
                @else
                <input type="hidden" name="upline" value="6528735">
                
                @endif

                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control nine-height @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

          <style type="text/css">
            .PhoneNumberInput { position: relative; }
            #phone_prefix { position: absolute; left: 15px; top: 0px; color: #777; padding-right: 0px; width: 80px; height: 46px; }
            #phonenumber { position: relative; left: 0; top: 0; padding-left: 85px; }
          </style>
                        

          <div class="form-group row PhoneNumberInput">

          <div class="col-md-12">
            <input id="phonenumber" type="number" class="form-control nine-height @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber') }}" required autocomplete="phonenumber" placeholder="Phonenumber" >
            <select name="phone_prefix" class="form-control" id="phone_prefix">
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
              <option selected="" value="+234">+234</option>
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


                        @error('phonenumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control nine-height @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control nine-height" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    </div>
                </div>


               <div class="form-group">
                <label for="UserPrivacy">
                  <input type="checkbox" name="privacy" required="required" value="1" id="UserPrivacy">
                  <span class="checkb">&nbsp;</span>
                  <strong class="read_term">I’ve read, understood and agreed to the <a href="{{ route('privacy') }}" target="_blank" title="Privacy, Terms and Conditions">Privacy, Terms and Conditions</a></strong>
                </label>
              </div>
              
               <div class="form-group">
                <label for="letter">
                  <input type="checkbox" name="newsletter" value="1" id="letter">
                  <span class="checkb">&nbsp;</span>
                  <strong class="read_term">I would like to receive occasional e-mails with discounts and offers</strong>
                </label>
              </div>

              <div class="form-group row">
                <div class="col-md-2 col-md-offset-5">
                    <button type="submit" class="btn btn-blue">
                        {{ __('Register') }}
                    </button>
                </div>
               </div>

          <div class="clearfix"></div>
    
          <p class="text-center lost-acct"><a href="#" class="text-warning">Lost your password?</a> | <a href="{{ route('login') }}" class="text-warning">Already have an account?</a></p>

				
            </form>
        </div>
    </div>
</div>


@endsection
