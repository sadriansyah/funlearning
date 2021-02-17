@extends('layouts.app')
@section('title','Kelas  | FunLearning')

@section('content')
<div class="content-grid">
  <!-- SECTION BANNER -->
  <div class="section-banner">
    <!-- SECTION BANNER ICON -->
    <img class="section-banner-icon" src="img/banner/groups-icon.png" alt="groups-icon">
    <!-- /SECTION BANNER ICON -->

    <!-- SECTION BANNER TITLE -->
    <p class="section-banner-title">Kelas</p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">Temukan dan belajar di kelasmu!</p>

    <!-- /SECTION BANNER TEXT -->
  </div>
  <!-- /SECTION BANNER -->

  @if(session('sukses'))
  <div class="mt-4">
    <p class="button primary col-md-12 ">
      {{session('sukses')}}
    </p>
  </div>
  @endif
  @if(session('fail'))
  <div class="mt-4">
    <p class="button bg-danger col-md-12 ">
      {{session('fail')}}
    </p>
  </div>
  @endif




  <!-- SECTION FILTERS BAR -->
  <div class="section-filters-bar v1">

    <!-- SECTION FILTERS BAR ACTIONS -->
    <div class="section-filters-bar-actions">
      <!-- FORM -->
      <form class="form" method="get">
        <!-- FORM INPUT -->
        <div class="form-input small with-button">
          <label for="groups-search">Cari Kelas</label>
          <input type="text" id="groups-search" name="nama_kelas">
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
    @if(Auth::user()->hak_akses=="Dosen")
    <!-- SECTION FILTERS BAR ACTIONS -->
    <div class="section-filters-bar-actions">
      <!-- VIEW ACTIONS -->
      <div class="view-actions">
        <!-- VIEW ACTION -->
        <div class="view-action text-tooltip-tft-medium active" data-title="Tambah Kelas">
          <!-- VIEW ACTION ICON -->
          <button class="button primary popup-manage-group-trigger">
            <!-- ICON MAGNIFYING GLASS -->
          Buat Kelas
            <!-- /ICON MAGNIFYING GLASS -->
          </button>
          <!-- /VIEW ACTION ICON -->

        </div>
        <!-- /VIEW ACTION -->

      </div>
      <!-- /VIEW ACTIONS -->
    </div>
    <!-- /SECTION FILTERS BAR ACTIONS -->
    @endif

  </div>
  <!-- /SECTION FILTERS BAR -->

  <div class="row mt-4 mb-4">
    @foreach($kelas as $k)

    <div class="col-md-4 mt-4">
      <!-- USER PREVIEW -->
      <div class="user-preview">
        <!-- USER PREVIEW COVER -->
        <figure class="user-preview-cover liquid">
          <img src="{{URL::asset('img/cover/'.$k->cover_kelas)}}" alt="cover-29">
        </figure>
        <!-- /USER PREVIEW COVER -->

        <!-- USER PREVIEW INFO -->
        <div class="user-preview-info">
          <!-- TAG STICKER -->
          <div class="tag-sticker">
            <!-- TAG STICKER ICON -->
            <svg class="tag-sticker-icon icon-public">
              <use xlink:href="#svg-public"></use>
            </svg>
            <!-- /TAG STICKER ICON -->
          </div>
          <!-- /TAG STICKER -->

          <!-- USER SHORT DESCRIPTION -->
          <div class="user-short-description">
            <!-- USER SHORT DESCRIPTION AVATAR -->
            <a class="user-short-description-avatar user-avatar medium no-stats" href="{{url('/kelas/info/'.$k->id)}}">
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
                <div class="hexagon-image-100-110" data-src="{{URL::asset('img/avatar/'.$k->profile_photo_path)}}"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR CONTENT -->
            </a>
            <!-- /USER SHORT DESCRIPTION AVATAR -->

            <!-- USER SHORT DESCRIPTION TITLE -->
            <p class="user-short-description-title"><a href="{{url('/kelas/info/'.$k->id)}}">{{$k->nama_mk}}</a></p>
            <!-- /USER SHORT DESCRIPTION TITLE -->

            <!-- USER SHORT DESCRIPTION TEXT -->
            <p class="user-short-description-text">{{$k->nama_user}}</p>
            <!-- /USER SHORT DESCRIPTION TEXT -->
          </div>
          <!-- /USER SHORT DESCRIPTION -->
          <?php
            $auth = Auth::user()->nim_nip;
            $true = "Tidak";
            $summember =0;
            foreach($membercek as $m){
              if($m->nim_nip_user == $auth && $m->id_kelas == $k->id){
                $true = "Tersedia";
              };
            };
            foreach($membercek as $m){
              if($m->id_kelas == $k->id){
                $summember +=1;
              };
            };
           ?>
          <!-- USER STATS -->
          <div class="user-stats">
            <!-- USER STAT -->
            <div class="user-stat">
              <!-- USER STAT TITLE -->
              <p class="user-stat-title">{{$summember}}</p>
              <!-- /USER STAT TITLE -->

              <!-- USER STAT TEXT -->
              <p class="user-stat-text">members</p>
              <!-- /USER STAT TEXT -->
            </div>
            <!-- /USER STAT -->



          </div>
          <!-- /USER STATS -->

          <!-- USER AVATAR LIST -->
          <div class="user-avatar-list medium reverse centered">
            @foreach($membercek as $member)
            @if($member->id_kelas == $k->id)
            <!-- USER AVATAR -->
            <div class="user-avatar smaller no-stats">
              <!-- USER AVATAR BORDER -->
              <div class="user-avatar-border">
                <!-- HEXAGON -->
                <div class="hexagon-34-36"></div>
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
            </div>
            <!-- /USER AVATAR -->
            @endif
            @endforeach



            <!-- USER AVATAR -->
            <a class="user-avatar smaller no-stats" >
              <!-- USER AVATAR BORDER -->
              <div class="user-avatar-border">
                <!-- HEXAGON -->
                <div class="hexagon-34-36"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR BORDER -->

              <!-- USER AVATAR CONTENT -->
              <div class="user-avatar-content">
                <!-- HEXAGON -->
                <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/23.jpg')}}"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR CONTENT -->

              <!-- USER AVATAR OVERLAY -->
              <div class="user-avatar-overlay">
                <!-- HEXAGON -->
                <div class="hexagon-overlay-30-32"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR OVERLAY -->

              <!-- USER AVATAR OVERLAY CONTENT -->
              <div class="user-avatar-overlay-content">
                <!-- USER AVATAR OVERLAY CONTENT TEXT -->
                <p class="user-avatar-overlay-content-text">+</p>
                <!-- /USER AVATAR OVERLAY CONTENT TEXT -->
              </div>
              <!-- /USER AVATAR OVERLAY CONTENT -->
            </a>
            <!-- /USER AVATAR -->
          </div>
          <!-- /USER AVATAR LIST -->

          @if(Auth::user()->hak_akses == "Dosen")
          <!-- USER PREVIEW ACTIONS -->
          <div class="user-preview-actions">


            <!-- BUTTON -->
            <a class="button primary" href="{{url('/kelas/info/'.$k->id)}}">Lihat Kelas</a>
            <!-- /BUTTON -->
          </div>
          <!-- /USER PREVIEW ACTIONS -->
          @endif

          @if(Auth::user()->hak_akses == "Mahasiswa")
              @if($true == "Tersedia")
                <!-- USER PREVIEW ACTIONS -->
                <div class="user-preview-actions">

                  <!-- BUTTON -->
                  <a class="button primary" href="{{url('/kelas/info/'.$k->id)}}">Lihat Kelas</a>
                  <!-- /BUTTON -->
                </div>
                <!-- /USER PREVIEW ACTIONS -->
              @else
                  <!-- USER PREVIEW ACTIONS -->
                  <div class="user-preview-actions">
                    <!-- BUTTON -->
                    <p class="button secondary full popup-manage-joinkelas-trigger">
                      <!-- BUTTON ICON -->
                      <svg class="button-icon icon-join-group">
                        <use xlink:href="#svg-join-group"></use>
                      </svg>
                      <!-- /BUTTON ICON -->
                      Join Kelas!
                    </p>
                    <!-- /BUTTON -->
                  </div>
                  <!-- /USER PREVIEW ACTIONS -->
              @endif
          @endif



        </div>
        <!-- /USER PREVIEW INFO -->
      </div>
      <!-- /USER PREVIEW -->
    </div>
    @endforeach
  </div>


</div>

<!-- POPUP BOX -->
<div class="popup-box mid popup-manage-group">
  <!-- POPUP CLOSE BUTTON -->
  <div class="popup-close-button popup-manage-group-trigger">
    <!-- POPUP CLOSE BUTTON ICON -->
    <svg class="popup-close-button-icon icon-cross">
      <use xlink:href="#svg-cross"></use>
    </svg>
    <!-- /POPUP CLOSE BUTTON ICON -->
  </div>
  <!-- /POPUP CLOSE BUTTON -->

  <!-- POPUP BOX BODY -->
  <div class="popup-box-body">
    <!-- POPUP BOX SIDEBAR -->
    <div class="popup-box-sidebar">
      <!-- USER PREVIEW -->
      <div class="user-preview small">
        <!-- USER PREVIEW COVER -->
        <figure class="user-preview-cover liquid">
          <img src="{{URL::asset('img/cover/29.jpg')}}" alt="cover-29">
        </figure>
        <!-- /USER PREVIEW COVER -->

        <!-- USER PREVIEW INFO -->
        <div class="user-preview-info">
          <!-- USER SHORT DESCRIPTION -->
          <div class="user-short-description small">
            <!-- USER SHORT DESCRIPTION AVATAR -->
            <a class="user-short-description-avatar user-avatar no-stats" >
              <!-- USER AVATAR BORDER -->
              <div class="user-avatar-border">
                <!-- HEXAGON -->
                <div class="hexagon-100-108"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR BORDER -->

              <!-- USER AVATAR CONTENT -->
              <div class="user-avatar-content">
                <!-- HEXAGON -->
                <div class="hexagon-image-84-92" data-src="{{URL::asset('img/avatar/'.Auth::user()->profile_photo_path)}}"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR CONTENT -->
            </a>
            <!-- /USER SHORT DESCRIPTION AVATAR -->

            <!-- USER SHORT DESCRIPTION TITLE -->
            <p class="user-short-description-title small">{{Auth::user()->nama_user}}</p>
            <!-- /USER SHORT DESCRIPTION TITLE -->

            <!-- USER SHORT DESCRIPTION TEXT -->
            <p class="user-short-description-text regular">Buat Kelas</p>
            <!-- /USER SHORT DESCRIPTION TEXT -->
          </div>
          <!-- /USER SHORT DESCRIPTION -->
        </div>
        <!-- /USER PREVIEW INFO -->
      </div>
      <!-- /USER PREVIEW -->


      <form class="form" action="{{url('/kelas/buatkelas')}}" method="post">
        @csrf
      <!-- POPUP BOX SIDEBAR FOOTER -->
      <div class="popup-box-sidebar-footer">
        <!-- BUTTON -->
        <button class="button secondary full popup-manage-group-trigger" type="submit">Save Changes!</button>
        <!-- /BUTTON -->

        <!-- BUTTON -->
        <p class="button white full popup-manage-group-trigger">Discard All</p>
        <!-- /BUTTON -->
      </div>
      <!-- /POPUP BOX SIDEBAR FOOTER -->
    </div>
    <!-- /POPUP BOX SIDEBAR -->

    <!-- POPUP BOX CONTENT -->
    <div class="popup-box-content">
      <!-- WIDGET BOX -->
      <div class="widget-box">
        <!-- WIDGET BOX TITLE -->
        <p class="widget-box-title">Kelas Info</p>
        <!-- /WIDGET BOX TITLE -->

        <!-- WIDGET BOX CONTENT -->
        <div class="widget-box-content">
          <!-- FORM -->

            <!-- FORM ROW -->
            <div class="form-row">
              <!-- FORM ITEM -->
              <div class="form-item">
                <!-- FORM INPUT -->
                <div class="form-input small active">
                  <label for="group-name">Nama Kelas/Mata Kuliah</label>
                  <input type="text" id="group-name" name="nama_mk" required>
                </div>
                <!-- /FORM INPUT -->
              </div>
              <!-- /FORM ITEM -->
            </div>
            <!-- /FORM ROW -->

            <!-- FORM ROW -->
            <div class="form-row">
              <!-- FORM ITEM -->
              <div class="form-item">
                <!-- FORM INPUT -->
                <div class="form-input small active">
                  <label for="group-tagline">Kode Mata Kuliah</label>
                  <input type="text" id="group-tagline" name="kode_mk" required  >
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
    </div>
    <!-- /POPUP BOX CONTENT -->
  </div>
  <!-- /POPUP BOX BODY -->
</div>
<!-- /POPUP BOX -->

<!-- POPUP BOX -->
<div class="popup-box mid popup-manage-joinkelas" style="width:40%">
  <!-- POPUP CLOSE BUTTON -->
  <div class="popup-close-button popup-manage-joinkelas-trigger">
    <!-- POPUP CLOSE BUTTON ICON -->
    <svg class="popup-close-button-icon icon-cross">
      <use xlink:href="#svg-cross"></use>
    </svg>
    <!-- /POPUP CLOSE BUTTON ICON -->
  </div>
  <!-- /POPUP CLOSE BUTTON -->

  <!-- POPUP BOX BODY -->
  <div class="popup-box-body">

    <!-- POPUP BOX CONTENT -->
    <div class="popup-box-content w-full" style="width:100%">
      <!-- WIDGET BOX -->
      <div class="widget-box">
        <!-- WIDGET BOX TITLE -->
        <p class="widget-box-title">Join Kelas</p>
        <!-- /WIDGET BOX TITLE -->

        <!-- WIDGET BOX CONTENT -->
        <div class="widget-box-content ">
          <!-- FORM -->
          <form class="form" action="{{url('/kelas/joinkelas')}}" method="post">
            @csrf
            <div class="row">
            <!-- FORM ROW -->
            <div class=" col-md-8">
              <!-- FORM ITEM -->
              <div class="form-item full">
                <!-- FORM INPUT -->
                <div class="form-input active">
                  <label for="kodekelas">Kode Kelas</label>
                  <input type="text" id="kode_kelas" name="kodekelas" >
                </div>
                <!-- /FORM INPUT -->
              </div>
              <!-- /FORM ITEM -->

            </div>
            <!-- /FORM ROW -->
            <div class="col-md-4">

              <!-- BUTTON -->
              <button class="button secondary full " type="submit">Join</button>
              <!-- /BUTTON -->
            </div>
            </div>




          </form>
          <!-- /FORM -->
        </div>
        <!-- WIDGET BOX CONTENT -->
      </div>
      <!-- /WIDGET BOX -->
    </div>
    <!-- /POPUP BOX CONTENT -->
  </div>
  <!-- /POPUP BOX BODY -->
</div>
<!-- /POPUP BOX -->

@endsection

@section('scripting')
<script type="text/javascript">

  function btnload(memberid,kelasid){

  };
</script>
@endsection
