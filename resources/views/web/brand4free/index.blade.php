@extends('web.layout' , ["withHeader" => true , "withFooter" => true])
{{-- @section('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@endsection --}}
@section('content')
    <div class="container" style="padding-top:3%;">
        <!--welcome to bluraydesign brand4free initiative -->
        <div class="row">
            <div class="col-md-12">
                <p style="padding-left:3%; margin-bottom:4%; padding-right:3%;"></p>
                <center><img src="{{ my_asset("web/img/brand4free_logo.png") }}" class=" img-fluid" alt="Brand4free logo"></center>
                <p></p>
                <h2 style="text-align:center; color:#666; font-family: Century Gothic, Arial, Tahoma; font-size:24px;">
                    WELCOME TO BLURAY DESIGNTECH'S<br> <span style="font-size:40px; color:#036;"> <b><i>BRAND4FREE</i></b>
                        INITIATIVE</span></h2>
            </div>
        </div>


        <!--picture and intro section -->
        <div class="row" style="margin-top:5%; margin-bottom:10%; color:#666;:">

            <div class="col-md-6 col-sm-6 col-lg-6">
                <img class="img-fluid" alt="The Entreprenuer" src="{{ my_asset("web/img/brand.png") }}">
            </div>




            <div class="clearfix"></div>
            <div class="col-md-5 col-sm-5 col-lg-5" style="text-align:justify">
                <hr>
                <p>As a corporate branding agency, we are passionate about helping businesses; particularly SMEs grow their
                    brands through print/digital branding services.
                </p>
                <p>
                    Each month, we give two (2) SMEs with highest votes accumulated after a 3 day voting period free
                    Designs/Prints to help brand and grow their business. Ten(10) slots are opened on the first day of each
                    month, participants' application are screened and the top ten enters the voting poll.
                </p>
                <p></p>

                <p>Will you like to participate? create an account and login to get started...</p>

                <p>
                    <a href="{{ route('brand_4_free.get_started') }}" class="btn btn-primary"> Get Started</a>
                    <a href="{{ route('brand_4_free.contestants') }}" class="btn btn-success"> View Contestants</a>
                </p>
            </div>


        </div>
    </div>


@stop
