@extends('web.layout')

@section('content')
    <section id="featured">
      <!-- start slider -->
      <!-- Slider -->
      <div id="nivo-slider">
        <div class="nivo-slider">
          <!-- Slide #1 image -->
          <img src="{{ $web_source }}/img/slides/nivo/bg-1.jpg" alt="" title="#caption-1" />
          <!-- Slide #2 image -->
          <img src="{{ $web_source }}/img/slides/nivo/bg-2.jpg" alt="" title="#caption-2" />
          <!-- Slide #3 image -->
          <img src="{{ $web_source }}/img/slides/nivo/bg-3.jpg" alt="" title="#caption-3" />
        </div>
        <div class="container">
          <div class="row">
            <div class="span12">
              <!-- Slide #1 caption -->
              <div class="nivo-caption" id="caption-1">
                <div>
                  <h2><i>we print</i> <strong> EVERYTHING!</strong></h2>
                  <p>
                   From flyers to Business Cards, Letterheads, Company Profile, Roll-up Banners, Logos, Product Packaging, Vehicle Branding and more... everything needed to make your brand grow!
                  </p>
                  <a href="#" class="btn btn-theme">Read More</a>
                </div>
              </div>
              <!-- Slide #2 caption -->
              <div class="nivo-caption" id="caption-2">
                <div>
                  <h2>Fully <strong>responsive</strong></h2>
                  <p>
                    From Paper bags to Jotters, Branded T-Shirts, Pen, Caps, Keyholders etc we brand your gift items with perfect finishing touches
                  </p>
                  <a href="#" class="btn btn-theme">Read More</a>
                </div>
              </div>
              <!-- Slide #3 caption -->
              <div class="nivo-caption" id="caption-3">
                <div>
                  <h2>Very <strong>customizable</strong></h2>
                  <p>
                    Lorem ipsum dolor sit amet nsectetuer nec Vivamus. Curabitu laoreet amet eget. Viurab oremd ellentesque ameteget. Lorem ipsum dolor sit amet nsectetuer nec vivamus.
                  </p>
                  <a href="#" class="btn btn-theme">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end slider -->
    </section>
    
    <section class="hidden-phone">
    <div class="container-fluid" style="margin-top:3px; margin-right:10px;">
    <div class="row">


<div class="btn-group btn-group-toggle" data-toggle="buttons" style="padding-right:0px; margin-left:10px;">
  <a href="#"><label class="btn btn-secondary">
   <span class="icon-briefcase icon-circled"></span> Starter Package
  </label></a>
  
   <label class="btn btn-secondary">
  <span class=" icon-laptop icon-circled"></span> Website Design
  </label>
  
  <label class="btn btn-secondary">
  <span class=" icon-print icon-circled"></span> Call Cards
  </label>
  
  <label class="btn btn-secondary">
    <span class=" icon-file icon-circled"></span> Flyers|Handbills
  </label>
  
  <label class="btn btn-secondary">
     <span class=" icon-bar-chart icon-circled"></span>Banners|Rollups
  </label>
  
  <label class="btn btn-secondary">
     <span class=" icon-ambulance icon-circled"></span>Vehicle Branding
  </label>
  
  <label class="btn btn-secondary">
     <span class=" icon-gift icon-circled"></span> Gift Items
  </label>
  
  <label class="btn btn-secondary">
  <span class=" icon-lightbulb icon-circled"></span> Logo Design
  </label>
  
 
  
</div>

    </div>
    </div>
    </section>
    
   
   
   
   <!--testing product slider -->
   
    
            
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
                    <<< FEATURED PRODUCTS >>></h4>
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
                
                <div class="row text-center"><a href="{{ route('all_products') }}" class="btn btn-primary btn-large">View all Products</a></div>
            </div>
        </div>
    </div>
 </div>
   </section>
   
   
   
   
   
   
    
    <section class="" style="margin-top:2%;"  >
      <div class="container" style="padding-bottom:2%; padding-top:1px; margin-top:0px;">
        <div class="row">
       
          <div class="span8 offset2 wow fadeInUp">
            <div class="big-cta">
              <div class="cta-text">
              
                <h6 class="text" style="margin-bottom:0px; text-align:center; font-size:20px; color:#333; font-family:Tahoma, Geneva, sans-serif; font-weight:bold;">WE ARE THE BRANDING PARTNER <br>OF OVER 80 CORPORATE BUSINESSES IN NIGERIA!</h6>
                
               <h5 style="margin:0px; font-weight:lighter; padding:0px; text-align:center; font-size:16px;"> If you are not <span class="text-success" style="font-weight:bold" >BRANDED</span> you get <span class="text-warning" style="font-weight:bold;">STRANDED.</span> Our aim is to help your business grow and gain visibility both offline and online <i><a href="#">Lets get started!</a></i>
             
                </h5>
              </div>
              
            </div>
          </div>
          
          

    
        
        <div class="facts-img">
          <img src="{{ $web_source }}/img/facts-img.png') }}" alt="" class="img-fluid">
        </div>

      </div>
          
          
        </div>
      </div>
    </section>
    <section id="content" style="background-image:url({{ $web_source }}/img/bodybg/website-background.jpg);"  >
      <div class="container wow fadeInUpBig" style="margin-top:0%;">
        <div class="row" >
        <div class=" span8 offset2" ><H6 style="font-family:'Century Gothic', Arial, Helvetica, sans-serif; margin:0PX; padding-bottom:0px; text-align:center;">OUR COMPLETE </h6>
        <H1 style="font-family:Tahoma, Geneva, sans-serif; margin:0px; padding-top:0px; font-weight:bold; text-align:center; color:#C06; line-height:100%;">BRANDING SOLUTIONS</H1>
        
        
        
        
        </div>
          <div class="span12" style="margin-top:0px;"><hr style="margin-top:0px;">
            <div class="row">
              <div class="span4">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <i class="icon-briefcase icon-circled icon-64 active" style="background-color:#036"></i>
                  </div>
                  <div class="text">
                    <h6 style="margin-bottom:0px; font-family:Tahoma, Geneva, sans-serif
                    ; font-weight:bold; font-size:18px; color:#036;">DESIGNS & PRINTS</h6>
                    <p style="margin-top:0px; text-align:center;">
                      We offer amazing branding services that stands you out, our designs and prints are of utmost quality and
                      <br><a href="#">Learn more</a>
                    </p>
                    
                  </div>
                  
                </div>
              </div>
             
              <div class="span4">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <i class="icon-desktop icon-circled icon-64" style="background-color:#036"></i>
                  </div>
                  <div class="text">
                    <h6 style="margin-bottom:0px; font-family:Tahoma, Geneva, sans-serif
                    ; font-weight:bold; font-size:18px; color:#036;">Web Design & Hosting</h6>
                    <p>
                      We build dynamic and responsive corporate websites that are virtually appealling with detailed built-in features
                    </p>
                    <a href="#">Learn more</a>
                  </div>
                </div>
              </div>
              <div class="span4">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <i class="icon-bell icon-circled icon-64 active" style="background-color:#036"></i>
                  </div>
                  <div class="text">
                    <h6 style="margin-bottom:0px; font-family:Tahoma, Geneva, sans-serif
                    ; font-weight:bold; font-size:18px; color:#036;">SOCIAL MEDIA MANAGEMENT</h6>
                    <p>
                      The bigger your audience, the bigger your customer base. We help you manage your audience online while you face focus on your core services
                    </p>
                    <a href="#">Learn more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- divider -->
        <div class="row">
          <div class="span12" >
          
          </div>
          
          
          <div class="span12" style="margin:0px; padding:0px;">
          <div class="span6 wow fadeInLeftBig" style="background-color:#EBE9E6; padding:2%;">
        
          <p style="font-family:'Century Gothic','Times New Roman', Times, serif; font-size:30px; padding-top:4%; margin-bottom:0px; font-style:italic;  padding-bottom:3px; color:#c06;">What Makes<p>
          <p style="font-family:Tahoma, Geneva, sans-serif; color:#c06; font-weight:bold; margin-top:0px; font-size: 35px; line-height:100%;"><span style="color:#036;">BLURAYDESIGNS</span> UNIQUE</p>
          
         <hr style="padding-bottom:0px; padding-top:1px;">
      
          <p style="color:#000; text-align:justify">At Bluraydesigns, we create designs that are virtually communicative and engaging either for prints and web. We make 
          thorough research about the Industry terms and keywords, what’s trending etc about the business we are delivering a project for coupled with our professional 
          experience to create designs that are mind blowing and virtually appealing to the target audience. We deploy the latest design technology and applications
          for our design project and our design professionals are constantly learning new skills to improve on their design.  
<br><br>We are Web/Graphic Designers with a difference. Our interest isn’t only on just shunning out classic and stunning designs but also helping businesses (particularly SMEs) to grow by carefully examining their industry and providing professional advice on the best marketing/advertising strategies that suites them and hence work best for their brand visibility.

</p>
          
          </div>
          <div class="span5">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/WxJnHRILPJU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         
        
        </div>
        
      
        
        <!-- end divider -->
        <!-- Portfolio Projects -->
        <div class="row wow fadeInUp">
          <div class="span12" style="margin-top:10%">
            <h4 class="heading">Some of recent <strong>works</strong></h4>
            <div class="row">
              <section id="projects">
                <ul id="thumbs" class="portfolio">
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Bluray Signage" href="{{ $web_source }}/img/works/full/bluray-new-signage.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="{{ $web_source }}/img/works/thumbs/bluray-signage-small.jpg" alt="Design and Installation of Bluraydesigns Signage at Bogije, Lekki, Lagos.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-1" data-type="icon">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Lumstic Signage" href="{{ $web_source }}/img/works/full/lumstic-signage.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="{{ $web_source }}/img/works/thumbs/lumstic-small.jpg" alt="A 2x4ft Fabricated Plastic Board Signage for Lumstic Enterprise">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Dominant Aluminiums Business Card" href="{{ $web_source }}/img/works/full/dominant-biz-card.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="{{ $web_source }}/img/works/thumbs/dominant-small.jpg" alt="Business Card Design + Print for Dominant Aluminium with a round edge cut and glossy lamination finishing.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Splash Business Cards" href="{{ $web_source }}/img/works/full/splash-mockup.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="{{ $web_source }}/img/works/thumbs/splash-small.jpg" alt="Business Card Design + Print for Splash Paints with a round edge cut and glossy lamination finishing.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-4" data-type="web">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Northbridge Energy Flyer" href="{{ $web_source }}/img/works/full/northbridge-flyer.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="{{ $web_source }}/img/works/thumbs/northbridge-flyer-small.jpg" alt="A5 full colour flyer design and print for Northbridge Energy Limited">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-5" data-type="icon">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Northbridge Vehicle Branding" href="{{ $web_source }}/img/works/full/northbridge-vehicle-branding.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="{{ $web_source }}/img/works/thumbs/vehicle-branding.jpg" alt="Full Vehicle Branding project for Northbridge Energy">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Official Website - Triple  Aluminium Systems" href="{{ $web_source }}/img/works/full/triplec-website.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                   <img src="{{ $web_source }}/img/works/thumbs/triplec-website-small.jpg" alt="Fully responsive website built for Tripple C Aluminium Systems Limited - http://tripplecaluminium.com/ ">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Boldlink Field Oil & Gas Company Profile" href="{{ $web_source }}/img/works/full/boldlink.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="{{ $web_source }}/img/works/thumbs/boldlink-small.jpg" alt="Full Colour A4 Size Company Profile Design and Print for Boldlink Field Oil & Gas.">
                  </li>
                  <!-- End Item Project -->
                </ul>
              </section>
            </div>
          </div>
        </div>
        <!-- End Portfolio Projects -->
      
        
        
        
         
      </div>
    </section>
    
    <!--customer feedback section -->
    
    <section>
   
 <div class="container-fluid">
 
 
 
  <div class="row" style="margin-top:5%;" >
  <div class="container">
        <div class="span6 offset3">
        
        <div class="row" style="margin-top:3%;">

  				<div class="span2 text-center" style="margin-bottom:15%">
            <span class="counter"  style="font-size-adjust:inherit; font-size:55px; font-family:Tahoma, Geneva, sans-serif; font-weight:bold; color:#C06;">2,593</span>
            <p><b>Graphic Design Projects</b></p>
  				</div>

          <div class="span2 text-center" style="margin-bottom:15%">
            <span class="counter" style="font-size-adjust:inherit; font-size:55px; font-family:Tahoma, Geneva, sans-serif; font-weight:bold; color:#C06;">18</span>
            <p><b>Websites Created</b></p>
  				</div>

          <div class="span2 text-center" style="margin-bottom:10%">
            <span class="counter" style="font-size-adjust:inherit; font-size:55px; font-family:Tahoma, Geneva, sans-serif; font-weight:bold; color:#C06;">258</span>
            <p><b>Satisfied Clients</b></p>
  				</div>
  			</div>

        
        </div>
        </div>
        </div>
        
        
        
        
        <div class="row" style="margin-bottom:0px;">
        <div class="container" style="margin-bottom:0px;">
          <div class="span12">
            <h4 class="text-center">Very satisfied <strong>clients</strong></h4>
            <ul id="mycarousel" class="jcarousel-skin-tango recent-jcarousel clients">
              <li>
                <a href="#">
					<img src="{{ $web_source }}/img/dummies/clients/northbridge.png') }}" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="{{ $web_source }}/img/dummies/clients/bready.png') }}" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="{{ $web_source }}/img/dummies/clients/chrisabella.png') }}" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="{{ $web_source }}/img/dummies/clients/onkleonz.png') }}" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="{{ $web_source }}/img/dummies/clients/rarefruits.png') }}" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="{{ $web_source }}/img/dummies/clients/savanahgrill.png') }}" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="{{ $web_source }}/img/dummies/clients/boldlink.png') }}" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="{{ $web_source }}/img/dummies/clients/raldbelle.png') }}" class="client-logo" alt="" />
					</a>
              </li>
             
              <li>
                <a href="#">
					<img src="{{ $web_source }}/img/dummies/clients/landvantage.png') }}" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="{{ $web_source }}/img/dummies/clients/inasa.png') }}" class="client-logo" alt="" />
					</a>
              </li>
              <li>
                <a href="#">
					<img src="{{ $web_source }}/img/dummies/clients/golden.png') }}" class="client-logo" alt="" />
					</a>
              </li>
              
              
               <li>
                <a href="#">
					<img src="{{ $web_source }}/img/dummies/clients/delantech.png') }}" class="client-logo" alt="" />
					</a>
              </li>
              
            </ul>
          </div>
          </div>
        </div>
 
 
 
 
 <div class="row" >
 
 <div class="span4" style="padding:5px; margin-left:3%;"><blockquote style="font-family:'Century Gothic', Arial, Helvetica, sans-serif; text-align:center; margin-bottom:5px;">
     "At first I had no idea on how best to do my branding. Bluraydesigns patiently helped me see what colours, fonts, images will be best suited for my brand and the output were awesome."</blockquote>
 
   <br><p style="font-weight:bold; color:#333; text-align:center;">Paul Chizoba - CEO, Savanah's Grill</p>
   </div>

  
  
  
 <div class="span4" style="padding:5px; margin-left:5%;"><blockquote style="font-family:'Century Gothic', Arial, Helvetica, sans-serif; text-align:center; margin-bottom:5px;">
     "I needed my business card urgently for an event I was to attend, contacted them and they delivered within 24hrs. I recommend them 100%."</blockquote>
 
   <br><p style="font-weight:bold; color:#333; text-align:center;">Chimezie Emelobe - ED, Northbridge Energy</p>
   </div>
   
   
    <div class="span4" style="padding:5px; margin-left:5%;"><blockquote style="font-family:'Century Gothic', Arial, Helvetica, sans-serif; text-align:center; margin-bottom:5px;">
        "I have used other printers on several occassions but I got the very best print quality from Bluraydesigns and their customer relation is top-notch"</blockquote>
 
   <br><p style="font-weight:bold; color:#333; text-align:center;">Queens Ojie - Rarefruits Academy</p>
   </div>

 


 
 
 
 
 
 </div>

 </div>    
    </section>
    
@stop  