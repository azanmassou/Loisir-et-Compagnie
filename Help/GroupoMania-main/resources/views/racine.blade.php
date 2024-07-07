@extends('layout')

@section('content')

<div class="container my-5">

    <div class="row my-3">
        <div class="col-lg-6 text-center my-4">
            <h1>Bienvenue chez vous <br> <span class="text-center">
                    <h1><span class="text-warning">Groupo</span> <span class="text-primary">Mania</span>
                    </h1>
                </span></h1>
            <p>
                Cliquez <a href="">ici</a> pour aller sur le site officielle
            </p>
        </div>
        <div class="col-lg-6">
            <div class="card mb-3" style="">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4QCORXhpZgAASUkqAAgAAAAFAA4BAgAhAAAASgAAAJiCAgALAAAAawAAABIBAwABAAAAAQAAABoBBQABAAAAdgAAABsBBQABAAAAfgAAAAAAAABTb2NjZXIgQmFsbCBvbiBhIHdoaXRlIGJhY2tncm91bmRsYXVjaGVuYXVlciwBAAABAAAALAEAAAEAAAD/7QB0UGhvdG9zaG9wIDMuMAA4QklNBAQAAAAAAFccAlAAC2xhdWNoZW5hdWVyHAJ4ACFTb2NjZXIgQmFsbCBvbiBhIHdoaXRlIGJhY2tncm91bmQcAnQAC2xhdWNoZW5hdWVyHAJuAAxHZXR0eSBJbWFnZXMA/+EFMWh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8APD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyI+Cgk8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgoJCTxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6SXB0YzR4bXBDb3JlPSJodHRwOi8vaXB0Yy5vcmcvc3RkL0lwdGM0eG1wQ29yZS8xLjAveG1sbnMvIiAgIHhtbG5zOkdldHR5SW1hZ2VzR0lGVD0iaHR0cDovL3htcC5nZXR0eWltYWdlcy5jb20vZ2lmdC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBsdXM9Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iICB4bWxuczppcHRjRXh0PSJodHRwOi8vaXB0Yy5vcmcvc3RkL0lwdGM0eG1wRXh0LzIwMDgtMDItMjkvIiB4bWxuczp4bXBSaWdodHM9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9yaWdodHMvIiBkYzpSaWdo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"
                            class="img-fluid rounded-start ms-5 p-4" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body text-center">
                            <h1 class="m-4"><span class="text-warning">Groupo</span> <span
                                    class="text-primary">Mania</span></h1>
                            {{-- <p class="card-text">Faite une recherche rapide</p> --}}
                            <h1></h1>
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                            {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center my-3">
        <div class="card p-3 primaire">
            <h3>ManiaTchat</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta iusto incidunt esse officiis nobis
                ducimus reprehenderit possimus saepe deserunt facilis, similique sed labore optio error sequi
                voluptas
                repellat magni! Ipsum.</p>

            <a href="{{ route('auth.login') }}" class="btn btn-primary w-25 m-auto">Demmarer</a>
        </div>
    </div>

    {{-- <div class="container text-center">
        <div class="col-lg-4">
            <div class="card">
                <h3>Creer un compte</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta iusto incidunt esse officiis nobis
                    ducimus reprehenderit possimus saepe deserunt facilis, similique sed labore optio error sequi
                    voluptas
                    repellat magni! Ipsum.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <h3>Creer un compte</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta iusto incidunt esse officiis nobis
                    ducimus reprehenderit possimus saepe deserunt facilis, similique sed labore optio error sequi
                    voluptas
                    repellat magni! Ipsum.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <h3>Creer un compte</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta iusto incidunt esse officiis nobis
                    ducimus reprehenderit possimus saepe deserunt facilis, similique sed labore optio error sequi
                    voluptas
                    repellat magni! Ipsum.</p>
            </div>
        </div>

    </div> --}}
</div>


@endsection