@component('mail::message')
# {{ $mail["title"] }}
<br>
Hello {{ $mail["name"] }},
{!! $mail["message"] !!}
<br>
Thanks,<br>
Bluray Designs
@endcomponent
