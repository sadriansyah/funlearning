@extends('layouts.app')
@section('title','Rewards | Funlearning')

@section('content')

  <!-- CONTENT GRID -->
  @foreach($kelas as $kelas)
  <div class="content-grid">
    <!-- PROFILE HEADER -->
    @include('page.headerkelas')
    <!-- /PROFILE HEADER -->


    @foreach($rewards as $reward)
    <!-- SECTION HEADER -->
    <div class="section-header">
      <!-- SECTION HEADER INFO -->
      <div class="section-header-info">
        <!-- SECTION PRETITLE -->
        <p class="section-pretitle">Reward</p>
        <!-- /SECTION PRETITLE -->

        <!-- SECTION TITLE -->
        <h2 class="section-title">Reward Info</h2>
        <!-- /SECTION TITLE -->
      </div>
      <!-- /SECTION HEADER INFO -->

      <!-- SECTION HEADER ACTIONS -->
      <div class="section-header-actions">
        <!-- SECTION HEADER SUBSECTION -->
        <a class="section-header-subsection" >Kelas</a>
        <!-- /SECTION HEADER SUBSECTION -->

        <!-- SECTION HEADER SUBSECTION -->
        <a class="section-header-subsection" >Reward</a>
        <!-- /SECTION HEADER SUBSECTION -->

        <!-- SECTION HEADER SUBSECTION -->
        <p class="section-header-subsection">{{$reward->judul_reward}}</p>
        <!-- /SECTION HEADER SUBSECTION -->
      </div>
      <!-- /SECTION HEADER ACTIONS -->
    </div>
    <!-- /SECTION HEADER -->

    <!-- GRID -->
    <div class="grid grid-9-3">

      <!-- WIDGET BOX -->
      <div class="widget-box no-padding">
        <!-- WIDGET BOX SETTINGS -->
        @if(Auth::user()->hak_akses=='Dosen')
        <div class="widget-box-settings">
          <!-- POST SETTINGS WRAP -->
          <div class="post-settings-wrap">
            <!-- POST SETTINGS -->
            <div class="post-settings widget-box-post-settings-dropdown-trigger">
              <!-- POST SETTINGS ICON -->
              <svg class="post-settings-icon icon-more-dots">
                <use xlink:href="#svg-more-dots"></use>
              </svg>
              <!-- /POST SETTINGS ICON -->
            </div>
            <!-- /POST SETTINGS -->

            <!-- SIMPLE DROPDOWN -->
            <div class="simple-dropdown widget-box-post-settings-dropdown">
              <!-- SIMPLE DROPDOWN LINK -->
              <a class="simple-dropdown-link" href="{{url('/kelas/settings/rewards/'.$kelas->id.'/editreward/'.$reward->id)}}">Edit Reward</a>
              <!-- /SIMPLE DROPDOWN LINK -->



            </div>
            <!-- /SIMPLE DROPDOWN -->
          </div>
          <!-- /POST SETTINGS WRAP -->
        </div>
        <!-- /WIDGET BOX SETTINGS -->
        @endif



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
                    <div class="hexagon-image-30-32" data-src="{{URL::asset('img/quest/completedq-l.png')}}"></div>
                    <!-- /HEXAGON -->
                  </div>
                  <!-- /USER AVATAR CONTENT -->

                </div>
                <!-- /USER AVATAR -->
              </a>
              <!-- /USER STATUS AVATAR -->

              <!-- USER STATUS TITLE -->
              <p class="user-status-title medium"><a class="bold">{{$reward->judul_reward}}</a></p>
              <!-- /USER STATUS TITLE -->

              <!-- USER STATUS TEXT -->
              <p class="user-status-text small"> Dibuat tanggal {{$reward->created_at}}</p>
              <!-- /USER STATUS TEXT -->
            </div>
            <!-- /USER STATUS -->

            <!-- WIDGET BOX STATUS TEXT -->
            <p class="widget-box-status-text mb-4">{{$reward->deskripsi_reward}}</p>
            <!-- /WIDGET BOX STATUS TEXT -->
            <!-- CONTENT ACTIONS -->
            <div class="content-actions">
            </div>
            @if(Auth::user()->hak_akses=='Dosen')
            <!-- /CONTENT ACTIONS -->
              <p class="widget-box-status-text mb-4" id="hiddenitems">{{$reward->hidden_reward}}</p>
            @else
              @if($answer)
                <p class="widget-box-status-text mb-4" id="hiddenitems">{{$reward->hidden_reward}}</p>
              @else
                <p class="widget-box-status-text mb-4" id="hiddenitems">Klaim Untuk Lihat </p>
              @endif
            @endif
          </div>
          <!-- /WIDGET BOX STATUS CONTENT -->
        </div>
        <!-- /WIDGET BOX STATUS -->
        <!-- POST OPTIONS -->
        <div class="post-options">
          <p class="widget-box-status-text mb-4 text-danger" id="Requirement"></p>
          <!-- POST OPTION WRAP -->
        </div>
        <!-- /POST OPTIONS -->
      </div>
      <!-- /WIDGET BOX -->



      <!-- MARKETPLACE SIDEBAR -->
      <div class="marketplace-sidebar">
        <!-- WIDGET BOX -->
        <div class="widget-box">
          <!-- WIDGET BOX CONTROLS -->
          <div class="widget-box-controls">
            <!-- SLIDER CONTROLS -->
            <div id="badge-stat-slider-controls" class="slider-controls">
              <!-- SLIDER CONTROL -->
              <div class="slider-control left">
                <!-- SLIDER CONTROL ICON -->
                <svg class="slider-control-icon icon-small-arrow">
                  <use xlink:href="#svg-small-arrow"></use>
                </svg>
                <!-- /SLIDER CONTROL ICON -->
              </div>
              <!-- /SLIDER CONTROL -->

              <!-- SLIDER CONTROL -->
              <div class="slider-control right">
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
          <!-- /WIDGET BOX CONTROLS -->

          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title ">Hadiah Dan Syarat</p>
          <!-- /WIDGET BOX TITLE -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- WIDGET BOX CONTENT SLIDER -->
            <div id="badge-stat-slider-items" class="widget-box-content-slider">
              <!-- WIDGET BOX CONTENT SLIDER ITEM -->
              <div class="widget-box-content-slider-item">
                <!-- BADGE ITEM STAT -->
                <div class="badge-item-stat void">
                  <!-- TEXT STICKER -->
                  <p class="text-sticker">
                    <!-- TEXT STICKER ICON -->
                    <svg class="text-sticker-icon icon-plus-small">
                      <use xlink:href="#svg-plus-small"></use>
                    </svg>
                    <!-- TEXT STICKER ICON -->
                    {{$reward->poin_reward}} Exp
                  </p>
                  <!-- /TEXT STICKER -->
                  @if($files)
                    @foreach($files as $file)
                  <!-- BADGE ITEM STAT IMAGE -->
                  <img class="badge-item-stat-image" src="{{URL::asset('img/reward/'.$file->pathfile)}}" style="40px" alt="badge-uexp-b">
                  <!-- /BADGE ITEM STAT IMAGE -->
                  @endforeach
                @endif

                  <!-- BADGE ITEM STAT TITLE -->
                  <p class="badge-item-stat-title mt-4" style="margin-top:190px">-</p>
                  <!-- /BADGE ITEM STAT TITLE -->
                  <input type="hidden" id="idreward" value="{{$reward->id}}">
                  <!-- BADGE ITEM STAT TEXT -->
                  <p class="badge-item-stat-text">Level yang dibutuhkan untuk mengklaim minimum level {{$reward->minimum_level}} dan batasan klaim sebanyak {{$reward->batasan_klaim}} kali. @if($reward->id_trigger != "")  Untuk mengklaim anda pastikan anda telah menyelesaikan {{$reward->tipe}} yang berjudul {{$reward->judul_reward}}.@endif</p>
                  <!-- /BADGE ITEM STAT TEXT -->
                  @if(Auth::user()->hak_akses=='Mahasiswa')
                <div class="sidebar-box-items mt-4">
                  @if($answer)
                  <!-- BUTTON -->
                  <p class="button bg-warning full" id="displayhasil" >Telah diKlaim</p>
                  <!-- /BUTTON -->
                  @else
                  <!-- BUTTON -->
                  <p class="button primmary full" id="displayhasil" onclick="klaim()">Klaim</p>
                  <!-- /BUTTON -->
                  @endif
                </div>
                @endif

                </div>
                <!-- /BADGE ITEM STAT -->
              </div>
              <!-- /WIDGET BOX CONTENT SLIDER ITEM -->


            </div>
            <!-- /WIDGET BOX CONTENT SLIDER -->
          </div>
          <!-- /WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->


      </div>
      <!-- /MARKETPLACE SIDEBAR -->
    </div>
    <!-- /GRID -->
    @endforeach
  </div>
  @endforeach

@endsection
@section('scripting')
<script type="text/javascript">

  function klaim(){
    var idreward = document.getElementById("idreward").value;
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      type:'POST',
      url:"{{url('/klaimreward')}}",
      data:{
        idreward : idreward,
        _token : CSRF_TOKEN
      },success:function(response){
        if(response=="Belum Mengerjakan Tugas" || response=="Belum Mengerjakan Challenge" || response=="Level Belum Mencukupi"){
          document.getElementById("Requirement").innerHTML = response;
        }else {
          document.getElementById("displayhasil").innerHTML = "Telah diKlaim";
          document.getElementById("displayhasil").removeAttribute("class");
          document.getElementById("displayhasil").removeAttribute("onclick");
          document.getElementById("hiddenitems").innerHTML = response;
          document.getElementById("displayhasil").setAttribute("class","button bg-warning");
        }
      }
    });
  }


</script>
@endsection
