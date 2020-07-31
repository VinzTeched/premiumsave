@extends('layouts.app')

@section('title')
    Premiumcash | Testimonies 
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
              <li class="breadcrumb-item active">Testimonies</li>
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

<style type="text/css">
    #my-orders .tsti {
        width: 85px;
        height: 85px;
        float: left;
        clear: right;
        margin: 0 35px 100px 0;
        padding-top: 1px;
    }
    #testText {
        margin: 0 0 10px;
        padding-right: 5px;
        padding-left: 5px;
        padding-top: 5px;
    }
    #my-orders .tsti img {
        width: 100%;
        border-radius: 50%;
    }
    .gm-home-testimonials div.tstm {
        color: #113a56;
        font-size: 14px;
        padding-left: 0;
        margin-top: 0px;
        margin-left: 120px;
        line-height: 20px;
        display: block;
    }
</style>

        <div class="row">
            @include('inc.messages')
            <legend><b>Please Post your testimony.</b></legend>
            <div class="col-sm-6 col-lg-6">
              <form class="form-horizontal" action="{{ route('testimony.store') }}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="username" value="{{ Auth::user()->name }}">
                  <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                  <input type="hidden" name="level" value="Regular">
                <div class="form-group form-group-textarea">
                  <label for="PageMessage">Narate your Testimony here</label>
                  <textarea name="text" class="form-control" placeholder="Start typing here..." onkeyup="countChar(this)" cols="30" rows="6" id="PageMessage" required="required"></textarea>
                  <p class="letter-counter"><span id="charNum">0</span> / 500</p>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-mainer" name="testify" id="sendMessageButton" style="margin-bottom: 50px;">Post this Testimony</button>
                </div>
              </form>
            </div>
          <div class="col-sm-6 col-lg-6">
            <p class="text-bold">Testimonies</p>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="tsti">
                  <img src="/images/iconbg.png" alt="Testimony by Edeh Maxwell" title="Testimony by Edeh Maxwell">
                </div>
                <p id="testText">Woah! It is a thing of joy to finally come across an investment dat actually works in dis country online. I doubted it a lot, but now I have been paid and can confirm dat it is legit. Thank u wazobia, for this concept. God bless and prosper u all.</p>
                  <div class="tstm">
                       <ul class="about-social"></ul>
                      <strong>Edeh Maxwell</strong><br>
                      <strong style="font-size: 18px; color: #f0ad4e;">Regular</strong>
                  </div>
              </div>
              <div class="carousel-item">
                <div class="tsti">
                  <img src="/images/iconbg.png" alt="Testimony by Umeh Evelyn" title="Testimony by Umeh Evelyn">
                </div>
                <p id="testText">God bless wazobia, it very sure investment in nigeria. At first I didn't believe but now am happy </p>
                  <div class="tstm">
                       <ul class="about-social"></ul>
                      <strong>Umeh Evelyn</strong><br>
                      <strong style="font-size: 18px; color: #f0ad4e;">Guilder</strong>
                  </div>
              </div>
              <div class="carousel-item">
                <div class="tsti">
                  <img src="/images/iconbg.png" alt="Testimony by Edeh Maxwell" title="Testimony by Edeh Maxwell">
                </div>
                <p id="testText">This a reliable, transparent, and fast platform. I just received my investment with interest.</p>
                  <div class="tstm">
                       <ul class="about-social"></ul>
                      <strong>Edeh Maxwell</strong><br>
                      <strong style="font-size: 18px; color: #f0ad4e;">Regular</strong>
                  </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
            <div class="card-header">
              <h3 class="card-title">List of all users payment</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-1">
              <table id="example1" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Testimony</th>
                  <th>Time Added</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
        @foreach($testimonies as $testimony)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $testimony->post }}</td>
            <td>{{ $testimony->created_at }}</td>
            <form id="delete-form-{{ $testimony->id }}" method="post" action="{{ route('testimony.destroy', $testimony->id) }}" style="display: none">
            {{ csrf_field() }}
              {{ method_field('DELETE') }}
            </form>
            <td><a href="" onclick="
                        if(
                          confirm('Are you sure, you want to remove this?')){
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $testimony->id }}').submit();
                            }else{
                              event.preventDefault();
                              }">
                              <i class="fa fa-times text-red"></i></a></td>
          </tr>
        @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Testimony</th>
                  <th>Time Added</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
  </section>
</div>

@endsection

@section('scripts')
<script>
  function countChar(val) {
        var len = val.value.length;
        if (len >= 501) {
            val.value = val.value.substring(0, 501);
        } else {
            $('#charNum').text(0 + len);
        }
    }
</script>
@endsection
