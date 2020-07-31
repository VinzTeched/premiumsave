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
            <h5 class="m-0 text-dark">Referral</h5>
            <p class="main-color text-bold">People you referred.</p>
          </div><!-- /.col -->
          <div class="col-sm-6 invisible-md">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Referral</li>
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
        <div class="row">
          <div class="col-12 col-md-12">
        @include('inc.messages')
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <p>Invite Your Friends And Earn Money.</p>

                <p>You will be credited with a 10% bonus on every investment your referred friends make. There are no limits to this.</p>

                <h6>THE MORE YOUR FRIENDS INVEST, THE MORE REWARDS YOU RECEIVE.</h6>

                <h3>Steps to become a friend referree:</h3>
                <ol>
                    <li>Your friends click on your referral link.</li>
                    <li>Each of them fills the form and creates an account with the link.</li>
                    <li>The system permanently links them to you.</li>
                 </ol>
                 <h4>Your referral link</h4>
                <div class="alert" style="font-size:17px;background:#ddddde;"><a style="color:#4554cc" target="_blank" href="https://www.premiumsave.cash/register/referral/{{ Auth::user()->ref_no }}">https://www.premiumsave.cash/register/referral/{{ Auth::user()->ref_no }}</a></div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           <div class="card">
            <div class="card-header">
              <h3 class="card-title">LIST OF YOUR REFERRED USERS</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-1">
              <table id="example1" class="table table-bordered  table-striped">
                <thead class="btn-main">
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Level</th>
                  <th>Status</th>
                  <th>Registration Date</th>
                </tr>
                </thead>
                <tbody>
                  @forelse($myreferrals as $myreferral)
                  <tr>
                    <td>1</td>
                    <td>{{ $myreferral->name }}</td>
                    <td>Regular</td>
                    <td>@if($myreferral->status == 1) Active @else Inactive @endif</td>
                    <td>{{ $myreferral->created_at }}</td>
                  </tr>
                  @empty
                  <tr>No Referral Found</tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
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

@endsection
