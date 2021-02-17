@extends('layouts.app')
@section('title','Ujian| FunLearning')

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
          <h2 class="section-title">Ujian</h2>
          <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->
        <!-- SECTION HEADER ACTIONS -->
        <div class="section-header-actions">
          <!-- SECTION HEADER ACTION -->
          @if(Auth::user()->hak_akses=="Dosen")
          <a class="section-header-action" href="{{url('/kelas/settings/ujian/'.$kelas->id)}}" >+ Buat Ujian</a>
          <!-- /SECTION HEADER ACTION -->
          @endif

        </div>
        <!-- /SECTION HEADER ACTIONS -->
      </div>
      <!-- /SECTION HEADER -->


      <!-- GRID -->
      <div class="grid grid-3-3-3-3 centered">
        @foreach($ujian as $ujian)
        <!-- EVENT PREVIEW -->
        <div class="event-preview">
          <!-- EVENT PREVIEW COVER -->
          <figure class="event-preview-cover liquid">
            <img src="{{URL::asset('img/exam.jpg')}}" alt="cover-47">
          </figure>
          <!-- /EVENT PREVIEW COVER -->

          <!-- EVENT PREVIEW INFO -->
          <div class="event-preview-info">
            <!-- EVENT PREVIEW INFO TOP -->
            <div class="event-preview-info-top">
              <!-- DATE STICKER -->
              <div class="date-sticker">
                <!-- DATE STICKER DAY -->
                <p class="date-sticker-day">{{$ujian->day}}</p>
                <!-- /DATE STICKER DAY -->

                <!-- DATE STICKER MONTH -->
                <p class="date-sticker-month">{{ Str::limit($ujian->month,3,$end="") }}</p>
                <!-- /DATE STICKER MONTH -->
              </div>
              <!-- /DATE STICKER -->

              <!-- EVENT PREVIEW TITLE -->
              <p class="event-preview-title popup-event-information-trigger">{{$ujian->judul_ujian}}</p>
              <!-- /EVENT PREVIEW TITLE -->

              <!-- EVENT PREVIEW TIMESTAMP -->
              <p class="event-preview-timestamp"><span class="bold">{{$ujian->deadline_jam}}</span> </p>
              <!-- /EVENT PREVIEW TIMESTAMP -->

              <!-- EVENT PREVIEW TEXT -->
              <p class="event-preview-text">{!!$ujian->deskripsi_ujian!!}.</p>
              <!-- /EVENT PREVIEW TEXT -->
            </div>
            <!-- /EVENT PREVIEW INFO TOP -->

            <!-- EVENT PREVIEW INFO BOTTOM -->
            <div class="event-preview-info-bottom">

              <!-- BUTTON -->
              <p class="button white white-tertiary" onclick="window.location.href='{{url('/kelas/ujian/'.$kelas->id.'/info/'.$ujian->id)}}'">Lihat Detail</p>
              <!-- /BUTTON -->
            </div>
            <!-- /EVENT PREVIEW INFO BOTTOM -->
          </div>
          <!-- /EVENT PREVIEW INFO -->
        </div>
        <!-- /EVENT PREVIEW -->
        @endforeach


      </div>
      <!-- /GRID -->



</div>
<!-- /CONTENT GRID -->

@endsection
