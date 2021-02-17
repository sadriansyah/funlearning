@extends('layouts.app')
@section('title','Hasil Pencarian | FunLearning')

@section('content')
<div class="content-grid">
  <!-- GRID COLUMN -->
  <div class="account-hub-content">
    <!-- SECTION HEADER -->
    <div class="section-header">
      <!-- SECTION HEADER INFO -->
      <div class="section-header-info">
        <!-- SECTION PRETITLE -->
        <p class="section-pretitle">Pencarian</p>
        <!-- /SECTION PRETITLE -->

        <!-- SECTION TITLE -->
        <h2 class="section-title">Hasil <span class="highlighted"> Pencarian</span></h2>
        <!-- /SECTION TITLE -->
      </div>
      <!-- /SECTION HEADER INFO -->


    </div>
    <!-- /SECTION HEADER -->

    <!-- NOTIFICATION BOX LIST -->
    <div class="notification-box-list">
      @if($users)
      @foreach($users as $user)
      <!-- NOTIFICATION BOX -->
      <div class="notification-box">
        <!-- USER STATUS -->
        <div class="user-status request">
          <!-- USER STATUS AVATAR -->
          <a class="user-status-avatar" href="{{url('/profile?nama='.$user->nim_nip)}}">
            <!-- USER AVATAR -->
            <div class="user-avatar small no-outline">
              <!-- USER AVATAR CONTENT -->
              <div class="user-avatar-content">
                <!-- HEXAGON -->
                <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/'.$user->profile_photo_path)}}"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR CONTENT -->

              <!-- USER AVATAR PROGRESS -->
              <div class="user-avatar-progress">
                <!-- HEXAGON -->
                <div class="hexagon-progress-40-44"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR PROGRESS -->

              <!-- USER AVATAR PROGRESS BORDER -->
              <div class="user-avatar-progress-border">
                <!-- HEXAGON -->
                <div class="hexagon-border-40-44"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR PROGRESS BORDER -->

              <!-- USER AVATAR BADGE -->
              <div class="user-avatar-badge">
                <!-- USER AVATAR BADGE BORDER -->
                <div class="user-avatar-badge-border">
                  <!-- HEXAGON -->
                  <div class="hexagon-22-24"></div>
                  <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR BADGE BORDER -->

                <!-- USER AVATAR BADGE CONTENT -->
                <div class="user-avatar-badge-content">
                  <!-- HEXAGON -->
                  <div class="hexagon-dark-16-18"></div>
                  <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR BADGE CONTENT -->

                <!-- USER AVATAR BADGE TEXT -->
                <p class="user-avatar-badge-text">{{$user->level}}</p>
                <!-- /USER AVATAR BADGE TEXT -->
              </div>
              <!-- /USER AVATAR BADGE -->
            </div>
            <!-- /USER AVATAR -->
          </a>
          <!-- /USER STATUS AVATAR -->

          <!-- USER STATUS TITLE -->
          <p class="user-status-title"><a class="bold" href="{{url('/profile?nama='.$user->nim_nip)}}">{{$user->nama_user}}</a></p>
          <!-- /USER STATUS TITLE -->

          <!-- USER STATUS TEXT -->
          <p class="user-status-text small-space">{{$user->nim_nip}}</p>
          <!-- /USER STATUS TEXT -->

          <!-- ACTION REQUEST LIST -->
          <div class="action-request-list">
            <!-- ACTION REQUEST -->
            <a class="action-request accept with-text" href="{{url('/profile?nama='.$user->nim_nip)}}">


              <!-- ACTION REQUEST TEXT -->
              <span class="action-request-text">Lihat Profile</span>
              <!-- /ACTION REQUEST TEXT -->
            </a>
            <!-- /ACTION REQUEST -->


          </div>
          <!-- ACTION REQUEST LIST -->
        </div>
        <!-- /USER STATUS -->
      </div>
      <!-- /NOTIFICATION BOX -->
      @endforeach
      @else
      <!-- SECTION TITLE -->
      <h2 class="section-title">Keyword tidak ditemukan</h2>
      <!-- /SECTION TITLE -->
      @endif




    </div>
    <!-- /NOTIFICATION BOX LIST -->
  </div>
  <!-- /GRID COLUMN -->
</div>

@endsection
