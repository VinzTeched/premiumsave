	@if($errors->any())
		@foreach($errors->all() as $error)
			<p class="alert alert-danger mr-4 ml-4 mt-4">{{ $error }}</p>
		@endforeach
	@endif
	
	@if (session()->has('message'))
		<p class="alert alert-success mr-4 ml-4 mt-5">{{ session('message') }}</p>	
	@endif

	@if (session()->has('conmessage'))
		<p class="alert alert-success mr-4 ml-4 mt-5">{{ session('conmessage') }}</p>	
		<script type="text/javascript">

		    toastr.success('Message sent successfully');
		    toastr.options.timeOut = 5000;
		    toastr.options.fadeOut = 4000;

		</script>
	@endif
	
	@if (session()->has('searched'))
		<p class="alert alert-primary mr-4 ml-4 mt-5">{{ session('searched') }}</p>	
	@endif
	
	@if (session()->has('wrong'))
		<p class="alert alert-danger mr-4 ml-4 mt-5">{{ session('wrong') }}</p>	
	@endif
	
	@if (session()->has('buys_message'))
		<span style="color:#373">{{ session('buys_message') }}	</span>
	@endif
	
	@if (session()->has('buy_message'))
		<p class="alert alert-success mr-4 ml-4 mt-5">{!! htmlspecialchars_decode(session('buy_message')) !!}</p>	
	@endif
	
	@if (session()->has('w_message'))
		<p class="alert alert-danger mr-4 ml-4 mt-5">{{ session('w_message') }}</p>	
	@endif
	
	
	@if (session()->has('p_message'))
		<div class="text-center">
			{{ session('p_message') }}
		</div>
	@endif