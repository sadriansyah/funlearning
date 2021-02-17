@extends('layouts.app')
@section('title','Leaderboard | Funlearning')
@section('content')
<!-- CONTENT GRID -->
<div class="content-grid">
  <!-- SECTION BANNER -->
  <div class="section-banner">
    <!-- SECTION BANNER ICON -->
    <img class="section-banner-icon" src="img/banner/overview-icon.png" alt="overview-icon">
    <!-- /SECTION BANNER ICON -->

    <!-- SECTION BANNER TITLE -->
    <p class="section-banner-title">Leaderboard</p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">Kejar Terus Top Global di Funlearning!</p>
    <!-- /SECTION BANNER TEXT -->
  </div>
  <!-- /SECTION BANNER -->

  <!-- SECTION HEADER -->
  <div class="section-header">
    <!-- SECTION HEADER INFO -->
    <div class="section-header-info">
      <!-- SECTION PRETITLE -->
      <p class="section-pretitle">Funlearning</p>
      <!-- /SECTION PRETITLE -->

      <!-- SECTION TITLE -->
      <h2 class="section-title">Leaderboard</h2>
      <!-- /SECTION TITLE -->
    </div>
    <!-- /SECTION HEADER INFO -->
  </div>
  <!-- /SECTION HEADER -->

  <!-- GRID -->
  <div class="grid">

    <!-- GRID -->
    <div class="grid grid-layout-1 mt-4">
      @foreach($self as $self)
        @if($self->nim_nip == Auth::user()->nim_nip)
          <!-- GRID COLUMN -->
          <div class="grid-sidebar">
            <!-- PROFILE STATS -->
            <div class="profile-stats fixed-height">
              <!-- PROFILE STATS COVER -->
              <div class="profile-stats-cover">
                <!-- PROFILE STATS COVER TITLE -->
                <p class="profile-stats-cover-title">Welcome Back!</p>
                <!-- /PROFILE STATS COVER TITLE -->

                <!-- PROFILE STATS COVER TEXT -->
                <p class="profile-stats-cover-text">{{$self->nama_user}}</p>
                <!-- /PROFILE STATS COVER TEXT -->
              </div>
              <!-- /PROFILE STATS COVER -->

              <!-- PROFILE STATS INFO -->
              <div class="profile-stats-info">
                <!-- USER AVATAR -->
                <div class="user-avatar medium">
                  <!-- USER AVATAR BORDER -->
                  <div class="user-avatar-border">
                    <!-- HEXAGON -->
                    <div class="hexagon-120-132"></div>
                    <!-- /HEXAGON -->
                  </div>
                  <!-- /USER AVATAR BORDER -->

                  <!-- USER AVATAR CONTENT -->
                  <div class="user-avatar-content">
                    <!-- HEXAGON -->
                    <div class="hexagon-image-82-90" data-src="{{URL::asset('img/avatar/01.jpg')}}"></div>
                    <!-- /HEXAGON -->
                  </div>
                  <!-- /USER AVATAR CONTENT -->

                  <!-- USER AVATAR PROGRESS -->
                  <div class="user-avatar-progress">
                    <!-- HEXAGON -->
                    <div class="hexagon-progress-100-110"></div>
                    <!-- /HEXAGON -->
                  </div>
                  <!-- /USER AVATAR PROGRESS -->

                  <!-- USER AVATAR PROGRESS BORDER -->
                  <div class="user-avatar-progress-border">
                    <!-- HEXAGON -->
                    <div class="hexagon-border-100-110"></div>
                    <!-- /HEXAGON -->
                  </div>
                  <!-- /USER AVATAR PROGRESS BORDER -->

                  <!-- USER AVATAR BADGE -->
                  <div class="user-avatar-badge">
                    <!-- USER AVATAR BADGE BORDER -->
                    <div class="user-avatar-badge-border">
                      <!-- HEXAGON -->
                      <div class="hexagon-32-36"></div>
                      <!-- /HEXAGON -->
                    </div>
                    <!-- /USER AVATAR BADGE BORDER -->

                    <!-- USER AVATAR BADGE CONTENT -->
                    <div class="user-avatar-badge-content">
                      <!-- HEXAGON -->
                      <div class="hexagon-dark-26-28"></div>
                      <!-- /HEXAGON -->
                    </div>
                    <!-- /USER AVATAR BADGE CONTENT -->

                    <!-- USER AVATAR BADGE TEXT -->
                    <p class="user-avatar-badge-text">{{$self->level}}</p>
                    <!-- /USER AVATAR BADGE TEXT -->
                  </div>
                  <!-- /USER AVATAR BADGE -->
                </div>
                <!-- /USER AVATAR -->

                <!-- FEATURED STAT LIST -->
                <div class="featured-stat-list">
                  <!-- FEATURED STAT -->
                  <div class="featured-stat">
                    <!-- FEATURED STAT ICON -->
                    <svg class="featured-stat-icon icon-status">
                      <use xlink:href="#svg-status"></use>
                    </svg>
                    <!-- /FEATURED STAT ICON -->

                    <!-- FEATURED STAT TITLE -->
                    <p class="featured-stat-title">{{$self->jumlah_poin}}</p>
                    <!-- /FEATURED STAT TITLE -->

                    <!-- FEATURED STAT SUBTITLE -->
                    <p class="featured-stat-subtitle">Total Poin</p>
                    <!-- /FEATURED STAT SUBTITLE -->

                    <!-- FEATURED STAT TEXT -->
                    <p class="featured-stat-text">Global Poin</p>
                    <!-- /FEATURED STAT TEXT -->
                  </div>
                  <!-- /FEATURED STAT -->

                  <!-- FEATURED STAT -->
                  <div class="featured-stat">
                    <!-- FEATURED STAT ICON -->
                    <svg class="featured-stat-icon icon-comment">
                      <use xlink:href="#svg-comment"></use>
                    </svg>
                    <!-- /FEATURED STAT ICON -->

                    <!-- FEATURED STAT TITLE -->
                    <p class="featured-stat-title">{{$myrank}}</p>
                    <!-- /FEATURED STAT TITLE -->

                    <!-- FEATURED STAT SUBTITLE -->
                    <p class="featured-stat-subtitle">Placement</p>
                    <!-- /FEATURED STAT SUBTITLE -->

                    <!-- FEATURED STAT TEXT -->
                    <p class="featured-stat-text">Global Placement</p>
                    <!-- /FEATURED STAT TEXT -->
                  </div>
                  <!-- /FEATURED STAT -->
                </div>
                <!-- /FEATURED STAT LIST -->

                <!-- FEATURED STAT LIST -->
                <div class="featured-stat-list">
                  <!-- FEATURED STAT -->
                  <div class="featured-stat">
                    <!-- PROGRESS ARC WRAP -->
                    <div class="progress-arc-wrap small">
                      <!-- PROGRESS ARC -->
                      <div class="progress-arc">
                        <canvas id="posts-engagement-chart"></canvas>
                      </div>
                      <!-- PROGRESS ARC -->

                      <!-- PROGRESS ARC INFO -->
                      <div class="progress-arc-info">
                        <!-- PROGRESS ARC TITLE -->
                        <input type="hidden" id="dispexp" value="{{$self->level}}">
                        <p class="progress-arc-title">{{$self->level}}%</p>
                        <!-- /PROGRESS ARC TITLE -->
                      </div>
                      <!-- /PROGRESS ARC INFO -->
                    </div>
                    <!-- /PROGRESS ARC WRAP -->

                    <!-- FEATURED STAT SUBTITLE -->
                    <p class="featured-stat-subtitle">Exp</p>
                    <!-- /FEATURED STAT SUBTITLE -->

                    <!-- FEATURED STAT TEXT -->
                    <p class="featured-stat-text">Level Up</p>
                    <!-- /FEATURED STAT TEXT -->
                  </div>
                  <!-- /FEATURED STAT -->

                </div>
                <!-- /FEATURED STAT LIST -->
              </div>
              <!-- /PROFILE STATS INFO -->
            </div>
            <!-- /PROFILE STATS -->
          </div>
          <!-- /GRID COLUMN -->
        @endif
      @endforeach

      <!-- GRID COLUMN -->
      <div class="grid-header">

        <!-- WIDGET BOX -->
        <div class="widget-box ">
          <!-- WIDGET BOX ACTIONS -->
          <div class="widget-box-actions">
            <!-- WIDGET BOX ACTION -->
            <div class="widget-box-action">
              <!-- WIDGET BOX TITLE -->
              <p class="widget-box-title">Top Leaderboard</p>
              <!-- /WIDGET BOX TITLE -->
            </div>
            <!-- /WIDGET BOX ACTION -->

            <!-- WIDGET BOX ACTION -->
            <div class="widget-box-action">
              <!-- FORM SELECT -->
              <form id="formleader" method="get">
              <div class="form-select v2">
                <select id="visits-map-date" name="filter"  onchange="($('#formleader').submit())">
                  <option value="">Pilih Kategori</option>
                  <option value="all">Global</option>
                  @foreach($kelas as $kelas)
                  <option value="{{$kelas->id}}">{{$kelas->nama_mk}}</option>
                  @endforeach
                </select>
                <!-- FORM SELECT ICON -->
                <svg class="form-select-icon icon-small-arrow">
                  <use xlink:href="#svg-small-arrow"></use>
                </svg>
                <!-- /FORM SELECT ICON -->
              </div>
            </form>
              <!-- /FORM SELECT -->
            </div>
            <!-- /WIDGET BOX ACTION -->
          </div>
          <!-- /WIDGET BOX ACTIONS -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content no-margin-top">
            <!-- TABLE -->
            <div class="table table-top-friends join-rows">
              <!-- TABLE HEADER -->
              <div class="table-header">
                <!-- TABLE HEADER COLUMN -->
                <div class="table-header-column">
                  <!-- TABLE HEADER TITLE -->
                  <p class="table-header-title">Users</p>
                  <!-- /TABLE HEADER TITLE -->
                </div>
                <!-- /TABLE HEADER COLUMN -->

                <!-- TABLE HEADER COLUMN -->
                <div class="table-header-column centered padded">
                  <!-- TABLE HEADER TITLE -->
                  <p class="table-header-title"></p>
                  <!-- /TABLE HEADER TITLE -->
                </div>
                <!-- /TABLE HEADER COLUMN -->

                <!-- TABLE HEADER COLUMN -->
                <div class="table-header-column centered padded">
                  <!-- TABLE HEADER TITLE -->
                  <p class="table-header-title"></p>
                  <!-- /TABLE HEADER TITLE -->
                </div>
                <!-- /TABLE HEADER COLUMN -->

                <!-- TABLE HEADER COLUMN -->
                <div class="table-header-column centered padded">
                  <!-- TABLE HEADER TITLE -->
                  <p class="table-header-title">Level</p>
                  <!-- /TABLE HEADER TITLE -->
                </div>
                <!-- /TABLE HEADER COLUMN -->

                <!-- TABLE HEADER COLUMN -->
                <div class="table-header-column centered padded">
                  <!-- TABLE HEADER TITLE -->
                  <p class="table-header-title">Total Poin</p>
                  <!-- /TABLE HEADER TITLE -->
                </div>
                <!-- /TABLE HEADER COLUMN -->

                <!-- TABLE HEADER COLUMN -->
                <div class="table-header-column padded-left">
                  <!-- TABLE HEADER TITLE -->
                  <p class="table-header-title">Title</p>
                  <!-- /TABLE HEADER TITLE -->
                </div>
                <!-- /TABLE HEADER COLUMN -->
              </div>
              <!-- /TABLE HEADER -->

              <!-- TABLE BODY -->
              <div class="table-body">
                @foreach($leaderboards as $leaderboard)
                <!-- TABLE ROW -->
                <div class="table-row tiny">
                  <!-- TABLE COLUMN -->
                  <div class="table-column">
                    <!-- USER STATUS -->
                    <div class="user-status">
                      <!-- USER STATUS AVATAR -->
                      <a class="user-status-avatar" href="#">
                        <!-- USER AVATAR -->
                        <div class="user-avatar small no-outline">
                          <!-- USER AVATAR CONTENT -->
                          <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/'.$leaderboard->profile_photo_path)}}"></div>
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
                            <p class="user-avatar-badge-text">{{$leaderboard->level}}</p>
                            <!-- /USER AVATAR BADGE TEXT -->
                          </div>
                          <!-- /USER AVATAR BADGE -->
                        </div>
                        <!-- /USER AVATAR -->
                      </a>
                      <!-- /USER STATUS AVATAR -->

                      <!-- USER STATUS TITLE -->
                      <p class="user-status-title"><a class="bold" href="{{url('/profile?nama='.$leaderboard->nama_user)}}">{{$leaderboard->nama_user}}</a></p>
                      <!-- /USER STATUS TITLE -->

                      <!-- USER STATUS TEXT -->
                      <p class="user-status-text small">{{$leaderboard->nim_nip}}</p>
                      <!-- /USER STATUS TEXT -->
                    </div>
                    <!-- /USER STATUS -->
                  </div>
                  <!-- /TABLE COLUMN -->

                  <!-- TABLE COLUMN -->
                  <div class="table-column centered padded">
                    <!-- TABLE TITLE -->
                    <p class="table-title"></p>
                    <!-- /TABLE TITLE -->
                  </div>
                  <!-- /TABLE COLUMN -->

                  <!-- TABLE COLUMN -->
                  <div class="table-column centered padded">
                    <!-- TABLE TITLE -->
                    <p class="table-title"></p>
                    <!-- /TABLE TITLE -->
                  </div>
                  <!-- /TABLE COLUMN -->

                  <!-- TABLE COLUMN -->
                  <div class="table-column centered padded">
                    <!-- TABLE TITLE -->
                    <p class="table-title">{{$leaderboard->level}}</p>
                    <!-- /TABLE TITLE -->
                  </div>
                  <!-- /TABLE COLUMN -->

                  <!-- TABLE COLUMN -->
                  <div class="table-column centered padded">
                    <!-- TABLE TITLE -->
                    <p class="table-title">{{$leaderboard->jumlah_poin}}</p>
                    <!-- /TABLE TITLE -->
                  </div>
                  <!-- /TABLE COLUMN -->

                  <!-- TABLE COLUMN -->
                  <div class="table-column padded-left">
                    @if($leadtype == "Kelas")
                      <!-- BADGE LIST -->
                      @if($loop->iteration =="1")
                      <div class="badge-list small text-tooltip-tfr" data-title="Top 1 Global">
                        <!-- BADGE ITEM -->
                        <div class="badge-item " >
                          <img src="{{URL::asset('img/badge/localnumber1-s.png')}}" class="small text-tooltip-tfr" data-title="Top 1 Global" alt="badge-silver-s">
                        </div>
                        <!-- /BADGE ITEM -->
                      </div>
                      <!-- /BADGE LIST -->
                      @elseif($loop->iteration =="2")
                      <div class="badge-list small">
                        <!-- BADGE ITEM -->
                        <div class="badge-item">
                          <img src="{{URL::asset('img/badge/silverc-s.png')}}" alt="badge-silver-s">
                        </div>
                        <!-- /BADGE ITEM -->
                      </div>
                      <!-- /BADGE LIST -->
                      @elseif($loop->iteration == "3")
                      <div class="badge-list small">
                        <!-- BADGE ITEM -->
                        <div class="badge-item">
                          <img src="{{URL::asset('img/badge/localnumber3-s.png')}}" alt="badge-silver-s">
                        </div>
                        <!-- /BADGE ITEM -->
                      </div>
                      <!-- /BADGE LIST -->
                      @endif
                    @elseif($leadtype == "Global")
                      <!-- BADGE LIST -->
                      @if($loop->iteration =="1")
                      <div class="badge-list small">
                        <!-- BADGE ITEM -->
                        <div class="badge-item">
                          <img src="{{URL::asset('img/badge/rulerm-s.png')}}" alt="badge-silver-s">
                        </div>
                        <!-- /BADGE ITEM -->
                      </div>
                      <!-- /BADGE LIST -->
                      @elseif($loop->iteration =="2")
                      <div class="badge-list small">
                        <!-- BADGE ITEM -->
                        <div class="badge-item">
                          <img src="{{URL::asset('img/badge/rmachine-s.png')}}" alt="badge-silver-s">
                        </div>
                        <!-- /BADGE ITEM -->
                      </div>
                      <!-- /BADGE LIST -->
                      @elseif($loop->iteration == "3")
                      <div class="badge-list small">
                        <!-- BADGE ITEM -->
                        <div class="badge-item">
                          <img src="{{URL::asset('img/badge/uexp-s.png')}}" alt="badge-silver-s">
                        </div>
                        <!-- /BADGE ITEM -->
                      </div>
                      <!-- /BADGE LIST -->
                      @endif
                    @endif
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
          <!-- WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
      </div>
      <!-- /GRID COLUMN -->

    </div>
    <!-- /GRID -->
  </div>
  <!-- /GRID -->


</div>
<!-- /CONTENT GRID -->

@endsection

@section('scripting')
<script type="text/javascript">

app.querySelector('#posts-engagement-chart', function (el) {
  var exp = document.getElementById("dispexp").value;
  var expnull = 100-exp;
  const canvas = el[0],
        ctx = canvas.getContext('2d'),
        gradient = ctx.createLinearGradient(0, 40, 80, 40);

  gradient.addColorStop(0, '#41efff');
  gradient.addColorStop(1, '#615dfa');

  const chartData = {
          datasets: [{
            data: [exp, expnull],
            backgroundColor: [
              gradient,
              '#e8e8ef'
            ],
            hoverBackgroundColor: [
              gradient,
              '#e8e8ef'
            ],
            borderWidth: 0
          }]
        },
        chartOptions = {
          cutoutPercentage: 85,
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          tooltips: {
            enabled: false
          },
          animation: {
            animateRotate: false
          }
        };

  app.plugins.createChart(ctx, {
    type: 'doughnut',
    data: chartData,
    options: chartOptions
  });
});

</script>
@endsection
