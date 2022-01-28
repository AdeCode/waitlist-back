@component('mail::message')
# Welcome to Africad Alliance

Dear {{$email}},

We look forward to communicating more with you. For more information visit our blog.

@component('mail::button', ['url' => 'enter your desired url'])
African Alliance world
@endcomponent

Thanks,<br>
@endcompone