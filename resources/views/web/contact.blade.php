@extends('web.layout' , [
"meta_title" => "",
"meta_keywords" => "",
"meta_description" => "",
])

@section('content')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="span4">
                    <div class="inner-heading">
                        <h2>Get in touch</h2>
                    </div>
                </div>
                <div class="span8">
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>







    <section id="maincontent">
        <div class="container" style="margin-top:5%;">
            <div class="row">
                <div class="span4">
                    <p><label>Phone:</label></p>
                    <p>+234 (0)903 010 6794</p>
                    <hr>

                    <p><label>Office Address:</label></p>
                    <p>Shop 1, Elemoro Shopping Complex, Bola Ahmed Tinubu Road, Bogije, Ibeju-Lekki, Lagos, Nigeria</p>
                    <hr>

                    <p><label>Email:</label></p>
                    <p>info@bluraydesigns.com<br>bluraydesigns@gmail.com</p>
                    <hr>

                    <p><label>Social Media handles:</label></p>
                    <p> <b>Facebook:</b> Bluray DesignTech</p>
                    <p><b>Instagram:</b>@bluraydesigns</p>

                </div>


                <div class="span8">
                    <div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m22!1m8!1m3!1d3964.352875037219!2d3.7560132147704666!3d6.476911645314549!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d6.4766905999999995!2d3.7583238999999997!4m5!1s0x10395545f992b099%3A0x98377979c6f14fea!2sbluraydesigns%20tech!3m2!1d6.477161199999999!2d3.7582818!5e0!3m2!1sen!2sng!4v1599590004668!5m2!1sen!2sng"
                            width="800" height="420" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>



                </div>
            </div>
        </div>
    </section>

























    <section id="content">

        <div class="container">
            <div class="row">
                <div class="span12">
                    <h4>Get in touch with us by filling <strong>contact form below</strong></h4>
                    @if (Session::has('status'))
                        <div class="text-center mt-5 mb-5">Your message has been sent. Thank you!</div>
                    @else
                        <form action="{{ route('contactMsg') }}" method="post" role="form" class="">@csrf

                            <div class="row">
                                <div class="span4 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                        required data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validation"></div>
                                </div>
                                <div class="span4 form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required data-rule="email"
                                        data-msg="Please enter a valid email" />
                                    <div class="validation"></div>
                                </div>
                                <div class="span4 form-group">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject" required data-rule="minlen:4"
                                        data-msg="Please enter at least 8 chars of subject" />
                                    <div class="validation"></div>
                                </div>
                                <div class="span12 margintop10 form-group">
                                    <textarea class="form-control" name="message" rows="12" data-rule="required" required
                                        data-msg="Please write something for us" placeholder="Message"></textarea>
                                    <div class="validation"></div>
                                    <p class="text-center">
                                        <button class="btn btn-large btn-theme margintop10" type="submit">Submit
                                            message</button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
@stop
