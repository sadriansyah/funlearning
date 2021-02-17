@extends('layouts.app')
@section('title','Settings | FunLearning')

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


          <!-- PROFILE HEADER -->
          @include('page.settinssidebar')
          <!-- /PROFILE HEADER -->


        </div>
        <!-- /SIDEBAR MENU -->

      </div>
      <!-- /SIDEBAR BOX -->
    </div>
    <!-- /GRID COLUMN -->

    <!-- GRID COLUMN -->
    <div class="account-hub-content">
      <!-- SECTION HEADER -->

        <!-- SECTION -->
        <section class="section">
          <!-- SECTION HEADER -->
          <div class="section-header">
            <!-- SECTION HEADER INFO -->
            <div class="section-header-info">
              @if(session('sukses'))
              <!-- SECTION PRETITLE -->
              <p class="section-pretitle">{{session('sukses')}}</p>
              <!-- /SECTION PRETITLE -->
              @endif

              <!-- SECTION TITLE -->
              <h2 class="section-title">Cover <span class="highlighted">Kelas</span></h2>
              <!-- /SECTION TITLE -->
            </div>
            <!-- /SECTION HEADER INFO -->

            <!-- SECTION HEADER ACTIONS -->
            <div class="section-header-actions">
              <!-- SECTION HEADER ACTION -->

              <p class="section-header-action " >Set Cover</p>
              <!-- /SECTION HEADER ACTION -->

            </div>
            <!-- /SECTION HEADER ACTIONS -->

          </div>
          <!-- /SECTION HEADER -->

          <!-- GRID -->
          <div class="grid grid-2-2-2-2-2-2 centered">
            <!-- PHOTO PREVIEW -->
            <div class="photo-preview small ">
              <!-- PHOTO PREVIEW IMAGE -->
              <figure class="photo-preview-image liquid">
                <img src="{{URL::asset('img/cover/01.jpg')}}" alt="photo-preview-01">
              </figure>
              <!-- /PHOTO PREVIEW IMAGE -->
              <!-- PHOTO PREVIEW INFO -->
              <div class="photo-preview-info">
                <!-- REACTION COUNT LIST -->

                <form  action="{{url('/kelas/settings/setcover/')}}" method="post">
                  @csrf
                  <input type="hidden" name="cover" value="01.jpg">
                  <input type="hidden" name="id" value="{{$kelas->id}}">
                  <button type="submit" class="button bg-warning" >Set As Cover</button>
                </form>


              </div>
              <!-- /PHOTO PREVIEW INFO -->
            </div>
            <!-- /PHOTO PREVIEW -->
            <!-- PHOTO PREVIEW -->
            <div class="photo-preview small ">
              <!-- PHOTO PREVIEW IMAGE -->
              <figure class="photo-preview-image liquid">
                <img src="{{URL::asset('img/cover/02.jpg')}}" alt="photo-preview-01">
              </figure>
              <!-- /PHOTO PREVIEW IMAGE -->

              <!-- PHOTO PREVIEW INFO -->
              <div class="photo-preview-info">
                <!-- REACTION COUNT LIST -->
                <form  action="{{url('/kelas/settings/setcover/')}}" method="post">
                  @csrf
                  <input type="hidden" name="cover" value="02.jpg">
                  <input type="hidden" name="id" value="{{$kelas->id}}">
                <button type="submit" class="button bg-warning" >Set As Cover</button>
              </form>

              </div>
              <!-- /PHOTO PREVIEW INFO -->
            </div>
            <!-- /PHOTO PREVIEW -->
            <!-- PHOTO PREVIEW -->
            <div class="photo-preview small ">
              <!-- PHOTO PREVIEW IMAGE -->
              <figure class="photo-preview-image liquid">
                <img src="{{URL::asset('img/cover/03.jpg')}}" alt="photo-preview-01">
              </figure>
              <!-- /PHOTO PREVIEW IMAGE -->

              <!-- PHOTO PREVIEW INFO -->
              <div class="photo-preview-info">
                <!-- REACTION COUNT LIST -->
                <form  action="{{url('/kelas/settings/setcover/')}}" method="post">
                  @csrf
                  <input type="hidden" name="cover" value="03.jpg">
                  <input type="hidden" name="id" value="{{$kelas->id}}">
                <button type="submit" class="button bg-warning" >Set As Cover</button>
              </form>

              </div>
              <!-- /PHOTO PREVIEW INFO -->
            </div>
            <!-- /PHOTO PREVIEW -->
            <!-- PHOTO PREVIEW -->
            <div class="photo-preview small ">
              <!-- PHOTO PREVIEW IMAGE -->
              <figure class="photo-preview-image liquid">
                <img src="{{URL::asset('img/cover/04.jpg')}}" alt="photo-preview-01">
              </figure>
              <!-- /PHOTO PREVIEW IMAGE -->

              <!-- PHOTO PREVIEW INFO -->
              <div class="photo-preview-info">
                <!-- REACTION COUNT LIST -->
                <form  action="{{url('/kelas/settings/setcover/')}}" method="post">
                  @csrf
                  <input type="hidden" name="cover" value="04.jpg">
                  <input type="hidden" name="id" value="{{$kelas->id}}">
                <button type="submit" class="button bg-warning" >Set As Cover</button>
              </form>

              </div>
              <!-- /PHOTO PREVIEW INFO -->
            </div>
            <!-- /PHOTO PREVIEW -->
            <!-- PHOTO PREVIEW -->
            <div class="photo-preview small ">
              <!-- PHOTO PREVIEW IMAGE -->
              <figure class="photo-preview-image liquid">
                <img src="{{URL::asset('img/cover/05.jpg')}}" alt="photo-preview-01">
              </figure>
              <!-- /PHOTO PREVIEW IMAGE -->

              <!-- PHOTO PREVIEW INFO -->
              <div class="photo-preview-info">
                <!-- REACTION COUNT LIST -->
                <form  action="{{url('/kelas/settings/setcover/')}}" method="post">
                  @csrf
                  <input type="hidden" name="cover" value="05.jpg">
                  <input type="hidden" name="id" value="{{$kelas->id}}">
                <button type="submit" class="button bg-warning" >Set As Cover</button>
              </form>

              </div>
              <!-- /PHOTO PREVIEW INFO -->
            </div>
            <!-- /PHOTO PREVIEW -->
            <!-- PHOTO PREVIEW -->
            <div class="photo-preview small ">
              <!-- PHOTO PREVIEW IMAGE -->
              <figure class="photo-preview-image liquid">
                <img src="{{URL::asset('img/cover/08.jpg')}}" alt="photo-preview-01">
              </figure>
              <!-- /PHOTO PREVIEW IMAGE -->

              <!-- PHOTO PREVIEW INFO -->
              <div class="photo-preview-info">
                <!-- REACTION COUNT LIST -->
                <form  action="{{url('/kelas/settings/setcover/')}}" method="post">
                  @csrf
                  <input type="hidden" name="cover" value="08.jpg">
                  <input type="hidden" name="id" value="{{$kelas->id}}">
                <button type="submit" class="button bg-warning" >Set As Cover</button>
              </form>

              </div>
              <!-- /PHOTO PREVIEW INFO -->
            </div>
            <!-- /PHOTO PREVIEW -->
            <!-- PHOTO PREVIEW -->
            <div class="photo-preview small ">
              <!-- PHOTO PREVIEW IMAGE -->
              <figure class="photo-preview-image liquid">
                <img src="{{URL::asset('img/cover/09.jpg')}}" alt="photo-preview-01">
              </figure>
              <!-- /PHOTO PREVIEW IMAGE -->

              <!-- PHOTO PREVIEW INFO -->
              <div class="photo-preview-info">
                <!-- REACTION COUNT LIST -->
                <form  action="{{url('/kelas/settings/setcover/')}}" method="post">
                  @csrf
                  <input type="hidden" name="cover" value="09.jpg">
                  <input type="hidden" name="id" value="{{$kelas->id}}">
                <button type="submit" class="button bg-warning" >Set As Cover</button>
              </form>

              </div>
              <!-- /PHOTO PREVIEW INFO -->
            </div>
            <!-- /PHOTO PREVIEW -->
            <!-- PHOTO PREVIEW -->
            <div class="photo-preview small ">
              <!-- PHOTO PREVIEW IMAGE -->
              <figure class="photo-preview-image liquid">
                <img src="{{URL::asset('img/cover/21.jpg')}}" alt="photo-preview-01">
              </figure>
              <!-- /PHOTO PREVIEW IMAGE -->

              <!-- PHOTO PREVIEW INFO -->
              <div class="photo-preview-info">
                <!-- REACTION COUNT LIST -->
                <form  action="{{url('/kelas/settings/setcover/')}}" method="post">
                  @csrf
                  <input type="hidden" name="cover" value="21.jpg">
                  <input type="hidden" name="id" value="{{$kelas->id}}">
                <button type="submit" class="button bg-warning" >Set As Cover</button>
              </form>

              </div>
              <!-- /PHOTO PREVIEW INFO -->
            </div>
            <!-- /PHOTO PREVIEW -->
            <!-- PHOTO PREVIEW -->
            <div class="photo-preview small ">
              <!-- PHOTO PREVIEW IMAGE -->
              <figure class="photo-preview-image liquid">
                <img src="{{URL::asset('img/cover/29.jpg')}}" alt="photo-preview-01">
              </figure>
              <!-- /PHOTO PREVIEW IMAGE -->

              <!-- PHOTO PREVIEW INFO -->
              <div class="photo-preview-info">
                <!-- REACTION COUNT LIST -->
                <form  action="{{url('/kelas/settings/setcover/')}}" method="post">
                  @csrf
                  <input type="hidden" name="cover" value="29.jpg">
                  <input type="hidden" name="id" value="{{$kelas->id}}">
                <button type="submit" class="button bg-warning" >Set As Cover</button>
              </form>

              </div>
              <!-- /PHOTO PREVIEW INFO -->
            </div>
            <!-- /PHOTO PREVIEW -->

            <label class="upload-box" for="cover">
              <!-- UPLOAD BOX ICON -->
              <svg class="upload-box-icon icon-photos">
                <use xlink:href="#svg-photos"></use>
              </svg>
              <!-- /UPLOAD BOX ICON -->

              <!-- UPLOAD BOX TITLE -->
              <p class="upload-box-title">Upload Your Own Cover</p>
              <!-- /UPLOAD BOX TITLE -->

              <!-- UPLOAD BOX TEXT -->
              <p class="upload-box-text">1184x300px size minimum</p>
              <!-- /UPLOAD BOX TEXT -->
            </label>
            <!-- /UPLOAD BOX -->
            <!-- UPLOAD BOX -->
            <form id="formcover"  action="{{url('/setowncover')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="file" name="cover" id="cover" onchange="isidanklik()" accept="image/*" style="display:none">
              <input type="hidden" name="id" value="{{$kelas->id}}">

            </form>

          </div>
          <!-- /GRID -->
        </section>
        <!-- /SECTION -->





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
  function isidanklik(){
    document.getElementById('formcover').submit();
  }
</script>
@endsection
