@extends('layouts.app')
@section('title','Admin | FunLearning')
@section('content')
<div class="content-grid">
  <!-- SECTION -->
  <section class="section">
    <!-- SECTION HEADER -->
    <div class="section-header">
      <!-- SECTION HEADER INFO -->
      <div class="section-header-info">
        <!-- SECTION PRETITLE -->
        <p class="section-pretitle">Users</p>
        <!-- /SECTION PRETITLE -->

        <!-- SECTION TITLE -->
        <h2 class="section-title">List Users <span class="highlighted">{{count($member)}}</span></h2>
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
            <label for="friends-search">Search users by name or nim</label>
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
            <p class="user-short-description-text"><a >{{$member->nim_nip}} | {{$member->hak_akses}}</a></p>
            <!-- /USER SHORT DESCRIPTION TEXT -->
          </div>
          <!-- /USER SHORT DESCRIPTION -->


          <!-- USER STATS -->
          <div class="user-stats">
            <!-- ACTION REQUEST LIST -->
            <div class="action-request-list">
              <!-- ACTION REQUEST -->
              <div class="action-request accept">
                <!-- ACTION REQUEST ICON -->
                 Edit
                <!-- /ACTION REQUEST ICON -->
              </div>
              <!-- /ACTION REQUEST -->

              <!-- ACTION REQUEST -->
              <div class="action-request decline text-tooltip-tft  popup-review-trigger" onclick="hapus({{$member->nim_nip}})" data-title="Delete User">
                <!-- ACTION REQUEST ICON -->
              Hapus
                <!-- /ACTION REQUEST ICON -->
              </div>
              <!-- /ACTION REQUEST -->
            </div>
            <!-- ACTION REQUEST LIST -->
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
  <p class="popup-box-title">Hapus User</p>
  <!-- /POPUP BOX TITLE -->


  <!-- FORM -->
  <form class="form" action="{{url('/hapususer')}}" method="post">
    @csrf
    <!-- FORM ROW -->
    <div class="form-row">
      <!-- FORM ITEM -->
      <div class="form-item">
        <!-- FORM INPUT -->
        <div class="form-input small">
          <h2>Apakah anda yakin ingin menghapus user ini?</h2>
          <input type="hidden" name="nim_nip" id="nim_nip">
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

@endsection
@section('scripting')
<script type="text/javascript">
function hapus(id){
  document.getElementById("nim_nip").value = id;
}
</script>

@endsection
