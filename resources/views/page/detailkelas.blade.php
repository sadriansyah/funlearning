@extends('layouts.app')
@section('title','Kelas | Funlearning')

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
                  <a class="event-preview-title popup-event-information-trigger" href="{{url('/kelas/info/'.$kelas->id.'/tugas/'.$tugas->id)}}">{{$tugas->judul_tugas}}</a>
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
        @if(Auth::user()->hak_akses=="Dosen")
        <!-- QUICK POST -->
        <div class="quick-post">
          <!-- QUICK POST HEADER -->
          <div class="quick-post-header">
            <!-- OPTION ITEMS -->
            <div class="option-items">
              <!-- OPTION ITEM -->
              <div class="option-item active">
                <!-- OPTION ITEM ICON -->
                <svg class="option-item-icon icon-status">
                  <use xlink:href="#svg-status"></use>
                </svg>
                <!-- /OPTION ITEM ICON -->

                <!-- OPTION ITEM TITLE -->
                <p class="option-item-title">Share Something</p>
                <!-- /OPTION ITEM TITLE -->
              </div>
              <!-- /OPTION ITEM -->


            </div>
            <!-- /OPTION ITEMS -->
          </div>
          <!-- /QUICK POST HEADER -->

          <!-- QUICK POST BODY -->
          <div class="quick-post-body">
            <!-- FORM -->
            <form class="form" method="post" action="{{url('/kelas/info/buatmateri')}}" enctype="multipart/form-data">
              @csrf
              <!-- FORM ROW -->
              <div class="form-row">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <input type="hidden" name="id_kelas" value="{{$kelas->id}}">
                  <!-- FORM TEXTAREA -->
                  <div class="form-textarea">
                    <textarea id="quick-post-text" name="deskripsi_materi" placeholder="Type something..." required></textarea>
                    <!-- FORM TEXTAREA LIMIT TEXT -->
                    <p class="form-textarea-limit-text">998/1000</p>
                    <!-- /FORM TEXTAREA LIMIT TEXT -->
                  </div>
                  <!-- /FORM TEXTAREA -->
                </div>
                <!-- /FORM ITEM -->
              </div>
              <!-- /FORM ROW -->
            <!-- /FORM -->
          </div>
          <!-- /QUICK POST BODY -->

          <!-- QUICK POST FOOTER -->
          <div class="quick-post-footer">
            <!-- QUICK POST FOOTER ACTIONS -->
            <div class="quick-post-footer-actions">
              <input type="file" name="file[]" multiple="true" onchange="desc()" style="display:none" id="sharefile">
              <!-- QUICK POST FOOTER ACTION -->
              <label for="sharefile" class="quick-post-footer-action text-tooltip-tft-medium" data-title="Insert File">
                <!-- QUICK POST FOOTER ACTION ICON -->
                <svg class="quick-post-footer-action-icon icon-forum">
                  <use xlink:href="#svg-forum"></use>
                </svg>
                <!-- /QUICK POST FOOTER ACTION ICON -->
              </label>
              <!-- /QUICK POST FOOTER ACTION -->
              <a class="video-status">
                <!-- VIDEO STATUS INFO -->
                <div class="video-status-info">
                  <!-- VIDEO STATUS META -->
                  <p class="video-status-meta" id="descfile"></p>
                  <!-- /VIDEO STATUS META -->
                </div>
                <!-- /VIDEO STATUS INFO -->
              </a>
            </div>
            <!-- /QUICK POST FOOTER ACTIONS -->

              <!-- QUICK POST FOOTER ACTIONS -->
              <div class="quick-post-footer-actions">
                <!-- BUTTON -->
                <button class="button small void"  type="reset">Discard</button>
                <!-- /BUTTON -->

                <!-- BUTTON -->
                <button class="button small secondary" type="submit">Post</button>
                <!-- /BUTTON -->
              </div>
              <!-- /QUICK POST FOOTER ACTIONS -->
          </div>
          <!-- /QUICK POST FOOTER -->
        </form>
        </div>
        <!-- /QUICK POST -->
        @endif

        @foreach($materi as $materi)
        <!-- WIDGET BOX -->
        <div class="widget-box no-padding">
          @if(Auth::user()->hak_akses=="Dosen")
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
                <p class="simple-dropdown-link popup-manage-group-trigger" onclick="editpost({{$materi->id}})">Edit Post</p>
                <!-- /SIMPLE DROPDOWN LINK -->

                <!-- SIMPLE DROPDOWN LINK -->
                <p class="simple-dropdown-link popup-review-trigger" onclick="deletepost({{$materi->id}},{{$kelas->id}})">Hapus Post</p>
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
                      <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/'.$materi->profile_photo_path)}}"></div>
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
                      <p class="user-avatar-badge-text">{{$materi->level}}</p>
                      <!-- /USER AVATAR BADGE TEXT -->
                    </div>
                    <!-- /USER AVATAR BADGE -->
                  </div>
                  <!-- /USER AVATAR -->
                </a>
                <!-- /USER STATUS AVATAR -->

                <!-- USER STATUS TITLE -->
                <p class="user-status-title medium"><a class="bold">{{$materi->nama_user}}</a></p>
                <!-- /USER STATUS TITLE -->

                <!-- USER STATUS TEXT -->
                <p class="user-status-text small">{{$materi->created_at}}</p>
                <!-- /USER STATUS TEXT -->
              </div>
              <!-- /USER STATUS -->

              <!-- WIDGET BOX STATUS TEXT -->
              <p class="widget-box-status-text"><?php echo nl2br($materi->deskripsi_materi); ?></p>
              <!-- /WIDGET BOX STATUS TEXT -->

              @foreach($files as $file)

                @if($file->id_foreign == $materi->id && $file->type == 'Materi')
                <!-- VIDEO STATUS -->
                <a class="video-status" href="{{url('/show?file='.$file->pathfile.'&kelas='.$kelas->nama_mk.$kelas->id.'&tipe=Materi')}}" target="_blank">
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
              <!-- CONTENT ACTIONS -->
              <div class="content-actions">
                <!-- CONTENT ACTION -->
                <div class="content-action">
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
                <p class="user-status-text small">{{$member->poin}}</p>
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



        <!-- WIDGET BOX -->
        <div class="widget-box">

          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">Challenge <span class="highlighted"> Upcoming</span></p>
          <!-- /WIDGET BOX TITLE -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- VIDEO BOX LIST -->
            <div class="video-box-list">
              @foreach($challenge as $challenge)
              <!-- VIDEO BOX -->
              <div class="video-box small">
                <!-- VIDEO BOX COVER -->
                <div class="video-box-cover " onclick="window.location.href='{{url('/kelas/challenge/'.$kelas->id.'/info/'.$challenge->id)}}'">
                  <!-- VIDEO BOX COVER IMAGE -->
                  <figure class="video-box-cover-image liquid">
                    <img src="{{URL::asset('img/ch1.jpg')}}" alt="cover-30">
                  </figure>
                  <!-- /VIDEO BOX COVER IMAGE -->


                  <!-- VIDEO BOX INFO -->
                  <div class="video-box-info">
                    <!-- VIDEO BOX TITLE -->
                    <p class="video-box-title">{{$challenge->judul_challenge}}</p>
                    <!-- /VIDEO BOX TITLE -->

                    <!-- VIDEO BOX TEXT -->
                    <p class="video-box-text">{{$challenge->waktu_selesai}}</p>
                    <!-- /VIDEO BOX TEXT -->
                  </div>
                  <!-- /VIDEO BOX INFO -->
                </div>
                <!-- /VIDEO BOX COVER -->
              </div>
              <!-- /VIDEO BOX -->
              @endforeach


            </div>
            <!-- /VIDEO BOX LIST -->
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
    <div class="popup-box mid popup-manage-group">
      <!-- POPUP CLOSE BUTTON -->
      <div class="popup-close-button popup-manage-group-trigger">
        <!-- POPUP CLOSE BUTTON ICON -->
        <svg class="popup-close-button-icon icon-cross">
          <use xlink:href="#svg-cross"></use>
        </svg>
        <!-- /POPUP CLOSE BUTTON ICON -->
      </div>
      <!-- /POPUP CLOSE BUTTON -->

      <!-- POPUP BOX BODY -->
      <div class="popup-box-body">
        <!-- POPUP BOX SIDEBAR -->
        <div class="popup-box-sidebar">
          <!-- USER PREVIEW -->
          <div class="user-preview small">
            <!-- USER PREVIEW COVER -->
            <figure class="user-preview-cover liquid">
              <img src="{{URL::asset('img/cover/29.jpg')}}" alt="cover-29">
            </figure>
            <!-- /USER PREVIEW COVER -->

            <!-- USER PREVIEW INFO -->
            <div class="user-preview-info">
              <!-- USER SHORT DESCRIPTION -->
              <div class="user-short-description small">
                <!-- USER SHORT DESCRIPTION AVATAR -->
                <a class="user-short-description-avatar user-avatar no-stats" >
                  <!-- USER AVATAR BORDER -->
                  <div class="user-avatar-border">
                    <!-- HEXAGON -->
                    <div class="hexagon-100-108"></div>
                    <!-- /HEXAGON -->
                  </div>
                  <!-- /USER AVATAR BORDER -->

                  <!-- USER AVATAR CONTENT -->
                  <div class="user-avatar-content">
                    <!-- HEXAGON -->
                    <div class="hexagon-image-84-92" data-src="{{URL::asset('img/avatar/'.Auth::user()->profile_photo_path)}}"></div>
                    <!-- /HEXAGON -->
                  </div>
                  <!-- /USER AVATAR CONTENT -->
                </a>
                <!-- /USER SHORT DESCRIPTION AVATAR -->

                <!-- USER SHORT DESCRIPTION TITLE -->
                <p class="user-short-description-title small"><a id="author_post"></a></p>
                <!-- /USER SHORT DESCRIPTION TITLE -->

                <!-- USER SHORT DESCRIPTION TEXT -->
                <p class="user-short-description-text regular" id="authod_id"></p>
                <!-- /USER SHORT DESCRIPTION TEXT -->
              </div>
              <!-- /USER SHORT DESCRIPTION -->
            </div>
            <!-- /USER PREVIEW INFO -->
          </div>
          <!-- /USER PREVIEW -->


          <!-- SIDEBAR MENU ITEM -->
          <div class="sidebar-menu-item">
            <!-- SIDEBAR MENU BODY -->
            <div class="sidebar-menu-body">
              <!-- SIDEBAR MENU LINK -->

              <p class="sidebar-menu-link active" id="isifile"></p>
              <!-- /SIDEBAR MENU LINK -->



              <!-- SIDEBAR MENU LINK -->
              <label class="sidebar-menu-link" for="filehide">Add File</label>
              <!-- /SIDEBAR MENU LINK -->
            </div>
            <!-- /SIDEBAR MENU BODY -->
          </div>
          <!-- /SIDEBAR MENU ITEM -->

          <!-- POPUP BOX SIDEBAR FOOTER -->
          <div class="popup-box-sidebar-footer">
            <!-- BUTTON -->
            <p class="button secondary full popup-manage-group-trigger" id="editsubmit">Save Changes!</p>
            <!-- /BUTTON -->

            <!-- BUTTON -->
            <p class="button white full popup-manage-group-trigger">Discard All</p>
            <!-- /BUTTON -->
          </div>
          <!-- /POPUP BOX SIDEBAR FOOTER -->
        </div>
        <!-- /POPUP BOX SIDEBAR -->

        <!-- POPUP BOX CONTENT -->
        <div class="popup-box-content">
          <!-- WIDGET BOX -->
          <div class="widget-box">
            <!-- WIDGET BOX TITLE -->
            <p class="widget-box-title">Edit Post</p>
            <!-- /WIDGET BOX TITLE -->

            <!-- WIDGET BOX CONTENT -->
            <div class="widget-box-content">
              <!-- FORM -->
                <form class="form" method="post" id="form-save" action="{{url('/kelas/info/editpost')}}" enctype="multipart/form-data">
                @csrf
                <input type="file" id="filehide" name="file[]" style="display:none" onchange="descedit()">
                <!-- FORM ROW -->
                <div class="form-row">
                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <input type="hidden" name="idmateri" id="idmateri" >
                    <div class="form-input small mid-textarea">
                      <textarea id="deskripsi_materi" name="deskripsi_materi" placeholder="Tulis sesuatu"></textarea>
                    </div>
                    <!-- /FORM INPUT -->
                  </div>
                  <!-- /FORM ITEM -->
                </div>
                <!-- /FORM ROW -->
                <div class="action-request-list">
                  <div class="row" id="fileshow">

                  </div>
              </div>

              </form>
              <!-- /FORM -->
            </div>
            <!-- WIDGET BOX CONTENT -->
          </div>
          <!-- /WIDGET BOX -->
        </div>
        <!-- /POPUP BOX CONTENT -->
      </div>
      <!-- /POPUP BOX BODY -->
    </div>
    <!-- /POPUP BOX -->

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
      <p class="popup-box-title">Notification</p>
      <!-- /POPUP BOX TITLE -->


      <!-- FORM -->
      <form class="form" action="{{url('/kelas/hapuspost')}}" method="post">
        @csrf
        <!-- FORM ROW -->
        <div class="form-row">
          <!-- FORM ITEM -->
          <div class="form-item">
            <!-- FORM INPUT -->
            <div class="form-input small">
              <h2 id="displayword">Apakah anda yakin ingin menghapus Post ini?</h2>
              <input type="hidden" name="idkelas" id="idkelas">
              <input type="hidden" name="idpost" id="idpost">
            </div>
            <!-- /FORM INPUT -->
          </div>
          <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->

        <!-- POPUP BOX ACTIONS -->
        <div class="popup-box-actions full void">
          <!-- POPUP BOX ACTION -->

          <button class="popup-box-action full button bg-danger popup-review-trigger" type="submit" id="displayheart">Hapus!</button>
          <!-- /POPUP BOX ACTION -->

          <!-- POPUP BOX ACTION TEXT -->
          <p class="popup-box-action-text" id="titledisplay">Data yang telah dihapus tidak dapat dikembalikan!</p>
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
var form = document.getElementById("form-save");
document.getElementById("editsubmit").addEventListener("click",function(){
  form.submit();
});
function descedit(){
  var file = document.getElementById('filehide');
  var lbl = document.getElementById('isifile');
  var isi = [...file.files];
  var jumlah = Object.keys(isi).length;
  lbl.innerHTML = jumlah + " Files";
}

function deletepost(id,idkelas){
  document.getElementById("idkelas").value=idkelas;
  document.getElementById("idpost").value = id;

}
function hapusfile(id,idpost){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
    type :"POST",
    url : "{{url('/kelas/deletepostfile')}}",
    data:{
      _token : CSRF_TOKEN,
      id : id,
    },success: function(response){
      editfile(idpost);
    }
  });
}
function editfile(id){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
    type:"POST",
    url: "{{url('/kelas/getpostdata')}}",
    dataType:'json',
    data :{
      _token : CSRF_TOKEN,
      id : id,
    },success: function(response){
        var files = response.file;
        var isifile = "";
        $.each(files,function(j,file){
          isifile += "<div class='col-6 mt-4 mb-4'><div class='photo-preview small' style='width:180px;margin:0px;padding:0px'><figure class='photo-preview-image liquid'><img src='{{URL::asset('img/file.png')}}'  alt='photo-preview-18'></figure><div class='photo-preview-info'><div class='reaction-count-list'> <div class='reaction-count negative' id='hapus' onclick='hapusfile("+file.id+","+id+")'><svg class='reaction-count-icon icon-cross'><use xlink:href='#svg-cross'></use></svg><p class='eaction-count-text'>Hapus</p></div></div></div><a target='_blank' >"+file.namafile+"</a></div></div>";
        });
        document.getElementById("fileshow").innerHTML = isifile;

    }
  });
}
function editpost(id){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
    type:"POST",
    url: "{{url('/kelas/getpostdata')}}",
    dataType:'json',
    data :{
      _token : CSRF_TOKEN,
      id : id,
    },success: function(response){
      editfile(id);
        var post = response.data;
        var files = response.file;
        var isifile = "";
        $.each(post, function(i,row){
          document.getElementById("idmateri").value = id;
          document.getElementById("author_post").innerHTML = row.nama_user;
          document.getElementById("authod_id").innerHTML = row.id_author;
          document.getElementById("deskripsi_materi").value = response.deskripsi;
        });

    }
  });
}
function desc(){
  var file = document.getElementById('sharefile');
  var lbl = document.getElementById('descfile');
  var isi = [...file.files];
  var jumlah = Object.keys(isi).length;
  lbl.innerHTML = jumlah + " Files";
}
</script>
@endsection
