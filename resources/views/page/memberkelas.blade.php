@extends('layouts.app')
@section('title','Member Kelas | FunLearning')

@section('content')

<!-- CONTENT GRID -->
<div class="content-grid">
  @foreach($kelas as $kelas)
  <!-- PROFILE HEADER -->
  @include('page.headerkelas')
  <!-- /PROFILE HEADER -->

  @endforeach

  <!-- SECTION -->
  <section class="section">
    <!-- SECTION HEADER -->
    <div class="section-header">
      <!-- SECTION HEADER INFO -->
      <div class="section-header-info">
        <!-- SECTION PRETITLE -->
        <p class="section-pretitle">Member Kelas</p>
        <!-- /SECTION PRETITLE -->

        <!-- SECTION TITLE -->
        <h2 class="section-title">Members <span class="highlighted">{{count($member)}}</span></h2>
        <!-- /SECTION TITLE -->
      </div>
      <!-- /SECTION HEADER INFO -->
    </div>
    <!-- /SECTION HEADER -->

    <!-- SECTION FILTERS BAR -->
    <div class="section-filters-bar v1">
      <!-- SECTION FILTERS BAR ACTIONS -->
      <div class="section-filters-bar-actions">
        <!-- FORM -->
        <form class="form" method="get">
          <!-- FORM INPUT -->
          <div class="form-input small with-button">
            <label for="friends-search">Search Member by name or nim</label>
            <input type="text" id="friends-search" name="cari">
            <!-- BUTTON -->
            <button class="button primary">
              <!-- ICON MAGNIFYING GLASS -->
              <svg class="icon-magnifying-glass">
                <use xlink:href="#svg-magnifying-glass"></use>
              </svg>
              <!-- /ICON MAGNIFYING GLASS -->
            </button>
            <!-- /BUTTON -->
          </div>
          <!-- /FORM INPUT -->


        </form>
        <!-- /FORM -->


      </div>
      <!-- /SECTION FILTERS BAR ACTIONS -->


    </div>
    <!-- /SECTION FILTERS BAR -->

    <!-- GRID -->
    <div class="grid">
      @foreach($member as $member)
      <!-- USER PREVIEW -->
      <div class="user-preview landscape">
        <!-- USER PREVIEW COVER -->
        <figure class="user-preview-cover liquid">
          <img src="{{URL::asset('img/cover/04.jpg')}}" alt="cover-04">
        </figure>
        <!-- /USER PREVIEW COVER -->

        <!-- USER PREVIEW INFO -->
        <div class="user-preview-info">
          <!-- USER SHORT DESCRIPTION -->
          <div class="user-short-description landscape tiny">
            <!-- USER SHORT DESCRIPTION AVATAR -->
            <a class="user-short-description-avatar user-avatar small" >
              <!-- USER AVATAR BORDER -->
              <div class="user-avatar-border">
                <!-- HEXAGON -->
                <div class="hexagon-50-56"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR BORDER -->

              <!-- USER AVATAR CONTENT -->
              <div class="user-avatar-content">
                <!-- HEXAGON -->
                <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/'.$member->profile_photo_path)}}"></div>
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
                <p class="user-avatar-badge-text">{{$member->level}}</p>
                <!-- /USER AVATAR BADGE TEXT -->
              </div>
              <!-- /USER AVATAR BADGE -->
            </a>
            <!-- /USER SHORT DESCRIPTION AVATAR -->

            <!-- USER SHORT DESCRIPTION TITLE -->
            <p class="user-short-description-title"><a href="{{url('/profile?nama='.$member->nama_user)}}" >{{$member->nama_user}}</a></p>
            <!-- /USER SHORT DESCRIPTION TITLE -->

            <!-- USER SHORT DESCRIPTION TEXT -->
            <p class="user-short-description-text"><a >{{$member->nim_nip}}</a></p>
            <!-- /USER SHORT DESCRIPTION TEXT -->
          </div>
          <!-- /USER SHORT DESCRIPTION -->


          <!-- USER STATS -->
          <div class="user-stats">
            <!-- USER STAT -->
            <div class="user-stat">
              <!-- USER STAT TITLE -->
              <p class="user-stat-title">{{$member->poin}}</p>
              <!-- /USER STAT TITLE -->

              <!-- USER STAT TEXT -->
              <p class="user-stat-text">Poin</p>
              <!-- /USER STAT TEXT -->
            </div>
            |
            <!-- /USER STAT -->
            <!-- SOCIAL LINK -->
            <a class="social-link small instagram text-tooltip-tft-medium" data-title="Email:{{$member->email}}" >
              <!-- SOCIAL LINK ICON -->
              <svg class="social-link-icon icon-messages">
                <use xlink:href="#svg-messages"></use>
              </svg>
              <!-- /SOCIAL LINK ICON -->
            </a>
            <!-- /SOCIAL LINK -->
          </div>
          <!-- /USER STATS -->



        </div>
        <!-- /USER PREVIEW INFO -->
      </div>
      <!-- /USER PREVIEW -->
      @endforeach



    </div>
    <!-- /GRID -->

  </section>
  <!-- /SECTION -->
</div>
<!-- /CONTENT GRID -->

@endsection
