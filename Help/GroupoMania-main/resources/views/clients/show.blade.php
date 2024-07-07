@extends('layout')

@extends('includes.Templates.navbar')

@section('title')
    Show Client
@endsection

@section('content')
    <div class="container my-4">
        <h3>{{ $client->name }}</h3>
        <ul>
            <li><em>{{ $client->email }}</em></li>
            <li><em>{{ $client->status }}</em></li>
            <li><em>{{ $client->entreprise->name }}</em></li>
        </ul>
        <form method="post" action="{{ route('clients.show', ['client' => $client->id])}}" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer le Client</button>
            <a href="/clients/{{ $client->id }}/edit" class="btn btn-info">Modifier le Client</a>
        </form>
        
    </div>
@endsection
