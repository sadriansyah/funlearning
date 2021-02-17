<!-- PROFILE HEADER -->
<div class="profile-header v2">
  <!-- PROFILE HEADER COVER -->
  <figure class="profile-header-cover liquid">
    <img src="{{URL::asset('img/cover/'.$kelas->cover_kelas)}}" alt="cover-29">
  </figure>
  <!-- /PROFILE HEADER COVER -->

  <!-- PROFILE HEADER INFO -->
  <div class="profile-header-info">
    <!-- USER SHORT DESCRIPTION -->
    <div class="user-short-description big">
      <!-- USER SHORT DESCRIPTION AVATAR -->
      <a class="user-short-description-avatar user-avatar big no-stats" >
        <!-- USER AVATAR BORDER -->
        <div class="user-avatar-border">
          <!-- HEXAGON -->
          <div class="hexagon-148-164"></div>
          <!-- /HEXAGON -->
        </div>
        <!-- /USER AVATAR BORDER -->

        <!-- USER AVATAR CONTENT -->
        <div class="user-avatar-content">
          <!-- HEXAGON -->
          <div class="hexagon-image-124-136" data-src="{{URL::asset('img/avatar/'.$kelas->profile_photo_path)}}"></div>
          <!-- /HEXAGON -->
        </div>
        <!-- /USER AVATAR CONTENT -->
      </a>
      <!-- /USER SHORT DESCRIPTION AVATAR -->

      <!-- USER SHORT DESCRIPTION AVATAR -->
      <a class="user-short-description-avatar user-short-description-avatar-mobile user-avatar medium no-stats" >
        <!-- USER AVATAR BORDER -->
        <div class="user-avatar-border">
          <!-- HEXAGON -->
          <div class="hexagon-120-130"></div>
          <!-- /HEXAGON -->
        </div>
        <!-- /USER AVATAR BORDER -->

        <!-- USER AVATAR CONTENT -->
        <div class="user-avatar-content">
          <!-- HEXAGON -->
          <div class="hexagon-image-100-110" data-src="{{URL::asset('img/avatar/24.jpg')}}"></div>
          <!-- /HEXAGON -->
        </div>
        <!-- /USER AVATAR CONTENT -->
      </a>
      <!-- /USER SHORT DESCRIPTION AVATAR -->

      <!-- USER SHORT DESCRIPTION TITLE -->
      <p class="user-short-description-title"><a href="{{url('/kelas/info/'.$kelas->id)}}">{{$kelas->nama_mk}}</a></p>
      <!-- /USER SHORT DESCRIPTION TITLE -->

      <!-- USER SHORT DESCRIPTION TEXT -->
      <p class="user-short-description-text">Kode Kelas : {{$kelas->kode_kelas}}</p>
      <!-- /USER SHORT DESCRIPTION TEXT -->
    </div>
    <!-- /USER SHORT DESCRIPTION -->

    <!-- USER STATS -->
    <div class="user-stats">
      <!-- USER STAT -->
      <div class="user-stat big">
        <!-- USER STAT ICON -->
        <div class="user-stat-icon">
          <!-- ICON PUBLIC -->
          <svg class="icon-public">
            <use xlink:href="#svg-public"></use>
          </svg>
          <!-- /ICON PUBLIC -->
        </div>
        <!-- /USER STAT ICON -->

        <!-- USER STAT TEXT -->
        <p class="user-stat-text">public</p>
        <!-- /USER STAT TEXT -->
      </div>
      <!-- /USER STAT -->

      <!-- USER STAT -->
      <div class="user-stat big">
        <!-- USER STAT TITLE -->
        <p class="user-stat-title">{{$totalmember}}</p>
        <!-- /USER STAT TITLE -->

        <!-- USER STAT TEXT -->
        <p class="user-stat-text">members</p>
        <!-- /USER STAT TEXT -->
      </div>
      <!-- /USER STAT -->

      <!-- USER STAT -->
      <div class="user-stat big">
        <!-- USER STAT TITLE -->
        <p class="user-stat-title">{{$totalposts}}</p>
        <!-- /USER STAT TITLE -->

        <!-- USER STAT TEXT -->
        <p class="user-stat-text">posts</p>
        <!-- /USER STAT TEXT -->
      </div>
      <!-- /USER STAT -->

    </div>
    <!-- /USER STATS -->

    <!-- TAG STICKER -->
    <div class="tag-sticker">
      <!-- TAG STICKER ICON -->
      <svg class="tag-sticker-icon icon-public">
        <use xlink:href="#svg-public"></use>
      </svg>
      <!-- /TAG STICKER ICON -->
    </div>
    <!-- /TAG STICKER -->

    <!-- PROFILE HEADER INFO ACTIONS -->
    <div class="profile-header-info-actions">
      @if(Auth::user()->hak_akses=="Dosen")
      <!-- PROFILE HEADER INFO ACTION -->
      <a class="profile-header-info-action button text-tooltip-tfr" data-title="settings" href="{{url('/kelas/settings/kelas/general/'.$kelas->id)}}">
        <!-- ICON MORE DOTS -->
        <svg class="icon-settings">
          <use xlink:href="#svg-settings"></use>
        </svg>
        <!-- /ICON MORE DOTS -->
      </a>
      <!-- /PROFILE HEADER INFO ACTION -->
      @endif
    </div>
    <!-- /PROFILE HEADER INFO ACTIONS -->
  </div>
  <!-- /PROFILE HEADER INFO -->
</div>
<!-- /PROFILE HEADER -->

<!-- SECTION NAVIGATION -->
<nav class="section-navigation">
  <!-- SECTION MENU -->
  <div id="section-navigation-medium-slider" class="section-menu secondary">
    <!-- SECTION MENU ITEM -->
    <a class="section-menu-item {{ Request::is('kelas/info/'.$kelas->id) ? 'active' : null }}" href="{{url('/kelas/info/'.$kelas->id)}}">
      <!-- SECTION MENU ITEM ICON -->
      <svg class="section-menu-item-icon icon-timeline">
        <use xlink:href="#svg-timeline"></use>
      </svg>
      <!-- /SECTION MENU ITEM ICON -->

      <!-- SECTION MENU ITEM TEXT -->
      <p class="section-menu-item-text">Timeline</p>
      <!-- /SECTION MENU ITEM TEXT -->
    </a>
    <!-- /SECTION MENU ITEM -->

    <!-- SECTION MENU ITEM -->
    <a class="section-menu-item {{ Request::is('kelas/member*') ? 'active' : null }}" href="{{url('/kelas/member/'.$kelas->id)}}">
      <!-- SECTION MENU ITEM ICON -->
      <svg class="section-menu-item-icon icon-members">
        <use xlink:href="#svg-members"></use>
      </svg>
      <!-- /SECTION MENU ITEM ICON -->

      <!-- SECTION MENU ITEM TEXT -->
      <p class="section-menu-item-text">Members</p>
      <!-- /SECTION MENU ITEM TEXT -->
    </a>
    <!-- /SECTION MENU ITEM -->

    <!-- SECTION MENU ITEM -->
    <a class="section-menu-item {{ Request::is('kelas/classwork*') ? 'active' : null }} {{ Request::is('*/tugas/*') ? 'active' : null }}" href="{{url('/kelas/classwork/'.$kelas->id)}}">
      <!-- SECTION MENU ITEM ICON -->
      <svg class="section-menu-item-icon icon-forum">
        <use xlink:href="#svg-forum"></use>
      </svg>
      <!-- /SECTION MENU ITEM ICON -->

      <!-- SECTION MENU ITEM TEXT -->
      <p class="section-menu-item-text">Tugas</p>
      <!-- /SECTION MENU ITEM TEXT -->
    </a>
    <!-- /SECTION MENU ITEM -->

    <!-- SECTION MENU ITEM -->
    <a class="section-menu-item {{ Request::is('kelas/challenge*') ? 'active' : null }}" href="{{url('/kelas/challenge/'.$kelas->id)}}">
      <!-- SECTION MENU ITEM ICON -->
      <svg class="section-menu-item-icon icon-events">
        <use xlink:href="#svg-events"></use>
      </svg>
      <!-- /SECTION MENU ITEM ICON -->

      <!-- SECTION MENU ITEM TEXT -->
      <p class="section-menu-item-text">Challenge</p>
      <!-- /SECTION MENU ITEM TEXT -->
    </a>
    <!-- /SECTION MENU ITEM -->
    <!-- SECTION MENU ITEM -->
    <a class="section-menu-item {{ Request::is('kelas/ujian*') ? 'active' : null }}" href="{{url('/kelas/ujian/'.$kelas->id)}}">
      <!-- SECTION MENU ITEM ICON -->
      <svg class="section-menu-item-icon icon-blog-posts">
            <use xlink:href="#svg-blog-posts"></use>
          </svg>
      <!-- /SECTION MENU ITEM ICON -->

      <!-- SECTION MENU ITEM TEXT -->
      <p class="section-menu-item-text">Ujian</p>
      <!-- /SECTION MENU ITEM TEXT -->
    </a>
    <!-- /SECTION MENU ITEM -->
    <!-- SECTION MENU ITEM -->
    <a class="section-menu-item {{ Request::is('kelas/rewards*') ? 'active' : null }}" href="{{url('/kelas/rewards/'.$kelas->id)}}">
      <!-- SECTION MENU ITEM ICON -->
      <svg class="section-menu-item-icon icon-badges">
            <use xlink:href="#svg-badges"></use>
          </svg>
      <!-- /SECTION MENU ITEM ICON -->

      <!-- SECTION MENU ITEM TEXT -->
      <p class="section-menu-item-text">Rewards</p>
      <!-- /SECTION MENU ITEM TEXT -->
    </a>
    <!-- /SECTION MENU ITEM -->


</div>
<!-- /SECTION MENU -->

  <!-- SLIDER CONTROLS -->
  <div id="section-navigation-medium-slider-controls" class="slider-controls">
    <!-- SLIDER CONTROL -->
    <div class="slider-control left">
      <!-- SLIDER CONTROL ICON -->
      <svg class="slider-control-icon icon-small-arrow">
        <use xlink:href="#svg-small-arrow"></use>
      </svg>
      <!-- /SLIDER CONTROL ICON -->
    </div>
    <!-- /SLIDER CONTROL -->

    <!-- SLIDER CONTROL -->
    <div class="slider-control right">
      <!-- SLIDER CONTROL ICON -->
      <svg class="slider-control-icon icon-small-arrow">
        <use xlink:href="#svg-small-arrow"></use>
      </svg>
      <!-- /SLIDER CONTROL ICON -->
    </div>
    <!-- /SLIDER CONTROL -->
  </div>
  <!-- /SLIDER CONTROLS -->
</nav>
<!-- /SECTION NAVIGATION -->
