<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- bootstrap 4.3.1 -->
  <link rel="stylesheet" href="{{URL::asset('css/vendor/bootstrap.min.css')}}">
  <!-- styles -->
  <link rel="stylesheet" href="{{URL::asset('css/styles.min.css')}}">
  <!-- favicon -->
  <link rel="icon" href="{{URL::asset('img/favicon.ico')}}">
  <title>FunLearning ITK</title>
</head>
<body>

  <!-- LANDING -->
  <div class="landing">
    <!-- LANDING DECORATION -->
    <div class="landing-decoration"></div>
    <!-- /LANDING DECORATION -->

    <!-- LANDING INFO -->
    <div class="landing-info">
      <!-- LOGO -->
      <div class="logo">
        <!-- ICON LOGO VIKINGER -->
        <div class="icon-logo-vikinger">
        <img src="{{URL::asset('/img/funlearninglogo.png')}}" style="width:50px" alt="">
      </div>
        <!-- /ICON LOGO VIKINGER -->
      </div>
      <!-- /LOGO -->

      <!-- LANDING INFO PRETITLE -->
      <h2 class="landing-info-pretitle">Welcome to</h2>
      <!-- /LANDING INFO PRETITLE -->

      <!-- LANDING INFO TITLE -->
      <h1 class="landing-info-title">FunLearning</h1>
      <!-- /LANDING INFO TITLE -->

      <!-- LANDING INFO TEXT -->
      <p class="landing-info-text">Elearning Media Pembelajaran baru yang lebih asik dan seru. Yuk Cobain FunLearning ITK</p>
      <!-- /LANDING INFO TEXT -->

      <!-- TAB SWITCH -->
      <div class="tab-switch">
        <!-- TAB SWITCH BUTTON -->
        <p class="tab-switch-button login-register-form-trigger">Login</p>
        <!-- /TAB SWITCH BUTTON -->

        <!-- TAB SWITCH BUTTON -->
        <p class="tab-switch-button login-register-form-trigger">Register</p>
        <!-- /TAB SWITCH BUTTON -->
      </div>
      <!-- /TAB SWITCH -->
    </div>
    <!-- /LANDING INFO -->

    <!-- LANDING FORM -->
    <div class="landing-form">
      <!-- FORM BOX -->
      <div class="form-box login-register-form-element">
        <!-- FORM BOX DECORATION -->
        <img class="form-box-decoration overflowing" src="{{URL::asset('img/landing/rocket.png')}}" alt="rocket">
        <!-- /FORM BOX DECORATION -->

        <!-- FORM BOX TITLE -->
        <h2 class="form-box-title">Account Login</h2>
        <!-- /FORM BOX TITLE -->


        <!-- FORM -->
        <form class="form" method="post" action="{{url('/log')}}">
          @csrf
          @if(session('sukses'))
          <div class="form-row">
            <div class="form-item">
              <div class="alert alert-danger">
                {{session('sukses')}}
              </div>
            </div>
          </div>
          @endif
          <!-- FORM ROW -->
          <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- FORM INPUT -->
              <div class="form-input">
                <label for="login-username">Username or Email</label>
                <input type="text" id="login-username" name="email">
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
              <div class="form-input">
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="password">
              </div>
              <!-- /FORM INPUT -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->
          @if (session('status'))
          <div class="alert alert-danger mt-4">
              {{ session('status') }}
          </div>
          @endif

          <!-- FORM ROW -->
          <div class="form-row space-between">
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- CHECKBOX WRAP -->
              <div class="checkbox-wrap">
                <input type="checkbox" id="login-remember" name="remember" checked>
                <!-- CHECKBOX BOX -->
                <div class="checkbox-box">
                  <!-- ICON CROSS -->
                  <svg class="icon-cross">
                    <use xlink:href="#svg-cross"></use>
                  </svg>
                  <!-- /ICON CROSS -->
                </div>
                <!-- /CHECKBOX BOX -->
                <label for="login-remember">Remember Me</label>
              </div>
              <!-- /CHECKBOX WRAP -->
            </div>
            <!-- /FORM ITEM -->

            <!-- FORM ITEM -->

          </div>
          <!-- /FORM ROW -->

          <!-- FORM ROW -->
          <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- BUTTON -->
              <button class="button medium secondary" type="submit">Login to your Account!</button>
              <!-- /BUTTON -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->
        </form>
        <!-- /FORM -->


      </div>
      <!-- /FORM BOX -->

      <!-- FORM BOX -->
      <div class="form-box login-register-form-element">
        <!-- FORM BOX DECORATION -->
        <img class="form-box-decoration" src="{{URL::asset('img/landing/rocket.png')}}" alt="rocket">
        <!-- /FORM BOX DECORATION -->

        <!-- FORM BOX TITLE -->
        <h2 class="form-box-title mb--4">Register Here!</h2>
        <!-- /FORM BOX TITLE -->
        <!-- FORM -->
        <form class="form" method="POST" action="{{ route('register') }}" id="form-regis">
          @csrf
          <!-- FORM ROW -->
          <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- FORM INPUT -->
              <div class="form-input">
                <label for="nim_nip">NIM/NIP</label>
                <input type="text" id="nim_nip" name="nim_nip" onkeypress="validate(event)" required>
                <p class="text-danger" id="invalidnim_nip"></p>
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
              <div class="form-input">
                <label for="nama_user">Nama</label>
                <input type="text" id="nama_user" name="nama_user" required>
                <p class="text-danger" id="invalidnama_user"></p>
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
              <div class="form-select">
                <label for="account-recovery-question-2">Daftar Sebagai</label>
                <select id="account-recovery-question-2" name="hak_akses">
                  <option value="Mahasiswa">Mahasiswa</option>
                  <option value="Dosen">Dosen</option>
                </select>

                <svg class="form-select-icon icon-small-arrow">
                  <use xlink:href="#svg-small-arrow"></use>
                </svg>

              </div>
              <!-- <div class="form-input">
                <label for="hak_akses">Hak Akses</label>
                <input type="text" id="hak_akses" name="hak_akses" required>
              </div> -->
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
              <div class="form-input">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
                <p class="text-danger" id="invalidemail"></p>
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
              <div class="form-input">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required onkeyup="minchar()">
                <p class="text-danger" id="invalidpassword"></p>
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
              <div class="form-input">
                <label for="password_confirmation">Repeat Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required onkeyup="valid()">
                <p class="text-danger" id="invalidpassword_confirmation"></p>
              </div>
              <!-- /FORM INPUT -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->


          <!-- FORM ROW -->
          <div class="form-row mt-4">
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- BUTTON -->
              <button class="button medium primary" onclick="regis()" type="button">Register Now!</button>
              <!-- /BUTTON -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->
        </form>
        <!-- /FORM -->

      </div>
      <!-- /FORM BOX -->
    </div>
    <!-- /LANDING FORM -->
  </div>
  <!-- /LANDING -->

<!-- app -->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/utils/app.js')}}"></script>
<!-- XM_Plugins -->
<script src="{{URL::asset('js/vendor/xm_plugins.min.js')}}"></script>
<!-- form.utils -->
<script src="{{URL::asset('js/form/form.utils.js')}}"></script>
<!-- landing.tabs -->
<script src="{{URL::asset('js/landing/landing.tabs.js')}}"></script>
<!-- SVG icons -->
<script src="{{URL::asset('js/utils/svg-loader.js')}}"></script>
<script type="text/javascript">

function regis(){
  var nim = document.getElementById('nim_nip').value;
  var email = document.getElementById('email').value;
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  if(nim ==""){
    document.getElementById("invalidnim_nip").innerHTML = "Nim Harus diisi";
  }else {
    $.ajax({
      type:'POST',
      url: "{{url('/cekregis')}}",
      data: {
        _token : CSRF_TOKEN,
        nim : nim,
        email :email
      },success:function(response){
        document.getElementById("invalidnim_nip").innerHTML = "";
        if(response == "Allow"){
          $.ajax({
            type:'POST',
            url: "{{url('/cekemail')}}",
            data: {
              _token : CSRF_TOKEN,
              email :email
            },success:function(response){
              if(response == "Allow"){
                document.getElementById("invalidemail").innerHTML = "";
                document.getElementById("form-regis").submit();
              }else {
                document.getElementById("invalidemail").innerHTML = response;
              }
            }
          });
        }else {
          document.getElementById("invalidnim_nip").innerHTML = response;
        }
      }
    });
  }

}

function minchar(){
  var password = document.getElementById('password').value;
  if(password.length < 8){
    document.getElementById("invalidpassword").removeAttribute("class");
    document.getElementById("invalidpassword").setAttribute("class","text-danger");
    document.getElementById("invalidpassword").innerHTML = "Password minimal 8 karakter!";
  }else {
    document.getElementById("invalidpassword").removeAttribute("class");
    document.getElementById("invalidpassword").setAttribute("class","text-danger");
    document.getElementById("invalidpassword").innerHTML = "";
  }
}

function valid(){
  var password = document.getElementById('password').value;
  var password_confirmation = document.getElementById('password_confirmation').value;
  if(password_confirmation != password){
    document.getElementById("invalidpassword_confirmation").removeAttribute("class");
    document.getElementById("invalidpassword_confirmation").setAttribute("class","text-danger");
    document.getElementById("invalidpassword_confirmation").innerHTML = "Password tidak sama!";
  }else {
    document.getElementById("invalidpassword_confirmation").removeAttribute("class");
    document.getElementById("invalidpassword_confirmation").setAttribute("class","text-success");
    document.getElementById("invalidpassword_confirmation").innerHTML = "Password sama!";
  }
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
</body>
</html>
