<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- bootstrap 4.3.1 -->
  <link rel="stylesheet" href="{{URL::asset('css/vendor/bootstrap.min.css')}}">
  <!-- styles -->
  <link rel="stylesheet" href="{{URL::asset('css/styles.min.css')}}">
  <!-- simplebar styles -->
  <link rel="stylesheet" href="{{URL::asset('css/vendor/simplebar.css')}}">
  <!-- tiny-slider styles -->
  <link rel="stylesheet" href="{{URL::asset('css/vendor/tiny-slider.css')}}">

  <!-- favicon -->
  <link rel="icon" href="{{URL::asset('img/favicon.ico')}}">
  <title>@yield('title')</title>
  <livewire:styles/>
  <livewire:scripts/>
  <script src="{{asset('js/app.js')}}">

  </script>
</head>
<body>

  <!-- PAGE LOADER -->
  <div class="page-loader">
    <!-- PAGE LOADER DECORATION -->
    <div class="page-loader-decoration">
      <!-- ICON LOGO -->
      <svg class="icon-logo" viewBox="0 0 28 40" preserveAspectRatio="xMinYMin meet">
        <path d="M27.18,24.038c-0.141-0.095-0.244-0.146-0.244-0.146l-0.005-0.049C25.489,22.783,23.103,22,23.103,22c1.542,0,2.582-0.563,3.501-1.334c-0.049-0.055,0.7-0.666,0.7-0.666c0.146-8.251-4.477-12.745-7.001-14.667C18.15,9.564,16.802,14,16.802,14c-0.219-4.426,0.243-8.072,0.7-10.667c-0.85-0.452-1.956-0.698-2.296-1.537C14.865,0.957,14.015,0,14.015,0L14,0.014L13.985,0c0,0-0.85,0.957-1.19,1.796c-0.34,0.839-1.445,1.085-2.295,1.537C10.957,5.928,11.418,9.574,11.2,14c0,0-1.349-4.436-3.501-8.667C5.174,7.255,0.551,11.749,0.697,20c0,0,0.75,0.611,0.701,0.666C2.316,21.437,3.357,22,4.898,22c0,0-2.387,0.783-3.829,1.844l-0.005,0.049c0,0-0.104,0.051-0.244,0.146c-0.48,0.397-0.806,0.828-0.819,1.269c-0.023,0.521,0.263,1.181,1.233,1.973c0,0,0.136,9.259,9.69,11.29c0,0,0.212,0.815,0.975,1.431L14,38l2.102,2c0.763-0.615,0.975-1.431,0.975-1.431c9.555-2.031,9.689-11.29,9.689-11.29c0.971-0.792,1.256-1.451,1.233-1.973C27.986,24.866,27.659,24.436,27.18,24.038z M4.198,26c2.362,0.121,3.517,1.473,5.602,4c0.799,0.969,2.059,0.83,2.059,0.83L11.899,34C5.249,34,4.198,26,4.198,26z M14,28.162l-2.97-2.828l2.101-2.001l-2.101-2l2.101-2l-2.101-2L14,14.505l2.972,2.828l-2.102,2l2.102,2l-2.102,2l2.102,2.001L14,28.162z M16.102,34l0.041-3.17c0,0,1.26,0.139,2.059-0.83c2.085-2.527,3.239-3.879,5.602-4C23.803,26,22.752,34,16.102,34z M13.3,26h1.4v-1.333h-1.4V26z M13.3,22h1.4v-1.334h-1.4V22z M13.3,18h1.4v-1.333h-1.4V18z"/>
      </svg>
      <!-- /ICON LOGO -->
    </div>
    <!-- /PAGE LOADER DECORATION -->

    <!-- PAGE LOADER INFO -->
    <div class="page-loader-info">
      <!-- PAGE LOADER INFO TITLE -->
      <p class="page-loader-info-title">ITK's Learning</p>
      <!-- /PAGE LOADER INFO TITLE -->

      <!-- PAGE LOADER INFO TEXT -->
      <p class="page-loader-info-text">Loading...</p>
      <!-- /PAGE LOADER INFO TEXT -->
    </div>
    <!-- /PAGE LOADER INFO -->

    <!-- PAGE LOADER INDICATOR -->
    <div class="page-loader-indicator loader-bars">
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
    </div>
    <!-- /PAGE LOADER INDICATOR -->
  </div>
  <!-- /PAGE LOADER -->

  <!-- NAVIGATION WIDGET -->
  <nav id="navigation-widget-small" class="navigation-widget navigation-widget-desktop closed sidebar left delayed">
    <!-- USER AVATAR -->
    <a class="user-avatar small no-outline online" href="profile-timeline.html">
      <!-- USER AVATAR CONTENT -->
      <div class="user-avatar-content">
        <!-- HEXAGON -->
        <div class="hexagon-image-30-32" data-src="img/avatar/01.jpg"></div>
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
        <p class="user-avatar-badge-text">24</p>
        <!-- /USER AVATAR BADGE TEXT -->
      </div>
      <!-- /USER AVATAR BADGE -->
    </a>
    <!-- /USER AVATAR -->

    <!-- MENU -->
    <ul class="menu small">
      <!-- MENU ITEM -->
      <li class="menu-item active">
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
      <li class="menu-item">
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
      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link text-tooltip-tfr" href="#" data-title="Quests">
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
      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link text-tooltip-tfr" href="#" data-title="Reward">
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
      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link text-tooltip-tfr" href="#" data-title="Leaderboard">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-overview">
            <use xlink:href="#svg-overview"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

      <!-- MENU ITEM -->
      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link text-tooltip-tfr" href="#" data-title="Events">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-events">
            <use xlink:href="#svg-events"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->


    </ul>
    <!-- /MENU -->
  </nav>
  <!-- /NAVIGATION WIDGET -->

  <!-- NAVIGATION WIDGET -->
  <nav id="navigation-widget" class="navigation-widget navigation-widget-desktop sidebar left hidden" data-simplebar>
    <!-- NAVIGATION WIDGET COVER -->
    <figure class="navigation-widget-cover liquid">
      <img src="img/cover/01.jpg" alt="cover-01">
    </figure>
    <!-- /NAVIGATION WIDGET COVER -->

    <!-- USER SHORT DESCRIPTION -->
    <div class="user-short-description">
      <!-- USER SHORT DESCRIPTION AVATAR -->
      <a class="user-short-description-avatar user-avatar medium" href="profile-timeline.html">
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
          <div class="hexagon-image-82-90" data-src="img/avatar/01.jpg"></div>
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
          <p class="user-avatar-badge-text">24</p>
          <!-- /USER AVATAR BADGE TEXT -->
        </div>
        <!-- /USER AVATAR BADGE -->
      </a>
      <!-- /USER SHORT DESCRIPTION AVATAR -->

      <!-- USER SHORT DESCRIPTION TITLE -->
      <p class="user-short-description-title"><a href="profile-timeline.html">Marina Valentine</a></p>
      <!-- /USER SHORT DESCRIPTION TITLE -->

      <!-- USER SHORT DESCRIPTION TEXT -->
      <p class="user-short-description-text"><a href="#">Lihat Profil</a></p>
      <!-- /USER SHORT DESCRIPTION TEXT -->
    </div>
    <!-- /USER SHORT DESCRIPTION -->

    <!-- BADGE LIST -->
    <div class="badge-list small">
      <!-- BADGE ITEM -->
      <div class="badge-item">
        <img src="img/badge/gold-s.png" alt="badge-gold-s">
      </div>
      <!-- /BADGE ITEM -->

      <!-- BADGE ITEM -->
      <div class="badge-item">
        <img src="img/badge/age-s.png" alt="badge-age-s">
      </div>
      <!-- /BADGE ITEM -->

      <!-- BADGE ITEM -->
      <div class="badge-item">
        <img src="img/badge/caffeinated-s.png" alt="badge-caffeinated-s">
      </div>
      <!-- /BADGE ITEM -->

      <!-- BADGE ITEM -->
      <div class="badge-item">
        <img src="img/badge/warrior-s.png" alt="badge-warrior-s">
      </div>
      <!-- /BADGE ITEM -->

      <!-- BADGE ITEM -->
      <a class="badge-item" href="profile-badges.html">
        <img src="img/badge/blank-s.png" alt="badge-blank-s">
        <!-- BADGE ITEM TEXT -->
        <p class="badge-item-text">+9</p>
        <!-- /BADGE ITEM TEXT -->
      </a>
      <!-- /BADGE ITEM -->
    </div>
    <!-- /BADGE LIST -->

    <!-- USER STATS -->
    <div class="user-stats">
      <!-- USER STAT -->
      <div class="user-stat">
        <!-- USER STAT TITLE -->
        <p class="user-stat-title">930</p>
        <!-- /USER STAT TITLE -->

        <!-- USER STAT TEXT -->
        <p class="user-stat-text">Level</p>
        <!-- /USER STAT TEXT -->
      </div>
      <!-- /USER STAT -->

      <!-- USER STAT -->
      <div class="user-stat">
        <!-- USER STAT TITLE -->
        <p class="user-stat-title">82</p>
        <!-- /USER STAT TITLE -->

        <!-- USER STAT TEXT -->
        <p class="user-stat-text">Title</p>
        <!-- /USER STAT TEXT -->
      </div>
      <!-- /USER STAT -->


    </div>
    <!-- /USER STATS -->

    <!-- MENU -->
    <ul class="menu">
      <!-- MENU ITEM -->
      <li class="menu-item active">
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
      <li class="menu-item">
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
      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="#">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-group">
            <use xlink:href="#svg-quests"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Quests
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

      <!-- MENU ITEM -->
      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="#">
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
      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="#">
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

      <!-- MENU ITEM -->
      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="#">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-quests">
            <use xlink:href="#svg-events"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Events
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->


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
            <div class="hexagon-image-30-32" data-src="img/avatar/01.jpg"></div>
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
            <p class="user-avatar-badge-text">24</p>
            <!-- /USER AVATAR BADGE TEXT -->
          </div>
          <!-- /USER AVATAR BADGE -->
        </a>
        <!-- /USER AVATAR -->

        <!-- NAVIGATION WIDGET INFO TITLE -->
        <p class="navigation-widget-info-title"><a href="profile-timeline.html">{{Auth::user()->nama_user}}</a></p>
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
      <!-- MENU ITEM -->
      <li class="menu-item active">
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
      <li class="menu-item">
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
      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="groups.html">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-group">
            <use xlink:href="#svg-quests"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Quests
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

      <!-- MENU ITEM -->
      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="#">
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
      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="#">
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

      <!-- MENU ITEM -->
      <li class="menu-item">
        <!-- MENU ITEM LINK -->
        <a class="menu-item-link" href="#">
          <!-- MENU ITEM LINK ICON -->
          <svg class="menu-item-link-icon icon-quests">
            <use xlink:href="#svg-events"></use>
          </svg>
          <!-- /MENU ITEM LINK ICON -->
          Event
        </a>
        <!-- /MENU ITEM LINK -->
      </li>
      <!-- /MENU ITEM -->

    </ul>
    <!-- /MENU -->

    <!-- NAVIGATION WIDGET SECTION TITLE -->
    <p class="navigation-widget-section-title">My Profile</p>
    <!-- /NAVIGATION WIDGET SECTION TITLE -->

    <!-- NAVIGATION WIDGET SECTION LINK -->
    <a class="navigation-widget-section-link" href="hub-profile-info.html">Profile Info</a>
    <!-- /NAVIGATION WIDGET SECTION LINK -->

    <!-- NAVIGATION WIDGET SECTION LINK -->
    <a class="navigation-widget-section-link" href="hub-profile-notifications.html">Notifications</a>
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
          <svg class="icon-logo-vikinger small">
            <use xlink:href="#svg-logo-vikinger"></use>
          </svg>
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
            <a class="menu-main-item-link" href="#">Beranda</a>
            <!-- /MENU MAIN ITEM LINK -->
          </li>
          <!-- /MENU MAIN ITEM -->

          <!-- MENU MAIN ITEM -->
          <li class="menu-main-item">
            <!-- MENU MAIN ITEM LINK -->
            <a class="menu-main-item-link" href="#">Kelas</a>
            <!-- /MENU MAIN ITEM LINK -->
          </li>
          <!-- /MENU MAIN ITEM -->

          <!-- MENU MAIN ITEM -->
          <li class="menu-main-item">
            <!-- MENU MAIN ITEM LINK -->
            <a class="menu-main-item-link" href="#">Leaderboard</a>
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
      <!-- INTERACTIVE INPUT -->
      <div class="interactive-input dark">
        <input type="text" id="search-main" name="search_main" placeholder="Search here for people or groups">
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
        <div id="logged-user-level" class="progress-stat-bar"></div>
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
              <a class="user-status-avatar" href="profile-timeline.html">
                <!-- USER AVATAR -->
                <div class="user-avatar small no-outline">
                  <!-- USER AVATAR CONTENT -->
                  <div class="user-avatar-content">
                    <!-- HEXAGON -->
                    <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/01.jpg')}}"></div>
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
                    <p class="user-avatar-badge-text">24</p>
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
          <a class="dropdown-navigation-link" href="#">Profile Info</a>
          <!-- /DROPDOWN NAVIGATION LINK -->

          <!-- DROPDOWN NAVIGATION LINK -->
          <a class="dropdown-navigation-link" href="#">Notifications</a>
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

  <!-- POPUP PICTURE -->
  <div class="popup-picture">
    <!-- POPUP CLOSE BUTTON -->
    <div class="popup-close-button popup-picture-trigger">
      <!-- POPUP CLOSE BUTTON ICON -->
      <svg class="popup-close-button-icon icon-cross">
        <use xlink:href="#svg-cross"></use>
      </svg>
      <!-- /POPUP CLOSE BUTTON ICON -->
    </div>
    <!-- /POPUP CLOSE BUTTON -->

    <!-- WIDGET BOX -->
    <div class="widget-box no-padding">
      <!-- WIDGET BOX SCROLLABLE -->
      <div class="widget-box-scrollable" data-simplebar>
        <!-- WIDGET BOX SETTINGS -->
        <div class="widget-box-settings">
          <!-- POST SETTINGS WRAP -->
          <div class="post-settings-wrap">
            <!-- POST SETTINGS -->
            <div class="post-settings widget-box-post-settings-dropdown-trigger">
              <!-- POST SETTINGS ICON -->
              <svg class="post-settings-icon icon-more-dots">
                <use xlink:href="#svg-more-dots"></use>
              </svg>
              <!-- /POST SETTINGS ICON -->
            </div>
            <!-- /POST SETTINGS -->

            <!-- SIMPLE DROPDOWN -->
            <div class="simple-dropdown widget-box-post-settings-dropdown">
              <!-- SIMPLE DROPDOWN LINK -->
              <p class="simple-dropdown-link">Edit Post</p>
              <!-- /SIMPLE DROPDOWN LINK -->

              <!-- SIMPLE DROPDOWN LINK -->
              <p class="simple-dropdown-link">Delete Post</p>
              <!-- /SIMPLE DROPDOWN LINK -->

              <!-- SIMPLE DROPDOWN LINK -->
              <p class="simple-dropdown-link">Make it Featured</p>
              <!-- /SIMPLE DROPDOWN LINK -->

              <!-- SIMPLE DROPDOWN LINK -->
              <p class="simple-dropdown-link">Report Post</p>
              <!-- /SIMPLE DROPDOWN LINK -->

              <!-- SIMPLE DROPDOWN LINK -->
              <p class="simple-dropdown-link">Report Author</p>
              <!-- /SIMPLE DROPDOWN LINK -->
            </div>
            <!-- /SIMPLE DROPDOWN -->
          </div>
          <!-- /POST SETTINGS WRAP -->
        </div>
        <!-- /WIDGET BOX SETTINGS -->


        <!-- POST OPTIONS -->
        <div class="post-options">
          <!-- POST OPTION WRAP -->
          <div class="post-option-wrap">
            <!-- POST OPTION -->
            <div class="post-option no-text reaction-options-dropdown-trigger">
              <!-- POST OPTION ICON -->
              <svg class="post-option-icon icon-thumbs-up">
                <use xlink:href="#svg-thumbs-up"></use>
              </svg>
              <!-- /POST OPTION ICON -->
            </div>
            <!-- /POST OPTION -->

            <!-- REACTION OPTIONS -->
            <div class="reaction-options small reaction-options-dropdown">
              <!-- REACTION OPTION -->
              <div class="reaction-option text-tooltip-tft" data-title="Like">
                <!-- REACTION OPTION IMAGE -->
                <img class="reaction-option-image" src="img/reaction/like.png" alt="reaction-like">
                <!-- /REACTION OPTION IMAGE -->
              </div>
              <!-- /REACTION OPTION -->

              <!-- REACTION OPTION -->
              <div class="reaction-option text-tooltip-tft" data-title="Love">
                <!-- REACTION OPTION IMAGE -->
                <img class="reaction-option-image" src="img/reaction/love.png" alt="reaction-love">
                <!-- /REACTION OPTION IMAGE -->
              </div>
              <!-- /REACTION OPTION -->

              <!-- REACTION OPTION -->
              <div class="reaction-option text-tooltip-tft" data-title="Dislike">
                <!-- REACTION OPTION IMAGE -->
                <img class="reaction-option-image" src="img/reaction/dislike.png" alt="reaction-dislike">
                <!-- /REACTION OPTION IMAGE -->
              </div>
              <!-- /REACTION OPTION -->

              <!-- REACTION OPTION -->
              <div class="reaction-option text-tooltip-tft" data-title="Happy">
                <!-- REACTION OPTION IMAGE -->
                <img class="reaction-option-image" src="img/reaction/happy.png" alt="reaction-happy">
                <!-- /REACTION OPTION IMAGE -->
              </div>
              <!-- /REACTION OPTION -->

              <!-- REACTION OPTION -->
              <div class="reaction-option text-tooltip-tft" data-title="Funny">
                <!-- REACTION OPTION IMAGE -->
                <img class="reaction-option-image" src="img/reaction/funny.png" alt="reaction-funny">
                <!-- /REACTION OPTION IMAGE -->
              </div>
              <!-- /REACTION OPTION -->

              <!-- REACTION OPTION -->
              <div class="reaction-option text-tooltip-tft" data-title="Wow">
                <!-- REACTION OPTION IMAGE -->
                <img class="reaction-option-image" src="img/reaction/wow.png" alt="reaction-wow">
                <!-- /REACTION OPTION IMAGE -->
              </div>
              <!-- /REACTION OPTION -->

              <!-- REACTION OPTION -->
              <div class="reaction-option text-tooltip-tft" data-title="Angry">
                <!-- REACTION OPTION IMAGE -->
                <img class="reaction-option-image" src="img/reaction/angry.png" alt="reaction-angry">
                <!-- /REACTION OPTION IMAGE -->
              </div>
              <!-- /REACTION OPTION -->

              <!-- REACTION OPTION -->
              <div class="reaction-option text-tooltip-tft" data-title="Sad">
                <!-- REACTION OPTION IMAGE -->
                <img class="reaction-option-image" src="img/reaction/sad.png" alt="reaction-sad">
                <!-- /REACTION OPTION IMAGE -->
              </div>
              <!-- /REACTION OPTION -->
            </div>
            <!-- /REACTION OPTIONS -->
          </div>
          <!-- /POST OPTION WRAP -->

          <!-- POST OPTION -->
          <div class="post-option no-text active">
            <!-- POST OPTION ICON -->
            <svg class="post-option-icon icon-comment">
              <use xlink:href="#svg-comment"></use>
            </svg>
            <!-- /POST OPTION ICON -->
          </div>
          <!-- /POST OPTION -->

          <!-- POST OPTION -->
          <div class="post-option no-text">
            <!-- POST OPTION ICON -->
            <svg class="post-option-icon icon-share">
              <use xlink:href="#svg-share"></use>
            </svg>
            <!-- /POST OPTION ICON -->
          </div>
          <!-- /POST OPTION -->
        </div>
        <!-- /POST OPTIONS -->

        <!-- POST COMMENT LIST -->
        <div class="post-comment-list">
          <!-- POST COMMENT -->
          <div class="post-comment">
            <!-- USER AVATAR -->
            <a class="user-avatar small no-outline" href="profile-timeline.html">
              <!-- USER AVATAR CONTENT -->
              <div class="user-avatar-content">
                <!-- HEXAGON -->
                <div class="hexagon-image-30-32" data-src="img/avatar/05.jpg"></div>
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
                <p class="user-avatar-badge-text">12</p>
                <!-- /USER AVATAR BADGE TEXT -->
              </div>
              <!-- /USER AVATAR BADGE -->
            </a>
            <!-- /USER AVATAR -->

            <!-- POST COMMENT TEXT -->
            <p class="post-comment-text"><a class="post-comment-text-author" href="profile-timeline.html">Neko Bebop</a>It's always a pleasure to do this streams with you! If we have at least half the fun than last time it will be an incredible success!</p>
            <!-- /POST COMMENT TEXT -->

            <!-- CONTENT ACTIONS -->
            <div class="content-actions">
              <!-- CONTENT ACTION -->
              <div class="content-action">
                <!-- META LINE -->
                <div class="meta-line">
                  <!-- META LINE LIST -->
                  <div class="meta-line-list reaction-item-list small">
                    <!-- REACTION ITEM -->
                    <div class="reaction-item">
                      <!-- REACTION IMAGE -->
                      <img class="reaction-image reaction-item-dropdown-trigger" src="img/reaction/happy.png" alt="reaction-happy">
                      <!-- /REACTION IMAGE -->

                      <!-- SIMPLE DROPDOWN -->
                      <div class="simple-dropdown padded reaction-item-dropdown">
                        <!-- SIMPLE DROPDOWN TEXT -->
                        <p class="simple-dropdown-text"><img class="reaction" src="img/reaction/happy.png" alt="reaction-happy"> <span class="bold">Happy</span></p>
                        <!-- /SIMPLE DROPDOWN TEXT -->

                        <!-- SIMPLE DROPDOWN TEXT -->
                        <p class="simple-dropdown-text">Marcus Jhonson</p>
                        <!-- /SIMPLE DROPDOWN TEXT -->
                      </div>
                      <!-- /SIMPLE DROPDOWN -->
                    </div>
                    <!-- /REACTION ITEM -->

                    <!-- REACTION ITEM -->
                    <div class="reaction-item">
                      <!-- REACTION IMAGE -->
                      <img class="reaction-image reaction-item-dropdown-trigger" src="img/reaction/like.png" alt="reaction-like">
                      <!-- /REACTION IMAGE -->

                      <!-- SIMPLE DROPDOWN -->
                      <div class="simple-dropdown padded reaction-item-dropdown">
                        <!-- SIMPLE DROPDOWN TEXT -->
                        <p class="simple-dropdown-text"><img class="reaction" src="img/reaction/like.png" alt="reaction-like"> <span class="bold">Like</span></p>
                        <!-- /SIMPLE DROPDOWN TEXT -->

                        <!-- SIMPLE DROPDOWN TEXT -->
                        <p class="simple-dropdown-text">Neko Bebop</p>
                        <!-- /SIMPLE DROPDOWN TEXT -->

                        <!-- SIMPLE DROPDOWN TEXT -->
                        <p class="simple-dropdown-text">Nick Grissom</p>
                        <!-- /SIMPLE DROPDOWN TEXT -->

                        <!-- SIMPLE DROPDOWN TEXT -->
                        <p class="simple-dropdown-text">Sarah Diamond</p>
                        <!-- /SIMPLE DROPDOWN TEXT -->
                      </div>
                      <!-- /SIMPLE DROPDOWN -->
                    </div>
                    <!-- /REACTION ITEM -->
                  </div>
                  <!-- /META LINE LIST -->

                  <!-- META LINE TEXT -->
                  <p class="meta-line-text">4</p>
                  <!-- /META LINE TEXT -->
                </div>
                <!-- /META LINE -->

                <!-- META LINE -->
                <div class="meta-line">
                  <!-- META LINE LINK -->
                  <p class="meta-line-link light reaction-options-small-dropdown-trigger">React!</p>
                  <!-- /META LINE LINK -->

                  <!-- REACTION OPTIONS -->
                  <div class="reaction-options small reaction-options-small-dropdown">
                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Like">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/like.png" alt="reaction-like">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Love">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/love.png" alt="reaction-love">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Dislike">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/dislike.png" alt="reaction-dislike">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Happy">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/happy.png" alt="reaction-happy">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Funny">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/funny.png" alt="reaction-funny">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Wow">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/wow.png" alt="reaction-wow">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Angry">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/angry.png" alt="reaction-angry">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Sad">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/sad.png" alt="reaction-sad">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->
                  </div>
                  <!-- /REACTION OPTIONS -->
                </div>
                <!-- /META LINE -->

                <!-- META LINE -->
                <div class="meta-line">
                  <!-- META LINE LINK -->
                  <p class="meta-line-link light">Reply</p>
                  <!-- /META LINE LINK -->
                </div>
                <!-- /META LINE -->

                <!-- META LINE -->
                <div class="meta-line">
                  <!-- META LINE TIMESTAMP -->
                  <p class="meta-line-timestamp">15 min ago</p>
                  <!-- /META LINE TIMESTAMP -->
                </div>
                <!-- /META LINE -->

                <!-- META LINE -->
                <div class="meta-line settings">
                  <!-- POST SETTINGS WRAP -->
                  <div class="post-settings-wrap">
                    <!-- POST SETTINGS -->
                    <div class="post-settings post-settings-dropdown-trigger">
                      <!-- POST SETTINGS ICON -->
                      <svg class="post-settings-icon icon-more-dots">
                        <use xlink:href="#svg-more-dots"></use>
                      </svg>
                      <!-- /POST SETTINGS ICON -->
                    </div>
                    <!-- /POST SETTINGS -->

                    <!-- SIMPLE DROPDOWN -->
                    <div class="simple-dropdown post-settings-dropdown">
                      <!-- SIMPLE DROPDOWN LINK -->
                      <p class="simple-dropdown-link">Report Post</p>
                      <!-- /SIMPLE DROPDOWN LINK -->
                    </div>
                    <!-- /SIMPLE DROPDOWN -->
                  </div>
                  <!-- /POST SETTINGS WRAP -->
                </div>
                <!-- /META LINE -->
              </div>
              <!-- /CONTENT ACTION -->
            </div>
            <!-- /CONTENT ACTIONS -->
          </div>
          <!-- /POST COMMENT -->

          <!-- POST COMMENT -->
          <div class="post-comment unread reply-2">
            <!-- USER AVATAR -->
            <a class="user-avatar small no-outline" href="profile-timeline.html">
              <!-- USER AVATAR CONTENT -->
              <div class="user-avatar-content">
                <!-- HEXAGON -->
                <div class="hexagon-image-30-32" data-src="img/avatar/03.jpg"></div>
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
                <p class="user-avatar-badge-text">16</p>
                <!-- /USER AVATAR BADGE TEXT -->
              </div>
              <!-- /USER AVATAR BADGE -->
            </a>
            <!-- /USER AVATAR -->

            <!-- POST COMMENT TEXT -->
            <p class="post-comment-text"><a class="post-comment-text-author" href="profile-timeline.html">Nick Grissom</a>I wouldn't miss it for anything!! Love both streams!</p>
            <!-- /POST COMMENT TEXT -->

            <!-- CONTENT ACTIONS -->
            <div class="content-actions">
              <!-- CONTENT ACTION -->
              <div class="content-action">
                <!-- META LINE -->
                <div class="meta-line">
                  <!-- META LINE LIST -->
                  <div class="meta-line-list reaction-item-list small">
                    <!-- REACTION ITEM -->
                    <div class="reaction-item">
                      <!-- REACTION IMAGE -->
                      <img class="reaction-image reaction-item-dropdown-trigger" src="img/reaction/like.png" alt="reaction-like">
                      <!-- /REACTION IMAGE -->

                      <!-- SIMPLE DROPDOWN -->
                      <div class="simple-dropdown padded reaction-item-dropdown">
                        <!-- SIMPLE DROPDOWN TEXT -->
                        <p class="simple-dropdown-text"><img class="reaction" src="img/reaction/like.png" alt="reaction-like"> <span class="bold">Like</span></p>
                        <!-- /SIMPLE DROPDOWN TEXT -->

                        <!-- SIMPLE DROPDOWN TEXT -->
                        <p class="simple-dropdown-text">Neko Bebop</p>
                        <!-- /SIMPLE DROPDOWN TEXT -->
                      </div>
                      <!-- /SIMPLE DROPDOWN -->
                    </div>
                    <!-- /REACTION ITEM -->
                  </div>
                  <!-- /META LINE LIST -->

                  <!-- META LINE TEXT -->
                  <p class="meta-line-text">1</p>
                  <!-- /META LINE TEXT -->
                </div>
                <!-- /META LINE -->

                <!-- META LINE -->
                <div class="meta-line">
                  <!-- META LINE LINK -->
                  <p class="meta-line-link light reaction-options-small-dropdown-trigger">React!</p>
                  <!-- /META LINE LINK -->

                  <!-- REACTION OPTIONS -->
                  <div class="reaction-options small reaction-options-small-dropdown">
                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Like">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/like.png" alt="reaction-like">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Love">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/love.png" alt="reaction-love">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Dislike">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/dislike.png" alt="reaction-dislike">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Happy">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/happy.png" alt="reaction-happy">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Funny">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/funny.png" alt="reaction-funny">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Wow">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/wow.png" alt="reaction-wow">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Angry">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/angry.png" alt="reaction-angry">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Sad">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/sad.png" alt="reaction-sad">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->
                  </div>
                  <!-- /REACTION OPTIONS -->
                </div>
                <!-- /META LINE -->

                <!-- META LINE -->
                <div class="meta-line">
                  <!-- META LINE LINK -->
                  <p class="meta-line-link light">Reply</p>
                  <!-- /META LINE LINK -->
                </div>
                <!-- /META LINE -->

                <!-- META LINE -->
                <div class="meta-line">
                  <!-- META LINE TIMESTAMP -->
                  <p class="meta-line-timestamp">2 min ago</p>
                  <!-- /META LINE TIMESTAMP -->
                </div>
                <!-- /META LINE -->

                <!-- META LINE -->
                <div class="meta-line settings">
                  <!-- POST SETTINGS WRAP -->
                  <div class="post-settings-wrap">
                    <!-- POST SETTINGS -->
                    <div class="post-settings post-settings-dropdown-trigger">
                      <!-- POST SETTINGS ICON -->
                      <svg class="post-settings-icon icon-more-dots">
                        <use xlink:href="#svg-more-dots"></use>
                      </svg>
                      <!-- /POST SETTINGS ICON -->
                    </div>
                    <!-- /POST SETTINGS -->

                    <!-- SIMPLE DROPDOWN -->
                    <div class="simple-dropdown post-settings-dropdown">
                      <!-- SIMPLE DROPDOWN LINK -->
                      <p class="simple-dropdown-link">Report Post</p>
                      <!-- /SIMPLE DROPDOWN LINK -->
                    </div>
                    <!-- /SIMPLE DROPDOWN -->
                  </div>
                  <!-- /POST SETTINGS WRAP -->
                </div>
                <!-- /META LINE -->
              </div>
              <!-- /CONTENT ACTION -->
            </div>
            <!-- /CONTENT ACTIONS -->
          </div>
          <!-- /POST COMMENT -->

          <!-- POST COMMENT -->
          <div class="post-comment">
            <!-- USER AVATAR -->
            <a class="user-avatar small no-outline" href="profile-timeline.html">
              <!-- USER AVATAR CONTENT -->
              <div class="user-avatar-content">
                <!-- HEXAGON -->
                <div class="hexagon-image-30-32" data-src="img/avatar/02.jpg"></div>
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
                <p class="user-avatar-badge-text">19</p>
                <!-- /USER AVATAR BADGE TEXT -->
              </div>
              <!-- /USER AVATAR BADGE -->
            </a>
            <!-- /USER AVATAR -->

            <!-- POST COMMENT TEXT -->
            <p class="post-comment-text"><a class="post-comment-text-author" href="profile-timeline.html">Destroy Dex</a>YEAHHH!! <a href="profile-timeline.html">@MarinaValentine</a> I really enjoyed your last stream and it also was really funny! Can't wait!</p>
            <!-- /POST COMMENT TEXT -->

            <!-- CONTENT ACTIONS -->
            <div class="content-actions">
              <!-- CONTENT ACTION -->
              <div class="content-action">
                <!-- META LINE -->
                <div class="meta-line">
                  <!-- META LINE LINK -->
                  <p class="meta-line-link light reaction-options-small-dropdown-trigger">React!</p>
                  <!-- /META LINE LINK -->

                  <!-- REACTION OPTIONS -->
                  <div class="reaction-options small reaction-options-small-dropdown">
                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Like">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/like.png" alt="reaction-like">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Love">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/love.png" alt="reaction-love">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Dislike">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/dislike.png" alt="reaction-dislike">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Happy">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/happy.png" alt="reaction-happy">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Funny">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/funny.png" alt="reaction-funny">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Wow">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/wow.png" alt="reaction-wow">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Angry">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/angry.png" alt="reaction-angry">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Sad">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/sad.png" alt="reaction-sad">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->
                  </div>
                  <!-- /REACTION OPTIONS -->
                </div>
                <!-- /META LINE -->

                <!-- META LINE -->
                <div class="meta-line">
                  <!-- META LINE LINK -->
                  <p class="meta-line-link light">Reply</p>
                  <!-- /META LINE LINK -->
                </div>
                <!-- /META LINE -->

                <!-- META LINE -->
                <div class="meta-line">
                  <!-- META LINE TIMESTAMP -->
                  <p class="meta-line-timestamp">27 min ago</p>
                  <!-- /META LINE TIMESTAMP -->
                </div>
                <!-- /META LINE -->

                <!-- META LINE -->
                <div class="meta-line settings">
                  <!-- POST SETTINGS WRAP -->
                  <div class="post-settings-wrap">
                    <!-- POST SETTINGS -->
                    <div class="post-settings post-settings-dropdown-trigger">
                      <!-- POST SETTINGS ICON -->
                      <svg class="post-settings-icon icon-more-dots">
                        <use xlink:href="#svg-more-dots"></use>
                      </svg>
                      <!-- /POST SETTINGS ICON -->
                    </div>
                    <!-- /POST SETTINGS -->

                    <!-- SIMPLE DROPDOWN -->
                    <div class="simple-dropdown post-settings-dropdown">
                      <!-- SIMPLE DROPDOWN LINK -->
                      <p class="simple-dropdown-link">Report Post</p>
                      <!-- /SIMPLE DROPDOWN LINK -->
                    </div>
                    <!-- /SIMPLE DROPDOWN -->
                  </div>
                  <!-- /POST SETTINGS WRAP -->
                </div>
                <!-- /META LINE -->
              </div>
              <!-- /CONTENT ACTION -->
            </div>
            <!-- /CONTENT ACTIONS -->
          </div>
          <!-- /POST COMMENT -->

          <!-- POST COMMENT -->
          <div class="post-comment">
            <!-- USER AVATAR -->
            <a class="user-avatar small no-outline" href="profile-timeline.html">
              <!-- USER AVATAR CONTENT -->
              <div class="user-avatar-content">
                <!-- HEXAGON -->
                <div class="hexagon-image-30-32" data-src="img/avatar/07.jpg"></div>
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
                <p class="user-avatar-badge-text">26</p>
                <!-- /USER AVATAR BADGE TEXT -->
              </div>
              <!-- /USER AVATAR BADGE -->
            </a>
            <!-- /USER AVATAR -->

            <!-- POST COMMENT TEXT -->
            <p class="post-comment-text"><a class="post-comment-text-author" href="profile-timeline.html">Sarah Diamond</a>That sounds awesome Marina! And also thanks a lot for the art sneak peek! I went to the GameCon last week and had a great time playing the game's open demo.</p>
            <!-- /POST COMMENT TEXT -->

            <!-- CONTENT ACTIONS -->
            <div class="content-actions">
              <!-- CONTENT ACTION -->
              <div class="content-action">
                <!-- META LINE -->
                <div class="meta-line">
                  <!-- META LINE LINK -->
                  <p class="meta-line-link light reaction-options-small-dropdown-trigger">React!</p>
                  <!-- /META LINE LINK -->

                  <!-- REACTION OPTIONS -->
                  <div class="reaction-options small reaction-options-small-dropdown">
                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Like">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/like.png" alt="reaction-like">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Love">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/love.png" alt="reaction-love">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Dislike">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/dislike.png" alt="reaction-dislike">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Happy">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/happy.png" alt="reaction-happy">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Funny">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/funny.png" alt="reaction-funny">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Wow">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/wow.png" alt="reaction-wow">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Angry">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/angry.png" alt="reaction-angry">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->

                    <!-- REACTION OPTION -->
                    <div class="reaction-option text-tooltip-tft" data-title="Sad">
                      <!-- REACTION OPTION IMAGE -->
                      <img class="reaction-option-image" src="img/reaction/sad.png" alt="reaction-sad">
                      <!-- /REACTION OPTION IMAGE -->
                    </div>
                    <!-- /REACTION OPTION -->
                  </div>
                  <!-- /REACTION OPTIONS -->
                </div>
                <!-- /META LINE -->

                <!-- META LINE -->
                <div class="meta-line">
                  <!-- META LINE LINK -->
                  <p class="meta-line-link light">Reply</p>
                  <!-- /META LINE LINK -->
                </div>
                <!-- /META LINE -->

                <!-- META LINE -->
                <div class="meta-line">
                  <!-- META LINE TIMESTAMP -->
                  <p class="meta-line-timestamp">39 min ago</p>
                  <!-- /META LINE TIMESTAMP -->
                </div>
                <!-- /META LINE -->

                <!-- META LINE -->
                <div class="meta-line settings">
                  <!-- POST SETTINGS WRAP -->
                  <div class="post-settings-wrap">
                    <!-- POST SETTINGS -->
                    <div class="post-settings post-settings-dropdown-trigger">
                      <!-- POST SETTINGS ICON -->
                      <svg class="post-settings-icon icon-more-dots">
                        <use xlink:href="#svg-more-dots"></use>
                      </svg>
                      <!-- /POST SETTINGS ICON -->
                    </div>
                    <!-- /POST SETTINGS -->

                    <!-- SIMPLE DROPDOWN -->
                    <div class="simple-dropdown post-settings-dropdown">
                      <!-- SIMPLE DROPDOWN LINK -->
                      <p class="simple-dropdown-link">Report Post</p>
                      <!-- /SIMPLE DROPDOWN LINK -->
                    </div>
                    <!-- /SIMPLE DROPDOWN -->
                  </div>
                  <!-- /POST SETTINGS WRAP -->
                </div>
                <!-- /META LINE -->
              </div>
              <!-- /CONTENT ACTION -->
            </div>
            <!-- /CONTENT ACTIONS -->
          </div>
          <!-- /POST COMMENT -->

          <!-- POST COMMENT HEADING -->
          <p class="post-comment-heading">Load More Comments <span class="highlighted">9+</span></p>
          <!-- /POST COMMENT HEADING -->
        </div>
        <!-- /POST COMMENT LIST -->
      </div>
      <!-- /WIDGET BOX SCROLLABLE -->

      <!-- POST COMMENT FORM -->
      <div class="post-comment-form bordered-top">
        <!-- USER AVATAR -->
        <div class="user-avatar small no-outline">
          <!-- USER AVATAR CONTENT -->
          <div class="user-avatar-content">
            <!-- HEXAGON -->
            <div class="hexagon-image-30-32" data-src="img/avatar/01.jpg"></div>
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
            <p class="user-avatar-badge-text">24</p>
            <!-- /USER AVATAR BADGE TEXT -->
          </div>
          <!-- /USER AVATAR BADGE -->
        </div>
        <!-- /USER AVATAR -->

        <!-- FORM -->
        <form class="form">
          <!-- FORM ROW -->
          <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- FORM INPUT -->
              <div class="form-input small">
                <label for="popup-post-reply">Your Reply</label>
                <input type="text" id="popup-post-reply" name="popup_post_reply">
              </div>
              <!-- /FORM INPUT -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->
        </form>
        <!-- /FORM -->
      </div>
      <!-- /POST COMMENT FORM -->
    </div>
    <!-- /WIDGET BOX -->

    <!-- POPUP PICTURE IMAGE WRAP -->
    <div class="popup-picture-image-wrap">
      <!-- POPUP PICTURE IMAGE -->
      <figure class="popup-picture-image">
        <img src="img/cover/04.jpg" alt="cover-04">
      </figure>
      <!-- /POPUP PICTURE IMAGE -->
    </div>
    <!-- /POPUP PICTURE IMAGE WRAP -->
  </div>
  <!-- /POPUP PICTURE -->

@livewireScripts
<!-- app -->
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
<script type="text/javascript" src="{{mix('js/app.js')}}">

</script>
</body>
</html>
