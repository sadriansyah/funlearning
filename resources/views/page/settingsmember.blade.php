@extends('layouts.app')
@section('title','Member | FunLearning')

@section('content')

<!-- CONTENT GRID -->
<div class="content-grid">
  @foreach($kelas as $kelas)
  <!-- PROFILE HEADER -->
  @include('page.headerkelas')
  <!-- /PROFILE HEADER -->




  <!-- GRID -->
  <div class="grid grid-3-9 medium-space">
    <!-- GRID COLUMN -->
    <div class="account-hub-sidebar">
      <!-- SIDEBAR BOX -->
      <div class="sidebar-box no-padding">
        <!-- SIDEBAR MENU -->
        <div class="sidebar-menu round-borders">



          @include('page.settinssidebar')


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
          <p class="section-pretitle">Member Kelas</p>
          <!-- /SECTION PRETITLE -->

          <!-- SECTION TITLE -->
          <h2 class="section-title">List Member</h2>
          <!-- /SECTION TITLE -->
          @if(session('sukses'))
          <div class="mt-4">
            <p class="button bg-warning col-md-12 " >
              {{session('sukses')}}
            </p>
          </div>
          @endif

        </div>
        <!-- /SECTION HEADER INFO -->

      </div>
      <!-- /SECTION HEADER -->


      <!-- GRID COLUMN -->
      <div class="grid-column">



        <!-- SECTION FILTERS BAR -->
        <div class="section-filters-bar v2">
          <!-- FORM -->
          <form class="form">
            <!-- FORM ITEM -->
            <div class="form-item split medium">
              <!-- FORM SELECT -->
              <div class="form-input">
                <label for="downloads-filter-category">Cari Member</label>
                <input type="text" id="downloads-filter-category" name="search">

              </div>
              <!-- /FORM SELECT -->
            </div>
            <!-- /FORM ITEM -->
          </form>

          <!-- /FORM -->
        </div>
        <!-- /SECTION FILTERS BAR -->


        @foreach($members as $member)
                <!-- NOTIFICATION BOX LIST -->
                <div class="notification-box-list">
                  <!-- NOTIFICATION BOX -->
                  <div class="notification-box">
                    <!-- USER STATUS -->
                    <div class="user-status request">
                      <!-- USER STATUS AVATAR -->
                      <a class="user-status-avatar" href="#">
                        <!-- USER AVATAR -->
                        <div class="user-avatar small no-outline">
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
                        </div>
                        <!-- /USER AVATAR -->
                      </a>
                      <!-- /USER STATUS AVATAR -->

                      <!-- USER STATUS TITLE -->
                      <p class="user-status-title"><a class="bold" >{{$member->nama_user}}</a></p>
                      <!-- /USER STATUS TITLE -->

                      <!-- USER STATUS TEXT -->
                      <p class="user-status-text small-space">{{$member->nim_nip}}</p>
                      <!-- /USER STATUS TEXT -->

                      <!-- ACTION REQUEST LIST -->
                      <div class="action-request-list">


                        <!-- ACTION REQUEST -->
                        <div class="action-request decline popup-review-trigger" onclick="hapus({{$member->id}},{{$kelas->id}})">
                          <!-- ACTION REQUEST ICON -->
                          <svg class="action-request-icon icon-remove-friend">
                            <use xlink:href="#svg-remove-friend"></use>
                          </svg>
                          <!-- /ACTION REQUEST ICON -->
                        </div>
                        <!-- /ACTION REQUEST -->
                      </div>
                      <!-- ACTION REQUEST LIST -->
                    </div>
                    <!-- /USER STATUS -->
                  </div>
                  <!-- /NOTIFICATION BOX -->


                </div>
                <!-- /NOTIFICATION BOX LIST -->
        @endforeach
      </div>
      <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID COLUMN -->
  </div>
  <!-- /GRID -->

</div>
<!-- /CONTENT GRID -->
<!-- POPUP BOX -->
<div class="popup-box small popup-review">
  <!-- POPUP CLOSE BUTTON -->
  <div class="popup-close-button popup-review-trigger">
    <!-- POPUP CLOSE BUTTON ICON -->
    <svg class="popup-close-button-icon icon-cross">
      <use xlink:href="#svg-cross"></use>
    </svg>
    <!-- /POPUP CLOSE BUTTON ICON -->
  </div>
  <!-- /POPUP CLOSE BUTTON -->

  <!-- POPUP BOX TITLE -->
  <p class="popup-box-title">Notification</p>
  <!-- /POPUP BOX TITLE -->


  <!-- FORM -->
  <form class="form" action="{{url('/kelas/kickmember')}}" method="post">
    @csrf
    <!-- FORM ROW -->
    <div class="form-row">
      <!-- FORM ITEM -->
      <div class="form-item">
        <!-- FORM INPUT -->
        <div class="form-input small">
          <h2>Apakah anda yakin ingin menghapus Challenge ini?</h2>
          <input type="hidden" name="idkelas" id="idkelas">
          <input type="hidden" name="idmember" id="idmember">
        </div>
        <!-- /FORM INPUT -->
      </div>
      <!-- /FORM ITEM -->
    </div>
    <!-- /FORM ROW -->

    <!-- POPUP BOX ACTIONS -->
    <div class="popup-box-actions full void">
      <!-- POPUP BOX ACTION -->

      <button class="popup-box-action full button bg-danger popup-review-trigger" type="submit">Hapus!</button>
      <!-- /POPUP BOX ACTION -->

      <!-- POPUP BOX ACTION TEXT -->
      <p class="popup-box-action-text">Data yang telah dihapus tidak dapat dikembalikan!</p>
      <!-- /POPUP BOX ACTION TEXT -->
    </div>
    <!-- /POPUP BOX ACTIONS -->
  </form>
  <!-- /FORM -->
</div>
<!-- /POPUP BOX -->
@endforeach
@endsection

@section('scripting')
<script type="text/javascript">

  function hapus(id,idkelas){
    console.log(id,idkelas);
    // var x = document.getElementById("delete").getAttribute("data");
    document.getElementById("idkelas").value = idkelas;
    document.getElementById("idmember").value = id;
  }
</script>
@endsection
