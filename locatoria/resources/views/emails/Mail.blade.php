@component('mail::message')

What's up {{$user['name']}}

@component('mail::panel')
We are glad you signed up to our service. please if you have any questions contact us.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent