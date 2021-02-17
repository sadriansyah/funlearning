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
          <p class="widget-box-title">Create Tugas</p>
          <!-- /WIDGET BOX TITLE -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- FORM -->
            <form class="form" action="{{url('/kelas/settings/buattugas')}}" method="post" enctype="multipart/form-data" id="form-save">
              @csrf
              <!-- FORM ROW -->
              <div class="form-row split">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM INPUT -->
                  <input type="hidden" name="id_kelas" value="{{$kelas->id}}">
                  <div class="form-input small">
                    <label for="profile-job-2-title">Judul Tugas</label>
                    <input type="text" id="profile-job-2-title" name="judul_tugas" required>
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
                      <input type="date" name="deadline_tanggal" class="form-control" data-date-format="DD/MMM/YYYY" id="profile-job-2-year-started" required>
                    </div>
                    <!-- /FORM SELECT -->
                  </div>
                  <!-- /FORM ITEM -->


                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM SELECT -->
                    <div class="form-select">
                      <label for="profile-job-2-year-ended">Deadline Jam</label>
                      <input type="time" name="deadline_jam" class="form-control" id="profile-job-2-year-ended" required>

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
                  <div class="form-input small active mid-textarea">
                    <label for="profile-job-2-description">Deskripsi</label>
                    <textarea id="profile-job-2-description" class="ckeditor" name="deskripsi_tugas" required ></textarea>
                  </div>
                  <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->
              </div>
              <!-- /FORM ROW -->

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
  

  function desc(){
    var file = document.getElementById('myfile');
    var lbl = document.getElementById('desctext');
    var isi = [...file.files];
    var jumlah = Object.keys(isi).length;
    lbl.innerHTML = jumlah + " Files";
  }

</script>
@endsection
