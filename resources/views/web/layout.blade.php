<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  @if (!empty($meta_title ?? ""))
  <title>{{ $meta_title ?? "" }} - Bluray Designs</title>
  @else
  <title>Bluraydesigns - Corporate Branding, Printing, Graphics & Web Designs in Lagos, Nigeria.</title>
  @endif
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="{{ $meta_description ?? "" }}" />
  <meta name="keywords" content="{{ $meta_keywords ?? "" }}" />
  <meta name="author" content="" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ $web_source }}/ico/apple-touch-icon-144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ $web_source }}/ico/apple-touch-icon-114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ $web_source }}/ico/apple-touch-icon-72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="{{ $web_source }}/ico/apple-touch-icon-57-precomposed.png" />
  <link rel="shortcut icon" href="{{ $web_source }}/ico/favicon.png" />
  
  <!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
  

  @if ($withStyles ?? true)
  <!-- css -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="{{ $web_source }}/css/bootstrap.css" rel="stylesheet" />
  <link href="{{ $web_source }}/css/bootstrap-responsive.css" rel="stylesheet" />
  <link href="{{ $web_source }}/css/fancybox/jquery.fancybox.css" rel="stylesheet">
  <link href="{{ $web_source }}/css/jcarousel.css" rel="stylesheet" />
  <link href="{{ $web_source }}/css/flexslider.css" rel="stylesheet" />
  <link href="{{ $web_source }}/css/animate.css" rel="stylesheet" />
  <link href="{{ $web_source }}/css/style.css" rel="stylesheet" />
  <!-- Theme skin -->
  <link href="{{ $web_source }}/skins/default.css" rel="stylesheet" />
 @endif
  <style>
    .form-control{
      width: 100%;
      border-radius: 10px;
    }
    .form-group{
      margin-top:15px;
      margin-bottom:15px;
      margin-left:15px;
      margin-right:35px;
    }

  </style>
  @yield('style')
  
  <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '471466423986047');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=471466423986047&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-104839065-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-104839065-1');
</script>
  
</head>

<body>

   @if ($withHeader ?? true)


  <div id="wrapper">
    <!-- toggle top area -->
    <div class="hidden-top">
      <div class="hidden-top-inner container">
        <div class="row">
          <div class="span12">
            <ul>
              <li><strong>We are always available to meet your design and print needs, get in touch</strong></li><br>
              <li><b>Office Address:</b> Shop 1, Elemoro Shopping Complex, Bola Ahmed Tinubu Road, Bogije, Ibeju-Lekki, Lagos, Nigeria</li>
              <li><b>Call/WhatsApp:</b> <i class="icon-phone"></i>+234 (0)903 010 6794</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- end toggle top area -->

        <!-- start header -->
    <header>
      <div class="container ">
        <!-- hidden top area toggle link -->
        <div id="header-hidden-link">
          <a href="#" class="toggle-link" title="Click me you'll get a surprise" data-target=".hidden-top"><i></i>Open</a>
        </div>
        <!-- end toggle link -->
        <div class="row nomargin">
          <div class="span12">
            <div class="headnav">
              <ul>
                @guest
                <li><a href="#mySignup" data-toggle="modal"><i class="icon-user"></i> Sign up</a></li>
                <li><a href="#mySignin" data-toggle="modal">Sign in</a></li>
                @else
                <li><a href="{{route('home')}}"><i class="icon-dashboard"></i> Dashboard</a></li>
                @endguest
              </ul>
            </div>
            <p style="display: none" id="req_type">{{ old('oldtype') }}</p>
            <!-- Signup Modal -->
            <div id="mySignup" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySignupModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="mySignupModalLabel">Create an <strong>account</strong></h4>
              </div>
              <div class="modal-body">
              <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        @csrf

                  <div class="reg-errors" style="display: none">
                    @if(count($errors) > 0)
                      <ul>
                        @foreach($errors->all() as $error)
                          <li class="text-center" style="color: #F03C02">{{$error}}</li>
                        @endforeach
                      </ul>
                      @endif
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputEmail">Name</label>
                    <div class="controls">
                        <input id="name" type="text" id="signup-name" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>
                    <div class="controls">
                      <input type="email" id="signup-email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <input type="hidden" name="oldtype" id="signup-reg" value="oldreg">

                  <div class="control-group">
                    <label class="control-label" for="inputEmail">Phone Number</label>
                    <div class="controls">
                        <input id="phone" type="text" id="signup-phone" class=" @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="inputSignupPassword">Password</label>
                    <div class="controls">
                      <input type="password" id="inputSignupPassword" placeholder="Password" name="password" required autocomplete="new-password">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputSignupPassword2">Confirm Password</label>
                    <div class="controls">
                      <input type="password" id="inputSignupPassword2" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" class="btn">Sign up</button>
                    </div>
                    <p class="aligncenter margintop20">
                      Already have an account? <a href="#mySignin" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Sign in</a>
                    </p>
                  </div>
                </form>
              </div>
            </div>
            <!-- end signup modal -->
            <!-- Sign in Modal -->
            <div id="mySignin" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true" backdrop="static">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="mySigninModalLabel">Login to your <strong>account</strong></h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        @csrf

                  <div class="login-errors" style="display: none">
                    @if(count($errors) > 0)
                      <ul>
                        @foreach($errors->all() as $error)
                          <li class="text-center" style="color: #F03C02">{{$error}}</li>
                        @endforeach
                      </ul>
                      @endif
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>
                    <div class="controls">
                      <input type="email" id="login-email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="inputEmail" placeholder="Email">
                    </div>
                  </div>

                  <input type="hidden"  name="oldtype" id="login-type" value="oldlogin">

                  <div class="control-group">
                    <label class="control-label" for="inputSignupPassword">Password</label>
                    <div class="controls">
                      <input type="password" id="inputloginPassword" placeholder="Password" name="password" required autocomplete="current-password">

                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" class="btn">Sign in</button>
                    </div>
                    <p class="aligncenter margintop20">
                      Forgot password? <a href="#myReset" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Reset</a>
                    </p>
                    <p class="aligncenter margintop20">
                      Don`t have an account? <a href="#mySignup" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Sign up</a>
                    </p>
                  </div>
                </form>
              </div>
            </div>
            <!-- end signin modal -->
            <!-- Reset Modal -->
            <div id="myReset" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="myResetModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="myResetModalLabel">Reset your <strong>password</strong></h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal">
                  <div class="control-group">
                    <label class="control-label" for="inputResetEmail">Email</label>
                    <div class="controls">
                      <input type="text" id="inputResetEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" class="btn">Reset password</button>
                    </div>
                    <p class="aligncenter margintop20">
                      We will send instructions on how to reset your password to your inbox
                    </p>
                  </div>
                </form>
              </div>
            </div>
            <!-- end reset modal -->
          </div>
        </div>

        <div class="row">
          <div class="span4">
            <div class="logo">
              <a href="{{ url('/') }}"><img src="{{ $web_source }}/img/logo.png" alt="" width="300" class="Bluraydesigns logo" /></a>

            </div>
          </div>
          <div class="span8">
            <div class="navbar navbar-static-top">
              <div class="navigation">
                <nav>
                  <ul class="nav topnav">
                    <li><a href="{{ url('/') }}">HOME </a></li>


                      <li class="dropdown">
                      <a href="#">ALL PRODUCTS & SERVICES <i class="icon-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        @php($products = App\Product::where('status','Active')->orderby('name','asc')->get())
                          @foreach($products as $product)
                            <li><a href="{{ route('productdetail',$product->id)}}">{{strtoupper($product->name)}}</a></li>
                          @endforeach
                      </ul>
                    </li>

                    <li><a href="{{ route('about_us') }}">ABOUT US </a></li>

                    <li><a href="{{ route("brand_4_free.index") }}">BRAND 4 FREE </a></li>

                    <li class="dropdown" style="display:none">
                      <a href="#">Portfolio <i class="icon-angle-down"></i></a>
                      <ul class="dropdown-menu">

                      <?php
                        $cats = [];
                        foreach($products as $p){
                            if(in_array($p->category,$cats)){
                                continue;
                            }
                            else{
                                array_push($cats,$p->category);
                            }
                        }
                        ?>
                        @foreach($cats as $category)
                          <li><a href="{{ route('portfolio',$category) }}">{{$category}}</a></li>
                        @endforeach
                      </ul>
                    </li>
                    <li>
                      <a href="{{route('blog')}}">Blog </a>
                    </li>
                    <li>
                      <a href="{{route('contact')}}">Contact </a>
                    </li>
                  </ul>
                </nav>
              </div>
              <!-- end navigation -->
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->
   @endif


@yield('content')

    <section id="bottom">
    
    
    
    <div class="container">
    <!-- Begin Mailchimp Signup Form -->
<div id="mc_embed_signup">
<form action="https://bluraydesigns.us6.list-manage.com/subscribe/post?u=77d16e5948822fffcb77fef24&amp;id=6223ad22ad" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h3>Subscribe to get special print offers</h3>
<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_77d16e5948822fffcb77fef24_6223ad22ad" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>

    </div>
    
    
    
    
    
    
    
    
    
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="aligncenter">
              <div id="twitter-wrapper">
                <div id="twitter">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @if ($withFooter ?? true)
      <footer>
        <div class="container">
          <div class="row">
            <div class="span3">
              <div class="widget">
                <h5 class="widgetheading" style="color:#0CF;">Bluraydesigns</h5>
                <ul class="link-list">
                  <li><a href="#">About us</a></li>
                  <li><a href="#">Product & Services</a></li>
                  <li><a href="#">Explore our portfolio</a></li>
                  <li><a href="#">Get in touch with us</a></li>
                  <li><a href="#">Blog</a></li>
                </ul>
              </div>
            </div>
            <div class="span3">
              <div class="widget">
                <h5 class="widgetheading" style="color:#0CF;">Important stuff</h5>
                <ul class="link-list">
                  <li><a href="#">Paper Quality</a></li>
                  <li><a href="#">Printing Machines and Methods</a></li>
                  <li><a href="#">Privacy policy</a></li>
                  <li><a href="#">Career center</a></li>

                </ul>
              </div>
            </div>
            <div class="span3">
              <div class="widget">
                <h5 class="widgetheading" style="color:#0CF;">Follow us on:


                <div class="span6 pull-left">
                <ul class="social-network">
                  <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-square"></i></a></li>
                  <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-square"></i></a></li>
                  <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-linkedin icon-square"></i></a></li>
                  <li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-pinterest icon-square"></i></a></li>
                  <li><a href="#" data-placement="bottom" title="Google plus"><i class="icon-google-plus icon-square"></i></a></li>
                </ul>
              </div>


                </h5>
                <div class="flickr_badge">
          <div id="fb-root"></div>

                <div class="clear">
                </div>

                <div class="fb-page" data-href="https://www.facebook.com/bluraydesigntech/" data-tabs="timeline, messages" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-height="150" data-width="300" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/bluraydesigntech/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bluraydesigntech/">Bluray DesignTech</a></blockquote></div>
              </div>
            </div>
            </div>




            <div class="span3">
              <div class="widget">
                <h5 class="widgetheading">Get in touch with us</h5>
                <address>
                  <strong>Bluray DesignTech</strong><br>
                  Bogije Ultra Modern Complex,<br>
                  Ibeju-Lekki, Lagos, Nigeria.
                </address>
                <p>
                  <i class="icon-phone"></i> (+234) 0903 010 6794 <br>
                  <i class="icon-envelope-alt"></i> info@bluraydesigns.com
                </p>
              </div>
            </div>
          </div>
        </div>
        <div id="sub-footer">
          <div class="container">
            <div class="row">
              <div class="span6">
                <div class="copyright">
                  <p>
                    <span>&copy; Flattern - All right reserved.</span>
                  </p>
                  <div class="credits">
                    <!--
                      All the links in the footer should remain intact.
                      You can delete the links only if you purchased the pro version.
                      Licensing information: https://bootstrapmade.com/license/
                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Flattern
                    -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </footer>
  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
  @endif
  </div>

  @if ($withJavascript ?? true)


  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="{{ $web_source }}/js/jquery.js"></script>
  <script src="{{ $web_source }}/js/jquery.easing.1.3.js"></script>
  <script src="{{ $web_source }}/js/bootstrap.js"></script>
  <script src="{{ $web_source }}/js/jcarousel/jquery.jcarousel.min.js"></script>
  <script src="{{ $web_source }}/js/jquery.fancybox.pack.js"></script>
  <script src="{{ $web_source }}/js/jquery.fancybox-media.js"></script>
  <script src="{{ $web_source }}/js/google-code-prettify/prettify.js"></script>
  <script src="{{ $web_source }}/js/portfolio/jquery.quicksand.js"></script>
  <script src="{{ $web_source }}/js/portfolio/setting.js"></script>
  <script src="{{ $web_source }}/js/jquery.flexslider.js"></script>
  <script src="{{ $web_source }}/js/jquery.nivo.slider.js"></script>
  <script src="{{ $web_source }}/js/modernizr.custom.js"></script>
  <script src="{{ $web_source }}/js/jquery.ba-cond.min.js"></script>
  <script src="{{ $web_source }}/js/jquery.slitslider.js"></script>
  <script src="{{ $web_source }}/js/animate.js"></script>
  <script src="{{ $web_source }}/js/wow.js"></script>
  <script src="{{ $web_source }}/js/waypoints.min.js"></script>
  <script src="{{ $web_source }}/js/counterup.min.js"></script>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>

  <script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+2349030106794", // WhatsApp number
            call_to_action: "Hi, we are here to help you!", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
  <script>
  $('.counter').counterUp({
    delay: 50,
    time: 7000
});
  </script>

  <script>
              new WOW(
			  {
				offset: 0,
				mobile: true,
				  live: true,
				  time: 2000,
				  delay: 20,
			  }

			  ).init();
              </script>

  <script src="{{ $web_source }}/js/custom.js"></script>

  @endif
  <!-- Template Custom JavaScript File -->
  <script src="https://js.paystack.co/v1/inline.js"></script>
  
  <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->

@yield('script')
</body>
</html>
