@extends('layout')

@extends('includes.Templates.navbar')

@section('title')
    Create Client
@endsection

@section('content')
    <div class="container my-4">
        <h3>Nouveau Client</h3>
        <form action="{{ route('clients.index') }}" method="post">
            @include('includes.form')
            <button type="submit" class="btn btn-primary">Ajouter le Client</button>
        </form>
    </div>
@endsection
