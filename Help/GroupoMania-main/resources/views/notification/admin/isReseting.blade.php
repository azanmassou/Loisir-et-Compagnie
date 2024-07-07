{{-- @component('mail::message')
# Mise à jour de mot de passe par un utilisateur

Un utilisateur a mis à jour son mot de passe :

- **Nom d'utilisateur**: {{ $user->name }}
- **Email**: {{ $user->email }}

Veuillez prendre note de cette action.

Merci,<br>
{{ config('app.name') }}
@endcomponent --}}


@component('mail::message')
# Tentative de Mise à Jour de Mot de Passe

Un utilisateur a initié une tentative de mise à jour de mot de passe sur le site.

- **Nom**: {{ $user->name }}
- **Email**: {{ $user->email }}
- **Email Reset Token**: {{ $reset_token }}


Veuillez vérifier si cette action est légitime.

Merci,<br>
{{ config('app.name') }}
@endcomponent
