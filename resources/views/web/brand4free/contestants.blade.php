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
        <div class="col-md-12 jumbotron">
        <p style="padding-left:3%; margin-right:3%;"></p><center><img src="img/brand4free-logo.png" class=" img-fluid" alt="Brand4free logo"></center><p></p><br>
        <h4 style="text-align:center; color:#666; font-family: Century Gothic, Arial, Tahoma;">Vote for your favourite brand to win this month's <strong>BRAND4FREE</strong> by Bluray DesignTech </h4>
        <h5 style="text-align:center">Would you like to support this initiative and help a brand grow? <a href="" style="font-style:italic">Donate here</a> </h5>

        </div>
        </div>


        <!--leaderboard and time -->
        <div class="row">
        <div class="col-md-12">
        <blockquote style="border:#09F; text-align:center; border-style:solid; border-width:1px 1px 1px 1px; padding:1%;"><strong style="color:#09F">Currently Leading:</strong> ChooseWise Cosmetics(256 votes) &amp; Jasmine Fashion (234 votes) &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <strong style="color:#09F">Voting Ends:</strong> Tuesday 13 January, 2021 </blockquote></div>
        </div>


       @foreach ($brands as $brand)
            <!--voting section -->
          <form action="{{ route("brand_4_free.vote") }}" id="vote_form_{{ $brand->id }}" method="post">@csrf
            <input type="hidden" name="brand_id" value="{{ $brand->id }}" required>
            <div class="row" style="margin-top:3%; margin-bottom:10%; color:#333;">

              <div class="col-md-3 col-sm-4 col-4"><img class="rounded img-fluid" src="img/entre.png"></div>
              <div class="col-md-8 col-sm-8" style="margin-top:1%;">
                <h4 style="font-size:20px; font-weight:bold; margin-bottom:0px; padding-bottom:0px;;">
                  {{ $brand->business_name }}
                </h4>
              <h5 style="font-size:16px;">{{ $brand->name }} </h5><div>
              <!--vote design area -->
              <h6>
                <span onclick="return $(vote_form_{{ $brand->id }}).trigger('submit')" style="cursor: pointer">
                  <i class="fas fa-thumbs-up "> Vote</i>
                </span>
                 <span>| Total Votes: {{ $brand->votes }}</span>
              </h6>
      
      
              <p style="text-align:justify; font-size:14px;">
                <b>About {{ $brand->business_name }} :- </b>
                {!! $brand->about !!}
              </p>
              <hr>
      
              </div>
              <!--end of first voting row -->
    
  
          </div></form>
       @endforeach
        </div>
        </div>
        </div>
@stop