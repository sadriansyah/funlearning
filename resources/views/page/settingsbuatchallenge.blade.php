@extends('layouts.app')
@section('title','Challenge | FunLearning')

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
          <p class="section-pretitle">Challenge</p>
          <!-- /SECTION PRETITLE -->

          <!-- SECTION TITLE -->
          <h2 class="section-title">Buat Callenge</h2>
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
          <p class="widget-box-title">Create Challenge</p>
          <!-- /WIDGET BOX TITLE -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- FORM -->
            <form class="form" action="{{url('/kelas/settings/buatchallenge')}}" method="post"  id="form-save">
              @csrf
              <!-- FORM ROW -->
              <div class="form-row split">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM INPUT -->
                  <input type="hidden" name="id_kelas" value="{{$kelas->id}}">
                  <div class="form-input small">
                    <label for="profile-job-2-title">Judul Challenge</label>
                    <input type="text" id="profile-job-2-title" name="judul_challenge" required>
                  </div>
                  <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->
              </div>
              <!-- /FORM ROW -->
              <!-- FORM ROW -->
              <div class="form-row split">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM SELECT -->
                  <div class="form-select  active">
                    <label for="profile-job-2-year-started">Waktu Mulai</label>
                    <input type="date" name="waktu_mulai" class="form-control" data-date-format="DD/MMM/YYYY" id="profile-job-2-year-started" required>
                  </div>
                  <!-- /FORM SELECT -->
                </div>
                <!-- /FORM ITEM -->


                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM SELECT -->
                  <div class="form-select">
                    <label for="profile-job-2-year-ended">Jam Mulai</label>
                    <input type="time" name="jam_mulai" class="form-control" id="profile-job-2-year-ended" required>

                  </div>
                  <!-- /FORM SELECT -->
                </div>
                <!-- /FORM ITEM -->
              </div>
              <!-- /FORM ROW -->
              <!-- FORM ROW -->
              <div class="form-row split">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM SELECT -->
                  <div class="form-select  active">
                    <label for="profile-job-3-year-started">Waktu Selesai</label>
                    <input type="date" name="waktu_selesai" class="form-control" data-date-format="DD/MMM/YYYY" id="profile-job-3-year-started" required>
                  </div>
                  <!-- /FORM SELECT -->
                </div>
                <!-- /FORM ITEM -->


                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM SELECT -->
                  <div class="form-select">
                    <label for="profile-job-3-year-ended">Jam Selesai</label>
                    <input type="time" name="jam_selesai" class="form-control" id="profile-job-3-year-ended" required>

                  </div>
                  <!-- /FORM SELECT -->
                </div>
                <!-- /FORM ITEM -->
              </div>
              <!-- /FORM ROW -->

              <!-- FORM ROW -->
              <div class="form-row">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM INPUT -->
                  <div class="form-input small active mid-textarea">
                    <label for="profile-job-2-description">Deskripsi</label>
                    <textarea id="profile-job-2-description"  name="deskripsi_challenge" required></textarea>
                  </div>
                  <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->
              </div>
              <!-- /FORM ROW -->

              <div class="row mt-4">
                <!-- Opsi A -->
                <div class="col-md-2">
                  <div class="form-item">
                    <div class="form-select">
                      <label for="account-recovery-question-2">Pilihan</label>
                      <select id="account-recovery-question-2" >
                        <option value="1">A</option>
                      </select>
                      <!-- FORM SELECT ICON -->
                      <svg class="form-select-icon icon-small-arrow">
                        <use xlink:href="#svg-small-arrow"></use>
                      </svg>
                      <!-- /FORM SELECT ICON -->
                    </div>
                  </div>
                </div>
                <div class="col-md-10">
                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM SELECT -->
                    <div class="form-input small">
                      <label for="OpsiA">Opsi A</label>
                      <input type="text" name="pilihan1" class="form-control" id="OpsiA" required>
                    </div>
                    <!-- /FORM SELECT -->
                  </div>
                  <!-- /FORM ITEM -->
                </div>
              </div>
              <div class="row mt-4">
                <!-- Opsi B -->
                <div class="col-md-2">
                  <div class="form-item">
                    <div class="form-select">
                      <label for="account-recovery-question-3">Option</label>
                      <select id="account-recovery-question-3" >
                        <option value="1">B</option>
                      </select>
                      <!-- FORM SELECT ICON -->
                      <svg class="form-select-icon icon-small-arrow">
                        <use xlink:href="#svg-small-arrow"></use>
                      </svg>
                      <!-- /FORM SELECT ICON -->
                    </div>
                  </div>
                </div>
                <div class="col-md-10">
                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM SELECT -->
                    <div class="form-input small">
                      <label for="opsiB">Opsi B</label>
                      <input type="text" name="pilihan2" class="form-control" id="OpsiB" required>
                    </div>
                    <!-- /FORM SELECT -->
                  </div>
                  <!-- /FORM ITEM -->
                </div>
              </div>
              <div class="row mt-4">
                <!-- Opsi C -->
                <div class="col-md-2">
                  <div class="form-item">
                    <div class="form-select">
                      <label for="account-recovery-question-4">Option</label>
                      <select id="account-recovery-question-4" >
                        <option value="1">C</option>
                      </select>
                      <!-- FORM SELECT ICON -->
                      <svg class="form-select-icon icon-small-arrow">
                        <use xlink:href="#svg-small-arrow"></use>
                      </svg>
                      <!-- /FORM SELECT ICON -->
                    </div>
                  </div>
                </div>
                <div class="col-md-10">
                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM SELECT -->
                    <div class="form-input small">
                      <label for="opsiC">Opsi C</label>
                      <input type="text" name="pilihan3" class="form-control" id="OpsiC" required>
                    </div>
                    <!-- /FORM SELECT -->
                  </div>
                  <!-- /FORM ITEM -->
                </div>
              </div>
              <div class="row mt-4">
                <!-- Opsi D -->
                <div class="col-md-2">
                  <div class="form-item">
                    <div class="form-select">
                      <label for="account-recovery-question-5">Option</label>
                      <select id="account-recovery-question-5" >
                        <option value="1">D</option>
                      </select>
                      <!-- FORM SELECT ICON -->
                      <svg class="form-select-icon icon-small-arrow">
                        <use xlink:href="#svg-small-arrow"></use>
                      </svg>
                      <!-- /FORM SELECT ICON -->
                    </div>
                  </div>
                </div>
                <div class="col-md-10">
                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM SELECT -->
                    <div class="form-input small">
                      <label for="opsiD">Opsi D</label>
                      <input type="text" name="pilihan4" class="form-control" id="OpsiD" required>
                    </div>
                    <!-- /FORM SELECT -->
                  </div>
                  <!-- /FORM ITEM -->
                </div>
              </div>

              <!-- FORM ROW -->
              <div class="form-row split mt-4">
                <div class="form-item">
                  <div class="form-select">
                    <label for="account-recovery-question-5">Opsi Benar</label>
                    <select id="account-recovery-question-5" name="pilihanbenar" required>
                      <option>--</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                    </select>
                    <!-- FORM SELECT ICON -->
                    <svg class="form-select-icon icon-small-arrow">
                      <use xlink:href="#svg-small-arrow"></use>
                    </svg>
                    <!-- /FORM SELECT ICON -->
                  </div>
                </div>


                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM SELECT -->
                  <div class="form-input small">
                    <label for="poinchallenge">Poin Challenge</label>
                    <input type="text" name="poinchallenge" class="form-control" id="poinchallenge" required onkeypress="validate(event)">

                  </div>
                  <!-- /FORM SELECT -->
                </div>
                <!-- /FORM ITEM -->
              </div>
              <!-- /FORM ROW -->
              <button class="button small white add-field-button" type="submit">+ Tambahkan </button>



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
  function validate(evt){
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
    // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }

</script>
@endsection
