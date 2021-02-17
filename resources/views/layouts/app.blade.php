<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- bootstrap 4.3.1 -->
  <link rel="stylesheet" href="{{URL::asset('css/vendor/bootstrap.min.css')}}">
  <!-- styles -->
  <link rel="stylesheet" href="{{URL::asset('css/styles.min.css')}}">
  <!-- simplebar styles -->
  <link rel="stylesheet" href="{{URL::asset('css/vendor/simplebar.css')}}">
  <!-- tiny-slider styles -->
  <link rel="stylesheet" href="{{URL::asset('css/vendor/tiny-slider.css')}}">

  <!-- favicon -->
  <link rel="icon" href="{{URL::asset('img/funlearninglogo.png')}}">
  <title>@yield('title')</title>

</head>
<body>
  <!-- NAVIGATION WIDGET -->
  <nav id="navigation-widget-small" class="navigation-widget navigation-widget-desktop closed sidebar left delayed">
    <!-- USER AVATAR -->
    <a class="user-avatar small no-outline online" >
      <!-- USER AVATAR CONTENT -->
      <div class="user-avatar-content">
        <!-- HEXAGON -->
        <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/'.Auth::user()->profile_photo_path)}}"></div>
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
        <p class="user-avatar-badge-text">{{Auth::user()->level}}</p>
        <!-- /USER AVATAR BADGE TEXT -->
      </div>
      <!-- /USER AVATAR BADGE -->
    </a>
    <!-- /USER AVATAR -->

    <!-- MENU -->
    <ul class="menu small">
      @if(Auth::user()->hak_akses=="Admin")
      <li class="menu-item active">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link text-tooltip-tfr" href="{{url('/admin')}}" data-title="Users" style="position: relative;">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-members">
            <use xlink:href="#svg-members"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
        <div class="xm-tooltip" style="white-space: nowrap; position: absolute; z-index: 99999; right: -81px; top: 50%; margin-top: -12px; opacity: 0; visibility: hidden; transform: translate(10px, 0px); transition: all 0.3s ease-in-out 0s;"><p class="xm-tooltip-text">Members</p></div></a>
        <!-- /MENU ITEM LINK -->
      </li>
      @else
      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('dashboard*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link text-tooltip-tfr" href="{{url('/dashboard')}}" data-title="Beranda">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-newsfeed">
            <use xlink:href="#svg-newsfeed"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->
      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('kelas*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link text-tooltip-tfr" href="{{url('/kelas')}}" data-title="Kelas">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-group">
            <use xlink:href="#svg-group"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->
      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('challenge*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link text-tooltip-tfr" href="{{url('/challenge')}}" data-title="Challenge">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-quests">
            <use xlink:href="#svg-quests"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->
      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('rewards*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link text-tooltip-tfr" href="{{url('/rewards')}}" data-title="Reward">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-badges">
            <use xlink:href="#svg-badges"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->
      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('leaderboard*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link text-tooltip-tfr" href="{{url('/leaderboard')}}" data-title="Leaderboard">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-overview">
            <use xlink:href="#svg-overview"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->
      @endif

    </ul>
    <!-- /MENU -->
  </nav>
  <!-- /NAVIGATION WIDGET -->

  <!-- NAVIGATION WIDGET -->
  <nav id="navigation-widget" class="navigation-widget navigation-widget-desktop sidebar left hidden" data-simplebar>
    <!-- NAVIGATION WIDGET COVER -->
    <figure class="navigation-widget-cover liquid">
      <img src="{{URL::asset('img/cover/01.jpg')}}" alt="cover-01">
    </figure>
    <!-- /NAVIGATION WIDGET COVER -->

    <!-- USER SHORT DESCRIPTION -->
    <div class="user-short-description">
      <!-- USER SHORT DESCRIPTION AVATAR -->
      <a class="user-short-description-avatar user-avatar medium" >
        <!-- USER AVATAR BORDER -->
        <div class="user-avatar-border">
          <!-- HEXAGON -->
          <div class="hexagon-120-132"></div>
          <!-- /HEXAGON -->
        </div>
        <!-- /USER AVATAR BORDER -->

        <!-- USER AVATAR CONTENT -->
        <div class="user-avatar-content">
          <!-- HEXAGON -->
          <div class="hexagon-image-82-90" data-src="{{URL::asset('img/avatar/'.Auth::user()->profile_photo_path)}}"></div>
          <!-- /HEXAGON -->
        </div>
        <!-- /USER AVATAR CONTENT -->

        <!-- USER AVATAR PROGRESS -->
        <div class="user-avatar-progress">
          <!-- HEXAGON -->
          <div class="hexagon-progress-100-110"></div>
          <!-- /HEXAGON -->
        </div>
        <!-- /USER AVATAR PROGRESS -->

        <!-- USER AVATAR PROGRESS BORDER -->
        <div class="user-avatar-progress-border">
          <!-- HEXAGON -->
          <div class="hexagon-border-100-110"></div>
          <!-- /HEXAGON -->
        </div>
        <!-- /USER AVATAR PROGRESS BORDER -->

        <!-- USER AVATAR BADGE -->
        <div class="user-avatar-badge">
          <!-- USER AVATAR BADGE BORDER -->
          <div class="user-avatar-badge-border">
            <!-- HEXAGON -->
            <div class="hexagon-32-36"></div>
            <!-- /HEXAGON -->
          </div>
          <!-- /USER AVATAR BADGE BORDER -->

          <!-- USER AVATAR BADGE CONTENT -->
          <div class="user-avatar-badge-content">
            <!-- HEXAGON -->
            <div class="hexagon-dark-26-28"></div>
            <!-- /HEXAGON -->
          </div>
          <!-- /USER AVATAR BADGE CONTENT -->

          <!-- USER AVATAR BADGE TEXT -->
          <p class="user-avatar-badge-text">{{Auth::user()->level}}</p>
          <!-- /USER AVATAR BADGE TEXT -->
        </div>
        <!-- /USER AVATAR BADGE -->
      </a>
      <!-- /USER SHORT DESCRIPTION AVATAR -->

      <!-- USER SHORT DESCRIPTION TITLE -->
      <p class="user-short-description-title"><a >{{Auth::user()->nama_user}}</a></p>
      <!-- /USER SHORT DESCRIPTION TITLE -->

      <!-- USER SHORT DESCRIPTION TEXT -->
      <p class="user-short-description-text"><a href="{{url('/profile')}}">Lihat Profil</a></p>
      <!-- /USER SHORT DESCRIPTION TEXT -->
    </div>
    <!-- /USER SHORT DESCRIPTION -->


    <!-- USER STATS -->
    <div class="user-stats">
      <!-- USER STAT -->
      <div class="user-stat">
        <!-- USER STAT TITLE -->
        <p class="user-stat-title">{{Auth::user()->level}}</p>
        <!-- /USER STAT TITLE -->

        <!-- USER STAT TEXT -->
        <p class="user-stat-text">Level</p>
        <!-- /USER STAT TEXT -->
      </div>
      <!-- /USER STAT -->

      <!-- USER STAT -->
      <div class="user-stat">
        <!-- USER STAT TITLE -->
        <p class="user-stat-title">{{Auth::user()->nim_nip}}</p>
        <!-- /USER STAT TITLE -->

        <!-- USER STAT TEXT -->
        <p class="user-stat-text">NIM/NIP</p>
        <!-- /USER STAT TEXT -->
      </div>
      <!-- /USER STAT -->


    </div>
    <!-- /USER STATS -->

    <!-- MENU -->
    <ul class="menu">
      @if(Auth::user()->hak_akses=='Admin')

      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('admin*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="{{url('/admin')}}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-members">
            <use xlink:href="#svg-members"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Users
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->
      @else
      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('dashboard*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="{{url('/dashboard')}}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-newsfeed">
            <use xlink:href="#svg-newsfeed"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Beranda
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('kelas*') ? 'active' : null }}" >
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="{{url('/kelas')}}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-overview">
            <use xlink:href="#svg-group"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Kelas
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('challenge*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="{{url('/challenge')}}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-group">
            <use xlink:href="#svg-quests"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Challenge
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('rewards*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="{{url('/rewards')}}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-members">
            <use xlink:href="#svg-badges"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Reward
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('leaderboard*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="{{url('/leaderboard')}}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-badges">
            <use xlink:href="#svg-overview"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Leaderboard
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->
      @endif



    </ul>
    <!-- /MENU -->
  </nav>
  <!-- /NAVIGATION WIDGET -->

  <!-- NAVIGATION WIDGET -->
  <nav id="navigation-widget-mobile" class="navigation-widget navigation-widget-mobile sidebar left hidden" data-simplebar>
    <!-- NAVIGATION WIDGET CLOSE BUTTON -->
    <div class="navigation-widget-close-button">
      <!-- NAVIGATION WIDGET CLOSE BUTTON ICON -->
      <svg class="navigation-widget-close-button-icon icon-back-arrow">
        <use xlink:href="#svg-back-arrow"></use>
      </svg>
      <!-- NAVIGATION WIDGET CLOSE BUTTON ICON -->
    </div>
    <!-- /NAVIGATION WIDGET CLOSE BUTTON -->

    <!-- NAVIGATION WIDGET INFO WRAP -->
    <div class="navigation-widget-info-wrap">
      <!-- NAVIGATION WIDGET INFO -->
      <div class="navigation-widget-info">
        <!-- USER AVATAR -->
        <a class="user-avatar small no-outline" href="#">
          <!-- USER AVATAR CONTENT -->
          <div class="user-avatar-content">
            <!-- HEXAGON -->
            <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/'.Auth::user()->profile_photo_path)}}"></div>
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
            <p class="user-avatar-badge-text">{{Auth::user()->level}}</p>
            <!-- /USER AVATAR BADGE TEXT -->
          </div>
          <!-- /USER AVATAR BADGE -->
        </a>
        <!-- /USER AVATAR -->

        <!-- NAVIGATION WIDGET INFO TITLE -->
        <p class="navigation-widget-info-title"><a href="{{url('/profile')}}">{{Auth::user()->nama_user}}</a></p>
        <!-- /NAVIGATION WIDGET INFO TITLE -->

        <!-- NAVIGATION WIDGET INFO TEXT -->
        <p class="navigation-widget-info-text">{{Auth::user()->nim_nip}}</p>
        <!-- /NAVIGATION WIDGET INFO TEXT -->
      </div>
      <!-- /NAVIGATION WIDGET INFO -->

      <!-- NAVIGATION WIDGET BUTTON -->
      <form  action="{{route('logout')}}" method="post">
      <p class="navigation-widget-info-button button small secondary" onclick="event.preventDefault();
                  this.closest('form').submit();">Logout</p>
    </form>
      <!-- /NAVIGATION WIDGET BUTTON -->
    </div>
    <!-- /NAVIGATION WIDGET INFO WRAP -->

    <!-- NAVIGATION WIDGET SECTION TITLE -->
    <p class="navigation-widget-section-title">Sections</p>
    <!-- /NAVIGATION WIDGET SECTION TITLE -->

    <!-- MENU -->
    <ul class="menu">
      @if(Auth::user()->hak_akses=="Admin")

      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('admin*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="{{url('/admin')}}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-members">
            <use xlink:href="#svg-members"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Users
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->
      @else
      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('dashboard*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="{{url('/dashboard')}}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-newsfeed">
            <use xlink:href="#svg-newsfeed"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Beranda
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('kelas*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="{{url('/kelas')}}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-overview">
            <use xlink:href="#svg-group"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Kelas
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('challenge*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="{{url('/challenge')}}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-group">
            <use xlink:href="#svg-quests"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Challenge
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('rewards*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="{{url('/rewards')}}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-members">
            <use xlink:href="#svg-badges"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Reward
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

      <!-- MENU ITEM -->
      <li class="menu-item {{ Request::is('leaderboard*') ? 'active' : null }}">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="{{url('/leaderboard')}}">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-badges">
            <use xlink:href="#svg-overview"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Leaderboard
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->
      @endif



    </ul>
    <!-- /MENU -->

    <!-- NAVIGATION WIDGET SECTION TITLE -->
    <p class="navigation-widget-section-title" >My Profile</p>
    <!-- /NAVIGATION WIDGET SECTION TITLE -->

    <!-- NAVIGATION WIDGET SECTION LINK -->
    <a class="navigation-widget-section-link" onclick="window.location.href='{{url('/myprofile')}}'">Profile Info</a>
    <!-- /NAVIGATION WIDGET SECTION LINK -->



  </nav>
  <!-- /NAVIGATION WIDGET -->

  <!-- HEADER -->
  <header class="header">
    <!-- HEADER ACTIONS -->
    <div class="header-actions">
      <!-- HEADER BRAND -->
      <div class="header-brand">
        <!-- LOGO -->
        <div class="logo">
          <!-- ICON LOGO VIKINGER -->
          <div class="icon-logo-vikinger small">
            <img src="{{URL::asset('/img/funlearninglogo.png')}}" style="width:40px" alt="Funlearning">
          </div>
          <!-- /ICON LOGO VIKINGER -->
        </div>
        <!-- /LOGO -->

        <!-- HEADER BRAND TEXT -->
        <h1 class="header-brand-text">Funlearning</h1>
        <!-- /HEADER BRAND TEXT -->
      </div>
      <!-- /HEADER BRAND -->
    </div>
    <!-- /HEADER ACTIONS -->

    <!-- HEADER ACTIONS -->
    <div class="header-actions">
      <!-- SIDEMENU TRIGGER -->
      <div class="sidemenu-trigger navigation-widget-trigger">
        <!-- ICON GRID -->
        <svg class="icon-grid">
          <use xlink:href="#svg-grid"></use>
        </svg>
        <!-- /ICON GRID -->
      </div>
      <!-- /SIDEMENU TRIGGER -->

      <!-- MOBILEMENU TRIGGER -->
      <div class="mobilemenu-trigger navigation-widget-mobile-trigger">
        <!-- BURGER ICON -->
        <div class="burger-icon inverted">
          <!-- BURGER ICON BAR -->
          <div class="burger-icon-bar"></div>
          <!-- /BURGER ICON BAR -->

          <!-- BURGER ICON BAR -->
          <div class="burger-icon-bar"></div>
          <!-- /BURGER ICON BAR -->

          <!-- BURGER ICON BAR -->
          <div class="burger-icon-bar"></div>
          <!-- /BURGER ICON BAR -->
        </div>
        <!-- /BURGER ICON -->
      </div>
      <!-- /MOBILEMENU TRIGGER -->

      <!-- NAVIGATION -->
      <nav class="navigation">
        <!-- MENU MAIN -->
        <ul class="menu-main">
          <!-- MENU MAIN ITEM -->
          <li class="menu-main-item">
            <!-- MENU MAIN ITEM LINK -->
            <a class="menu-main-item-link" href="{{url('/dashboard')}}">Beranda</a>
            <!-- /MENU MAIN ITEM LINK -->
          </li>
          <!-- /MENU MAIN ITEM -->

          <!-- MENU MAIN ITEM -->
          <li class="menu-main-item">
            <!-- MENU MAIN ITEM LINK -->
            <a class="menu-main-item-link" href="{{url('/kelas')}}">Kelas</a>
            <!-- /MENU MAIN ITEM LINK -->
          </li>
          <!-- /MENU MAIN ITEM -->

          <!-- MENU MAIN ITEM -->
          <li class="menu-main-item">
            <!-- MENU MAIN ITEM LINK -->
            <a class="menu-main-item-link" href="{{url('/leaderboard')}}">Leaderboard</a>
            <!-- /MENU MAIN ITEM LINK -->
          </li>
          <!-- /MENU MAIN ITEM -->


        </ul>
        <!-- /MENU MAIN -->
      </nav>
      <!-- /NAVIGATION -->
    </div>
    <!-- /HEADER ACTIONS -->

    <!-- HEADER ACTIONS -->
    <div class="header-actions search-bar">
      <form  action="{{url('/searchpage')}}" method="get">

      <!-- INTERACTIVE INPUT -->
      <div class="interactive-input dark">
        <input type="text" id="search-main" name="search" placeholder="Cari dengan nama atau nim/nip">
        <!-- INTERACTIVE INPUT ICON WRAP -->
        <div class="interactive-input-icon-wrap">
          <!-- INTERACTIVE INPUT ICON -->
          <svg class="interactive-input-icon icon-magnifying-glass">
            <use xlink:href="#svg-magnifying-glass"></use>
          </svg>
          <!-- /INTERACTIVE INPUT ICON -->
        </div>
        <!-- /INTERACTIVE INPUT ICON WRAP -->

        <!-- INTERACTIVE INPUT ACTION -->
        <div class="interactive-input-action">
          <!-- INTERACTIVE INPUT ACTION ICON -->
          <svg class="interactive-input-action-icon icon-cross-thin">
            <use xlink:href="#svg-cross-thin"></use>
          </svg>
          <!-- /INTERACTIVE INPUT ACTION ICON -->
        </div>
        <!-- /INTERACTIVE INPUT ACTION -->
      </div>
      <!-- /INTERACTIVE INPUT -->
    </form>


    </div>
    <!-- /HEADER ACTIONS -->

    <!-- HEADER ACTIONS -->
    <div class="header-actions">
      <!-- PROGRESS STAT -->
      <div class="progress-stat">
        <!-- BAR PROGRESS WRAP -->
        <div class="bar-progress-wrap">
          <!-- BAR PROGRESS INFO -->
          <p class="bar-progress-info">Next: <span class="bar-progress-text"></span></p>
          <!-- /BAR PROGRESS INFO -->
        </div>
        <!-- /BAR PROGRESS WRAP -->

        <!-- PROGRESS STAT BAR -->
        <div id="logged-user-leveling" class="progress-stat-bar"></div>
        <input type="hidden" id="exp" value="{{Auth::user()->exp}}">
        <!-- /PROGRESS STAT BAR -->
      </div>
      <!-- /PROGRESS STAT -->
    </div>
    <!-- /HEADER ACTIONS -->

    <!-- HEADER ACTIONS -->
    <div class="header-actions">

      <!-- ACTION ITEM WRAP -->
      <div class="action-item-wrap">
        <!-- ACTION ITEM -->
        <div class="action-item dark header-settings-dropdown-trigger">
          <!-- ACTION ITEM ICON -->
          <svg class="action-item-icon icon-settings">
            <use xlink:href="#svg-settings"></use>
          </svg>
          <!-- /ACTION ITEM ICON -->
        </div>
        <!-- /ACTION ITEM -->

        <!-- DROPDOWN NAVIGATION -->
        <div class="dropdown-navigation header-settings-dropdown">
          <!-- DROPDOWN NAVIGATION HEADER -->
          <div class="dropdown-navigation-header">
            <!-- USER STATUS -->
            <div class="user-status">
              <!-- USER STATUS AVATAR -->
              <a class="user-status-avatar" href="{{url('/profile')}}">
                <!-- USER AVATAR -->
                <div class="user-avatar small no-outline">
                  <!-- USER AVATAR CONTENT -->
                  <div class="user-avatar-content">
                    <!-- HEXAGON -->
                    <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/'.Auth::user()->profile_photo_path)}}"></div>
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
                    <p class="user-avatar-badge-text">{{Auth::user()->level}}</p>
                    <!-- /USER AVATAR BADGE TEXT -->
                  </div>
                  <!-- /USER AVATAR BADGE -->
                </div>
                <!-- /USER AVATAR -->
              </a>
              <!-- /USER STATUS AVATAR -->

              <!-- USER STATUS TITLE -->
              <p class="user-status-title"><span class="bold">{{ Auth::user()->nama_user }}</span></p>
              <!-- /USER STATUS TITLE -->

              <!-- USER STATUS TEXT -->
              <p class="user-status-text small"><a href="{{url('/profile')}}">{{ Auth::user()->nim_nip }}</a></p>

              <!-- /USER STATUS TEXT -->
            </div>
            <!-- /USER STATUS -->
          </div>
          <!-- /DROPDOWN NAVIGATION HEADER -->

          <!-- DROPDOWN NAVIGATION CATEGORY -->
          <p class="dropdown-navigation-category">My Profile</p>
          <!-- /DROPDOWN NAVIGATION CATEGORY -->

          <!-- DROPDOWN NAVIGATION LINK -->
          <a class="dropdown-navigation-link" href="{{url('/myprofile')}}">Profile Info</a>
          <!-- /DROPDOWN NAVIGATION LINK -->



          <!-- DROPDOWN NAVIGATION BUTTON -->
          <form  action="{{route('logout')}}" method="post">
            @csrf
          <p class="dropdown-navigation-button button small secondary"   onclick="event.preventDefault();
                        this.closest('form').submit();">Logout</p>
        </form>
          <!-- /DROPDOWN NAVIGATION BUTTON -->
        </div>
        <!-- /DROPDOWN NAVIGATION -->
      </div>
      <!-- /ACTION ITEM WRAP -->
    </div>
    <!-- /HEADER ACTIONS -->
  </header>
  <!-- /HEADER -->


  @yield('content')



<!-- app -->

<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/utils/app.js')}}"></script>
<!-- page loader -->
<script src="{{URL::asset('js/utils/page-loader.js')}}"></script>
<!-- simplebar -->
<script src="{{URL::asset('js/vendor/simplebar.min.js')}}"></script>
<!-- liquidify -->
<script src="{{URL::asset('js/utils/liquidify.js')}}"></script>
<!-- XM_Plugins -->
<script src="{{URL::asset('js/vendor/xm_plugins.min.js')}}"></script>
<!-- tiny-slider -->
<script src="{{URL::asset('js/vendor/tiny-slider.min.js')}}"></script>
<!-- chartJS -->
<script src="{{URL::asset('js/vendor/Chart.bundle.min.js')}}"></script>
<!-- global.hexagons -->
<script src="{{URL::asset('js/global/global.hexagons.js')}}"></script>
<!-- global.tooltips -->
<script src="{{URL::asset('js/global/global.tooltips.js')}}"></script>
<!-- global.accordions -->
<script src="{{URL::asset('js/global/global.accordions.js')}}"></script>
<!-- global.popups -->
<script src="{{URL::asset('js/global/global.popups.js')}}"></script>
<!-- global.charts -->
<script src="{{URL::asset('js/global/global.charts.js')}}"></script>
<!-- header -->
<script src="{{URL::asset('js/header/header.js')}}"></script>
<!-- sidebar -->
<script src="{{URL::asset('js/sidebar/sidebar.js')}}"></script>
<!-- content -->
<script src="{{URL::asset('js/content/content.js')}}"></script>
<!-- form.utils -->
<script src="{{URL::asset('js/form/form.utils.js')}}"></script>
<!-- SVG icons -->
<script src="{{URL::asset('js/utils/svg-loader.js')}}"></script>
@yield('scripting')
<script type="text/javascript">
var tugasup = window.setInterval(updatetugas,1000);
var a = document.getElementById("exp").value;
console.log(a);
app.plugins.createProgressBar({
  container: '#logged-user-leveling',
  height: 4,
  lineColor: '#4a46c8'
});
app.plugins.createProgressBar({
  container: '#logged-user-leveling',
  height: 4,
  lineColor: '#41efff',
  scale: {
    start: 0,
    end: 100,
    stop: a
  },
  linkText: true,
  linkUnits: 'exp',
  invertedProgress: true
});
  function updatetugas(){
    $.ajax({
      type:"GET",
      url:"{{url('/kelas/tugas/updatestatus')}}",
      success:function(){
      }
    });
    $.ajax({
      type:"GET",
      url:"{{url('/challenge/updatestatusall')}}",
      success:function(){

      }
    });
    $.ajax({
      type:"GET",
      url:"{{url('/ujian/updatestatusall')}}",
      success:function(){
      }
    });
  };
</script>
</body>
</html>
