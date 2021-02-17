@extends('layouts.app')
@section('title','Tugas | FunLearning')

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
          <p class="section-pretitle">Tugas</p>
          <!-- /SECTION PRETITLE -->

          <!-- SECTION TITLE -->
          <h2 class="section-title">List Tugas</h2>
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
          <form class="form" method="get">
            <!-- FORM ITEM -->
            <div class="form-item split medium">
              <!-- FORM SELECT -->
              <div class="form-input">
                <label for="downloads-filter-category">Cari Tugas</label>
                <input type="text" id="downloads-filter-category" name="cari" >

              </div>
              <!-- /FORM SELECT -->
            </div>
            <!-- /FORM ITEM -->
          </form>
          <!-- BUTTON -->
          <a class="button primary text-rigth" href="{{url('/kelas/settings/tugas/'.$kelas->id)}}">Buat Tugas! </a>
          <!-- /BUTTON -->

          <!-- /FORM -->
        </div>
        <!-- /SECTION FILTERS BAR -->

        <!-- TABLE WRAP -->
        <div class="table-wrap" data-simplebar>
          <!-- TABLE -->
          <div class="table table-downloads split-rows">
            <!-- TABLE HEADER -->
            <div class="table-header">
              <!-- TABLE HEADER COLUMN -->
              <div class="table-header-column">
                <!-- TABLE HEADER TITLE -->
                <p class="table-header-title">Judul</p>
                <!-- /TABLE HEADER TITLE -->
              </div>
              <!-- /TABLE HEADER COLUMN -->

              <!-- TABLE HEADER COLUMN -->
              <div class="table-header-column padded">
                <!-- TABLE HEADER TITLE -->
                <p class="table-header-title">Deadline Tanggal</p>
                <!-- /TABLE HEADER TITLE -->
              </div>
              <!-- /TABLE HEADER COLUMN -->

              <!-- TABLE HEADER COLUMN -->
              <div class="table-header-column padded">
                <!-- TABLE HEADER TITLE -->
                <p class="table-header-title">Deadline Jam</p>
                <!-- /TABLE HEADER TITLE -->
              </div>
              <!-- /TABLE HEADER COLUMN -->



              <!-- TABLE HEADER COLUMN -->
              <div class="table-header-column padded-left"></div>
              <!-- /TABLE HEADER COLUMN -->
            </div>
            <!-- /TABLE HEADER -->

            <!-- TABLE BODY -->
            <div class="table-body same-color-rows">
              @foreach($tugas as $tugas)
              <!-- TABLE ROW -->
              <div class="table-row medium">
                <!-- TABLE COLUMN -->
                <div class="table-column">
                  <!-- PRODUCT PREVIEW -->
                  <div class="product-preview tiny">
                    <!-- PRODUCT PREVIEW IMAGE -->

                    <!-- /PRODUCT PREVIEW IMAGE -->

                    <!-- PRODUCT PREVIEW INFO -->
                    <div class="product-preview-info">
                      <!-- PRODUCT PREVIEW TITLE -->
                      <p class="product-preview-title"><a href="{{url('/kelas/info/'.$kelas->id.'/tugas/'.$tugas->id)}}">{{$tugas->judul_tugas}}</a></p>
                      <!-- /PRODUCT PREVIEW TITLE -->

                      <!-- PRODUCT PREVIEW CATEGORY -->
                      <p class="product-preview-category digital"><a >{{$tugas->status}}</a></p>
                      <!-- /PRODUCT PREVIEW CATEGORY -->

                      <!-- PRODUCT PREVIEW CREATOR -->
                      <p class="product-preview-creator"><a >Nick Grissom</a></p>
                      <!-- /PRODUCT PREVIEW CREATOR -->
                    </div>
                    <!-- /PRODUCT PREVIEW INFO -->
                  </div>
                  <!-- /PRODUCT PREVIEW -->
                </div>
                <!-- /TABLE COLUMN -->

                <!-- TABLE COLUMN -->
                <div class="table-column padded">
                  <!-- TABLE TITLE -->
                  <p class="table-title">{{$tugas->deadline_tanggal}}</p>
                  <!-- /TABLE TITLE -->
                </div>
                <!-- /TABLE COLUMN -->

                <!-- TABLE COLUMN -->
                <div class="table-column padded">
                  <!-- TABLE TITLE -->
                  <p class="table-title">{{$tugas->deadline_jam}}</p>
                  <!-- /TABLE TITLE -->
                </div>
                <!-- /TABLE COLUMN -->



                <!-- TABLE COLUMN -->
                <div class="table-column padded-left">
                  <!-- TABLE ACTIONS -->
                  <div class="table-actions">
                    <!-- BUTTON -->
                    <a class="button bg-warning" href="{{url('/kelas/settings/tugas/edittugas/'.$kelas->id."/".$tugas->id)}}">Edit</a>
                    <!-- /BUTTON -->

                    <!-- BUTTON -->
                    <div class="button bg-danger popup-review-trigger" id="delete"  onclick="hapus({{$tugas->id}},{{$kelas->id}})">
                      Hapus
                    </div>
                    <!-- /BUTTON -->
                    <!-- Button trigger modal -->




                  </div>
                  <!-- /TABLE ACTIONS -->
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
        <!-- TABLE WRAP -->

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
  <p class="popup-box-title">Hapus Tugas</p>
  <!-- /POPUP BOX TITLE -->


  <!-- FORM -->
  <form class="form" action="{{url('/kelas/settings/hapustugas')}}" method="post">
    @csrf
    <!-- FORM ROW -->
    <div class="form-row">
      <!-- FORM ITEM -->
      <div class="form-item">
        <!-- FORM INPUT -->
        <div class="form-input small">
          <h2>Apakah anda yakin ingin menghapus tugas ini?</h2>
          <input type="hidden" name="idkelas" id="idkelas">
          <input type="hidden" name="idtugas" id="idtugas">
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
    document.getElementById("idtugas").value = id;
  }
</script>
@endsection
