@extends('layouts.app')
@section('title','Tugas | Funlearning')

@section('content')
  <!-- CONTENT GRID -->
  <div class="content-grid">
    @foreach($kelas as $kelas)
    <!-- PROFILE HEADER -->
    @include('page.headerkelas')
    <!-- /PROFILE HEADER -->


    @endforeach

    <!-- GRID -->
    <div class="grid grid-3-6-3 mobile-prefer-content">
      <!-- GRID COLUMN -->
      <div class="grid-column">


        <!-- WIDGET BOX -->
        <div class="widget-box">
          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">Group Info</p>
          <!-- /WIDGET BOX TITLE -->
          <!-- WIDGET BOX CONTENT -->
          @foreach($classinfo as $k)
          <div class="widget-box-content">
            <!-- INFORMATION LINE LIST -->
            <div class="information-line-list">
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Created</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{$k->created_at}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->

              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Kode Mata Kuliah</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text"><a href="#">{{$k->kode_mk}}</a></p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->

              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Nama Mata Kuliah</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{$k->nama_mk}}</p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->

              <p class="paragraph">Komposisi Nilai</p>

              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Tugas</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text"><a href="#">{{$k->komposisi_tugas}}</a></p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Quis</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text"><a href="#">{{$k->komposisi_quis}}</a></p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">UTS</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text"><a href="#">{{$k->komposisi_ets}}</a></p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">EAS</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text"><a href="#">{{$k->komposisi_eas}}</a></p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
            </div>
            <!-- /INFORMATION LINE LIST -->
          </div>
          <!-- /WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
        @endforeach



      </div>
      <!-- /GRID COLUMN -->

      <!-- GRID COLUMN -->
      <div class="grid-column">
        @foreach($tugas as $tugas)
        <!-- WIDGET BOX -->
        <div class="widget-box no-padding">
          @if(Auth::user()->hak_akses == "Dosen")
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
                <a class="simple-dropdown-link" href="{{url('/kelas/settings/tugas/edittugas/'.$kelas->id.'/'.$tugas->id)}}">Edit Post</a>
                <!-- /SIMPLE DROPDOWN LINK -->
                <!-- SIMPLE DROPDOWN LINK -->
                <p class="simple-dropdown-link popup-review-trigger" onclick="hapus({{$tugas->id}},{{$kelas->id}})" >Hapus Post</p>
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
                <a class="user-status-avatar" href="{{url('/profile?nama='.$tugas->nama_user)}}">
                  <!-- USER AVATAR -->
                  <div class="user-avatar small no-outline">
                    <!-- USER AVATAR CONTENT -->
                    <div class="user-avatar-content">
                      <!-- HEXAGON -->
                      <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/'.$tugas->profile_photo_path)}}"></div>
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
                      <p class="user-avatar-badge-text">{{$tugas->level}}</p>
                      <!-- /USER AVATAR BADGE TEXT -->
                    </div>
                    <!-- /USER AVATAR BADGE -->
                  </div>
                  <!-- /USER AVATAR -->
                </a>
                <!-- /USER STATUS AVATAR -->

                <!-- USER STATUS TITLE -->
                <p class="user-status-title medium"><a class="bold" >{{$tugas->nama_user}}</a></p>
                <!-- /USER STATUS TITLE -->

                <!-- USER STATUS TEXT -->
                <p class="user-status-text small"  >{{$tugas->created_at}}</p>
                <!-- /USER STATUS TEXT -->
              </div>
              <!-- /USER STATUS -->
              <!-- USER STATUS TITLE -->
              <h6 class="mt-4 mb-2">{{$tugas->judul_tugas}}</h6>
              <!-- /USER STATUS TITLE -->

              <!-- WIDGET BOX STATUS TEXT -->
              <p class="widget-box-status-text"><?php  echo nl2br($tugas->deskripsi_tugas); ?></p>
              <!-- /WIDGET BOX STATUS TEXT -->

              <!-- CONTENT ACTIONS -->
              <div class="content-actions">


                <!-- CONTENT ACTION -->
                <div class="content-action">

                  <!-- SOCIAL LINKS -->
                  <div class="social-links small align-left">
                    @foreach($files as $file)
                      @if($file->id_foreign == $tugas->id)
                      <!-- SOCIAL LINK -->
                      <a class="social-link small facebook text-tooltip-tft" href="{{url('/show?file='.$file->pathfile.'&kelas='.$kelas->nama_mk.$kelas->id.'&tipe=Tugas')}}" target="_blank" data-title="{{$file->namafile}}">
                        <!-- SOCIAL LINK ICON -->
                        <svg class="social-link-icon icon-forum" >
                          <use xlink:href="#svg-forum" ></use>
                        </svg>
                        <!-- /SOCIAL LINK ICON -->
                      </a>
                      <!-- /SOCIAL LINK -->
                      @endif
                    @endforeach


                  </div>
                  <!-- /SOCIAL LINKS -->

                </div>
                <!-- /CONTENT ACTION -->
              </div>
              <!-- /CONTENT ACTIONS -->
            </div>
            <!-- /WIDGET BOX STATUS CONTENT -->
          </div>
          <!-- /WIDGET BOX STATUS -->

          <!-- POST OPTIONS -->
          <div class="post-options">
            <!-- POST OPTION -->
            <a class="post-option" href="{{url('/kelas/info/'.$kelas->id.'/tugas/'.$tugas->id)}}">
              <!-- POST OPTION ICON -->
              <svg class="post-option-icon icon-comment">
                <use xlink:href="#svg-comment"></use>
              </svg>
              <!-- /POST OPTION ICON -->

              <!-- POST OPTION TEXT -->
              <p class="post-option-text" >Lihat Detail</p>
              <!-- /POST OPTION TEXT -->
            </a>
            <!-- /POST OPTION -->


          </div>
          <!-- /POST OPTIONS -->
        </div>
        <!-- /WIDGET BOX -->
        @endforeach
      </div>
      <!-- /GRID COLUMN -->


            <!-- GRID COLUMN -->
            <div class="grid-column">
              <!-- WIDGET BOX -->
              <div class="widget-box">
                <!-- WIDGET BOX TITLE -->
                <p class="widget-box-title">Kelas Organizers</p>
                <!-- /WIDGET BOX TITLE -->

                <!-- WIDGET BOX CONTENT -->
                <div class="widget-box-content">
                  @foreach($creator as $creator)
                  <!-- USER STATUS LIST -->
                  <div class="user-status-list">
                    <!-- USER STATUS -->
                    <div class="user-status">
                      <!-- USER STATUS AVATAR -->
                      <a class="user-status-avatar" >
                        <!-- USER AVATAR -->
                        <div class="user-avatar small no-outline">
                          <!-- USER AVATAR CONTENT -->
                          <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/'.$creator->profile_photo_path)}}"></div>
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
                            <p class="user-avatar-badge-text">{{$creator->level}}</p>
                            <!-- /USER AVATAR BADGE TEXT -->
                          </div>
                          <!-- /USER AVATAR BADGE -->
                        </div>
                        <!-- /USER AVATAR -->
                      </a>
                      <!-- /USER STATUS AVATAR -->

                      <!-- USER STATUS TITLE -->
                      <p class="user-status-title"><a class="bold" >{{$creator->nama_user}}</a></p>
                      <!-- /USER STATUS TITLE -->

                      <!-- USER STATUS TEXT -->
                      <p class="user-status-text small">{{$creator->nim_nip}}</p>
                      <!-- /USER STATUS TEXT -->
                    </div>
                    <!-- /USER STATUS -->


                  </div>
                  <!-- /USER STATUS LIST -->
                  @endforeach

                </div>
                <!-- /WIDGET BOX CONTENT -->
              </div>
              <!-- /WIDGET BOX -->
              <!-- WIDGET BOX -->
              <div class="widget-box">
                <!-- WIDGET BOX TITLE -->
                <p class="widget-box-title">Members</p>
                <!-- /WIDGET BOX TITLE -->

                <!-- WIDGET BOX CONTENT -->
                <div class="widget-box-content">
                  <!-- USER STATUS LIST -->
                  <div class="user-status-list">
                    @foreach($members as $member)
                    <!-- USER STATUS -->
                    <div class="user-status request-small">
                      <!-- USER STATUS AVATAR -->
                      <a class="user-status-avatar" >
                        <!-- USER AVATAR -->
                        <div class="user-avatar small no-outline">
                          <!-- USER AVATAR CONTENT -->
                          <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/'.$member->profile_photo_path)}}"></div>
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
                            <p class="user-avatar-badge-text">{{$member->level}}</p>
                            <!-- /USER AVATAR BADGE TEXT -->
                          </div>
                          <!-- /USER AVATAR BADGE -->
                        </div>
                        <!-- /USER AVATAR -->
                      </a>
                      <!-- /USER STATUS AVATAR -->

                      <!-- USER STATUS TITLE -->
                      <p class="user-status-title"><a class="bold" href="#">{{ Str::limit($member->nama_user,15, $end='...')}}</a></p>
                      <!-- /USER STATUS TITLE -->

                      <!-- USER STATUS TEXT -->
                      <p class="user-status-text small">{{$member->nim_nip}}</p>
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
  <!-- /CONTENT GRID -->
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
    <p class="popup-box-title">Hapus Tugas</p>
    <!-- /POPUP BOX TITLE -->


    <!-- FORM -->
    <form class="form" action="{{url('/kelas/settings/hapustugas')}}" method="post">
      @csrf
      <!-- FORM ROW -->
      <div class="form-row">
        <!-- FORM ITEM -->
        <div class="form-item">
          <!-- FORM INPUT -->
          <div class="form-input small">
            <h2>Apakah anda yakin ingin menghapus tugas ini?</h2>
            <input type="hidden" name="idkelas" id="idkelas">
            <input type="hidden" name="idtugas" id="idtugas">
          </div>
          <!-- /FORM INPUT -->
        </div>
        <!-- /FORM ITEM -->
      </div>
      <!-- /FORM ROW -->

      <!-- POPUP BOX ACTIONS -->
      <div class="popup-box-actions full void">
        <!-- POPUP BOX ACTION -->

        <button class="popup-box-action full button bg-danger popup-review-trigger" type="submit">Hapus!</button>
        <!-- /POPUP BOX ACTION -->

        <!-- POPUP BOX ACTION TEXT -->
        <p class="popup-box-action-text">Data yang telah dihapus tidak dapat dikembalikan!</p>
        <!-- /POPUP BOX ACTION TEXT -->
      </div>
      <!-- /POPUP BOX ACTIONS -->
    </form>
    <!-- /FORM -->
  </div>
  <!-- /POPUP BOX -->

@endsection

@section('scripting')
<script type="text/javascript">

  function hapus(id,idkelas){
    // var x = document.getElementById("delete").getAttribute("data");
    document.getElementById("idkelas").value = idkelas;
    document.getElementById("idtugas").value = id;
  }
</script>
@endsection
