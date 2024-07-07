@component('mail::message')
# Verification Reseting Password Email

{{-- Hello {{ $user->name }}, --}}

Thank you for registering password. Please click the button below to verify your email address:

@component('mail::button', ['url' => route('verify.confirm.email', ['token' => $reset_token])])
Verify Email
@endcomponent

If you did not create an account, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
