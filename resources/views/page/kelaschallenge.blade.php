@extends('layouts.app')
@section('title','Challenge Kelas | FunLearning')

@section('content')

<!-- CONTENT GRID -->
<div class="content-grid">
  @foreach($kelas as $kelas)
  <!-- PROFILE HEADER -->
  @include('page.headerkelas')
  <!-- /PROFILE HEADER -->

  @endforeach


      <!-- SECTION HEADER -->
      <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
          <!-- SECTION PRETITLE -->
          <p class="section-pretitle">Kelas</p>
          <!-- /SECTION PRETITLE -->

          <!-- SECTION TITLE -->
          <h2 class="section-title">Challenge</h2>
          <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->
        <!-- SECTION HEADER ACTIONS -->
        <div class="section-header-actions">
          <!-- SECTION HEADER ACTION -->
          @if(Auth::user()->hak_akses=="Dosen")
          <a class="section-header-action" href="{{url('/kelas/settings/challenge/'.$kelas->id)}}" >+ Tambah Challenge</a>
          <!-- /SECTION HEADER ACTION -->
          @endif

        </div>
        <!-- /SECTION HEADER ACTIONS -->
      </div>
      <!-- /SECTION HEADER -->


      <!-- GRID -->
      <div class="grid grid-3-3-3-3 centered">
        @foreach($challenge as $challenge)
        <!-- QUEST ITEM -->
        <div class="quest-item">
          <!-- QUEST ITEM COVER -->
          <figure class="quest-item-cover liquid">
            <?php
              $chcover = array("01.png","02.png","03.png","04.png");
              $cvr = $chcover[array_rand($chcover)];
            ?>
            <img src="{{URL::asset('img/quest/cover/'.$cvr)}}" alt="cover-01">
          </figure>
          <!-- /QUEST ITEM COVER -->

          <!-- TEXT STICKER -->
          <p class="text-sticker small-text">
            <!-- TEXT STICKER ICON -->
            <svg class="text-sticker-icon icon-plus-small">
              <use xlink:href="#svg-plus-small"></use>
            </svg>
            <!-- TEXT STICKER ICON -->
            {{$challenge->poin_challenge}} EXP
          </p>
          <!-- /TEXT STICKER -->

          <!-- QUEST ITEM INFO -->
          <div class="quest-item-info">
            @if($challenge->status =="Open")
            <!-- QUEST ITEM BADGE -->
            <div class="quest-item-badge">
              <img src="{{URL::asset('img/quest/completedq-b.png')}}" alt="completedq-b">
            </div>
            <!-- /QUEST ITEM BADGE -->
            @else
            <!-- QUEST ITEM BADGE -->
            <div class="quest-item-badge">
              <img src="{{URL::asset('img/quest/openq-b.png')}}" alt="openq-b">
            </div>
            <!-- /QUEST ITEM BADGE -->
            @endif

            <!-- QUEST ITEM TITLE -->
            <p class="quest-item-title">{{$challenge->judul_challenge}}</p>
            <!-- /QUEST ITEM TITLE -->

            <!-- QUEST ITEM TEXT -->
            <p class="quest-item-text" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{$challenge->deskripsi_challenge}}</p>
            <!-- /QUEST ITEM TEXT -->

            <!-- PROGRESS STAT -->
            <div class="progress-stat">
              <!-- BAR PROGRESS WRAP -->
              <div class="bar-progress-wrap small">

                <!-- BAR PROGRESS INFO -->
                <p class="bar-progress-info negative start"><span class="text-success">Open  </span> &nbsp at {{$challenge->waktu_mulai}}</p>
                <!-- /BAR PROGRESS INFO -->

                <!-- BAR PROGRESS INFO -->
                <p class="bar-progress-info negative start"><span class="text-danger">Close  </span> &nbsp at {{$challenge->waktu_selesai}}</p>
                <!-- /BAR PROGRESS INFO -->

              </div>
              <!-- /BAR PROGRESS WRAP -->
            </div>
            <!-- /PROGRESS STAT -->

            <!-- QUEST ITEM META -->
            <div class="quest-item-meta">
              <!-- POST OPTION -->
              <a class="post-option" href="{{url('/kelas/challenge/'.$kelas->id.'/info/'.$challenge->id)}}">
                <!-- POST OPTION ICON -->
                <svg class="post-option-icon icon-comment">
                  <use xlink:href="#svg-comment"></use>
                </svg>
                <!-- /POST OPTION ICON -->

                <!-- POST OPTION TEXT -->
                <p class="post-option-text"  >Lihat Detail</p>
                <!-- /POST OPTION TEXT -->
              </a>
              <!-- /POST OPTION -->
            </div>
            <!-- /QUEST ITEM META -->
          </div>
          <!-- /QUEST ITEM INFO -->
        </div>
        <!-- /QUEST ITEM -->
        @endforeach


      </div>
      <!-- /GRID -->



</div>
<!-- /CONTENT GRID -->

@endsection
