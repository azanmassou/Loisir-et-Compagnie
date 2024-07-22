@extends('layout')

@section('titles')
    Home
@endsection

@section('title')
    Index - @yield('titles') | Loisir et Compagnie
@endsection

@section('links')
    {{ $salles->links() }}
@endsection

@section('contents')
  

{{-- <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Loisir et Compagnie</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Spectacles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Salles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Réservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header> --}}

<main>
    <!-- Section Calendrier des Spectacles -->
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4">Offrez vous le Meilleur</h2>
            <div class="row">
                @foreach ($salles as $salle)
                {{-- @dd($spectacle->representations[0]->DateRepresentation) --}}
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQocTg5fLxyX4BbTnMt0zUT-fCok7F-IYlDwA&s" class="card-img-top" alt="{{ $salle->TypeSalle }}">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $salle->TypeSalle }}</h5>
                                {{-- <p class="card-text text-center">Date: {{$spectacle->representations[0]->DateRepresentation}}</p> --}}
                                {{-- {{ $representation->date->format('d M Y H:i') }} --}}
                                <div class="d-flex justify-content-center text-center">
                                    {{-- <a href="{{route('salles.show',['salle' => $salle->id])}}" class="btn btn-outline-primary me-2">Voir plus</a> --}}
                                    <a href="{{route('new.reservation',['salle' => $salle->id])}}" class="btn btn-outline-primary">Réserver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach        
            </div>
            @include('includes.paginate')
        </div>
    </section>


    <!-- Section Calendrier des Spectacles -->
    {{-- <section class="py-5">
        <div class="container">
            <h2 class="mb-4">Calendrier des Spectacles</h2>
            <div class="row">
                @foreach ($spectacles as $spectacle)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQocTg5fLxyX4BbTnMt0zUT-fCok7F-IYlDwA&s" class="card-img-top" alt="{{ $spectacle->NomSpectacle }}">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $spectacle->NomSpectacle }}</h5>
                                <p class="card-text text-center">Date: {{$spectacle->representations[0]->DateRepresentation}}</p>
                                {{ $representation->date->format('d M Y H:i') }}
                                <div class="d-flex justify-content-center">
                                    <a href="{{route('spectacles.show',['spectacle' => $spectacle->id])}}" class="btn btn-outline-primary me-2">Voir plus</a>
                                    <a href="#" class="btn btn-outline-secondary">Réserver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach        
            </div>
            @include('includes.paginate')
        </div>
    </section> --}}

    <!-- Section Promotions et Offres Spéciales -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="mb-4">Promotions et Offres Spéciales</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Promotion 1</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="btn btn-primary">Détails</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Offre Spéciale 1</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="btn btn-primary">Détails</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

{{-- @php
    $representation = Representation::find($representationId);
$tickets = $representation->tickets;

foreach ($tickets as $ticket) {
    echo "Type de ticket : {$ticket->type}, Prix : {$ticket->price}, Quantité vendue : {$ticket->pivot->quantity_sold}<br>";
}

@endphp --}}


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