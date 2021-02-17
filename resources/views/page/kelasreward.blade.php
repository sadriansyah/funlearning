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
          <h2 class="section-title">Rewards</h2>
          <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->
        <!-- SECTION HEADER ACTIONS -->
        <div class="section-header-actions">
          <!-- SECTION HEADER ACTION -->
          @if(Auth::user()->hak_akses=="Dosen")
          <a class="section-header-action" href="{{url('/kelas/settings/rewards/'.$kelas->id)}}" >+ Buat Rewards</a>
          <!-- /SECTION HEADER ACTION -->
          @endif

        </div>
        <!-- /SECTION HEADER ACTIONS -->
      </div>
      <!-- /SECTION HEADER -->



        <!-- GRID -->
        <div class="grid grid-half top-space centered">
          @foreach($rewards as $reward)
          <!-- ACHIEVEMENT BOX -->
          <div class="achievement-box secondary">
            <!-- ACHIEVEMENT BOX INFO WRAP -->
            <div class="achievement-box-info-wrap">
              <!-- ACHIEVEMENT BOX IMAGE -->
              <img class="achievement-box-image" src="{{URL::asset('img/badge/forumsf-b.png')}}" alt="badge-caffeinated-b">
              <!-- /ACHIEVEMENT BOX IMAGE -->

              <!-- ACHIEVEMENT BOX INFO -->
              <div class="achievement-box-info">
                <!-- ACHIEVEMENT BOX TITLE -->
                <p class="achievement-box-title">{{$reward->judul_reward}}</p>
                <!-- /ACHIEVEMENT BOX TITLE -->

                <!-- ACHIEVEMENT BOX TEXT -->
                <p class="achievement-box-text"><span class="bold">{{$reward->nama_mk}}</span> {{$reward->created_at}}</p>
                <!-- /ACHIEVEMENT BOX TEXT -->
              </div>
              <!-- /ACHIEVEMENT BOX INFO -->
            </div>
            <!-- /ACHIEVEMENT BOX INFO WRAP -->

            <!-- BUTTON -->
            <a class="button white-solid" href="{{url('/kelas/rewards/'.$kelas->id.'/info/'.$reward->id)}}">Lihat Detail</a>
            <!-- /BUTTON -->
          </div>
          <!-- /ACHIEVEMENT BOX -->
          @endforeach

        </div>
        <!-- /GRID -->


</div>
<!-- /CONTENT GRID -->

@endsection
