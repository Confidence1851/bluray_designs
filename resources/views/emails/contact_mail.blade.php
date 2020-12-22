@component('mail::message')
# A new contact email was sent by a user!!

<b>Name:</b> {{$letter['name']  ?? ''}} <br>
<b>Email:</b> {{$letter['email']  ?? ''}} <br>
<b>Subject:</b> {{$letter['subject'] ?? ''}} <br>
<b>Message:</b> {{$letter['message'] ?? ''}} <br>

Thanks,<br>
Bluray Designs
@endcomponent
