@extends('web.layout' , ["withHeader" => true , "withFooter" => true])
{{-- @section('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@endsection --}}
@section('content')

    <div class="container" style="padding-top:5%;">
        <!--welcome to bluraydesign brand4free initiative -->
        @include("web.fragments.flash_message")
        @include("web.brand4free.fragments.donate_modal")
        <div class="row">
            <div class="span12">
                <p style="padding-left:3%; margin-right:3%;"></p>
                <center><img src="{{ my_asset('web/img/brand4free_logo.png') }}" class=" img-fluid" alt="Brand4free logo">
                </center>
                <p></p><br>
                @if ($voteStatus == 'inactive')
                    <h4>Voting is currently inactive</h4>
                @else
                    <h4 style="text-align:center; color:#666; font-family: Century Gothic, Arial, Tahoma;">Vote for your
                        favourite brand to win this month's <strong>BRAND4FREE</strong> by Bluray DesignTech </h4>
                    <h5 style="text-align:center; margin-top:1px;">Would you like to support this initiative and help a
                        brand grow?
                        <a href="#" data-toggle="modal" data-target="#brand4free_donate" style="font-style:italic">Donate
                            here</a>
                    </h5>
                @endif
            </div>
        </div>

        @if ($voteStatus != 'inactive')

            @if ($voteStatus == 'active')

                <!--leaderboard and time -->
                <div class="row">
                    <div class="span12" style="margin-top:0px; padding-top:0px;">
                        <blockquote
                            style="border:#09F; text-align:center; border-style:solid; border-width:1px 1px 1px 1px; padding:1%;">
                            <strong style="color:#09F">Currently Leading:</strong>
                            @php
                            $key = 0;
                            @endphp
                            @foreach ($topVoted as $brand)
                                @if ($key > 0)
                                    &amp;
                                @endif
                                {{ $brand->business_name }} ({{ $brand->votes }} votes)
                                @php
                                $key +=1;
                                @endphp
                            @endforeach
                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <strong style="color:#09F">Voting Ends:</strong>
                            {{ $voteEndDate ?? '' }}
                        </blockquote>
                    </div>
                </div>


                @foreach ($brands as $brand)
                    <!--voting section -->
                    <form action="{{ route('brand_4_free.vote') }}" id="vote_form_{{ $brand->id }}" method="post">@csrf
                        <input type="hidden" name="brand_id" value="{{ $brand->id }}" required>
                        <div class="row" style="margin-top:3%; margin-bottom:10%; color:#333;">

                            <div class="span3"><img style="background-repeat: no-repeat;" src="{{ $brand->getImage() }}" />
                            </div>
                            <div class="span8" style="margin-top:1%;">
                                <h4 style="font-size:20px; font-weight:bold; margin-bottom:0px; padding-bottom:0px;;">
                                    {{ $brand->business_name }}
                                </h4>
                                <h5 style="font-size:16px;">{{ $brand->name }} </h5>
                                <div>
                                    <!--vote design area -->
                                    <h6>
                                        @if (!in_array($brand->id, $votedBrands))
                                            <span onclick="return $(vote_form_{{ $brand->id }}).trigger('submit')"
                                                style="cursor: pointer">
                                                <button class="btn btn-large btn-warning" type="button"><i
                                                        class="icon-chevron-up"> Vote </i> </button>
                                            </span>
                                        @else
                                            <button class="btn btn-large btn-success" type="button"><i class="icon-ok-sign">
                                                    Voted</i></button>
                                        @endif
                                        <span> Total Votes: <b> {{ $brand->votes }}</b></span>
                                    </h6>


                                    <p style="text-align:justify; font-size:14px;">
                                        <b>About {{ $brand->business_name }} :- </b>
                                        {!! $brand->about !!}
                                    </p>
                                    <hr>

                                </div>
                                <!--end of first voting row -->


                            </div>
                        </div>
                    </form>
                @endforeach

            @elseif($voteStatus == "ended")
                <!--leaderboard and time -->
                <div class="row">
                    <div class="span12" style="margin-top:0px; padding-top:0px;">
                        <blockquote
                            style="border:#09F; text-align:center; border-style:solid; border-width:1px 1px 1px 1px; padding:1%;">
                            <strong style="color:#09F">Last Contest Winners:</strong>
                            @php
                            $key = 0;
                            @endphp
                            @foreach ($topVoted as $brand)
                                @if ($key > 0)
                                    &amp;
                                @endif
                                {{ $brand->business_name }} ({{ $brand->votes }} votes)
                                @php
                                $key +=1;
                                @endphp
                            @endforeach
                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <strong style="color:#09F">Voting Ended on:</strong>
                            {{ $voteEndDate ?? '' }}
                        </blockquote>
                    </div>
                </div>

            @endif
        @endif

    </div>
@stop
