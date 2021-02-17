@extends('layouts.app')
@section('title','Challenge | FunLearning')

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
          <p class="section-pretitle">Challenge</p>
          <!-- /SECTION PRETITLE -->

          <!-- SECTION TITLE -->
          <h2 class="section-title">List Challenge</h2>
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
          <a class="button primary text-rigth" href="{{url('/kelas/settings/challenge/'.$kelas->id.'/buatchallenge')}}">Buat Challenge! </a>
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
              <p class="table-header-title">Challenge</p>
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
            <div class="table-header-column ">
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
            @foreach($challenge as $challenge)
            <!-- TABLE ROW -->
            <div class="table-row small">
              <!-- TABLE COLUMN -->
              <div class="table-column">
                <!-- TABLE INFORMATION -->
                <div class="table-information">
                  @if($challenge->status == "Open")
                  <!-- TABLE IMAGE -->
                  <img class="table-image" src="{{URL::asset('img/quest/completedq-s.png')}}" alt="completedq-s">
                  <!-- /TABLE IMAGE -->
                  @else
                  <!-- TABLE IMAGE -->
                  <img class="table-image" src="{{URL::asset('img/quest/openq-s.png')}}" alt="openq-s">
                  <!-- /TABLE IMAGE -->
                  @endif

                  <!-- TABLE TITLE -->
                  <p class="table-title">{{$challenge->judul_challenge}}</p>
                  <!-- /TABLE TITLE -->
                </div>
                <!-- /TABLE INFORMATION -->
              </div>
              <!-- /TABLE COLUMN -->

              <!-- TABLE COLUMN -->
              <div class="table-column">
                <!-- TABLE TITLE -->
                <p class="table-text">{{Str::limit($challenge->deskripsi_challenge,25,$end="...")}}</p>
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
                  </svg>{{$challenge->poin_challenge}} exp
                </p>
                <!-- /TEXT STICKER -->
              </div>
              <!-- /TABLE COLUMN -->

              <!-- TABLE COLUMN -->
              <div class="table-column padded-big-left">
                <div class="action-request-list">
                <!-- ACTION REQUEST -->
                <a class="action-request accept with-text" href="{{url('/kelas/settings/challenge/'.$kelas->id.'/editchallenge/'.$challenge->id)}}">

                  <!-- ACTION REQUEST TEXT -->
                  <span class="action-request-text">Edit</span>
                  <!-- /ACTION REQUEST TEXT -->
                </a>
                <!-- /ACTION REQUEST -->

                <!-- ACTION REQUEST -->
                <div class="action-request decline with-text popup-review-trigger" onclick="hapus({{$challenge->id}},{{$kelas->id}})" >
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
  <p class="popup-box-title">Hapus Challenge</p>
  <!-- /POPUP BOX TITLE -->


  <!-- FORM -->
  <form class="form" action="{{url('/kelas/settings/hapuschallenge')}}" method="post">
    @csrf
    <!-- FORM ROW -->
    <div class="form-row">
      <!-- FORM ITEM -->
      <div class="form-item">
        <!-- FORM INPUT -->
        <div class="form-input small">
          <h2>Apakah anda yakin ingin menghapus Challenge ini?</h2>
          <input type="hidden" name="idkelas" id="idkelas">
          <input type="hidden" name="idchallenge" id="idchallenge">
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
    document.getElementById("idchallenge").value = id;
  }
</script>
@endsection
