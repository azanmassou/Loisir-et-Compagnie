@extends('layout')

@section('titles')
    Home
@endsection

@section('title')
    Index - @yield('titles') | Loisir et Compagnie
@endsection

@section('links')
    {{ $spectacles->links() }}
@endsection

@section('contents')
  


<div class="row">

    @foreach ($spectacles as $spectacle)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQocTg5fLxyX4BbTnMt0zUT-fCok7F-IYlDwA&s" class="card-img-top" alt="{{ $spectacle->NomSpectacle }}">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $spectacle->NomSpectacle }}</h5>
                    {{-- <p class="card-text text-center">{{ $spectacle->representations }}</p> --}}
                    {{-- @dd($spectacles) --}}
                    <div class="d-flex justify-content-center">
                        <a href="{{route('spectacles.show',['spectacle' => $spectacle->id])}}" class="btn btn-outline-primary me-2">Voir plus</a>
                        <a href="#" class="btn btn-outline-secondary">Réserver</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>

{{-- @php
    $representation = Representation::find($representationId);
$tickets = $representation->tickets;

foreach ($tickets as $ticket) {
    echo "Type de ticket : {$ticket->type}, Prix : {$ticket->price}, Quantité vendue : {$ticket->pivot->quantity_sold}<br>";
}

@endphp --}}


@include('includes.paginate')

@endsection

@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            {{-- @include('includes/sidebar') --}}

            <!-- Layout container -->
            <div class="layout-page">

                @include('includes/navbar')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">


                        @yield('contents')

                    </div>
                    <!-- / Content -->

                    @include('includes/footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
@endsection