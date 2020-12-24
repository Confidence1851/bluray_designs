@extends('web.layout' , ["withHeader" => false , "withFooter" => false])
@section('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
crossorigin="anonymous">
@endsection
@section('content')
<div class="container" style="padding-top:5%;">
    <!--welcome to bluraydesign brand4free initiative -->
    <div class="row">
    <div class="col-md-12">
    <p style="padding-left:3%; margin-right:3%;"></p><center><img src="img/brand4free-logo.png" class=" img-fluid" alt="Brand4free logo"></center><p></p>
    <h2 style="text-align:center; color:#666; font-family: Century Gothic, Arial, Tahoma;">SUBMIT YOUR APPLICATION</h2>

    </div>
    </div>


    <!--picture and intro section -->
    <div class="row" style="margin-top:3%; margin-bottom:10%; color:#333;">

    <div class="col-md-5 col-sm-10 jumbotron  col-lg-5" style="font-size:16px; padding:2%; margin-right:2%; text-align:justify; ">
    <p><b>IMPORTANT NOTES:</b></p>

    <ul>
    <li>Your business must operate within Nigeria</li><br>
    <li>Businesses that centers on multi-level marketing, betting/gambling, cryptocurrencies, sex related products/services and any other business deemed as illegal/morally inappropriate are not considered. </li><br>

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





    <div class="col-md-6 col-sm-12 col-lg-6 push-right" style="text-align:justify; padding:1%; margin-left:3%; border:#CCC; border-style:solid; border-width:1px 1px 1px 1px; border-bottom-left-radius:10px; border-bottom-right-radius:10px; border-top-left-radius:10px; border-top-right-radius:10px;">
    <style></style>

    <form action="/action_page.php" class="was-validated">
      <div class="form-group">
        <label for="email"><strong>* Full Name:</strong></label>
        <input type="text" class="form-control" placeholder="Enter Full Name" id="username" required="required">
      </div>
      <div class="form-group">
        <label for="business"><strong>Business Name:</strong></label>
        <input type="text" class="form-control" placeholder="e.g Fancy Smoothies" id="business" required="required">
      </div>

      <div class="form-group">
        <label for="email"><strong>Email Address</strong></label>
        <input type="email" class="form-control" placeholder="Enter email address" id="email" required="required">
      </div>

        <div class="form-group">
        <label for="address"><strong>Business Address:</strong></label>
        <input type="text" class="form-control" placeholder="Enter Address" id="address" required="required">
      </div>

        <div class="form-group">
        <label for="registered"><strong>Is your Business registered?:</strong></label>
        <select class="form-control" placeholder="" id="registered">
        <option>Yes</option>
        <option>No</option>
        </select>
      </div>

      <div class="form-group">
      <label for="tellus"><strong>Tell us about your business</strong></label>
      <textarea class="form-control" rows="3" id="tellus" minlength="300" maxlength="700" required="required"></textarea>
      </div>

      <div class="form-group">
      <label for="offer"><strong>How can this offer help grow your business?</strong></label>
      <textarea class="form-control" rows="3" id="offer" minlength="150" maxlength="400" required="required"></textarea>
      </div>


        <div class="form-group">
        <label for="upload"><strong>Upload your company logo/product image:</strong></label>
        <input type="file" class="form-control-file" id="upload">
      </div>





      <button type="submit" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModal">Submit</button>

      <!--modal section -->

      <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title" style="text-align:left;">Congratulations! Application submitted successfully.</h5>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body" style="text-align:left">
           You'll get a response from us within the next four(4) days. Make sure to check your email spam if you did not receive any mail from us in your inbox. <a href="https://bluraydesigns.com/"><p>Go to homepage</p></a>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>




    </form>

    </div>


    </div>
    </div>


@stop