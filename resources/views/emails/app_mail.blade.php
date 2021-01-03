@component('mail::message')
# {{ $mail["title"] ?? '' }}
<br>
@if (!empty($name = $mail["name"] ?? ''))
Hello {{ $name  }},
@endif
{!! $mail["message"] !!}
<br>
Thanks,<br>
Bluray Designs
@endcomponent
