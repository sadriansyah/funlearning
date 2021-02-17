@extends('layouts.app')
@section('title','Rewards | FunLearning')

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
          <p class="section-pretitle">Rewards</p>
          <!-- /SECTION PRETITLE -->

          <!-- SECTION TITLE -->
          <h2 class="section-title">List Rewards</h2>
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
                <label for="downloads-filter-category">Cari Challenge</label>
                <input type="text" id="downloads-filter-category" name="search">

              </div>
              <!-- /FORM SELECT -->
            </div>
            <!-- /FORM ITEM -->
          </form>
          <!-- BUTTON -->
          <a class="button primary text-rigth" href="{{url('/kelas/settings/rewards/'.$kelas->id.'/buatreward')}}">Buat Reward! </a>
          <!-- /BUTTON -->

          <!-- /FORM -->
        </div>
        <!-- /SECTION FILTERS BAR -->



        <!-- TABLE -->
        <div class="table table-quests split-rows">
          <!-- TABLE HEADER -->
          <div class="table-header">
            <!-- TABLE HEADER COLUMN -->
            <div class="table-header-column">
              <!-- TABLE HEADER TITLE -->
              <p class="table-header-title">Rewards</p>
              <!-- /TABLE HEADER TITLE -->
            </div>
            <!-- /TABLE HEADER COLUMN -->

            <!-- TABLE HEADER COLUMN -->
            <div class="table-header-column">
              <!-- TABLE HEADER TITLE -->
              <p class="table-header-title">Description</p>
              <!-- /TABLE HEADER TITLE -->
            </div>
            <!-- /TABLE HEADER COLUMN -->

            <!-- TABLE HEADER COLUMN -->
            <div class="table-header-column centered padded-big-left">
              <!-- TABLE HEADER TITLE -->
              <p class="table-header-title">Exp</p>
              <!-- /TABLE HEADER TITLE -->
            </div>
            <!-- /TABLE HEADER COLUMN -->

            <!-- TABLE HEADER COLUMN -->
            <div class="table-header-column padded-big-left">
              <!-- TABLE HEADER TITLE -->
              <p class="table-header-title">Option</p>
              <!-- /TABLE HEADER TITLE -->
            </div>
            <!-- /TABLE HEADER COLUMN -->
          </div>
          <!-- /TABLE HEADER -->

          <!-- TABLE BODY -->
          <div class="table-body same-color-rows">
            @foreach($rewards as $reward)
            <!-- TABLE ROW -->
            <div class="table-row small">
              <!-- TABLE COLUMN -->
              <div class="table-column">
                <!-- TABLE INFORMATION -->
                <div class="table-information">
                  <!-- TABLE IMAGE -->
                  <img class="table-image" src="{{URL::asset('img/badge/forumsf-s.png')}}" alt="completedq-s">
                  <!-- /TABLE IMAGE -->


                  <!-- TABLE TITLE -->
                  <p class="table-title">{{$reward->judul_reward}}</p>
                  <!-- /TABLE TITLE -->
                </div>
                <!-- /TABLE INFORMATION -->
              </div>
              <!-- /TABLE COLUMN -->

              <!-- TABLE COLUMN -->
              <div class="table-column">
                <!-- TABLE TITLE -->
                <p class="table-text">{{$reward->deskripsi_reward}}</p>
                <!-- /TABLE TITLE -->
              </div>
              <!-- /TABLE COLUMN -->

              <!-- TABLE COLUMN -->
              <div class="table-column ">
                <!-- TEXT STICKER -->
                <p class="text-sticker void">
                  <!-- TEXT STICKER ICON -->
                  <svg class="text-sticker-icon icon-plus-small">
                    <use xlink:href="#svg-plus-small"></use>
                  </svg>{{$reward->poin_reward}} exp
                </p>
                <!-- /TEXT STICKER -->
              </div>
              <!-- /TABLE COLUMN -->

              <!-- TABLE COLUMN -->
              <div class="table-column padded-big-left">
                <div class="action-request-list">
                <!-- ACTION REQUEST -->
                <a class="action-request accept with-text" href="{{url('/kelas/settings/rewards/'.$kelas->id.'/editreward/'.$reward->id)}}">

                  <!-- ACTION REQUEST TEXT -->
                  <span class="action-request-text">Edit</span>
                  <!-- /ACTION REQUEST TEXT -->
                </a>
                <!-- /ACTION REQUEST -->

                <!-- ACTION REQUEST -->
                <div class="action-request decline with-text popup-review-trigger" onclick="hapus({{$reward->id}},{{$kelas->id}})" >
                  <span class="action-request-text">Hapus</span>
                </div>
                <!-- /ACTION REQUEST -->
              </div>
              </div>
              <!-- /TABLE COLUMN -->
            </div>
            <!-- /TABLE ROW -->
            @endforeach




          </div>
          <!-- /TABLE BODY -->
        </div>
        <!-- /TABLE -->

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
  <p class="popup-box-title">Hapus Reward</p>
  <!-- /POPUP BOX TITLE -->


  <!-- FORM -->
  <form class="form" action="{{url('/kelas/settings/hapusreward')}}" method="post">
    @csrf
    <!-- FORM ROW -->
    <div class="form-row">
      <!-- FORM ITEM -->
      <div class="form-item">
        <!-- FORM INPUT -->
        <div class="form-input small">
          <h2>Apakah anda yakin ingin menghapus Reward ini?</h2>
          <input type="hidden" name="idkelas" id="idkelas">
          <input type="hidden" name="idreward" id="idreward">
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
    // var x = document.getElementById("delete").getAttribute("data");
    document.getElementById("idkelas").value = idkelas;
    document.getElementById("idreward").value = id;
  }
</script>
@endsection
