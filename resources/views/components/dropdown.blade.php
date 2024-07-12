{{-- <div class="demo-inline-spacing text-end">
    <div class="btn-group" id="dropdown-icon-demo">
        <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
        <ul class="dropdown-menu" style="">
            {{ $slot }}
        </ul>
    </div>
</div> --}}

 <!-- Button triggers for the first modal -->
 <div class="dropdown">
    <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="bx bx-dots-vertical-rounded"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
        {{ $slot }}
    </div>
</div>