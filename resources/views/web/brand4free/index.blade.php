@extends('web.layout' , ["withHeader" => true , "withFooter" => true])
{{-- @section('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@endsection --}}
@section('content')
    <div class="container" style="padding-top:3%;">
        <!--welcome to bluraydesign brand4free initiative -->
        <div class="row">
            <div class="span12">
                <p style="padding-left:3%; margin-bottom:4%; padding-right:3%;"></p>
                <center></center>
                <p></p>
                <h2 class="hidden-phone" style="text-align:center; color:#666; font-family: Century Gothic, Arial, Tahoma; font-size:35px; padding-top:1%;">
                    Welcome to Bluray DesignTech's<br> <span style="font-size:60px; color:#036;"> <b><i>BRAND4FREE</i></b>
                        INITIATIVE</span></h2>
                        
                        
                        <div class="visible-phone" style="margin-top:10%;">
                            <p style=" font-size:18px; margin-bottom:0px; text-align:center; font-weight:bold; font-family: Futura, Tahoma;"> Welcome to Bluray DesignTech's </p>
                            <h4 style=" color:#036; padding-top:0px;"> <b><i>BRAND4FREE</i></b> INITIATIVE</h4>
                        </div>
            </div>
        </div>


        <!--picture and intro section -->
        <div class="row" style="margin-top:5%; margin-bottom:10%; color:#666;:">

            <div class="span6 pull-left">
                <img class="img-control" alt="The Entreprenuer" src="{{ my_asset("web/img/brand.png") }}">
            </div>




           
            <div class="span5" style="text-align:justify">
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
                    @if (auth()->check())
                        <a href="{{ route('brand_4_free.get_started') }}" class="btn btn-primary"> Get Started</a>
                    @else
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#mySignin">Sign In</a>
                    @endif
                    <a href="{{ route('brand_4_free.contestants') }}" class="btn btn-success"> View Contestants</a>
                </p>
            </div>


        </div>
    </div>


@stop
