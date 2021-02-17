@extends('layouts.app')
@section('title','Challenge | Funlearning')

@section('content')

  <!-- CONTENT GRID -->
  @foreach($kelas as $kelas)
  <div class="content-grid">
    <!-- PROFILE HEADER -->
    @include('page.headerkelas')
    <!-- /PROFILE HEADER -->


    @foreach($challenge as $challenge)
    <!-- SECTION HEADER -->
    <div class="section-header">
      <!-- SECTION HEADER INFO -->
      <div class="section-header-info">
        <!-- SECTION PRETITLE -->
        <p class="section-pretitle">Challenge</p>
        <!-- /SECTION PRETITLE -->

        <!-- SECTION TITLE -->
        <h2 class="section-title">Challenge Info</h2>
        <!-- /SECTION TITLE -->
      </div>
      <!-- /SECTION HEADER INFO -->

      <!-- SECTION HEADER ACTIONS -->
      <div class="section-header-actions">
        <!-- SECTION HEADER SUBSECTION -->
        <a class="section-header-subsection" >Kelas</a>
        <!-- /SECTION HEADER SUBSECTION -->

        <!-- SECTION HEADER SUBSECTION -->
        <a class="section-header-subsection" >Challenge</a>
        <!-- /SECTION HEADER SUBSECTION -->

        <!-- SECTION HEADER SUBSECTION -->
        <p class="section-header-subsection">{{$challenge->judul_challenge}}</p>
        <!-- /SECTION HEADER SUBSECTION -->
      </div>
      <!-- /SECTION HEADER ACTIONS -->
    </div>
    <!-- /SECTION HEADER -->

    <!-- GRID -->
    <div class="grid grid-9-3">
      @if(Auth::user()->hak_akses=="Mahasiswa")
      <!-- MARKETPLACE CONTENT -->
      <div class="marketplace-content grid-column">
        <!-- TAB BOX -->
        <div class="tab-box">
          <!-- TAB BOX OPTIONS -->
          <div class="tab-box-options">
            <!-- TAB BOX OPTION -->
            <div class="tab-box-option">
              <!-- TAB BOX OPTION TITLE -->
              <p class="tab-box-option-title">Deskripsi</p>
              <!-- /TAB BOX OPTION TITLE -->
            </div>
            <!-- /TAB BOX OPTION -->



          </div>
          <!-- /TAB BOX OPTIONS -->

          <!-- TAB BOX ITEMS -->
          <div class="tab-box-items">
            <!-- TAB BOX ITEM -->
            <div class="tab-box-item">
              <!-- TAB BOX ITEM CONTENT -->
              <div class="tab-box-item-content">
                <!-- TAB BOX ITEM TITLE -->
                <p class="tab-box-item-title">{{$challenge->judul_challenge}}</p>
                <!-- /TAB BOX ITEM TITLE -->

                <!-- TAB BOX ITEM PARAGRAPH -->
                <p class="tab-box-item-paragraph">{{$challenge->deskripsi_challenge}}</p>
                <!-- /TAB BOX ITEM PARAGRAPH -->

                <!-- TAB BOX ITEM TITLE -->
                <p class="tab-box-item-title mb-4">Opsi Jawaban :</p>
                <!-- /TAB BOX ITEM TITLE -->
                <div class="form-row split">
                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <!-- ACTION REQUEST -->
                    <div class="action-request accept with-text @if(!$jawaban) popup-review-trigger @endif" onclick="opsi('A',{{$challenge->id}})">
                      <span class="action-request-text">A. {{$challenge->pilihan1}}</span>
                    </div>
                    <!-- /ACTION REQUEST -->
                    <!-- /FORM INPUT -->
                  </div>
                  <!-- /FORM ITEM -->
                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <!-- ACTION REQUEST -->
                    <div class="action-request accept with-text @if(!$jawaban)  popup-review-trigger  @endif" onclick="opsi('B',{{$challenge->id}})">
                      <span class="action-request-text">B. {{$challenge->pilihan2}}</span>
                    </div>
                    <!-- /ACTION REQUEST -->
                    <!-- /FORM INPUT -->
                  </div>
                  <!-- /FORM ITEM -->
                </div>
                <div class="form-row split">
                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <!-- ACTION REQUEST -->
                    <div class="action-request accept with-text  @if(!$jawaban) popup-review-trigger  @endif" onclick="opsi('C',{{$challenge->id}})">
                      <span class="action-request-text">C. {{$challenge->pilihan3}}</span>
                    </div>
                    <!-- /ACTION REQUEST -->
                    <!-- /FORM INPUT -->
                  </div>
                  <!-- /FORM ITEM -->
                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <!-- ACTION REQUEST -->
                    <div class="action-request accept with-text @if(!$jawaban) popup-review-trigger @endif " onclick="opsi('D',{{$challenge->id}})">
                      <span class="action-request-text">D. {{$challenge->pilihan4}}</span>
                    </div>
                    <!-- /ACTION REQUEST -->
                    <!-- /FORM INPUT -->
                  </div>
                  <!-- /FORM ITEM -->
                </div>

              </div>
              <!-- /TAB BOX ITEM CONTENT -->
            </div>
            <!-- /TAB BOX ITEM -->


          </div>
          <!-- /TAB BOX ITEMS -->
        </div>
        <!-- /TAB BOX -->
      </div>
      <!-- /MARKETPLACE CONTENT -->
      @elseif(Auth::user()->hak_akses=="Dosen")
      <!-- WIDGET BOX -->
      <div class="widget-box no-padding">
        <!-- WIDGET BOX SETTINGS -->
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
              <a class="simple-dropdown-link" href="{{url('/kelas/settings/challenge/'.$kelas->id.'/editchallenge/'.$challenge->id)}}">Edit Challenge</a>
              <!-- /SIMPLE DROPDOWN LINK -->
              <!-- SIMPLE DROPDOWN LINK -->
              <a class="simple-dropdown-link" href="{{url('/kelas/settings/challenge/'.$kelas->id)}}">List Challenge</a>
              <!-- /SIMPLE DROPDOWN LINK -->



            </div>
            <!-- /SIMPLE DROPDOWN -->
          </div>
          <!-- /POST SETTINGS WRAP -->
        </div>
        <!-- /WIDGET BOX SETTINGS -->

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
              <p class="user-status-title medium"><a class="bold">{{$challenge->judul_challenge}}</a></p>
              <!-- /USER STATUS TITLE -->

              <!-- USER STATUS TEXT -->
              <p class="user-status-text small"> Dibuat tanggal {{$challenge->created_at}}</p>
              <!-- /USER STATUS TEXT -->
            </div>
            <!-- /USER STATUS -->

            <!-- WIDGET BOX STATUS TEXT -->
            <p class="widget-box-status-text mb-4">{{$challenge->deskripsi_challenge}}</p>
            <!-- /WIDGET BOX STATUS TEXT -->

            <!-- /TAB BOX ITEM TITLE -->
            <div class="form-row split">
              <!-- FORM ITEM -->
              <div class="form-item">
                <!-- FORM INPUT -->
                <!-- ACTION REQUEST -->
                <div class="action-request accept with-text ">
                  <span class="action-request-text">A. {{$challenge->pilihan1}}</span>
                </div>
                <!-- /ACTION REQUEST -->
                <!-- /FORM INPUT -->
              </div>
              <!-- /FORM ITEM -->
              <!-- FORM ITEM -->
              <div class="form-item">
                <!-- FORM INPUT -->
                <!-- ACTION REQUEST -->
                <div class="action-request accept with-text " >
                  <span class="action-request-text">B. {{$challenge->pilihan2}}</span>
                </div>
                <!-- /ACTION REQUEST -->
                <!-- /FORM INPUT -->
              </div>
              <!-- /FORM ITEM -->
            </div>
            <div class="form-row split">
              <!-- FORM ITEM -->
              <div class="form-item">
                <!-- FORM INPUT -->
                <!-- ACTION REQUEST -->
                <div class="action-request accept with-text ">
                  <span class="action-request-text">C. {{$challenge->pilihan3}}</span>
                </div>
                <!-- /ACTION REQUEST -->
                <!-- /FORM INPUT -->
              </div>
              <!-- /FORM ITEM -->
              <!-- FORM ITEM -->
              <div class="form-item">
                <!-- FORM INPUT -->
                <!-- ACTION REQUEST -->
                <div class="action-request accept with-text ">
                  <span class="action-request-text">D. {{$challenge->pilihan4}}</span>
                </div>
                <!-- /ACTION REQUEST -->
                <!-- /FORM INPUT -->
              </div>
              <!-- /FORM ITEM -->
            </div>



            <!-- CONTENT ACTIONS -->
            <div class="content-actions">


            </div>
            <!-- /CONTENT ACTIONS -->
          </div>
          <!-- /WIDGET BOX STATUS CONTENT -->
        </div>
        <!-- /WIDGET BOX STATUS -->

        <!-- POST OPTIONS -->
        <div class="post-options">
          <!-- POST OPTION WRAP -->



        </div>
        <!-- /POST OPTIONS -->
      </div>
      <!-- /WIDGET BOX -->
      @endif


      <!-- MARKETPLACE SIDEBAR -->
      <div class="marketplace-sidebar">
        <!-- SIDEBAR BOX -->
        <div class="sidebar-box">

          <!-- SIDEBAR BOX TITLE -->
          <p class="sidebar-box-title medium-space">Info Challenge</p>
          <!-- /SIDEBAR BOX TITLE -->

          <div class="sidebar-box-items">
            <!-- USER STATUS -->
            <div class="user-status">
              <!-- USER STATUS AVATAR -->
              <a class="user-status-avatar" >
                <!-- USER AVATAR -->
                <div class="user-avatar small no-outline">
                  <!-- USER AVATAR CONTENT -->
                  <div class="user-avatar-content">
                    <!-- HEXAGON -->
                    <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/'.$challenge->profile_photo_path)}}"></div>
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
                    <p class="user-avatar-badge-text">{{$challenge->level}}</p>
                    <!-- /USER AVATAR BADGE TEXT -->
                  </div>
                  <!-- /USER AVATAR BADGE -->
                </div>
                <!-- /USER AVATAR -->
              </a>
              <!-- /USER STATUS AVATAR -->

              <!-- USER STATUS TITLE -->
              <!-- /USER STATUS TITLE -->
              @if(Auth::user()->hak_akses=="Dosen")
              <p class="user-status-title"><a class="bold" >{{$challenge->nama_user}}</a></p>
              <!-- USER STATUS TEXT -->
              <p class="user-status-text small">{{$challenge->nim_nip}}</p>
              @else
              <p class="user-status-title"><a class="bold" >{{$challenge->nama_user}}</a></p>
              <!-- USER STATUS TEXT -->
              <p class="user-status-text small">{{$challenge->nim_nip}}</p>
              @endif
              <!-- /USER STATUS TEXT -->
            </div>
            <!-- /USER STATUS -->
          </div>

          <!-- SIDEBAR BOX ITEMS -->
          <div class="sidebar-box-items">

            <!-- INFORMATION LINE LIST -->
            <div class="information-line-list">
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Created</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text"><span class="bold">{{$challenge->created_at}}</span></p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->

              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Waktu Mulai</p>
                <!-- /INFORMATION LINE TITLE -->
                <input type="hidden" id="forchallengestatus" value="{{$challenge->id}}">
                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text"><span class="bold">{{$challenge->waktu_mulai}}</span></p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->

              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Waktu Selesai</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text"><span class="bold">{{$challenge->waktu_selesai}}</span></p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Status </p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text" id="timehasil"><a class="span text-success">{{$challenge->status}}</a></p>
                <!-- /INFORMATION LINE TEXT -->

              </div>
              @if(Auth::user()->hak_akses=="Mahasiswa")
                @if($jawaban)
                  @foreach($jawaban as $jawaban)
                  <!-- INFORMATION LINE -->
                  <div class="information-line">
                    <!-- INFORMATION LINE TITLE -->
                    <p class="information-line-title">Penilaian</p>
                    <!-- /INFORMATION LINE TITLE -->
                    <!-- INFORMATION LINE TEXT -->
                    <p class="information-line-text "><a class="span @if($jawaban->penilaian=='Benar') text-success @else text-danger @endif">{{$jawaban->penilaian}}! </a> Kamu menjawab {{$jawaban->jawaban_challenge}}</p>
                    <!-- /INFORMATION LINE TEXT -->
                  </div>
                  <!-- /INFORMATION LINE -->

                            <!-- SIDEBAR BOX ITEMS -->
                            <div class="sidebar-box-items">

                              <!-- BUTTON -->
                              <p class="button bg-warning" id="displayhasil">Mendapatkan {{$jawaban->hadiah_poin}} exp</p>
                              <!-- /BUTTON -->

                            </div>
                            <!-- /SIDEBAR BOX ITEMS -->
                  @endforeach
                  @else
                  <!-- SIDEBAR BOX ITEMS -->
                  <div class="sidebar-box-items">

                    <!-- BUTTON -->
                    <p class="button primmary" id="displayhasil">Challenge belum dikerjakan</p>
                    <!-- /BUTTON -->

                  </div>
                  <!-- /SIDEBAR BOX ITEMS -->
                @endif
              @endif


            </div>
            <!-- /INFORMATION LINE LIST -->
          </div>
          <!-- /SIDEBAR BOX ITEMS -->

          @if(Auth::user()->hak_akses =="Mahasiswa")

          @endif


        </div>
        <!-- /SIDEBAR BOX -->
      </div>
      <!-- /MARKETPLACE SIDEBAR -->
    </div>
    <!-- /GRID -->
    @endforeach
  </div>
  @endforeach
  <!-- /CONTENT GRID -->
  @if(Auth::user()->hak_akses=="Mahasiswa")
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
    <p class="popup-box-title">Jawab Challenge</p>
    <!-- /POPUP BOX TITLE -->


    <!-- FORM -->
    <form class="form" >
      @csrf
      <!-- FORM ROW -->
      <div class="form-row">
        <!-- FORM ITEM -->
        <div class="form-item">
          <!-- FORM INPUT -->
          <div class="form-input small">
            <h2 id="opsi"></h2>
            <input type="hidden" id="jawaban" >
            <input type="hidden" id="idchallenge">

          </div>
          <!-- /FORM INPUT -->
        </div>
        <!-- /FORM ITEM -->
      </div>
      <!-- /FORM ROW -->

      <!-- POPUP BOX ACTIONS -->
      <div class="popup-box-actions full void" id="actionbutton">
        <!-- POPUP BOX ACTION -->
        <div class="form-row split">
          <div class="form-item">
            <p class="popup-box-action full button bg-danger popup-review-trigger">Tidak!</p>
          </div>
          <div class="form-item">
            <p class="popup-box-action full button bg-success popup-review-trigger" onclick="jawabchallenge()">Ya!</p>
          </div>
        </div>
        <!-- /POPUP BOX ACTION -->

        <!-- POPUP BOX ACTION TEXT -->
        <p class="popup-box-action-text">Jawaban tidak dapat diulang!</p>
        <!-- /POPUP BOX ACTION TEXT -->
      </div>
      <!-- /POPUP BOX ACTIONS -->
    </form>
    <!-- /FORM -->
  </div>
  <!-- /POPUP BOX -->
  @else

  @endif


@endsection
@section('scripting')
<script type="text/javascript">
  var statusup = window.setInterval(remind,1000);
  function remind(){
    var id = document.getElementById("forchallengestatus").value;
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      type: "POST",
      url : "{{url('/challenge/updatestatus')}}",
      data :{
        id : id,
        _token : CSRF_TOKEN,
      },success: function(response){
        if(response == "Open"){
          document.getElementById("timehasil").innerHTML ="<a class='span text-success'>"+response+"</a>";
          document.getElementById("actionbutton").innerHTML = "<div class='form-row split'><div class='form-item'><p class='popup-box-action full button bg-danger popup-review-trigger'>Tidak!</p></div><div class='form-item'><p class='popup-box-action full button bg-success popup-review-trigger' onclick='jawabchallenge()''>Ya!</p></div></div>";
        }else if (response == "Close") {
          document.getElementById("timehasil").innerHTML ="<a class='span text-danger'>"+response+"</a>";
          document.getElementById("actionbutton").innerHTML = "<div class='form-row split'><div class='form-item'><p class='popup-box-action full button bg-primmary popup-review-trigger'> Maaf Challenge sudah ditutup!</p></div></div>";
        }else {
          document.getElementById("timehasil").innerHTML ="<a class='span text-warning'>"+response+"</a>";
          document.getElementById("actionbutton").innerHTML = "<div class='form-row split'><div class='form-item'><p class='popup-box-action full button twitter popup-review-trigger'>Challenge Belum dimulai!</p></div></div>";
        }

      }
    });
  }
</script>
@if(Auth::user()->hak_akses == "Dosen")
<script type="text/javascript">


</script>
@elseif(Auth::user()->hak_akses == "Mahasiswa")
<script type="text/javascript" >

  function opsi(opsi,id){
    document.getElementById("opsi").innerHTML="Apakah anda yakin memilih "+opsi+" ?";
    document.getElementById("jawaban").value = opsi;
    document.getElementById("idchallenge").value = id;
  }

  function jawabchallenge(){
    var opsi = document.getElementById("jawaban").value;
    var id = document.getElementById("idchallenge").value;
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      type :"POST",
      url : "{{url('/kelas/challenge/jawabchallenge')}}",
      data :{
        opsi : opsi,
        id : id,
        _token : CSRF_TOKEN,
      },success: function(response){
        window.location.reload();
      }
    });

  }



</script>
<!-- <script type="text/javascript">
  eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();',17,17,'||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'),0,{}));
</script> -->
@endif
@endsection
