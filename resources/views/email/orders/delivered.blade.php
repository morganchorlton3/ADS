@component('mail::message')
<h3>Hi, {{ $user->first_name }} </h3>

Great news your order has now been delivered, thanks again for your order and we hope to see you again soon.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
