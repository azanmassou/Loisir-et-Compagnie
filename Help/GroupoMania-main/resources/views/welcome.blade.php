@extends('adminer.dashboard.layouts')

@section('title')
    Welcome
@endsection

@section('content')
    <div class="wrapper">
        <section class="sign-in-page">
            <div id="container-inside">
                <div id="circle-small"></div>
                <div id="circle-medium"></div>
                <div id="circle-large"></div>
                <div id="circle-xlarge"></div>
                <div id="circle-xxlarge"></div>
            </div>
            <div class="container p-0">
                <div class="row no-gutters">
                    @include('auth.partials.slider')
                    <div class="col-md-6 bg-white pt-5 pt-5 pb-lg-0 pb-5">
                        <div class="sign-in-from">
                            {{-- <img height="40px" src="{{ asset('Logos/1653474647318_icon-left-font.png') }}" width="80" alt=""> --}}
                            <h1 class="mt-3 mb-0">@include('logo')</h1>
                            {{-- <p>Content de te revoir ... Allez Rejoins tes amis ...</p> --}}
                            
                            <p>Bienvenue sur [Nom du Site] !
                                Bienvenue sur [Nom du Site] ! Nous sommes ravis de vous accueillir dans notre communauté
                                dynamique où vous pourrez vous connecter, partager et interagir avec d'autres utilisateurs
                                du monde entier.

                                Chez [Nom du Site], nous valorisons la diversité, la créativité et l'échange d'idées. Que
                                vous soyez ici pour découvrir de nouveaux amis, partager vos passions ou simplement
                                explorer, vous êtes au bon endroit.

                                Sur notre plateforme, vous trouverez une multitude de fonctionnalités pour enrichir votre
                                expérience :
                                Rejoignez-nous dès aujourd'hui et faites partie d'une communauté vibrante et engageante !
                            </p>
                            <div class="d-inline-block w-100 ">
                                <a href="{{ route('auth.login') }}" class="btn btn-primary mt-3">Demmarer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
