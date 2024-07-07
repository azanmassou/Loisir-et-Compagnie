@component('mail::message')
# Nouvelle Inscription

Un nouvel utilisateur s'est inscrit sur le site.

- **Nom**: {{ $user->name }}
- **Email**: {{ $user->email }}

@component('mail::button', ['url' => route('users.show', $user->id)])
Voir le profil de l'utilisateur
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
