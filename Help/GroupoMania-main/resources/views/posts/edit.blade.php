@extends('layout')

@extends('includes.Templates.navbar')

@section('title')
   Modifier une Salle
@endsection

@section('content')
    <div class="container my-4">
        <h3>Modifier le profil de {{ $salle->Typename }}</h3>
        <form action="{{ route('salles.update', ['salle' => $salle->id])}}" method="post">
            @method('PATCH')
            @include('includes.forms.salle_ins')
            <button type="submit" class="btn btn-warning">Mettre a jour la Salle</button>
        </form>
    </div>
@endsection
