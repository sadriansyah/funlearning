@extends('layouts.app')
@section('title','Beranda | FunLearning')

@section('content')

  <!-- CONTENT GRID -->
  <div class="content-grid">
    <!-- SECTION BANNER -->
    <div class="section-banner">
      <!-- SECTION BANNER ICON -->
      <img class="section-banner-icon" src="{{URL::asset('img/banner/newsfeed-icon.png')}}" alt="newsfeed-icon">
      <!-- /SECTION BANNER ICON -->

      <!-- SECTION BANNER TITLE -->
      <p class="section-banner-title">Beranda</p>
      <!-- /SECTION BANNER TITLE -->

      <!-- SECTION BANNER TEXT -->
      <p class="section-banner-text">Lihat Feed Terbaru!</p>
      <!-- /SECTION BANNER TEXT -->
    </div>
    <!-- /SECTION BANNER -->

    <!-- GRID -->
    <div class="grid grid-3-6-3 mobile-prefer-content">
      <!-- GRID COLUMN -->
      <div class="grid-column">
        @if($topleaderboard)
        <!-- STATS BOX SLIDER -->
        <div class="stats-box-slider">
          <!-- STATS BOX SLIDER CONTROLS -->
          <div class="stats-box-slider-controls">
            <!-- STATS BOX SLIDER CONTROLS TITLE -->
            <p class="stats-box-slider-controls-title"></p>
            <!-- /STATS BOX SLIDER CONTROLS TITLE -->

            <!-- SLIDER CONTROLS -->
            <div id="stats-box-slider-controls" class="slider-controls">
              <!-- SLIDER CONTROL -->
              <div class="slider-control negative left">
                <!-- SLIDER CONTROL ICON -->
                <svg class="slider-control-icon icon-small-arrow">
                  <use xlink:href="#svg-small-arrow"></use>
                </svg>
                <!-- /SLIDER CONTROL ICON -->
              </div>
              <!-- /SLIDER CONTROL -->

              <!-- SLIDER CONTROL -->
              <div class="slider-control negative right">
                <!-- SLIDER CONTROL ICON -->
                <svg class="slider-control-icon icon-small-arrow">
                  <use xlink:href="#svg-small-arrow"></use>
                </svg>
                <!-- /SLIDER CONTROL ICON -->
              </div>
              <!-- /SLIDER CONTROL -->
            </div>
            <!-- /SLIDER CONTROLS -->
          </div>
          <!-- /STATS BOX SLIDER CONTROLS -->

          <!-- STATS BOX SLIDER ITEMS -->
          <div id="stats-box-slider-items" class="stats-box-slider-items">
            @foreach($topleaderboard as $top)
            <!-- FEATURED STAT BOX -->
            <div class="featured-stat-box @if($loop->iteration == 1) reactioner @else commenter @endif">
              <!-- FEATURED STAT BOX COVER -->
              <div class="featured-stat-box-cover">
                <!-- FEATURED STAT BOX COVER TITLE -->
                <p class="featured-stat-box-cover-title">Top {{$loop->iteration}}</p>
                <!-- /FEATURED STAT BOX COVER TITLE -->

                <!-- FEATURED STAT BOX COVER TEXT -->
                <p class="featured-stat-box-cover-text">of Global Poin</p>
                <!-- /FEATURED STAT BOX COVER TEXT -->
              </div>
              <!-- /FEATURED STAT BOX COVER -->

              <!-- FEATURED STAT BOX INFO -->
              <div class="featured-stat-box-info">
                <!-- USER AVATAR -->
                <div class="user-avatar small">
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
                    <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/'.$top->profile_photo_path)}}"></div>
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
                    <p class="user-avatar-badge-text">{{$top->level}}</p>
                    <!-- /USER AVATAR BADGE TEXT -->
                  </div>
                  <!-- /USER AVATAR BADGE -->
                </div>
                <!-- /USER AVATAR -->

                <!-- FEATURED STAT BOX TITLE -->
                <p class="featured-stat-box-title">{{$top->jumlah_poin}}</p>
                <!-- /FEATURED STAT BOX TITLE -->

                <!-- FEATURED STAT BOX SUBTITLE -->
                <p class="featured-stat-box-subtitle">{{$top->nama_user}}</p>
                <!-- /FEATURED STAT BOX SUBTITLE -->

                <!-- FEATURED STAT BOX TEXT -->
                <p class="featured-stat-box-text">{{$top->nim_nip}}</p>
                <!-- /FEATURED STAT BOX TEXT -->
              </div>
              <!-- /FEATURED STAT BOX INFO -->
            </div>
            <!-- /FEATURED STAT BOX -->
            @endforeach
          </div>
          <!-- /STATS BOX SLIDER ITEMS -->
        </div>
        <!-- /STATS BOX SLIDER -->
        @endif




        <!-- WIDGET BOX -->
        <div class="widget-box">

          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">Tugas Kelas <span class="highlighted">Upcoming</span></p>
          <!-- /WIDGET BOX TITLE -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- EVENT PREVIEW LIST -->
            <div class="event-preview-list">
              @foreach($tugas as $tugas)
              <!-- EVENT PREVIEW -->
              <div class="event-preview small">
                <!-- EVENT PREVIEW COVER -->
                <figure class="event-preview-cover liquid">
                  <img src="{{URL::asset('img/ch.jpg')}}" alt="cover-33">
                </figure>
                <!-- /EVENT PREVIEW COVER -->

                <!-- EVENT PREVIEW INFO -->
                <div class="event-preview-info">
                  <!-- DATE STICKER -->
                  <div class="date-sticker">
                    <!-- DATE STICKER DAY -->
                    <p class="date-sticker-day">{{$tugas->day}}</p>
                    <!-- /DATE STICKER DAY -->

                    <!-- DATE STICKER MONTH -->
                    <p class="date-sticker-month">{{ Str::limit($tugas->month,3, $end='') }}</p>
                    <!-- /DATE STICKER MONTH -->
                  </div>
                  <!-- /DATE STICKER -->

                  <!-- EVENT PREVIEW TITLE -->
                  <a class="event-preview-title popup-event-information-trigger" href="{{url('/kelas/info/'.$tugas->id_kelas.'/tugas/'.$tugas->id)}}">{{$tugas->judul_tugas}}</a>
                  <!-- /EVENT PREVIEW TITLE -->

                  <!-- EVENT PREVIEW TIMESTAMP -->
                  <p class="event-preview-timestamp">{{$tugas->deadline_jam}}</p>
                  <!-- /EVENT PREVIEW TIMESTAMP -->

                  <!-- EVENT PREVIEW TEXT -->
                  <p class="event-preview-text">{!! Str::limit($tugas->deskripsi_tugas,50,$end='...')!!}</p>
                  <!-- /EVENT PREVIEW TEXT -->

                </div>
                <!-- /EVENT PREVIEW INFO -->
              </div>
              <!-- /EVENT PREVIEW -->
              @endforeach

            </div>
            <!-- /EVENT PREVIEW LIST -->
          </div>
          <!-- WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
      </div>
      <!-- /GRID COLUMN -->

      <!-- GRID COLUMN -->
      <div class="grid-column">

        <!-- SIMPLE TAB ITEMS -->
        <div class="simple-tab-items">

          <!-- SIMPLE TAB ITEM -->
          <p class="simple-tab-item active">All Updates</p>
          <!-- /SIMPLE TAB ITEM -->


        </div>
        @if($feeds)
        <!-- /SIMPLE TAB ITEMS -->
        @foreach($feeds as $feed)
        <!-- WIDGET BOX -->
        <div class="widget-box no-padding">

          <!-- WIDGET BOX STATUS -->
          <div class="widget-box-status">

            <!-- WIDGET BOX STATUS CONTENT -->
            <div class="widget-box-status-content">
              <!-- USER STATUS -->
              <div class="user-status">
                <!-- USER STATUS AVATAR -->
                <a class="user-status-avatar">
                  <!-- USER AVATAR -->
                  <div class="user-avatar small no-outline">
                    <!-- USER AVATAR CONTENT -->
                    <div class="user-avatar-content">
                      <!-- HEXAGON -->
                      <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/'.$feed['profile_photo_path'])}}"></div>
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
                      <p class="user-avatar-badge-text">{{$feed['level']}}</p>
                      <!-- /USER AVATAR BADGE TEXT -->
                    </div>
                    <!-- /USER AVATAR BADGE -->
                  </div>
                  <!-- /USER AVATAR -->
                </a>
                <!-- /USER STATUS AVATAR -->

                <!-- USER STATUS TITLE -->
                <p class="user-status-title medium"><a class="bold">{{$feed['nama_user']}} - {{$feed['nama_mk']}}</a></p>
                <!-- /USER STATUS TITLE -->

                <!-- USER STATUS TEXT -->
                <p class="user-status-text small">{{ Carbon\Carbon::parse($feed['created_at'])->diffForHumans()  }} - {{$feed['tipe']}}</p>
                <!-- /USER STATUS TEXT -->
              </div>
              <!-- /USER STATUS -->

              <!-- WIDGET BOX STATUS TEXT -->
              <p class="widget-box-status-text"> <b>{{$feed['judul']}} </b>  <br> <?php echo nl2br($feed['deskripsi']); ?></p>
              <!-- /WIDGET BOX STATUS TEXT -->
              @if($files)
              @foreach($files as $file)
              @if($file->type== $feed['tipe'] && $file->id_foreign == $feed['id'])

                <!-- VIDEO STATUS -->
                <a class="video-status" href="{{url('/show?file='.$file->pathfile.'&kelas='.$feed['nama_mk'].$feed['id_kelas'].'&tipe='.$feed['tipe'])}}" target="_blank">
                  <!-- VIDEO STATUS INFO -->
                  <div class="video-status-info">
                    <!-- VIDEO STATUS META -->
                    <p class="video-status-meta">{{$file->namafile}}</p>
                    <!-- /VIDEO STATUS META -->
                  </div>
                  <!-- /VIDEO STATUS INFO -->
                </a>
                <!-- /VIDEO STATUS -->
                @endif
              @endforeach
              @endif


              <!-- CONTENT ACTIONS -->
              <div class="content-actions">
                <!-- CONTENT ACTION -->
                <div class="content-action">
                  <!-- POST OPTION -->
                  @if($feed['tipe'] == 'Tugas')
                  <a class="post-option" href="{{url('/kelas/info/'.$feed['id_kelas'].'/tugas/'.$feed['id'])}}">
                    <!-- POST OPTION ICON -->
                    <svg class="post-option-icon icon-comment">
                      <use xlink:href="#svg-comment"></use>
                    </svg>
                    <!-- /POST OPTION ICON -->

                    <!-- POST OPTION TEXT -->
                    <p class="post-option-text" >Lihat Detail</p>
                    <!-- /POST OPTION TEXT -->
                  </a>
                  @elseif($feed['tipe'] == 'Challenge')
                  <a class="post-option" href="{{url('/kelas/challenge/'.$feed['id_kelas'].'/info/'.$feed['id'])}}">
                    <!-- POST OPTION ICON -->
                    <svg class="post-option-icon icon-comment">
                      <use xlink:href="#svg-comment"></use>
                    </svg>
                    <!-- /POST OPTION ICON -->

                    <!-- POST OPTION TEXT -->
                    <p class="post-option-text" >Lihat Detail</p>
                    <!-- /POST OPTION TEXT -->
                  </a>
                  @endif
                  <!-- /POST OPTION -->
                  <!-- META LINE -->
                </div>
                <!-- /CONTENT ACTION -->
              </div>
              <!-- /CONTENT ACTIONS -->
            </div>
            <!-- /WIDGET BOX STATUS CONTENT -->
          </div>
          <!-- /WIDGET BOX STATUS -->
        </div>
        <!-- /WIDGET BOX -->
        @endforeach
        @else
        <!-- SIMPLE TAB ITEMS -->
        <div class="simple-tab-items">

          <!-- SIMPLE TAB ITEM -->
          <p >Belum ada feeds</p>
          <!-- /SIMPLE TAB ITEM -->


        </div>
        @endif


      </div>
      <!-- /GRID COLUMN -->

      <!-- GRID COLUMN -->
      <div class="grid-column">


        <!-- WIDGET BOX -->
        <div class="widget-box no-padding">
          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">Jadwal Ujian, Quis, dan Post Test</p>
          <!-- /WIDGET BOX TITLE -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">


            <!-- CALENDAR EVENTS PREVIEW -->
            <div class="calendar-events-preview small">
              <?php
                $cek = false;
                $daybefore = "";
               ?>
               @foreach($ujians as $ujian)
               <?php
                $daycek = $ujian->hari;
                if($daycek == $daybefore){
                  $cek = false;
                }else {
                  $cek = true;
                  $daybefore = $daycek;
                }
               ?>

               @if($cek == 'false')
              <!-- CALENDAR EVENTS PREVIEW TITLE -->
              <p class="calendar-events-preview-title mt-2">{{$ujian->hari}}</p>
              <!-- /CALENDAR EVENTS PREVIEW TITLE -->

              <!-- CALENDAR EVENT PREVIEW LIST -->
              <div class="calendar-event-preview-list">
                <!-- CALENDAR EVENT PREVIEW -->
                <div class="calendar-event-preview small secondary">
                  <!-- CALENDAR EVENT PREVIEW START TIME -->
                  <div class="calendar-event-preview-start-time">
                    <!-- CALENDAR EVENT PREVIEW START TIME TITLE -->
                    <p class="calendar-event-preview-start-time-title">{{$ujian->deadline_jam}}</p>
                    <!-- /CALENDAR EVENT PREVIEW START TIME TITLE -->

                    <!-- CALENDAR EVENT PREVIEW START TIME TEXT -->
                    <p class="calendar-event-preview-start-time-text">{{$ujian->tipe_ujian}}</p>
                    <!-- /CALENDAR EVENT PREVIEW START TIME TEXT -->
                  </div>
                  <!-- /CALENDAR EVENT PREVIEW START TIME -->

                  <!-- CALENDAR EVENT PREVIEW INFO -->
                  <div class="calendar-event-preview-info">
                    <!-- CALENDAR EVENT PREVIEW TITLE -->
                    <a class="calendar-event-preview-title" href="{{url('/kelas/ujian/'.$ujian->id_kelas.'/info/'.$ujian->id)}}">{{$ujian->judul_ujian}}</a>
                    <!-- /CALENDAR EVENT PREVIEW TITLE -->

                    <!-- CALENDAR EVENT PREVIEW TEXT -->
                    <p class="calendar-event-preview-text">{!!$ujian->deskripsi_ujian!!}.</p>
                    <!-- /CALENDAR EVENT PREVIEW TEXT -->
                  </div>
                  <!-- /CALENDAR EVENT PREVIEW INFO -->
                </div>
                <!-- /CALENDAR EVENT PREVIEW -->
              </div>
              <!-- /CALENDAR EVENT PREVIEW LIST -->
              @else
              <!-- CALENDAR EVENT PREVIEW LIST -->
              <div class="calendar-event-preview-list">
                <!-- CALENDAR EVENT PREVIEW -->
                <div class="calendar-event-preview small secondary">
                  <!-- CALENDAR EVENT PREVIEW START TIME -->
                  <div class="calendar-event-preview-start-time">
                    <!-- CALENDAR EVENT PREVIEW START TIME TITLE -->
                    <p class="calendar-event-preview-start-time-title">{{$ujian->deadline_jam}}</p>
                    <!-- /CALENDAR EVENT PREVIEW START TIME TITLE -->

                    <!-- CALENDAR EVENT PREVIEW START TIME TEXT -->
                    <p class="calendar-event-preview-start-time-text">{{$ujian->tipe_ujian}}</p>
                    <!-- /CALENDAR EVENT PREVIEW START TIME TEXT -->
                  </div>
                  <!-- /CALENDAR EVENT PREVIEW START TIME -->

                  <!-- CALENDAR EVENT PREVIEW INFO -->
                  <div class="calendar-event-preview-info">
                    <!-- CALENDAR EVENT PREVIEW TITLE -->
                    <a class="calendar-event-preview-title" href="{{url('/kelas/ujian/'.$ujian->id_kelas.'/info/'.$ujian->id)}}">{{$ujian->judul_ujian}}</a>
                    <!-- /CALENDAR EVENT PREVIEW TITLE -->

                    <!-- CALENDAR EVENT PREVIEW TEXT -->
                    <p class="calendar-event-preview-text">{!!$ujian->deskripsi_ujian!!}.</p>
                    <!-- /CALENDAR EVENT PREVIEW TEXT -->
                  </div>
                  <!-- /CALENDAR EVENT PREVIEW INFO -->
                </div>
                <!-- /CALENDAR EVENT PREVIEW -->
              </div>
              <!-- /CALENDAR EVENT PREVIEW LIST -->
              @endif
              @endforeach
            </div>
            <!-- /CALENDAR EVENTS PREVIEW -->
          </div>
          <!-- /WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->


        <!-- WIDGET BOX -->
        <div class="widget-box">


          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">Kelas Saya</p>
          <!-- /WIDGET BOX TITLE -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">


            <!-- USER STATUS LIST -->
            <div class="user-status-list">
              @foreach($myclass as $kelas)
              <!-- USER STATUS -->
              <div class="user-status request-small">
                <!-- USER STATUS AVATAR -->
                <a class="user-status-avatar" href="{{url('/kelas/info/'.$kelas->id)}}">
                  <!-- USER AVATAR -->
                  <div class="user-avatar small no-border">
                    <!-- USER AVATAR CONTENT -->
                    <div class="user-avatar-content">
                      <!-- HEXAGON -->
                      <div class="hexagon-image-40-44" data-src="{{URL::asset('img/avatar/'.$kelas->profile_photo_path)}}"></div>
                      <!-- /HEXAGON -->
                    </div>
                    <!-- /USER AVATAR CONTENT -->
                  </div>
                  <!-- /USER AVATAR -->
                </a>
                <!-- /USER STATUS AVATAR -->

                <!-- USER STATUS TITLE -->
                <p class="user-status-title"><a class="bold" href="{{url('/kelas/info/'.$kelas->id)}}">{{$kelas->nama_mk}}</a></p>
                <!-- /USER STATUS TITLE -->
                <?php
                  $totalmember = 0;
                  foreach($members as $member){
                    if($member->id_kelas == $kelas->id){
                      $totalmember +=1;
                    }
                  }
                ?>
                <!-- USER STATUS TEXT -->
                <p class="user-status-text small">{{$totalmember}} members</p>
                <!-- /USER STATUS TEXT -->


              </div>
              <!-- /USER STATUS -->
              @endforeach


            </div>
            <!-- /USER STATUS LIST -->
          </div>
          <!-- WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
      </div>
      <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
  </div>
@endsection
