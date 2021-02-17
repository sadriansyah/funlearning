@extends('layouts.app')
@section('title','Profile Settings | Funlearning')
@section('content')

<!-- CONTENT GRID -->
<div class="content-grid">
  <!-- SECTION BANNER -->
  <div class="section-banner">
    <!-- SECTION BANNER ICON -->
    <img class="section-banner-icon" src="{{URL::asset('img/banner/accounthub-icon.png')}}" alt="accounthub-icon">
    <!-- /SECTION BANNER ICON -->

    <!-- SECTION BANNER TITLE -->
    <p class="section-banner-title">Setting Akun</p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">Profile info dan settings</p>
    <!-- /SECTION BANNER TEXT -->
  </div>
  <!-- /SECTION BANNER -->

  <!-- GRID -->
  <div class="grid grid-3-9 medium-space">
    <!-- GRID COLUMN -->
    <div class="account-hub-sidebar">
      <!-- SIDEBAR BOX -->
      <div class="sidebar-box no-padding">
        <!-- SIDEBAR MENU -->
        <div class="sidebar-menu">


          <!-- SIDEBAR MENU ITEM -->
          <div class="sidebar-menu-item">
            <!-- SIDEBAR MENU HEADER -->
            <div class="sidebar-menu-header accordion-trigger-linked">
              <!-- SIDEBAR MENU HEADER ICON -->
              <svg class="sidebar-menu-header-icon icon-settings">
                <use xlink:href="#svg-settings"></use>
              </svg>
              <!-- /SIDEBAR MENU HEADER ICON -->

              <!-- SIDEBAR MENU HEADER CONTROL ICON -->
              <div class="sidebar-menu-header-control-icon">
                <!-- SIDEBAR MENU HEADER CONTROL ICON OPEN -->
                <svg class="sidebar-menu-header-control-icon-open icon-minus-small">
                  <use xlink:href="#svg-minus-small"></use>
                </svg>
                <!-- /SIDEBAR MENU HEADER CONTROL ICON OPEN -->

                <!-- SIDEBAR MENU HEADER CONTROL ICON CLOSED -->
                <svg class="sidebar-menu-header-control-icon-closed icon-plus-small">
                  <use xlink:href="#svg-plus-small"></use>
                </svg>
                <!-- /SIDEBAR MENU HEADER CONTROL ICON CLOSED -->
              </div>
              <!-- /SIDEBAR MENU HEADER CONTROL ICON -->

              <!-- SIDEBAR MENU HEADER TITLE -->
              <p class="sidebar-menu-header-title">Account</p>
              <!-- /SIDEBAR MENU HEADER TITLE -->

              <!-- SIDEBAR MENU HEADER TEXT -->
              <p class="sidebar-menu-header-text">Change settings, configure account, and change your information</p>
              <!-- /SIDEBAR MENU HEADER TEXT -->
            </div>
            <!-- /SIDEBAR MENU HEADER -->

            <!-- SIDEBAR MENU BODY -->
            <div class="sidebar-menu-body accordion-content-linked accordion-open">
              <!-- SIDEBAR MENU LINK -->
              <a class="sidebar-menu-link " href="{{url('/myprofile')}}">Account Info</a>
              <!-- /SIDEBAR MENU LINK -->

              <!-- SIDEBAR MENU LINK -->
              <a class="sidebar-menu-link active" href="{{url('/myprofile/gantipassword')}}">Change Password</a>
              <!-- /SIDEBAR MENU LINK -->


            </div>
            <!-- /SIDEBAR MENU BODY -->
          </div>
          <!-- /SIDEBAR MENU ITEM -->


        </div>
        <!-- /SIDEBAR MENU -->


      </div>
      <!-- /SIDEBAR BOX -->
    </div>
    <!-- /GRID COLUMN -->

    <!-- GRID COLUMN -->
    <div class="account-hub-content">
      <!-- SECTION HEADER -->
      <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
          <!-- SECTION PRETITLE -->
          <p class="section-pretitle">Account</p>
          <!-- /SECTION PRETITLE -->

          <!-- SECTION TITLE -->
          <h2 class="section-title">Account Info</h2>
          <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->
      </div>
      <!-- /SECTION HEADER -->

              <!-- GRID COLUMN -->
              <div class="grid-column">
                <!-- WIDGET BOX -->
                <div class="widget-box">
                  @if(session('sukses'))
                  <p class="widget-box-title text-success">{{session('sukses')}}</p>
                  @elseif(session('fail'))
                  <p class="widget-box-title text-danger">{{session('sukses')}}</p>
                  @endif

                  <!-- WIDGET BOX CONTENT -->
                  <div class="widget-box-content">
                    <!-- FORM -->
                    <form class="form" action="{{ url('/gantipassword') }}" method="post">
                      @csrf

                      <!-- FORM ROW -->
                      <div class="form-row split">
                        <!-- FORM ITEM -->
                        <div class="form-item">
                          <!-- FORM INPUT -->
                          <div class="form-input small">
                            <label for="account-new-password">Your New Password</label>
                            <input type="password" id="newpass" name="password">
                          </div>
                          <!-- /FORM INPUT -->
                        </div>
                        <!-- /FORM ITEM -->

                        <!-- FORM ITEM -->
                        <div class="form-item">
                          <!-- FORM INPUT -->
                          <div class="form-input small">
                            <label for="account-new-password-confirm">Confirm New Password</label>
                            <input type="password" id="confirmpass" name="password_confirmation" onkeyup="cek()">
                            <p class="small text-danger" id="wrong"></p>
                          </div>
                          <!-- /FORM INPUT -->
                        </div>
                        <!-- /FORM ITEM -->
                      </div>
                      <!-- /FORM ROW -->

                      <!-- FORM ROW -->
                      <div class="form-row split">


                        <!-- FORM ITEM -->
                        <div class="form-item">
                          <!-- BUTTON -->
                          <button class="button full primary"  id="change">Change Password Now!</button>
                          <!-- /BUTTON -->
                        </div>
                        <!-- /FORM ITEM -->
                      </div>
                      <!-- /FORM ROW -->
                    </form>
                    <!-- /FORM -->
                  </div>
                  <!-- WIDGET BOX CONTENT -->
                </div>
                <!-- /WIDGET BOX -->
              </div>
              <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID COLUMN -->
  </div>
  <!-- /GRID -->
</div>
<!-- /CONTENT GRID -->
@endsection

@section('scripting')
<script type="text/javascript">
  function cek(){
    var newpass = document.getElementById("newpass").value;
    var confirm = document.getElementById("confirmpass").value;
    if(confirm != newpass){
      document.getElementById("wrong").removeAttribute("class");
      document.getElementById("wrong").setAttribute("class","small text-danger");
      document.getElementById("wrong").innerHTML = "Kata sandi tidak sama!";
      document.getElementById("change").setAttribute("disabled","true");
    }else {
      document.getElementById("wrong").removeAttribute("class");
      document.getElementById("wrong").setAttribute("class","small text-success");
      document.getElementById("wrong").innerHTML = "Kata sandi cocok!";
      document.getElementById("change").removeAttribute("disabled");
    }
  }
</script>
@endsection
