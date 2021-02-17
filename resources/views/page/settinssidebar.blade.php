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
    <p class="sidebar-menu-header-title">Kelas</p>
    <!-- /SIDEBAR MENU HEADER TITLE -->

    <!-- SIDEBAR MENU HEADER TEXT -->
    <p class="sidebar-menu-header-text">Setting Kelas, Nama Kelas, Kode Matkul, dan Cover Kelas</p>
    <!-- /SIDEBAR MENU HEADER TEXT -->
  </div>
  <!-- /SIDEBAR MENU HEADER -->

  <!-- SIDEBAR MENU BODY -->
  <div class="sidebar-menu-body accordion-content-linked {{ Request::is('kelas/settings/kelas/*') ? 'accordion-open' : null }}">


    <!-- SIDEBAR MENU LINK -->
    <a class="sidebar-menu-link {{ Request::is('kelas/settings/kelas/general/*') ? 'active' : null }}" href="{{url('/kelas/settings/kelas/general/'.$kelas->id)}}">Settings Kelas</a>
    <!-- /SIDEBAR MENU LINK -->
    <!-- SIDEBAR MENU LINK -->
    <a class="sidebar-menu-link {{ Request::is('kelas/settings/kelas/cover*') ? 'active' : null }}" href="{{url('/kelas/settings/kelas/cover/'.$kelas->id)}}">Cover Kelas</a>
    <!-- /SIDEBAR MENU LINK -->
  </div>
  <!-- /SIDEBAR MENU BODY -->
</div>
<!-- /SIDEBAR MENU ITEM -->

<!-- SIDEBAR MENU ITEM -->
<div class="sidebar-menu-item">
  <!-- SIDEBAR MENU HEADER -->
  <div class="sidebar-menu-header accordion-trigger-linked">
    <!-- SIDEBAR MENU HEADER ICON -->
    <svg class="sidebar-menu-header-icon icon-group">
      <use xlink:href="#svg-group"></use>
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
    <p class="sidebar-menu-header-title">Member</p>
    <!-- /SIDEBAR MENU HEADER TITLE -->

    <!-- SIDEBAR MENU HEADER TEXT -->
    <p class="sidebar-menu-header-text">Manage Member Kelas</p>
    <!-- /SIDEBAR MENU HEADER TEXT -->
  </div>
  <!-- /SIDEBAR MENU HEADER -->

  <!-- SIDEBAR MENU BODY -->
  <div class="sidebar-menu-body accordion-content-linked {{ Request::is('kelas/settings/member/*') ? 'accordion-open' : null }}">
    <!-- SIDEBAR MENU LINK -->
    <a class="sidebar-menu-link {{ Request::is('kelas/settings/member/managemember*') ? 'active' : null }}" href="{{url('/kelas/settings/member/managemember/'.$kelas->id)}}">Member Kelas</a>
    <!-- /SIDEBAR MENU LINK -->

  </div>
  <!-- /SIDEBAR MENU BODY -->
</div>
<!-- /SIDEBAR MENU ITEM -->
<!-- SIDEBAR MENU ITEM -->
<div class="sidebar-menu-item">
  <!-- SIDEBAR MENU HEADER -->
  <div class="sidebar-menu-header accordion-trigger-linked">
    <!-- SIDEBAR MENU HEADER ICON -->
    <svg class="sidebar-menu-header-icon icon-blog-posts">
      <use xlink:href="#svg-blog-posts"></use>
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
    <p class="sidebar-menu-header-title">Tugas, Challenge dan Ujian</p>
    <!-- /SIDEBAR MENU HEADER TITLE -->

    <!-- SIDEBAR MENU HEADER TEXT -->
    <p class="sidebar-menu-header-text">Manage Tugas, Challenge dan Reward</p>
    <!-- /SIDEBAR MENU HEADER TEXT -->
  </div>
  <!-- /SIDEBAR MENU HEADER -->

  <!-- SIDEBAR MENU BODY -->
  <div class="sidebar-menu-body accordion-content-linked {{ Request::is('kelas/settings/tugas/*') ? 'accordion-open' : null }} {{ Request::is('kelas/settings/challenge/*') ? 'accordion-open' : null }}  {{ Request::is('kelas/settings/ujian/*') ? 'accordion-open' : null }}  {{ Request::is('kelas/settings/rewards/*') ? 'accordion-open' : null }}">
    <!-- SIDEBAR MENU LINK -->
    <a class="sidebar-menu-link {{ Request::is('kelas/settings/tugas/*') ? 'active' : null }}" href="{{url('/kelas/settings/tugas/listtugas/'.$kelas->id)}}">Tugas</a>
    <!-- /SIDEBAR MENU LINK -->

    <!-- SIDEBAR MENU LINK -->
    <a class="sidebar-menu-link {{ Request::is('kelas/settings/challenge*') ? 'active' : null }}" href="{{url('/kelas/settings/challenge/'.$kelas->id)}}">Challenge</a>
    <!-- /SIDEBAR MENU LINK -->

    <!-- SIDEBAR MENU LINK -->
    <a class="sidebar-menu-link {{ Request::is('kelas/settings/ujian*') ? 'active' : null }}" href="{{url('/kelas/settings/ujian/'.$kelas->id)}}">Ujian</a>
    <!-- /SIDEBAR MENU LINK -->
    <!-- SIDEBAR MENU LINK -->
    <a class="sidebar-menu-link {{ Request::is('kelas/settings/rewards*') ? 'active' : null }}" href="{{url('/kelas/settings/rewards/'.$kelas->id)}}">Reward</a>
    <!-- /SIDEBAR MENU LINK -->
  </div>
  <!-- /SIDEBAR MENU BODY -->
</div>
<!-- /SIDEBAR MENU ITEM -->
