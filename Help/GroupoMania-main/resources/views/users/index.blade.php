@extends('layout')

@section('title')
    La liste des Utilisateurs
@endsection

@section('content')

    @extends('inc/templates/liste')

@section('card-title')
<div class="input-group input-group-sm" style="width: 150px;">
    <input type="text" name="table_search" class="form-control float-left"
            placeholder="Search">
        <div class="input-group-append">
            <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
            </button>
        </div>
    {{-- <a href="@yield('route')" class="btn btn-primary">Ajouter un @yield('btn-title')</a> --}}
</div>
@endsection

@section('btn-title')
    Utilisateur
@endsection

@section('route')
    {{ route('users.create') }}
@endsection

@section('links')
    {{ $users->links() }}
@endsection

@section('foreach')
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->psuedo }}</td>
            <td class="text-end"><a class="badge bg-warning p-2"
                    href=" {{ route('users.show', ['user' => $user->id]) }}">Details</a></td>
        </tr>
    @endforeach
@endsection

@endsection
