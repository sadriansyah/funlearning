@foreach($membercek as $m)
@if($m->id_kelas == $kelas->id)
  @if($m->nim_nip_user == Auth::user()->nim_nip)
  <!-- USER PREVIEW ACTIONS -->
  <div class="user-preview-actions">

    <!-- BUTTON -->
    <p class="button primary">Lihat Kelas</p>
    <!-- /BUTTON -->
  </div>
  <!-- /USER PREVIEW ACTIONS -->
    @else
    <!-- USER PREVIEW ACTIONS -->
    <div class="user-preview-actions">
      <!-- BUTTON -->
      <p class="button secondary full popup-manage-joinkelas-trigger">
        <!-- BUTTON ICON -->
        <svg class="button-icon icon-join-group">
          <use xlink:href="#svg-join-group"></use>
        </svg>
        <!-- /BUTTON ICON -->
        Join Kelas!
      </p>
      <!-- /BUTTON -->
    </div>
    <!-- /USER PREVIEW ACTIONS -->

    @endif
  @endif
@endforeach
