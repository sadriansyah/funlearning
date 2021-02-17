@extends('layouts.app')
@section('title','Tugas | FunLearning')

@section('content')

<!-- CONTENT GRID -->
<div class="content-grid">
  @foreach($kelas as $kelas)
  <!-- PROFILE HEADER -->
  @include('page.headerkelas')
  <!-- /PROFILE HEADER -->




  <!-- GRID -->
  <div class="grid grid-3-9 medium-space">
    <!-- GRID COLUMN -->
    <div class="account-hub-sidebar">
      <!-- SIDEBAR BOX -->
      <div class="sidebar-box no-padding">
        <!-- SIDEBAR MENU -->
        <div class="sidebar-menu round-borders">



          @include('page.settinssidebar')


        </div>
        <!-- /SIDEBAR MENU -->

      </div>
      <!-- /SIDEBAR BOX -->
    </div>
    <!-- /GRID COLUMN -->

    <!-- GRID COLUMN -->
    <div class="account-hub-content">
      <!-- SECTION HEADER -->
      <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
          <!-- SECTION PRETITLE -->
          <p class="section-pretitle">Tugas</p>
          <!-- /SECTION PRETITLE -->

          <!-- SECTION TITLE -->
          <h2 class="section-title">Tugas dan Quest</h2>
          <!-- /SECTION TITLE -->
          @if(session('sukses'))
          <div class="mt-4">
            <p class="button bg-warning col-md-12 " >
              {{session('sukses')}}
            </p>
          </div>
          @endif

        </div>
        <!-- /SECTION HEADER INFO -->

      </div>
      <!-- /SECTION HEADER -->


      <!-- GRID COLUMN -->
      <div class="grid-column">


        <!-- WIDGET BOX -->
        <div class="widget-box">
          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">Edit Tugas</p>
          <!-- /WIDGET BOX TITLE -->


          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- FORM -->
            <form class="form" action="{{url('/kelas/settings/edittugas')}}" method="post" enctype="multipart/form-data" id="form-save">
              @csrf
              <!-- FORM ROW -->
              @foreach($tugas as $tugas)
              <div class="form-row split">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM INPUT -->
                  <input type="hidden" name="id_tugas" value="{{$tugas->id}}">
                  <input type="hidden" name="id_kelas" value="{{$kelas->id}}">
                  <div class="form-input small active">
                    <label for="profile-job-2-title">Judul Tugas</label>
                    <input type="text" id="profile-job-2-title" name="judul_tugas" value="{{$tugas->judul_tugas}}">
                  </div>
                  <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->

                <!-- FORM ROW -->
                <div class="form-row split">
                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM SELECT -->
                    <div class="form-select  active">
                      <label for="profile-job-2-year-started">Deadline Tanggal</label>
                      <input type="date" name="deadline_tanggal" class="form-control" data-date-format="DD/MMM/YYYY" value="{{$tugas->deadline_tanggal}}" id="profile-job-2-year-started">
                    </div>
                    <!-- /FORM SELECT -->
                  </div>
                  <!-- /FORM ITEM -->


                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM SELECT -->
                    <div class="form-select">
                      <label for="profile-job-2-year-ended">Deadline Jam</label>
                      <input type="time" name="deadline_jam" class="form-control" value="{{$tugas->deadline_jam}}" id="profile-job-2-year-ended">

                    </div>
                    <!-- /FORM SELECT -->
                  </div>
                  <!-- /FORM ITEM -->
                </div>
                <!-- /FORM ROW -->
              </div>
              <!-- /FORM ROW -->

              <!-- FORM ROW -->
              <div class="form-row">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM INPUT -->
                  <div class="form-input small mid-textarea active">
                    <label for="profile-job-2-description">Description</label>
                    <textarea id="profile-job-2-description" class="ckeditor" name="deskripsi_tugas">{{$tugas->deskripsi_tugas}}</textarea>
                  </div>
                  <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->
              </div>
              <!-- /FORM ROW -->
              <!-- FORM ROW -->
              <div class="form-row split">
                <!-- FORM ITEM -->
                <div class="form-item centered">
                  <label class="form-title" for="profile-privacy-chat-activity">Status</label>
                </div>
                <!-- /FORM ITEM -->

                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM SELECT -->
                  <div class="form-select">
                    <select id="profile-privacy-chat-activity" name="status">
                      <option value="Open" @if($tugas->status=="Open") selected @endif>Open</option>
                      <option value="Closed" @if($tugas->status=="Closed") selected @endif>Closed</option>
                    </select>
                    <!-- FORM SELECT ICON -->
                    <svg class="form-select-icon icon-small-arrow">
                      <use xlink:href="#svg-small-arrow"></use>
                    </svg>
                    <!-- /FORM SELECT ICON -->
                  </div>
                  <!-- /FORM SELECT -->
                </div>
                <!-- /FORM ITEM -->
              </div>
              <!-- /FORM ROW -->

              <div class="row">
                @foreach($file as $file)
                <div class="col-lg-3 mt-4 mb-4">
                  <!-- PHOTO PREVIEW -->
                  <div class="photo-preview small" style="width:110px">
                    <!-- PHOTO PREVIEW IMAGE -->
                    <figure class="photo-preview-image liquid">
                      <img src="{{URL::asset('img/file.png')}}" style="width:40px" alt="photo-preview-18">
                    </figure>
                    <!-- /PHOTO PREVIEW IMAGE -->

                    <!-- PHOTO PREVIEW INFO -->
                    <div class="photo-preview-info">
                      <!-- REACTION COUNT LIST -->
                      <div class="reaction-count-list">
                        <!-- REACTION COUNT -->
                        <div class="reaction-count negative popup-review-trigger" id="hapus" onclick="hapus({{$kelas->id}},{{$tugas->id}},{{$file->id}})">
                          <!-- REACTION COUNT ICON -->
                          <svg class="reaction-count-icon icon-cross">
                            <use xlink:href="#svg-cross"></use>
                          </svg>
                          <!-- /REACTION COUNT ICON -->

                          <!-- REACTION COUNT TEXT -->
                          <p class="reaction-count-text">Hapus</p>
                          <!-- /REACTION COUNT TEXT -->
                        </div>
                        <!-- /REACTION COUNT -->

                        <!-- REACTION COUNT -->
                        <a class="reaction-count negative" href="{{url('/file/'.$kelas->nama_mk.$kelas->id.'/tugas/'.$file->pathfile)}}" target="_blank">
                          <!-- REACTION COUNT ICON -->
                          <svg class="reaction-count-icon icon-forum">
                            <use xlink:href="#svg-forum"></use>
                          </svg>
                          <!-- /REACTION COUNT ICON -->

                          <!-- REACTION COUNT TEXT -->
                          <p class="reaction-count-text">Lihat</p>
                          <!-- /REACTION COUNT TEXT -->
                        </a>
                        <!-- /REACTION COUNT -->
                      </div>
                      <!-- /REACTION COUNT LIST -->
                    </div>
                    <!-- /PHOTO PREVIEW INFO -->
                    <a href="{{url('/file/'.$kelas->nama_mk.$kelas->id.'/tugas/'.$file->pathfile)}}" target="_blank" >{{$file->namafile}}</a>
                  </div>
                  <!-- /PHOTO PREVIEW -->
                </div>
                @endforeach
              </div>


            <!-- /FORM -->
            <input type="file" name="file[]" id="myfile" multiple="true" style="display:none" onchange="desc()" >
            <!-- BUTTON -->
            <label class="button small white add-field-button" for="myfile">+ Add File</label>
            <p class="widget-box-text light" id="desctext"></p>

            <div class="form-row split mt-4">
              <div class="form-item">
                  <button type="submit" class="button primary half" >Save</button>

              </div>


            </div>
            @endforeach
          </form>

            <!-- /BUTTON -->
          </div>
          <!-- WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->


      </div>
      <!-- /GRID COLUMN -->
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
  <p class="popup-box-title">Hapus File</p>
  <!-- /POPUP BOX TITLE -->


  <!-- FORM -->
  <form class="form" action="{{url('/kelas/settings/hapusfile')}}" method="post">
    @csrf
    <!-- FORM ROW -->
    <div class="form-row">
      <!-- FORM ITEM -->
      <div class="form-item">
        <!-- FORM INPUT -->
        <div class="form-input small">
          <h2>Apakah anda yakin ingin menghapus File ini?</h2>
          <input type="hidden" name="idkelas" id="idkelas">
          <input type="hidden" name="idtugas" id="idtugas">
          <input type="hidden" name="idfile" id="idfile">
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
      <p class="popup-box-action-text">File yang telah dihapus tidak dapat dikembalikan!</p>
      <!-- /POPUP BOX ACTION TEXT -->
    </div>
    <!-- /POPUP BOX ACTIONS -->
  </form>
  <!-- /FORM -->
</div>
<!-- /POPUP BOX -->
@endforeach
@endsection

@section('scripting')
<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('ckeditor').ckeditor();
  });
</script>
<script type="text/javascript">
  var form = document.getElementById("form-save");
  document.getElementById("save").addEventListener("click",function(){
    form.submit();
  });
  function desc(){
    var file = document.getElementById('myfile');
    var lbl = document.getElementById('desctext');
    var isi = [...file.files];
    var jumlah = Object.keys(isi).length;
    lbl.innerHTML = jumlah + " Files";
  }

  function hapus(idkelas,idtugas,idfile){
    // var x = document.getElementById("delete").getAttribute("data");
    document.getElementById("idkelas").value = idkelas;
    document.getElementById("idtugas").value = idtugas;
    document.getElementById("idfile").value = idfile;
  }

</script>
@endsection
