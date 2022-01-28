@component('mail::message')
# Africad Allaince

{{ $body }}

@component('mail::button', ['url' => ''])
Visit our site
@endcomponent

Thank you,<br>
Africad Alliance
@endcomponent
