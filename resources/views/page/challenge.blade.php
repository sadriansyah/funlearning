@extends('layouts.app')
@section('title','Challenge  | FunLearning')

@section('content')
<div class="content-grid">
  <!-- SECTION BANNER -->
  <div class="section-banner">
    <!-- SECTION BANNER ICON -->
    <img class="section-banner-icon" src="{{URL::asset('img/banner/quests-icon.png')}}" alt="challenge-icon">
    <!-- /SECTION BANNER ICON -->

    <!-- SECTION BANNER TITLE -->
    <p class="section-banner-title">Challenge</p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">Selesaikan challenge dan raih poin sebanyak-banyaknya!</p>
    <!-- /SECTION BANNER TEXT -->
  </div>
  <!-- /SECTION BANNER -->

  <!-- SECTION HEADER -->
  <div class="section-header">
    <!-- SECTION HEADER INFO -->
    <div class="section-header-info">
      <!-- SECTION PRETITLE -->
      <p class="section-pretitle">Funlearning!</p>
      <!-- /SECTION PRETITLE -->

      <!-- SECTION TITLE -->
      <h2 class="section-title">Featured Challenge</h2>
      <!-- /SECTION TITLE -->
    </div>
    <!-- /SECTION HEADER INFO -->
  </div>
  <!-- /SECTION HEADER -->

  <!-- SECTION FILTERS BAR -->
  <div class="section-filters-bar v2">
    <!-- FORM -->
    <form class="form" action="{{url('/challenge')}}" method="get">
      <!-- FORM ITEM -->
      <div class="form-item split medium">
        <!-- FORM SELECT -->
        <div class="form-select">
          <label for="quest-filter-show">Show</label>
          <select id="quest-filter-show" name="show">
            <option value="All">All Challenge</option>
            <option value="Completed">Completed Challenge</option>
            <option value="Open">Open Challenge</option>
          </select>
          <!-- FORM SELECT ICON -->
          <svg class="form-select-icon icon-small-arrow">
            <use xlink:href="#svg-small-arrow"></use>
          </svg>
          <!-- /FORM SELECT ICON -->
        </div>
        <!-- /FORM SELECT -->


        <!-- FORM SELECT -->
        <div class="form-select">
          <label for="quest-filter-order">Order By</label>
          <select id="quest-filter-order" name="orderby">
            <option value="DESC">Descending</option>
            <option value="ASC">Ascending</option>
          </select>
          <!-- FORM SELECT ICON -->
          <svg class="form-select-icon icon-small-arrow">
            <use xlink:href="#svg-small-arrow"></use>
          </svg>
          <!-- /FORM SELECT ICON -->
        </div>
        <!-- /FORM SELECT -->

        <!-- BUTTON -->
        <button class="button secondary">Filter Challenge</button>
        <!-- /BUTTON -->
      </div>
      <!-- /FORM ITEM -->
    </form>
    <!-- /FORM -->
  </div>
  <!-- /SECTION FILTERS BAR -->

  <!-- GRID -->
  <div class="grid grid-3-3-3-3 centered">
    @foreach($challenges as $challenge)
    <!-- QUEST ITEM -->
    <div class="quest-item">
      <!-- QUEST ITEM COVER -->
      <figure class="quest-item-cover liquid">
        <?php
          $chcover = array("01.png","02.png","03.png","04.png");
          $cvr = $chcover[array_rand($chcover)];
        ?>
        <img src="{{URL::asset('img/quest/cover/'.$cvr)}}" alt="cover-01">
      </figure>
      <!-- /QUEST ITEM COVER -->

      <!-- TEXT STICKER -->
      <p class="text-sticker small-text">
        <!-- TEXT STICKER ICON -->
        <svg class="text-sticker-icon icon-plus-small">
          <use xlink:href="#svg-plus-small"></use>
        </svg>
        <!-- TEXT STICKER ICON -->
        {{$challenge->poin_challenge}} EXP
      </p>
      <!-- /TEXT STICKER -->

      <!-- QUEST ITEM INFO -->
      <div class="quest-item-info">
        @if($challenge->status =="Open")
        <!-- QUEST ITEM BADGE -->
        <div class="quest-item-badge">
          <img src="{{URL::asset('img/quest/completedq-b.png')}}" alt="completedq-b">
        </div>
        <!-- /QUEST ITEM BADGE -->
        @else
        <!-- QUEST ITEM BADGE -->
        <div class="quest-item-badge">
          <img src="{{URL::asset('img/quest/openq-b.png')}}" alt="openq-b">
        </div>
        <!-- /QUEST ITEM BADGE -->
        @endif

        <!-- QUEST ITEM TITLE -->
        <p class="quest-item-title">{{$challenge->judul_challenge}}</p>
        <!-- /QUEST ITEM TITLE -->

        <!-- QUEST ITEM TEXT -->
        <p class="quest-item-text" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{!! $challenge->deskripsi_challenge !!}</p>
        <!-- /QUEST ITEM TEXT -->

        <!-- PROGRESS STAT -->
        <div class="progress-stat">
          <!-- BAR PROGRESS WRAP -->
          <div class="bar-progress-wrap small">
            <!-- BAR PROGRESS INFO -->
            <p class="bar-progress-info negative start">Kelas : &nbsp  {{$challenge->nama_mk}}</p>
            <!-- /BAR PROGRESS INFO -->
            <!-- BAR PROGRESS INFO -->
            <p class="bar-progress-info negative start">Status : &nbsp<span class="@if($challenge->status == 'Coming Soon') text-warning @elseif($challenge->status =='Open') text-success @elseif($challenge->status=='Close') text-danger @endif">{{$challenge->status}}  </span>  </p>
            <!-- /BAR PROGRESS INFO -->
          </div>
          <!-- /BAR PROGRESS WRAP -->
        </div>
        <!-- /PROGRESS STAT -->

        <!-- QUEST ITEM META -->
        <div class="quest-item-meta">
          <!-- POST OPTION -->
          <a class="post-option" href="{{url('/kelas/challenge/'.$challenge->idkelas.'/info/'.$challenge->id)}}">
            <!-- POST OPTION ICON -->
            <svg class="post-option-icon icon-comment">
              <use xlink:href="#svg-comment"></use>
            </svg>
            <!-- /POST OPTION ICON -->

            <!-- POST OPTION TEXT -->
            <p class="post-option-text"  >Lihat Detail</p>
            <!-- /POST OPTION TEXT -->
          </a>
          <!-- /POST OPTION -->
        </div>
        <!-- /QUEST ITEM META -->
      </div>
      <!-- /QUEST ITEM INFO -->
    </div>
    <!-- /QUEST ITEM -->
    @endforeach

  </div>
  <!-- /GRID -->


</div>

@endsection

@section('scripting')
<script type="text/javascript">

  function btnload(memberid,kelasid){

  };
</script>
@endsection
