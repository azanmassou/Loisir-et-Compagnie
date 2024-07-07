@if (session()->has('success'))
<div class="row">
    <div class="alert alert-solid alert-success d-flex align-items-center" role="alert">
       <svg class="bi flex-shrink-0 me-2" width="24" height="24">
           <use xlink:href="#exclamation-triangle-fill"></use>
       </svg>
       <div>
        {{ session()->get('success') }}
       </div>
   </div>
 </div>
@endif
@if (session()->has('error'))
<div class="row">
    <div class="alert alert-solid alert-danger d-flex align-items-center" role="alert">
       <svg class="bi flex-shrink-0 me-2" width="24" height="24">
           <use xlink:href="#exclamation-triangle-fill"></use>
       </svg>
       <div>
        {{ session()->get('error') }}
       </div>
   </div>
 </div>
@endif
