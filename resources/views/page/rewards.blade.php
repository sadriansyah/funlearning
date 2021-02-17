@extends('layouts.app')
@section('title','Rewards | FunLearning');

@section('content')
<!-- CONTENT GRID -->
<div class="content-grid">
  <!-- SECTION BANNER -->
  <div class="section-banner">
    <!-- SECTION BANNER ICON -->
    <img class="section-banner-icon" src="{{URL::asset('img/banner/badges-icon.png')}}" alt="badges-icon">
    <!-- /SECTION BANNER ICON -->

    <!-- SECTION BANNER TITLE -->
    <p class="section-banner-title">Rewards</p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">Ambil reward pencapaian mu!</p>
    <!-- /SECTION BANNER TEXT -->
  </div>
  <!-- /SECTION BANNER -->

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
      <a class="button white-solid" href="{{url('/kelas/rewards/'.$reward->idkelas.'/info/'.$reward->id)}}">Lihat Detail</a>
      <!-- /BUTTON -->
    </div>
    <!-- /ACHIEVEMENT BOX -->
    @endforeach
  </div>
  <!-- /GRID -->
</div>
<!-- /CONTENT GRID -->

@endsection
