@extends('web.layout' , [
"meta_title" => "",
"meta_keywords" => "",
"meta_description" => "",
])

@section('content')

<style>

            @import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
.col-item
{
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    background: #FFF;
	font-family:Tahoma, Geneva, sans-serif;
	margin-bottom:8%;
}
.col-item .photo img
{
    margin: 0 auto;
    width: 100%;
}

.h6adjust
{ font-size:14px;
margin-top:0px;
padding-top:0px;
font-style:italic;

color:#C06;

	}

	h5
	{
		font-size:16px;
		margin-top:0px;
font-weight:bold;
padding-top:0px;
margin-bottom:0px;
color:#333;
	}

.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}

.col-item:hover .info {
    background-color: #F5F5DC;
}
.col-item .price
{
    /*width: 50%;*/
    float: left;
    margin-top: 5px;
}

.col-item .price h6
{
    line-height: 20px;
    margin: 0;
}

.price-text-color
{
    color:#C06;
}

.col-item .info .rating
{
    color: #777;
}



.col-item .separator
{
    border-top: 1px solid #E1E1E1;
}

.clear-left
{
    clear: left;
}

.col-item .separator p
{
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}

.col-item .separator p i
{
    margin-right: 5px;
}
.col-item .btn-add
{
    width: 50%;
    float: left;
}

.col-item .btn-add
{
    border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
    width: 50%;
    float: left;
    padding-left: 10px;
}
.controls
{
    margin-top: 20px;
}
[data-slide="prev"]
{
    margin-right: 10px;
}
            </style>
            <section>
            <div class="container wow fadeInUp" style="margin-left:7%">
             <div class="row">
        <div class="row" style="margin-bottom:0px; padding-top:7%;">
            <div class="span12" style=" margin-bottom:0px;">

                <h4 class="text-center" style="color:#036; font-family:Century Gothic, Tahoma, Geneva, sans-serif">
                    ---- OUR PRODUCTS ----</h4>
            </div>

        </div>
        <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <a href="#">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row products_list">


                    @foreach($products as $product)
                      @php($last_img = App\Picture::where('product_id',$product->id)->orderby('created_at','desc')->first())
                      @php($quan = App\Quantity::where('product_id',$product->id)->orderby('quantity','asc')->first())
                      @php($type = App\Type::where('product_id',$product->id)->orderby('price','asc')->first())
                      @php($low_price = (($quan->quantity * $type->price) - $quan->discount) )

                     <div class="span3">
                        <a href="{{ route('productdetail',$product->id)}}">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="{{ asset('public/product_images/'.$last_img->image) }}" class="img-responsive" alt="Order a Website Design" />
                                </div>
                                <div class="info">
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="price span6 " style="margin-bottom:0px;">
                                            <h5>{{strtoupper($product->name)}}</h5>
                                            <h6 class="price-text-color h6adjust">
                                                 from <b class="product_price" >{{$low_price}}</b> | {{$product->caption}}</h6>
                                        </div>

                                    </div>

                                    <div class="row">
                                    <div class="text-center" style="margin-top:0px; padding-top:0px;">


                                    <p style="margin-top:0px;" >



                                 <button class="btn btn-lg btn-primary" style="background-color:#0275d8" >  ORDER NOW </button>
                                  </a>
                                    </p>


                                    </div>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                       @endforeach




                    </div>
                </div>

            </div>
        </div>
    </div>
 </div>
   </section>






@stop
