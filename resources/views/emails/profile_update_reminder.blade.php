<x-mail::message>
# Hello {{ $user->name }},

It has been a while since you updated your alumni profile.  
Please take a moment to review and update your information.

<x-mail::button :url="route('user.profile.edit')">
Update Profile
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
