@extends('layouts.app')
@section('title','Profile | Funlearning')

@section('content')
  @foreach($users as $user)
  <div class="content-grid">
    <!-- PROFILE HEADER -->
    <div class="profile-header">
      <!-- PROFILE HEADER COVER -->
      <figure class="profile-header-cover liquid">
        <img src="{{URL::asset('img/cover/01.jpg')}}" alt="cover-01">
      </figure>
      <!-- /PROFILE HEADER COVER -->

      <!-- PROFILE HEADER INFO -->
      <div class="profile-header-info">
        <!-- USER SHORT DESCRIPTION -->
        <div class="user-short-description big">
          <!-- USER SHORT DESCRIPTION AVATAR -->
          <a class="user-short-description-avatar user-avatar big" href="{{url('/profile')}}">
            <!-- USER AVATAR BORDER -->
            <div class="user-avatar-border">
              <!-- HEXAGON -->
              <div class="hexagon-148-164"></div>
              <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR BORDER -->

            <!-- USER AVATAR CONTENT -->
            <div class="user-avatar-content">
              <!-- HEXAGON -->
              <div class="hexagon-image-100-110" data-src="{{URL::asset('img/avatar/01.jpg')}}"></div>
              <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR CONTENT -->

            <!-- USER AVATAR PROGRESS -->
            <div class="user-avatar-progress">
              <!-- HEXAGON -->
              <div class="hexagon-progress-124-136"></div>
              <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR PROGRESS -->

            <!-- USER AVATAR PROGRESS BORDER -->
            <div class="user-avatar-progress-border">
              <!-- HEXAGON -->
              <div class="hexagon-border-124-136"></div>
              <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR PROGRESS BORDER -->

            <!-- USER AVATAR BADGE -->
            <div class="user-avatar-badge">
              <!-- USER AVATAR BADGE BORDER -->
              <div class="user-avatar-badge-border">
                <!-- HEXAGON -->
                <div class="hexagon-40-44"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR BADGE BORDER -->

              <!-- USER AVATAR BADGE CONTENT -->
              <div class="user-avatar-badge-content">
                <!-- HEXAGON -->
                <div class="hexagon-dark-32-34"></div>
                <!-- /HEXAGON -->
              </div>
              <!-- /USER AVATAR BADGE CONTENT -->

              <!-- USER AVATAR BADGE TEXT -->
              <p class="user-avatar-badge-text">{{$user->level}}</p>
              <!-- /USER AVATAR BADGE TEXT -->
            </div>
            <!-- /USER AVATAR BADGE -->
          </a>
          <!-- /USER SHORT DESCRIPTION AVATAR -->

          <!-- USER SHORT DESCRIPTION AVATAR -->
          <a class="user-short-description-avatar user-short-description-avatar-mobile user-avatar medium" href="{{url('/profile')}}">
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
              <p class="user-avatar-badge-text">{{$user->level}}</p>
              <!-- /USER AVATAR BADGE TEXT -->
            </div>
            <!-- /USER AVATAR BADGE -->
          </a>
          <!-- /USER SHORT DESCRIPTION AVATAR -->

          <!-- USER SHORT DESCRIPTION TITLE -->
          <p class="user-short-description-title"><a href="{{url('/profile')}}">{{$user->nama_user}}</a></p>
          <!-- /USER SHORT DESCRIPTION TITLE -->

          <!-- USER SHORT DESCRIPTION TEXT -->
          <p class="user-short-description-text"><a >{{$user->nim_nip}}</a></p>
          <!-- /USER SHORT DESCRIPTION TEXT -->
        </div>
        <!-- /USER SHORT DESCRIPTION -->


        <!-- USER STATS -->
        <div class="user-stats">
          <!-- USER STAT -->
          <div class="user-stat big">
            <!-- USER STAT TITLE -->
            <p class="user-stat-title">{{$user->jumlah_poin}}</p>
            <!-- /USER STAT TITLE -->

            <!-- USER STAT TEXT -->
            <p class="user-stat-text">Total Poin</p>
            <!-- /USER STAT TEXT -->
          </div>
          <!-- /USER STAT -->

          <!-- USER STAT -->
          <div class="user-stat big">
            <!-- USER STAT TITLE -->
            <p class="user-stat-title">{{$user->level}}</p>
            <!-- /USER STAT TITLE -->

            <!-- USER STAT TEXT -->
            <p class="user-stat-text">Level</p>
            <!-- /USER STAT TEXT -->
          </div>
          <!-- /USER STAT -->


          <!-- USER STAT -->
          <div class="user-stat big">
            <!-- USER STAT IMAGE -->
            <img class="user-stat-image" src="{{URL::asset('img/flag/map.png')}}" alt="flag-usa">
            <!-- /USER STAT IMAGE -->

            <!-- USER STAT TEXT -->
            <p class="user-stat-text">Indonesia</p>
            <!-- /USER STAT TEXT -->
          </div>
          <!-- /USER STAT -->
        </div>
        <!-- /USER STATS -->

      </div>
      <!-- /PROFILE HEADER INFO -->
    </div>
    <!-- /PROFILE HEADER -->


    <!-- GRID -->
    <div class="grid grid-3-6-3">
      <!-- GRID COLUMN -->
      <div class="grid-column">
        <!-- WIDGET BOX -->
        <div class="widget-box">


          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">About Me</p>
          <!-- /WIDGET BOX TITLE -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- PARAGRAPH -->
            <p class="paragraph">Hi! My name is {{$user->nama_user}}.</p>
            <!-- /PARAGRAPH -->

            <!-- INFORMATION LINE LIST -->
            <div class="information-line-list">
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Joined</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{$user->created_at}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->

              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">NIM/NIP</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{$user->nim_nip}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->



              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Email</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text"><a href="#">{{$user->email}}</a></p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
            </div>
            <!-- /INFORMATION LINE LIST -->
          </div>
          <!-- /WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->

        <!-- WIDGET BOX -->
        <div class="widget-box">

          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">Badges <span class="highlighted"><?php echo count($badges); ?></span></p>
          <!-- /WIDGET BOX TITLE -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- BADGE LIST -->
            <div class="badge-list">
              @foreach($badges as $badge)
              <!-- BADGE ITEM -->
              <div class="badge-item text-tooltip-tft" data-title="badge titel">
                <img src="{{URL::asset('img/reward/'.$badge->pathfile)}}" style="width:32px" alt="badge">
              </div>
              <!-- /BADGE ITEM -->
              @endforeach

            </div>
            <!-- /BADGE LIST -->
          </div>
          <!-- /WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
      </div>
      <!-- /GRID COLUMN -->

      <!-- GRID COLUMN -->
      <div class="grid-column">
        <!-- WIDGET BOX -->
        <div class="widget-box">

          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">Riwayat Klaim Rewards</p>
          <!-- /WIDGET BOX TITLE -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- TIMELINE INFORMATION LIST -->
            <div class="timeline-information-list">
              <!-- TIMELINE INFORMATION -->
              @foreach($riwayat as $riwayat)
              <div class="timeline-information">
                <!-- TIMELINE INFORMATION TITLE -->
                <p class="timeline-information-title">{{$riwayat->judul_reward}}</p>
                <!-- /TIMELINE INFORMATION TITLE -->

                <!-- TIMELINE INFORMATION DATE -->
                <p class="timeline-information-date">{{$riwayat->tahun}} - {{$riwayat->poin_reward}} EXP</p>
                <!-- /TIMELINE INFORMATION DATE -->

                <!-- TIMELINE INFORMATION TEXT -->
                <p class="timeline-information-text">{{$riwayat->deskripsi_reward}}.</p>
                <!-- /TIMELINE INFORMATION TEXT -->
              </div>
              <!-- /TIMELINE INFORMATION -->

              @endforeach
            </div>
            <!-- /TIMELINE INFORMATION LIST -->
          </div>
          <!-- /WIDGET BOX CONTENT -->
          <!-- /WIDGET BOX -->
        </div>
      </div>
      <!-- /GRID COLUMN -->

      <!-- GRID COLUMN -->
      <div class="grid-column">
        <!-- WIDGET BOX -->
        <div class="widget-box">
          <!-- PROGRESS ARC SUMMARY -->
          <div class="progress-arc-summary">
            <!-- PROGRESS ARC WRAP -->
            <div class="progress-arc-wrap">
              <!-- PROGRESS ARC -->
              <div class="progress-arc">
                <canvas id="profile-completion-chart"></canvas>
              </div>
              <!-- PROGRESS ARC -->

              <!-- PROGRESS ARC INFO -->
              <div class="progress-arc-info">
                <!-- PROGRESS ARC TITLE -->
                <input type="hidden" id="level" value="{{$user->level}}">
                <p class="progress-arc-title">{{$user->level}}%</p>
                <!-- /PROGRESS ARC TITLE -->
              </div>
              <!-- /PROGRESS ARC INFO -->
            </div>
            <!-- /PROGRESS ARC WRAP -->

            <!-- PROGRESS ARC SUMMARY INFO -->
            <div class="progress-arc-summary-info">
              <!-- PROGRESS ARC SUMMARY TITLE -->
              <p class="progress-arc-summary-title">Profile Progress</p>
              <!-- /PROGRESS ARC SUMMARY TITLE -->

              <!-- PROGRESS ARC SUMMARY TITLE -->
              <p class="progress-arc-summary-subtitle">{{$user->nama_user}}</p>
              <!-- /PROGRESS ARC SUMMARY TITLE -->

              <!-- PROGRESS ARC SUMMARY TITLE -->
              <p class="progress-arc-summary-text">Progres Player</p>
              <!-- /PROGRESS ARC SUMMARY TITLE -->
            </div>
            <!-- /PROGRESS ARC SUMMARY INFO -->
          </div>
          <!-- /PROGRESS ARC SUMMARY -->

          <!-- ACHIEVEMENT STATUS LIST -->
          <div class="achievement-status-list">
            <!-- ACHIEVEMENT STATUS -->
            <div class="achievement-status">
              <!-- ACHIEVEMENT STATUS PROGRESS -->
              <p class="achievement-status-progress"><?php echo count($challenge); ?>/<?php echo count($challengetotal); ?></p>
              <!-- /ACHIEVEMENT STATUS PROGRESS -->

              <!-- ACHIEVEMENT STATUS INFO -->
              <div class="achievement-status-info">
                <!-- ACHIEVEMENT STATUS TITLE -->
                <p class="achievement-status-title">Challenge</p>
                <!-- /ACHIEVEMENT STATUS TITLE -->

                <!-- ACHIEVEMENT STATUS TEXT -->
                <p class="achievement-status-text">Completed</p>
                <!-- /ACHIEVEMENT STATUS TEXT -->
              </div>
              <!-- /ACHIEVEMENT STATUS INFO -->

              <!-- ACHIEVEMENT STATUS IMAGE -->
              <img class="achievement-status-image" src="{{URL::asset('img/badge/completedq-s.png')}}" alt="bdage-completedq-s">
              <!-- /ACHIEVEMENT STATUS IMAGE -->
            </div>
            <!-- /ACHIEVEMENT STATUS -->

            <!-- ACHIEVEMENT STATUS -->
            <div class="achievement-status">
              <!-- ACHIEVEMENT STATUS PROGRESS -->
              <p class="achievement-status-progress"><?php echo count($badges); ?>/<?php echo count($totalbadges); ?></p>
              <!-- /ACHIEVEMENT STATUS PROGRESS -->

              <!-- ACHIEVEMENT STATUS INFO -->
              <div class="achievement-status-info">
                <!-- ACHIEVEMENT STATUS TITLE -->
                <p class="achievement-status-title">Badges</p>
                <!-- /ACHIEVEMENT STATUS TITLE -->

                <!-- ACHIEVEMENT STATUS TEXT -->
                <p class="achievement-status-text">Unlocked</p>
                <!-- /ACHIEVEMENT STATUS TEXT -->
              </div>
              <!-- /ACHIEVEMENT STATUS INFO -->

              <!-- ACHIEVEMENT STATUS IMAGE -->
              <img class="achievement-status-image" src="{{URL::asset('img/badge/unlocked-badge.png')}}" alt="bdage-unlocked-badge">
              <!-- /ACHIEVEMENT STATUS IMAGE -->
            </div>
            <!-- /ACHIEVEMENT STATUS -->
          </div>
          <!-- /ACHIEVEMENT STATUS LIST -->
        </div>
        <!-- /WIDGET BOX -->


      </div>
      <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
  </div>
  @endforeach
@endsection
@section('scripting')
<script type="text/javascript">
app.querySelector('#profile-completion-chart', function (el) {
  var level = document.getElementById("level").value;
  var sisa = 100 -level;
  const canvas = el[0],
        ctx = canvas.getContext('2d'),
        gradient = ctx.createLinearGradient(0, 70, 140, 70);

  gradient.addColorStop(0, '#41efff');
  gradient.addColorStop(1, '#615dfa');

  const chartData = {
          datasets: [{
            data: [level, sisa],
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
          cutoutPercentage: 88,
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
