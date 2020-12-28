@extends('web.layout' , ["withHeader" => false , "withFooter" => false , "withStyles" => false , "withJavascript" =>
false])
@section('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-md-7 offset-2" style="margin-top:3%;">
                <p><strong>Congratulations, {{ $brand->business_name }}!</strong> Select your print choice.</p>
                <p style="margin-bottom:0px; color:#09F;"><strong>*Please note</strong></p>
                <hr style="margin-bottom:2px; margin-top:3px;">
                <p style="font-size:14px; font-style:italic;">

                    We do not pay for delivery. Delivery within Lagos usually cost between N1000 - N2500 and N2500 - N5000
                    outside Lagos depending on distance and location

                </p>
                
                
            </div>
        </div>
       
        <form action="{{ route('brand_4_free.design_option') }}" method="post" enctype="multipart/form-data">@csrf
            <input type="hidden" value="{{ $brand->id }}" name="brand_id" required>
            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 offset-2 jumbotron" style="margin-top:1%;">
                  <div class="">
                    @include("web.fragments.flash_message")
        
                        </div>
                    <div class="form-group">
                        <label for="registered"><strong>Select Product:</strong></label>
                        <select class="form-control" placeholder="" name="selected_product" required id="registered">
                            <option disabled selected>Select one</option>
                            @foreach ($rewardProducts as $key => $reward)
                                <option value="{{ $key }}">{{ $reward }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="business"><strong>Full Business Name:</strong></label>
                        <input type="text" name="full_name" class="form-control" placeholder="e.g Fancy Smoothies" required
                            id="business" required="required" value="{{ $brand->business_name }}">
                    </div>


                    <div class="form-group">
                        <label for="Business Details"></label>
                        <textarea class="form-control" name="details"
                            placeholder="e.g phone number, email, website, list of services, company color etc"></textarea>
                    </div>



                    <div class="form-group">
                        <label for="upload"><strong>Do you have a design already? Upload let's print for you (pdf, corel
                                draw
                                &amp; .jpg only)</strong></label>
                        <input type="file" class="form-control-file" name="design" id="upload">

                    </div>
                    <button type="submit" class="btn btn-primary form-control" data-toggle="modal"
                        data-target="#myModal">Submit</button>
                </div>
            </div>
        </form>
    </div>

@stop
