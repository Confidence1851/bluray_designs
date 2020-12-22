@component('mail::message')
# {{$letter['subject'] ?? ''}}


Order details:
<br>

<b>Product Name:</b> {{$letter['order']->product  ?? ''}} <br>
<b>Product Type:</b> {{$letter['order']->type  ?? ''}} <br>
<b>Product Price:</b> {{ number_format($letter['order']->price)  ?? ''}} <br>
<b>Product Quantity:</b> {{$letter['order']->quantity  ?? ''}} <br>
<b>Specifications :</b> {{$letter['order']->spec  ?? ''}} <br>
<b>Payment Reference:</b> {{$letter['order']->pay_ref  ?? ''}} <br>
<b>Order Reference:</b> {{$letter['order']->order_ref  ?? ''}} <br>
<b>Design for Me?:</b>{{$letter['order']->help_me  ?? ''}}<br>
<b>Comments:</b> {!! $letter['order']->comment ?? '' !!} <br>
<br>
Thanks,<br>
Bluray Designs
@endcomponent
