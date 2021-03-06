@extends('web.layout' , ["withHeader" => true , "withFooter" => true , "withStyles" => true , "withJavascript" =>
true,
"meta_title" => "",
"meta_keywords" => "",
"meta_description" => ""
])
{{-- @section('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@endsection --}}
@section('content')
    <div class="container" style="padding-top:5%;">
        <!--welcome to bluraydesign brand4free initiative -->
        @include("web.fragments.flash_message")


        @if (session('application_success'))
            <div class="row">
                <div class="span12">
                    <center>
                        <p style="padding-left:3%; margin-right:3%;"></p>
                        <center><img src="{{ my_asset('web/img/brand4free_logo.png') }}" class=" img-responsive"
                                alt="Brand4free logo"></center>
                        <p></p>
                        <h2 style="text-align:center; color:#666; font-family: Century Gothic, Arial, Tahoma;">
                            APPLICATION SUBMITTED SUCCESSFULLY!</h2>
                    </center>

                </div>
            </div>
            <div class="text-center">
                You'll get a response from us within the next four(4) days. Make sure to check your
                email spam if you did not receive any mail from us in your inbox. <a href="{{ route('index') }}">
                    <span>Go to homepage</span>
                </a>
            </div>

        @else
            <div class="row">
                <div class="span12">
                    <center>
                        <p style="padding-left:3%; margin-right:3%;"></p>
                        <center><img src="{{ my_asset('web/img/brand4free_logo.png') }}" class=" img-responsive"
                                alt="Brand4free logo"></center>
                        <p></p>
                        <h2 style="text-align:center; color:#666; font-family: Century Gothic, Arial, Tahoma;">SUBMIT YOUR
                            APPLICATION</h2>
                    </center>

                </div>
            </div>
            <!--picture and intro section -->
            <div class="row" style="margin-top:3%; margin-bottom:5%; color:#333;">

                <div class="span5 jumbotron" style="font-size:16px; padding:2%; margin-right:0%; text-align:justify; ">
                    <p><b>IMPORTANT NOTES:</b></p>

                    <ul>
                        <li>Your business must operate within Nigeria</li><br>
                        <li>Businesses that centers on multi-level marketing, betting/gambling, cryptocurrencies, sex
                            related
                            products/services and any other business deemed as illegal/morally inappropriate are not
                            considered.
                        </li><br>

                        <li>There are four(4) options selected applicants can choose from;
                            <ol>
                                <li>Design/print of 100 copies of flyers</li>
                                <li>Design/print of 100 copies of Business Cards</li>
                                <li>Design/print of 100 copies of Product Stickers</li>
                                <li>Design/print of one 3x5ft Flex Banner </li>
                            </ol>

                            <b>You are allowed to choose one.</b>
                        </li>
                        <br>
                        <li>Contest spans 3 days and the two highest votes wins</li>
                    </ul>

                </div>





                <div class="span6 push-right"
                    style="text-align:justify; padding:1%; margin-left:3%; border:#CCC; border-style:solid; border-width:1px 1px 1px 1px; border-bottom-left-radius:10px; border-bottom-right-radius:10px; border-top-left-radius:10px; border-top-right-radius:10px;">
                    <style></style>

                    @if($canApply)
                    <form method="post" action="{{ route('brand_4_free.get_started') }}" class="was-validated"
                        enctype="multipart/form-data">@csrf
                        <div class="form-group">
                            <label for="email"><strong>Full Name:</strong></label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Full Name" id="username"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="business"><strong>Business Name:</strong></label>
                            <input type="text" name="business_name" class="form-control" placeholder="e.g Fancy Smoothies"
                                id="business" required>
                        </div>

                        <div class="form-group">
                            <label for="email"><strong>Email Address</strong></label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email address"
                                id="email" required>
                        </div>

                        <div class="form-group">
                            <label for="address"><strong>Business Address:</strong></label>
                            <input type="text" name="business_address" class="form-control" placeholder="Enter Address"
                                id="address" required>
                        </div>

                        <div class="form-group">
                            <label for="registered"><strong>Is your Business registered?:</strong></label>
                            <select class="form-control" name="isRegistered" id="registered">
                                <option disabled selected>Select option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tellus"><strong>Tell us about your business</strong></label>
                            <textarea class="form-control" rows="3" id="tellus" name="about" minlength="300" maxlength="700"
                                required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="offer"><strong>How can this offer help grow your business?</strong></label>
                            <textarea class="form-control" rows="3" id="offer" name="summary" minlength="150"
                                maxlength="400" required></textarea>
                        </div>


                        <div class="form-group">
                            <label for="upload"><strong>Upload your company logo/product image:</strong></label>
                            <input type="file" class="form-control-file" name="image" id="upload" required>
                        </div>





                        <button type="submit" class="btn btn-primary form-control">Submit</button>

                        <!--modal section -->
                        <!-- The Modal -->


                    </form>
                    @else
                    <div class="text-center">
                        <p><b>Application is currently closed</b></p>
                        <p>Application for Brand4free is open from 1st to 15th of each month. Kindly check back within these dates.</p>
                    </div>
                    @endif

                </div>


            </div>
        @endif

    </div>


@stop
@section('script')
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script> --}}
    {{-- @if (session('application_success'))
        <script>
            $(document).ready(function() {
                $("#myModal").modal('show');
            });

        </script>
    @endif --}}
@endsection
