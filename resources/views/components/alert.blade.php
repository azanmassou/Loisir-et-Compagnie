<div @class([
    'bs-toast toast toast-placement-ex m-2 fade bg-{{ $type }} top-0 end-0',
    'show' => $sessionStatus,
]) role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold">{{ $title }}</div>
        <small id="current-time"></small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">{{ $slot }}</div>
</div>

<style>
  /* Style Css pour le Toast ... Animation 7s */
  .toast.show {
      opacity: 1;
      transition: opacity 2s ease-in-out;
      animation: fadeOut 1s forwards;
      animation-delay: 7s;
  }

  @keyframes fadeOut {
      to {
          opacity: 0;
      }
  }
</style>


{{-- @component('components.alert', ['type' => 'success','show' => true, 'title' => 'Operation Succesful','slot' => 'L\'operation s\'est deroule avec success'])
    This is a success alert.
@endcomponent --}}

{{-- @component('components.alert', ['type' => 'danger'])
    This is a danger alert.
@endcomponent --}}

