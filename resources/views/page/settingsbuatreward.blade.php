@extends('layouts.app')
@section('title','Rewards | FunLearning')

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
          <p class="section-pretitle">Rewards</p>
          <!-- /SECTION PRETITLE -->

          <!-- SECTION TITLE -->
          <h2 class="section-title">Buat Rewards</h2>
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
          <p class="widget-box-title">Buat Reward</p>
          <!-- /WIDGET BOX TITLE -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content">
            <!-- FORM -->
            <form class="form" action="{{url('/kelas/settings/buatreward')}}" method="post" enctype="multipart/form-data" id="form-save">
              @csrf
              <!-- FORM ROW -->
              <div class="form-row split">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM INPUT -->
                  <input type="hidden" name="id_kelas" value="{{$kelas->id}}">
                  <div class="form-input small">
                    <label for="profile-job-2-title">Judul Reward</label>
                    <input type="text" id="profile-job-2-title" name="judul_reward" required>
                  </div>
                  <!-- /FORM INPUT -->
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
                    <textarea id="profile-job-2-description"  name="deskripsi_reward" required></textarea>
                  </div>
                  <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->
              </div>
              <!-- /FORM ROW -->

              <div class="form-row">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM INPUT -->
                  <div class="form-input small active mid-textarea">
                    <label for="hidden_reward">Teks Yang ditampilkan hanya setelah reward di klaim</label>
                    <textarea id="hidden_reward"  name="hidden_reward" ></textarea>
                  </div>
                  <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->
              </div>
              <!-- /FORM -->
              <input type="file" name="file" id="myfile" style="display:none" accept="image/*" onchange="desc()" >
              <!-- BUTTON -->
              <label class="button small white add-field-button" for="myfile">+ Tambahkan Badge (Optional)</label>
              <p class="widget-box-text light" id="desctext"></p>


              <!-- WIDGET BOX TITLE -->
              <p class="widget-box-title mt-4">Requirements</p>
              <!-- /WIDGET BOX TITLE -->

              <!-- FORM ROW -->
              <div class="form-row split mt-4">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM SELECT -->
                  <div class="form-input small active">
                    <label for="batasanklaim">Batasan Klaim (Optional)</label>
                    <input type="text" name="batasan_klaim" class="form-control" id="batasanklaim" onkeypress="validate(event)">
                  </div>
                  <!-- /FORM SELECT -->
                </div>
                <!-- /FORM ITEM -->

                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM SELECT -->
                  <div class="form-input small active">
                    <label for="minimumlevel">Minimum Level (Optional)</label>
                    <input type="text" name="minimum_level" class="form-control" id="minimumlevel" onkeypress="validate(event)">

                  </div>
                  <!-- /FORM SELECT -->
                </div>
                <!-- /FORM ITEM -->

              </div>
              <!-- /FORM ROW -->
              <!-- FORM ROW -->
              <div class="form-row split mt-4">
                <!-- FORM ITEM -->
                <div class="form-item">
                  <!-- FORM SELECT -->
                  <div class="form-input small active">
                    <label for="poinreward">Poin Reward </label>
                    <input type="text" name="poin_reward" class="form-control" id="poinreward" onkeypress="validate(event)" required>
                  </div>
                  <!-- /FORM SELECT -->
                </div>
                <input type="hidden" name="tipe" id="tipe" >
                <!-- /FORM ITEM -->
                <div class="form-item">
                  <div class="form-select">
                    <label for="trigger">Trigger by Tugas/Challenge</label>
                    <select id="trigger" name="pilihanbenar" onchange="settipe()">
                      <option value="kosong,kosong">--</option>
                      @foreach($tugas as $tugas)
                      <option value="{{$tugas->id}},{{'tugas'}}" >{{$tugas->judul_tugas}}</option>
                      @endforeach
                      @foreach($challenge as $challenge)
                      <option value="{{$challenge->id}},{{'challenge'}}"  >{{$challenge->judul_challenge}}</option>
                      @endforeach
                    </select>
                    <!-- FORM SELECT ICON -->
                    <svg class="form-select-icon icon-small-arrow">
                      <use xlink:href="#svg-small-arrow"></use>
                    </svg>
                    <!-- /FORM SELECT ICON -->
                  </div>
                </div>

              </div>
              <!-- /FORM ROW -->
              <button class="button small primary add-field-button" type="submit">Simpan </button>



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


<script type="text/javascript">
  settipe();

  function settipe(){
    var tipe = document.getElementById("trigger").value;
    document.getElementById("tipe").value = tipe;
  }

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
