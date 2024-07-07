@component('mail::message')
# Verification Register Email

Hello {{ $user->name }},

Thank you for registering. Please click the button below to verify your email address:

@component('mail::button', ['url' => route('verify.email', ['token' => $user->email_verified_token])])
Verify Email
@endcomponent

If you did not create an account, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
