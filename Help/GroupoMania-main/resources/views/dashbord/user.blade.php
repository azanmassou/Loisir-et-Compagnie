

@section('card-title')
    <form action="" method="get">
        {{-- @csrf --}}
        <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="title" class="form-control float-left @error('title') is-invalid @enderror"
                placeholder="Search" value="{{ $requestSearch ?? '' }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                </button>
                <div id="title" class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
            </div>
            {{-- <a href="@yield('route')" class="btn btn-primary">Ajouter un @yield('btn-title')</a> --}}
        </div>

    </form>
@endsection

@section('btn-title')
    User
@endsection

@section('route')
    {{ route('users.create') }}
@endsection

@section('links')
    @if ($isValidSearch)
    @else
        {{ $users->links() }}
    @endif
@endsection

@section('foreach')
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td class="text-end"><a class="badge bg-warning p-2"
                    href=" {{ route('users.show', ['user' => $user->id]) }}">Details</a></td>
        </tr>
    @endforeach
@endsection


@section('first-title')
    Psuedo
@endsection
@section('second-title')
    Email
@endsection


@section('contents')
    @include('inc.templates.liste')
@endsection




@section('contents-title')
    <h2>Liste de tout les Utilisateurs</h2>
@endsection

@extends('layout')

@section('content')

@section('dataEmpty')
    @if ($users->isEmpty())
        @include('components.empty')
    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    @yield('contents')
                </div>

            </div>

        </div>
    @endif
@endsection

    @include('dashbord')
@endsection
