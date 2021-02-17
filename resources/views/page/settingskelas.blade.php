@extends('layouts.app')
@section('title','Settings | FunLearning')

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
        <!-- SIDEBAR BOX FOOTER -->
        <div class="sidebar-box-footer">
          <!-- BUTTON -->
          <p class="button primary" id="save">Save Changes!</p>
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
          <p class="section-pretitle">Kelas</p>
          <!-- /SECTION PRETITLE -->

          <!-- SECTION TITLE -->
          <h2 class="section-title">Settings Kelas</h2>
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


        <!-- WIDGET BOX -->
        <div class="widget-box">
          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">Tentang Kelas</p>
          <!-- /WIDGET BOX TITLE -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- FORM -->
            <form class="form" action="{{url('/kelas/settings/ubahkelas/'.$kelas->id)}}" method="post" id="form-save">
              @csrf
              <!-- FORM ROW -->
              <div class="form-row split">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM INPUT -->
                  <div class="form-input small active">
                    <label for="profile-name">Kode Mata Kuliah</label>
                    <input type="text" id="profile-name" name="kode_mk" value="{{$kelas->kode_mk}}">
                  </div>
                  <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->

                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM INPUT -->
                  <div class="form-input small active">
                    <label for="profile-tagline">Nama Mata Kuliah</label>
                    <input type="text" id="profile-tagline" name="nama_mk" value="{{$kelas->nama_mk}}">
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
                    <label for="profile-psid">Komposisi Tugas</label>
                    <input type="text" id="profile-psid" name="komposisi_tugas" value="{{$kelas->komposisi_tugas}}">
                  </div>
                  <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->

                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM INPUT -->
                  <div class="form-input small active">
                    <label for="profile-xbid">Komposisi Quis</label>
                    <input type="text" id="profile-xbid" name="komposisi_quis" value="{{$kelas->komposisi_quis}}">
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
                    <label for="profile-ets">Komposisi ETS</label>
                    <input type="text" id="profile-ets" name="komposisi_ets" value="{{$kelas->komposisi_ets}}">
                  </div>
                  <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->

                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM INPUT -->
                  <div class="form-input small active">
                    <label for="profile-eas">Komposisi EAS</label>
                    <input type="text" id="profile-eas" name="komposisi_eas" value="{{$kelas->komposisi_eas}}">
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
        <!-- CREATE ENTITY BOX -->
        <div class="create-entity-box">
          <!-- CREATE ENTITY BOX COVER -->
          <div class="create-entity-box-cover"></div>
          <!-- /CREATE ENTITY BOX COVER -->

          <!-- CREATE ENTITY BOX AVATAR -->
          <div class="create-entity-box-avatar">
            <!-- CREATE ENTITY BOX AVATAR ICON -->
            <svg class="create-entity-box-avatar-icon icon-group">
              <use xlink:href="#svg-group"></use>
            </svg>
            <!-- /CREATE ENTITY BOX AVATAR ICON -->
          </div>
          <!-- /CREATE ENTITY BOX AVATAR -->

          <!-- CREATE ENTITY BOX INFO -->
          <div class="create-entity-box-info">
            <!-- CREATE ENTITY BOX TITLE -->
            <p class="create-entity-box-title">Hapus Kelas</p>
            <!-- /CREATE ENTITY BOX TITLE -->

            <!-- CREATE ENTITY BOX TEXT -->
            <p class="create-entity-box-text">Apakah Anda ingin Menghapus Kelas ini!</p>
            <!-- /CREATE ENTITY BOX TEXT -->

            <!-- BUTTON -->
            <p class="button bg-danger full popup-review-trigger" onclick="hapus({{$kelas->id}})">Hapus Kelas</p>
            <!-- /BUTTON -->
          </div>
          <!-- /CREATE ENTITY BOX INFO -->
        </div>
        <!-- /CREATE ENTITY BOX -->
      </div>
      <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID COLUMN -->
  </div>
  <!-- /GRID -->

</div>
<!-- /CONTENT GRID -->
@endforeach
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
  <p class="popup-box-title">Hapus Kelas</p>
  <!-- /POPUP BOX TITLE -->


  <!-- FORM -->
  <form class="form" action="{{url('/kelas/settings/hapuskelas')}}" method="post">
    @csrf
    <!-- FORM ROW -->
    <div class="form-row">
      <!-- FORM ITEM -->
      <div class="form-item">
        <!-- FORM INPUT -->
        <div class="form-input small">
          <h2>Apakah anda yakin ingin menghapus Kelas ini?</h2>
          <input type="hidden" name="idkelas" id="idkelas">

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
  var form = document.getElementById("form-save");
  document.getElementById("save").addEventListener("click",function(){
    form.submit();
  });
  function hapus(id){
    document.getElementById("idkelas").value = id;
  }
</script>
@endsection
