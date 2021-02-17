@extends('layouts.app')
@section('title','Profile Settings | Funlearning')
@section('content')
@foreach($users as $user)
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
              <a class="sidebar-menu-link active" href="{{url('/myprofile')}}">Account Info</a>
              <!-- /SIDEBAR MENU LINK -->

              <!-- SIDEBAR MENU LINK -->
              <a class="sidebar-menu-link" href="{{url('/myprofile/gantipassword')}}">Change Password</a>
              <!-- /SIDEBAR MENU LINK -->


            </div>
            <!-- /SIDEBAR MENU BODY -->
          </div>
          <!-- /SIDEBAR MENU ITEM -->


        </div>
        <!-- /SIDEBAR MENU -->

        <!-- SIDEBAR BOX FOOTER -->
        <div class="sidebar-box-footer">
          <!-- BUTTON -->
          <p class="button primary" onclick="document.getElementById('form-save').submit()" >Save Changes!</p>
          <!-- /BUTTON -->

        </div>
        <!-- /SIDEBAR BOX FOOTER -->
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
        <!-- GRID -->
        <div class="grid grid-3-3-3 centered">
          <!-- USER PREVIEW -->
          <div class="user-preview small fixed-height">
            <!-- USER PREVIEW COVER -->
            <figure class="user-preview-cover liquid">
              <img src="img/cover/01.jpg" alt="cover-01">
            </figure>
            <!-- /USER PREVIEW COVER -->

            <!-- USER PREVIEW INFO -->
            <div class="user-preview-info">
              <!-- USER SHORT DESCRIPTION -->
              <div class="user-short-description small">
                <!-- USER SHORT DESCRIPTION AVATAR -->
                <div class="user-short-description-avatar user-avatar">
                  <!-- USER AVATAR BORDER -->
                  <div class="user-avatar-border">
                    <!-- HEXAGON -->
                    <div class="hexagon-100-110"></div>
                    <!-- /HEXAGON -->
                  </div>
                  <!-- /USER AVATAR BORDER -->

                  <!-- USER AVATAR CONTENT -->
                  <div class="user-avatar-content">
                    @if($user->profile_photo_path == "")
                    <!-- HEXAGON -->
                    <div class="hexagon-image-68-74" data-src="{{URL::asset('img/avatar/user.jpg')}}"></div>
                    <!-- /HEXAGON -->
                    @else
                    <!-- HEXAGON -->
                    <div class="hexagon-image-68-74" data-src="{{URL::asset('img/avatar/'.$user->profile_photo_path)}}"></div>
                    <!-- /HEXAGON -->
                    @endif
                  </div>
                  <!-- /USER AVATAR CONTENT -->

                  <!-- USER AVATAR PROGRESS -->
                  <div class="user-avatar-progress">
                    <!-- HEXAGON -->
                    <div class="hexagon-progress-84-92"></div>
                    <!-- /HEXAGON -->
                  </div>
                  <!-- /USER AVATAR PROGRESS -->

                  <!-- USER AVATAR PROGRESS BORDER -->
                  <div class="user-avatar-progress-border">
                    <!-- HEXAGON -->
                    <div class="hexagon-border-84-92"></div>
                    <!-- /HEXAGON -->
                  </div>
                  <!-- /USER AVATAR PROGRESS BORDER -->

                  <!-- USER AVATAR BADGE -->
                  <div class="user-avatar-badge">
                    <!-- USER AVATAR BADGE BORDER -->
                    <div class="user-avatar-badge-border">
                      <!-- HEXAGON -->
                      <div class="hexagon-28-32"></div>
                      <!-- /HEXAGON -->
                    </div>
                    <!-- /USER AVATAR BADGE BORDER -->

                    <!-- USER AVATAR BADGE CONTENT -->
                    <div class="user-avatar-badge-content">
                      <!-- HEXAGON -->
                      <div class="hexagon-dark-22-24"></div>
                      <!-- /HEXAGON -->
                    </div>
                    <!-- /USER AVATAR BADGE CONTENT -->

                    <!-- USER AVATAR BADGE TEXT -->
                    <p class="user-avatar-badge-text">{{$user->level}}</p>
                    <!-- /USER AVATAR BADGE TEXT -->
                  </div>
                  <!-- /USER AVATAR BADGE -->
                </div>
                <!-- /USER SHORT DESCRIPTION AVATAR -->
              </div>
              <!-- /USER SHORT DESCRIPTION -->
            </div>
            <!-- /USER PREVIEW INFO -->
          </div>
          <!-- /USER PREVIEW -->

          <!-- UPLOAD BOX -->
          <label class="upload-box" for="file">
            <!-- UPLOAD BOX ICON -->
            <svg class="upload-box-icon icon-members">
              <use xlink:href="#svg-members"></use>
            </svg>
            <!-- /UPLOAD BOX ICON -->

            <!-- UPLOAD BOX TITLE -->
            <p class="upload-box-title">Change Avatar</p>
            <!-- /UPLOAD BOX TITLE -->

            <!-- UPLOAD BOX TEXT -->
            <p class="upload-box-text">110x110px size minimum</p>
            <!-- /UPLOAD BOX TEXT -->
          </label>
          <!-- /UPLOAD BOX -->


        </div>
        <!-- /GRID -->

        <!-- WIDGET BOX -->
        <div class="widget-box">
          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">Personal Info</p>
          <!-- /WIDGET BOX TITLE -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- FORM -->
            <form class="form" action="{{url('/saveprofile')}}" method="post" id="form-save" enctype="multipart/form-data">
              @csrf
              <input type="file" name="photo" id="file" style="display:none" accept="image/*">
              <!-- FORM ROW -->
              <div class="form-row split">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM INPUT -->
                  <div class="form-input small active">
                    <label for="account-full-name">Nama </label>
                    <input type="text" id="account-full-name" name="nama_user" value="{{$user->nama_user}}" >
                  </div>
                  <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->

                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM INPUT -->
                  <div class="form-input small active">
                    <label for="account-email">Email</label>
                    <input type="text" id="account-email" name="dispemail" value="{{$user->email}}" disabled>
                    <input type="hidden" name="email" value="{{$user->email}}">
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
                  <!-- FORM INPUT -->
                  <div class="form-input small active">
                    <label for="account-url-username">NIM/NIP</label>
                    <input type="text" id="account-url-username" name="nim_nip" value="{{$user->displaynim}}" disabled>
                    <input type="hidden" name="nim_nip" value="{{$user->displaynim}}">
                  </div>
                  <!-- /FORM INPUT -->
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
@endforeach

@endsection
