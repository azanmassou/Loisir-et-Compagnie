@extends('layout')

@extends('includes.Templates.navbar')

@section('title')
    Edite Client
@endsection

@section('content')
    <div class="container my-4">
        <h3>Modifier le profil de {{ $client->name }}</h3>
        <form action="{{ route('clients.update', ['client' => $client->id])}}" method="post">
            @method('PATCH')
            @include('includes.form')
            <button type="submit" class="btn btn-warning">Mettre a jour le Client</button>
        </form>
    </div>
@endsection
