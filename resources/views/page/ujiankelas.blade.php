@extends('layouts.app')
@section('title','Ujian | Funlearning')

@section('content')

  <!-- CONTENT GRID -->
  @foreach($kelas as $kelas)
  <div class="content-grid">
    <!-- PROFILE HEADER -->
    @include('page.headerkelas')
    <!-- /PROFILE HEADER -->

    @foreach($ujian as $ujian)
    <!-- SECTION HEADER -->
    <div class="section-header">
      <!-- SECTION HEADER INFO -->
      <div class="section-header-info">
        <!-- SECTION PRETITLE -->
        <p class="section-pretitle">Ujian</p>
        <!-- /SECTION PRETITLE -->

        <!-- SECTION TITLE -->
        <h2 class="section-title">{{$ujian->judul_ujian}}</h2>
        <!-- /SECTION TITLE -->
      </div>
      <!-- /SECTION HEADER INFO -->

      <!-- SECTION HEADER ACTIONS -->
      <div class="section-header-actions">
        <!-- SECTION HEADER SUBSECTION -->
        <a class="section-header-subsection" >Kelas</a>
        <!-- /SECTION HEADER SUBSECTION -->

        <!-- SECTION HEADER SUBSECTION -->
        <a class="section-header-subsection" >Ujian</a>
        <!-- /SECTION HEADER SUBSECTION -->

        <!-- SECTION HEADER SUBSECTION -->
        <p class="section-header-subsection">{{$ujian->judul_ujian}}</p>
        <!-- /SECTION HEADER SUBSECTION -->
      </div>
      <!-- /SECTION HEADER ACTIONS -->
    </div>
    <!-- /SECTION HEADER -->

    <!-- GRID -->
    <div class="grid grid-9-3">
      <!-- MARKETPLACE CONTENT -->
      <div class="marketplace-content grid-column">


        <!-- TAB BOX -->
        <div class="tab-box">
          <!-- TAB BOX OPTIONS -->
          <div class="tab-box-options">
            <!-- TAB BOX OPTION -->
            <div class="tab-box-option">
              <!-- TAB BOX OPTION TITLE -->
              <p class="tab-box-option-title">Description</p>
              <!-- /TAB BOX OPTION TITLE -->
            </div>
            <!-- /TAB BOX OPTION -->


            @if(Auth::user()->hak_akses =="Dosen")
            <!-- TAB BOX OPTION -->
            <div class="tab-box-option">
              <!-- TAB BOX OPTION TITLE -->
              <p class="tab-box-option-title">Reviews </p>
              <!-- /TAB BOX OPTION TITLE -->
            </div>
            <!-- /TAB BOX OPTION -->
            @endif
          </div>
          <!-- /TAB BOX OPTIONS -->

          <!-- TAB BOX ITEMS -->
          <div class="tab-box-items">
            <!-- TAB BOX ITEM -->
            <div class="tab-box-item">
              <!-- TAB BOX ITEM CONTENT -->
              <div class="tab-box-item-content">
                <!-- TAB BOX ITEM TITLE -->
                <p class="tab-box-item-title">{{$ujian->judul_ujian}}</p>
                <!-- /TAB BOX ITEM TITLE -->

                <!-- TAB BOX ITEM PARAGRAPH -->
                <p class="tab-box-item-paragraph"><?php echo htmlspecialchars_decode($ujian->deskripsi_ujian); ?></p>
                <!-- /TAB BOX ITEM PARAGRAPH -->

                <!-- TAB BOX ITEM TITLE -->
                <p class="tab-box-item-title">Attachment :</p>
                <!-- /TAB BOX ITEM TITLE -->

                <!-- BULLET ITEM LIST -->
                <ul class="bullet-item-list">
                  @foreach($file as $file)
                  <!-- BULLET ITEM -->
                  <li class="bullet-item">
                    <!-- BULLET ITEM ICON -->
                    <svg class="bullet-item-icon icon-check">
                      <use xlink:href="#svg-check"></use>
                    </svg>
                    <!-- /BULLET ITEM ICON -->

                    <!-- BULLET ITEM TEXT -->
                    <a class="bullet-item-text" target="_blank" href="{{url('/show?file='.$file->pathfile.'&kelas='.$kelas->nama_mk.$kelas->id.'&tipe=Ujian')}}">{{$file->namafile}}</a>
                    <!-- /BULLET ITEM TEXT -->
                  </li>
                  <!-- /BULLET ITEM -->
                  @endforeach

                </ul>
                <!-- /BULLET ITEM LIST -->
              </div>
              <!-- /TAB BOX ITEM CONTENT -->
            </div>
            <!-- /TAB BOX ITEM -->

            @if(Auth::user()->hak_akses  =="Dosen")
            <!-- TAB BOX ITEM -->
            <div class="tab-box-item">
              <!-- POST COMMENT LIST -->
              <div class="post-comment-list no-border-top">
                <div class="widget-box-content container">
                  <div class="row">
                    @if($jawaban)
                      @foreach($jawaban as $jwb)
                        <div class="col-3 m-4" >
                      <!-- PRODUCT PREVIEW -->
                      <div class="product-preview small">
                        @if($jwb->id_file == " ")
                        <!-- PRODUCT PREVIEW IMAGE -->
                        <a class="text-tooltip-tft" data-title="Klik untuk beri nilai" onclick="setnilai({{$jwb->id}},{{$jwb->nim_nip}},{{$kelas->id}})">
                          <figure class="product-preview-image liquid popup-manage-joinkelas-trigger">
                            <img src="{{URL::asset('img/nofile.png')}}" alt="item-01">
                          </figure>
                        </a>
                        <!-- /PRODUCT PREVIEW IMAGE -->
                        @else
                        <!-- PRODUCT PREVIEW IMAGE -->
                        <a class="text-tooltip-tft" data-title="Klik untuk beri nilai" onclick="setnilai({{$jwb->id}},{{$jwb->nim_nip}},{{$kelas->id}})">
                          <figure class="product-preview-image liquid popup-manage-joinkelas-trigger">
                            <img src="{{URL::asset('img/item.jpg')}}" alt="item-01">
                          </figure>
                        </a>
                        <!-- /PRODUCT PREVIEW IMAGE -->
                        @endif

                        <!-- PRODUCT PREVIEW INFO -->
                        <div class="product-preview-info">
                          <!-- TEXT STICKER -->
                          <p class="text-sticker" id="nilai{{$jwb->nim_nip}}"><span class="highlighted">Nilai </span> {{$jwb->nilai_ujian}}</p>
                          <!-- /TEXT STICKER -->

                          <!-- PRODUCT PREVIEW TITLE -->
                          <p class="product-preview-title"><a >{{$jwb->nama_user}} | {{$jwb->nim_nip}}</a></p>
                          <!-- /PRODUCT PREVIEW TITLE -->
                          <?php
                          $cek ="false";

                          ?>
                          @foreach($filejawaban as $file)
                          <?php
                          if($file->id == $jwb->id_file){
                            $cek = "true";
                            $namafile = $file->namafile;
                            $pathfile = $file->pathfile;
                            break;
                          }

                          ?>
                          @endforeach
                            @if($cek == "true")
                          <!-- PRODUCT PREVIEW CATEGORY -->
                            <p class="product-preview-category digital"><a target="_blank" href="{{url('/show?file='.$pathfile.'&kelas='.$kelas->nama_mk.$kelas->id.'&tipe=Ujian')}}" >{{$namafile}}</a></p>
                          <!-- /PRODUCT PREVIEW CATEGORY -->
                            @else
                            <!-- PRODUCT PREVIEW CATEGORY -->
                              <p class="product-preview-category digital"><a >No File</a></p>
                            <!-- /PRODUCT PREVIEW CATEGORY -->
                            @endif
                        </div>
                        <!-- /PRODUCT PREVIEW INFO -->
                      </div>
                      <!-- /PRODUCT PREVIEW -->

                    </div>
                      @endforeach
                    @endif
                  </div>
                </div>
              </div>
              <!-- /POST COMMENT LIST -->
            </div>
            <!-- /TAB BOX ITEM -->
            @endif
          </div>
          <!-- /TAB BOX ITEMS -->
        </div>
        <!-- /TAB BOX -->
      </div>
      <!-- /MARKETPLACE CONTENT -->

      <!-- MARKETPLACE SIDEBAR -->
      <div class="marketplace-sidebar">
        <!-- SIDEBAR BOX -->
        <div class="sidebar-box">

          <!-- SIDEBAR BOX TITLE -->
          <p class="sidebar-box-title medium-space">Info Ujian</p>
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
                    <div class="hexagon-image-30-32" data-src="{{URL::asset('img/avatar/'.$ujian->profile_photo_path)}}"></div>
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
                    <p class="user-avatar-badge-text">{{$ujian->level}}</p>
                    <!-- /USER AVATAR BADGE TEXT -->
                  </div>
                  <!-- /USER AVATAR BADGE -->
                </div>
                <!-- /USER AVATAR -->
              </a>
              <!-- /USER STATUS AVATAR -->

              <!-- USER STATUS TITLE -->
              <p class="user-status-title"><a class="bold" >{{$ujian->nama_user}}</a></p>
              <!-- /USER STATUS TITLE -->

              <!-- USER STATUS TEXT -->
              <p class="user-status-text small">{{$ujian->nim_nip}}</p>
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
                <p class="information-line-text"><span class="bold">{{$ujian->created_at}}</span></p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->

              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Deadline</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text"><span class="bold">{{$ujian->deadline_tanggal}}</span></p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->

              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Jam</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text"><span class="bold">{{$ujian->deadline_jam}}</span></p>
                <!-- /INFORMATION LINE TEXT -->
              </div>
              <!-- /INFORMATION LINE -->
              @if(Auth::user()->hak_akses == "Mahasiswa")
                @if($jawaban)
                  @foreach($jawaban as $jwb)
                  <!-- INFORMATION LINE -->
                  <div class="information-line">
                    <!-- INFORMATION LINE TITLE -->
                    <p class="information-line-title">Status</p>
                    <!-- /INFORMATION LINE TITLE -->
                    @if($jwb->status =="Done")
                    <!-- INFORMATION LINE TEXT -->
                    <p class="information-line-text "><a class="span text-success">{{$jwb->status}}</a></p>
                    <!-- /INFORMATION LINE TEXT -->
                    @else
                    <!-- INFORMATION LINE TEXT -->
                    <p class="information-line-text "><a class="span text-danger">{{$jwb->status}}</a></p>
                    <!-- /INFORMATION LINE TEXT -->
                    @endif
                  </div>
                  <!-- /INFORMATION LINE -->
                @endforeach
                @else
                <!-- INFORMATION LINE -->
                <div class="information-line">
                  <!-- INFORMATION LINE TITLE -->
                  <p class="information-line-title">Status</p>
                  <!-- /INFORMATION LINE TITLE -->
                  @if($ujian->status =="Open")
                  <!-- INFORMATION LINE TEXT -->
                  <p class="information-line-text "><a class="span text-success">{{$ujian->status}}</a></p>
                  <!-- /INFORMATION LINE TEXT -->
                  @else
                  <!-- INFORMATION LINE TEXT -->
                  <p class="information-line-text "><a class="span text-danger">{{$ujian->status}}</a></p>
                  <!-- /INFORMATION LINE TEXT -->
                  @endif
                </div>
                <!-- /INFORMATION LINE -->
                @endif
              @elseif (Auth::user()->hak_akses = "Dosen")
              <!-- INFORMATION LINE -->
              <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Status</p>
                <!-- /INFORMATION LINE TITLE -->
                @if($ujian->status =="Open")
                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text "><a class="span text-success">{{$ujian->status}}</a></p>
                <!-- /INFORMATION LINE TEXT -->
                @else
                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text "><a class="span text-danger">{{$ujian->status}}</a></p>
                <!-- /INFORMATION LINE TEXT -->
                @endif
              </div>
              <!-- /INFORMATION LINE -->
              @endif


              @if(Auth::user()->hak_akses=="Mahasiswa")
                @if($jawaban)
                @foreach($jawaban as $jwb)
                <!-- INFORMATION LINE -->
                <div class="information-line">
                  <!-- INFORMATION LINE TITLE -->
                  <p class="information-line-title">Nilai</p>
                  <!-- /INFORMATION LINE TITLE -->

                  <!-- INFORMATION LINE TEXT -->
                  <p class="information-line-text"><a >{{$jwb->nilai_ujian}}</a></p>
                  <!-- /INFORMATION LINE TEXT -->
                </div>
                <!-- /INFORMATION LINE -->
                @endforeach
                @endif
              @endif


            </div>
            <!-- /INFORMATION LINE LIST -->
          </div>
          <!-- /SIDEBAR BOX ITEMS -->

          @if(Auth::user()->hak_akses =="Mahasiswa")
          <div class="sidebar-box-items">
                        <!-- CHECKBOX WRAP -->
                        @if($filejawaban)
                          @foreach($filejawaban as $filetugas)
                          <div class="checkbox-wrap mt-4" onclick="window.location.href='{{url('/show?file='.$filetugas->pathfile.'&kelas='.$kelas->nama_mk.$kelas->id.'&tipe=Ujian')}}'">
                            <input type="radio" id="license-regular" name="license_type" value="license-regular" checked>
                            <!-- CHECKBOX BOX -->
                            <div class="checkbox-box">
                              <!-- ICON CROSS -->
                              <svg class="icon-cross">
                                <use xlink:href="#svg-cross"></use>
                              </svg>
                              <!-- /ICON CROSS -->
                            </div>
                            <!-- /CHECKBOX BOX -->
                            <a href="{{url('/show?file='.$filetugas->pathfile.'&kelas='.$kelas->nama_mk.$kelas->id.'&tipe=Ujian')}}" target="_blank">
                              <label class="accordion-trigger-linked" for="license-regular" data="{{url('/show?file='.$filetugas->pathfile.'&kelas='.$kelas->nama_mk.$kelas->id.'&tipe=Ujian')}}" id="clickjawaban" >{{$filetugas->namafile}}</label>
                            </a>
                          </div>
                          @endforeach
                        @endif
                        @if(!$jawaban)
                        @if(!$filejawaban)
                        <div class="widget-box-content mt-3">
                          <p class="widget-box-text light" id="desc"></p>
                        </div>
                        <!-- /CHECKBOX WRAP -->
                        <!-- BUTTON -->
                        <form  action="{{url('/kelas/jawabujian')}}" enctype="multipart/form-data" method="post" id="form-save">
                          @csrf
                          <input type="hidden" name="idujian" value="{{$ujian->id}}">
                          <input type="hidden" name="idkelas" value="{{$kelas->id}}">
                          <input type="file" name="filejawaban" id="filejawaban" style="display:none" onchange="desc()">
                          <label class="button small white" for="filejawaban" >Add Item</label>
                        <!-- /BUTTON -->
                        </form>
                        @endif
                        @endif


          </div>

          <!-- SIDEBAR BOX ITEMS -->
          <div class="sidebar-box-items">
            @if($jawaban)
              @foreach($jawaban as $jawab)
                @if($filejawaban)
                  <!-- BUTTON -->
                  @foreach($filejawaban as $jwbn)
                    <p class="button white popup-review-trigger" id="btnunsubmit" onclick="hapus({{$ujian->id}},{{$jwbn->id}},{{$kelas->id}},{{$jawab->id}})">Unsubmit</p>
                  @endforeach
                  <!-- /BUTTON -->
                @else
                <p class="button white popup-review-trigger" id="btnunsubmit" onclick="hapus({{$ujian->id}},null,{{$kelas->id}},{{$jawab->id}})">Unsubmit</p>
                @endif

              @endforeach
            @else
            <!-- BUTTON -->
            <p class="button primary" id="btnsubmit">Submit</p>
            <!-- /BUTTON -->
            @endif
          </div>
          <!-- /SIDEBAR BOX ITEMS -->
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
  @if(Auth::user()->hak_akses == "Mahasiswa")
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
    <p class="popup-box-title">Unsubmit Ujian</p>
    <!-- /POPUP BOX TITLE -->


    <!-- FORM -->
    <form class="form" action="{{url('/kelas/ujian/hapusjawaban')}}" method="post">
      @csrf
      <!-- FORM ROW -->
      <div class="form-row">
        <!-- FORM ITEM -->
        <div class="form-item">
          <!-- FORM INPUT -->
          <div class="form-input small">
            <h2>Apakah anda yakin ingin mengunsubmit file ujian ini?</h2>
            <input type="hidden" name="idfile" id="idfile">
            <input type="hidden" name="idjawaban" id="idjawaban">
            <input type="hidden" name="idujian" id="idujian">
            <input type="hidden" name="idkelas" id="idkelas">
          </div>
          <!-- /FORM INPUT -->
        </div>
        <!-- /FORM ITEM -->
      </div>
      <!-- /FORM ROW -->

      <!-- POPUP BOX ACTIONS -->
      <div class="popup-box-actions full void">
        <!-- POPUP BOX ACTION -->

        <button class="popup-box-action full button bg-danger popup-review-trigger" type="submit">Unsubmit!</button>
        <!-- /POPUP BOX ACTION -->

        <!-- POPUP BOX ACTION TEXT -->
        <p class="popup-box-action-text">Unsubmit ujian akan menghapus file yang telah dikumpulkan!</p>
        <!-- /POPUP BOX ACTION TEXT -->
      </div>
      <!-- /POPUP BOX ACTIONS -->
    </form>
    <!-- /FORM -->
  </div>
  <!-- /POPUP BOX -->
  @elseif(Auth::user()->hak_akses == "Dosen")
  <!-- POPUP BOX -->
  <div class="popup-box mid popup-manage-joinkelas"  style="width:30%">
    <!-- POPUP CLOSE BUTTON -->
    <div class="popup-close-button popup-manage-joinkelas-trigger">
      <!-- POPUP CLOSE BUTTON ICON -->
      <svg class="popup-close-button-icon icon-cross">
        <use xlink:href="#svg-cross"></use>
      </svg>
      <!-- /POPUP CLOSE BUTTON ICON -->
    </div>
    <!-- /POPUP CLOSE BUTTON -->

    <!-- POPUP BOX BODY -->
    <div class="popup-box-body">

      <!-- POPUP BOX CONTENT -->
      <div class="popup-box-content w-full" style="width:100%">
        <!-- WIDGET BOX -->
        <div class="widget-box">
          <!-- WIDGET BOX TITLE -->
          <p class="widget-box-title">Review</p>
          <!-- /WIDGET BOX TITLE -->

          <!-- WIDGET BOX CONTENT -->
          <div class="widget-box-content ">
            <!-- FORM -->

              <div class="row">
              <!-- FORM ROW -->
              <div class=" col-md-12">
                <!-- FORM ITEM -->
                <div class="form-item full">
                  <!-- FORM INPUT -->
                  <div class="form-input active">
                    <label for="kodenilai">Masukkan Nilai</label>
                    <input type="text" id="kodenilai" class="is-invalid" onkeyup="berinilai()" onkeypress="validate(event)"  aria-describedby="validtext" name="nilai" >
                    <input type="hidden" name="idjawaban" id="idjawaban">
                    <input type="hidden" name="idpenjawab" id="idpenjawab">
                    <input type="hidden" name="idkelas" id="idkelas" >
                    <div class="invalid-feedback" id="validtext" >

                    </div>
                  </div>
                  <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->

              </div>
              <!-- /FORM ROW -->

              <div class="col-md-12 mt-4">
                <!-- BUTTON -->
                <button class="button secondary full popup-manage-joinkelas-trigger" id="buttonberinilai" onclick="tombolnilai()">Simpan</button>
                <!-- /BUTTON -->
              </div>
              </div>





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

  @endif
@endsection
@section('scripting')
@if(Auth::user()->hak_akses == "Dosen")
<script type="text/javascript">

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

  function tombolnilai(){
    var idjwb = document.getElementById("idjawaban").value;
    var iduser = document.getElementById("idpenjawab").value;
    var nilai = document.getElementById("kodenilai").value;
    var idkelas = document.getElementById("idkelas").value;
    var btnnilai = document.getElementById("buttonberinilai");
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var displaynilai = "nilai"+iduser;
    $.ajax({
      type :"POST",
      url : "{{url('/berinilaiujian')}}",
      data : {
        idjawaban : idjwb,
        iduser : iduser,
        idkelas : idkelas,
        nilai : nilai,
        _token : CSRF_TOKEN
      },
      success : function(response){
        console.log(response);
        btnnilai.removeAttribute('class');
        btnnilai.setAttribute('class','button bg-success full');
        btnnilai.innerHTML = "Nilai Telah diUpdate!";
        document.getElementById("kodenilai").value="";
        document.getElementById(displaynilai).innerHTML = "<span class='highlighted'>Nilai</span> "+nilai;
      }
    });

  }

  function berinilai(){
    var kodenilai = document.getElementById("kodenilai").value;
    var btnnilai = document.getElementById("buttonberinilai");
    btnnilai.disabled = "false";
    btnnilai.removeAttribute('class');
    btnnilai.setAttribute('class','button bg-danger full');
    if(kodenilai == ""){
      document.getElementById("validtext").innerHTML = "";
      btnnilai.disabled = true;
      btnnilai.innerHTML="Masukkan Nilai";
    }else {
      const nilai = parseInt(kodenilai);
      if( Number.isInteger(nilai)){
        if(kodenilai > 100 ){
          document.getElementById("validtext").innerHTML = "Angka harus diantara 0 - 100";
          btnnilai.disabled = true;
          btnnilai.innerHTML="Tombol tidak dapat diakses";
        }else {
          document.getElementById("validtext").innerHTML = "";
          btnnilai.disabled = false;
          btnnilai.innerHTML="Simpan";
          btnnilai.removeAttribute('class');
          btnnilai.setAttribute('class','button secondary full popup-manage-joinkelas-trigger');
        }
      }else {
        document.getElementById("validtext").innerHTML = "Nilai harus menggunakan angka";
        btnnilai.disabled = true;
        btnnilai.innerHTML="Tombol tidak dapat diakses";
      }
    }
  }

  function setnilai(idjawaban,idpenjawab,idkelas){
    document.getElementById("idpenjawab").value = idpenjawab;
    document.getElementById("idjawaban").value = idjawaban;
    document.getElementById("idkelas").value = idkelas;
    var btnnilai = document.getElementById("buttonberinilai");
    btnnilai.disabled = "false";
    btnnilai.removeAttribute('class');
    btnnilai.setAttribute('class','button bg-danger full');
    btnnilai.innerHTML = "Masukkan Nilai!";
  }


</script>
@elseif(Auth::user()->hak_akses == "Mahasiswa")
<script type="text/javascript" >
  var form = document.getElementById("form-save");
  document.getElementById("btnsubmit").addEventListener("click",function(){
    form.submit();
  });


  document.getElementById("clickjawaban").addEventListener("click",function(){
    var data = document.getElementById("clickjawaban").getAttribute("data");
    window.open(data,"_blank");
  });

  function hapus(id,idfile,idkelas,idjawaban){
    // var x = document.getElementById("delete").getAttribute("data");
    document.getElementById("idfile").value = idfile;
    document.getElementById("idujian").value = id;
    document.getElementById("idkelas").value = idkelas;
    document.getElementById("idjawaban").value = idjawaban;
  }

    function desc(){
      var desc = document.getElementById("desc");
      var file = document.getElementById("filejawaban");
      var isi = file.files.item(0).name;
      desc.innerHTML = isi;
    }

</script>
<!-- <script type="text/javascript">
  eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();',17,17,'||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'),0,{}));
</script> -->
@endif
@endsection
