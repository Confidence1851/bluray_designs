/*global jQuery:false */
jQuery(document).ready(function ($) {
  "use strict";

  const PAYSTACK_KEY = "pk_test_538bcf8aec2d53a94de47fee286f0ae23692d023";
  //  'pk_live_a064620026961174000212894e7fb55a36ab7ef9',  //pk_test_538bcf8aec2d53a94de47fee286f0ae23692d023



  (function () {

    var $menu = $('.navigation nav'),
      optionsList = '<option value="" selected>Go to..</option>';

    $menu.find('li').each(function () {
      var $this = $(this),
        $anchor = $this.children('a'),
        depth = $this.parents('ul').length - 1,
        indent = '';

      if (depth) {
        while (depth > 0) {
          indent += ' - ';
          depth--;
        }

      }
      $(".nav li").parent().addClass("bold");

      optionsList += '<option value="' + $anchor.attr('href') + '">' + indent + ' ' + $anchor.text() + '</option>';
    }).end()
      .after('<select class="selectmenu">' + optionsList + '</select>');

    $('select.selectmenu').on('change', function () {
      window.location = $(this).val();
    });

  })();


  $('.toggle-link').each(function () {
    $(this).click(function () {
      var state = 'open'; //assume target is closed & needs opening
      var target = $(this).attr('data-target');
      var targetState = $(this).attr('data-target-state');

      //allows trigger link to say target is open & should be closed
      if (typeof targetState !== 'undefined' && targetState !== false) {
        state = targetState;
      }

      if (state == 'undefined') {
        state = 'open';
      }

      $(target).toggleClass('toggle-link-' + state);
      $(this).toggleClass(state);
    });
  });

  //add some elements with animate effect

  $(".big-cta").hover(
    function () {
      $('.cta a').addClass("animated shake");
    },
    function () {
      $('.cta a').removeClass("animated shake");
    }
  );
  $(".box").hover(
    function () {
      $(this).find('.icon').addClass("animated pulse");
      $(this).find('.text').addClass("animated fadeInUp");
      $(this).find('.image').addClass("animated fadeInDown");
    },
    function () {
      $(this).find('.icon').removeClass("animated pulse");
      $(this).find('.text').removeClass("animated fadeInUp");
      $(this).find('.image').removeClass("animated fadeInDown");
    }
  );


  $('.accordion').on('show', function (e) {

    $(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
    $(e.target).prev('.accordion-heading').find('.accordion-toggle i').removeClass('icon-plus');
    $(e.target).prev('.accordion-heading').find('.accordion-toggle i').addClass('icon-minus');
  });

  $('.accordion').on('hide', function (e) {
    $(this).find('.accordion-toggle').not($(e.target)).removeClass('active');
    $(this).find('.accordion-toggle i').not($(e.target)).removeClass('icon-minus');
    $(this).find('.accordion-toggle i').not($(e.target)).addClass('icon-plus');
  });



  //Navi hover
  $('ul.nav li.dropdown').hover(function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
  }, function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
  });

  // tooltip
  $('.social-network li a, .options_box .color a').tooltip();

  // fancybox
  $(".fancybox").fancybox({
    padding: 0,
    autoResize: true,
    beforeShow: function () {
      this.title = $(this.element).attr('title');
      this.title = '<h4>' + this.title + '</h4>' + '<p>' + $(this.element).parent().find('img').attr('alt') + '</p>';
    },
    helpers: {
      title: {
        type: 'inside'
      },
    }
  });


  //scroll to top
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $('.scrollup').fadeIn();
    } else {
      $('.scrollup').fadeOut();
    }
  });
  $('.scrollup').click(function () {
    $("html, body").animate({
      scrollTop: 0
    }, 1000);
    return false;
  });

  $('#mycarousel').jcarousel();
  $('#mycarousel1').jcarousel();

  //flexslider
  $('.flexslider').flexslider();

  //nivo slider
  $('.nivo-slider').nivoSlider({
    effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
    slices: 15, // For slice animations
    boxCols: 8, // For box animations
    boxRows: 4, // For box animations
    animSpeed: 500, // Slide transition speed
    pauseTime: 5000, // How long each slide will show
    startSlide: 0, // Set starting Slide (0 index)
    directionNav: true, // Next & Prev navigation
    controlNav: false, // 1,2,3... navigation
    controlNavThumbs: false, // Use thumbnails for Control Nav
    pauseOnHover: true, // Stop animation while hovering
    manualAdvance: false, // Force manual transitions
    prevText: '', // Prev directionNav text
    nextText: '', // Next directionNav text
    randomStart: false, // Start on a random slide
    beforeChange: function () { }, // Triggers before a slide transition
    afterChange: function () { }, // Triggers after a slide transition
    slideshowEnd: function () { }, // Triggers after all slides have been shown
    lastSlide: function () { }, // Triggers when last slide is shown
    afterLoad: function () { } // Triggers when slider has loaded
  });

  // Da Sliders
  if ($('#da-slider').length) {
    $('#da-slider').cslider();
  }

  //slitslider
  var Page = (function () {

    var $nav = $('#nav-dots > span'),
      slitslider = $('#slider').slitslider({
        onBeforeChange: function (slide, pos) {
          $nav.removeClass('nav-dot-current');
          $nav.eq(pos).addClass('nav-dot-current');
        }
      }),

      init = function () {
        initEvents();
      },
      initEvents = function () {
        $nav.each(function (i) {
          $(this).on('click', function () {
            var $dot = $(this);

            if (!slitslider.isActive()) {
              $nav.removeClass('nav-dot-current');
              $dot.addClass('nav-dot-current');
            }

            slitslider.jump(i + 1);
            return false;

          });

        });

      };

    return {
      init: init
    };
  })();

  Page.init();

  //Google Map
  if ($('#google-map').length) {
    var get_latitude = $('#google-map').data('latitude');
    var get_longitude = $('#google-map').data('longitude');

    function initialize_google_map() {
      var myLatlng = new google.maps.LatLng(get_latitude, get_longitude);
      var mapOptions = {
        zoom: 14,
        scrollwheel: false,
        center: myLatlng
      };
      var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
      var marker = new google.maps.Marker({
        position: myLatlng,
        map: map
      });
    }
    google.maps.event.addDomListener(window, 'load', initialize_google_map);
  }



  // Custom scripts

  let reset_error = $('.reset-errors');
  let req_type = $('#req_type').text();
  let type_raw = $('#selected-type').val();
  let quantity_raw = $('#selected-quan').val();

  let formatter = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'NGN' });

  if ($('#checkoutForm').length != 0) {
    calculate();
  }

  if (req_type == 'oldreg') {
    $('.reg-errors').css('display', 'block');
    $('#mySignup').modal('show');
  }
  else if (req_type == 'oldlogin') {
    $('.login-errors').css('display', 'block');
    $('#mySignin').modal('show');
  }



  $('.product_price').each(function () {
    $(this).text(formatter.format($(this).text()));
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#commentform').on('submit', function (e) {
    console.log('clicke');
    e.preventDefault();
    var formdata = new FormData(this);
    $.ajax({
      url: "/comment",
      type: "POST",
      cache: false,
      contentType: false,
      processData: false,
      data: formdata,
      success: function (data) {
        $('#comment-list').append(
          '<div class="media"><a href="#" class="thumbnail pull-left"><img src="/web/img/avatar.png" alt="" /></a>' +
          '<div class="media-body"><div class="media-content"><h6><span>' + data.date + '</span> ' + data.name + '</h6><p>' + data.msg + '</p></div></div></div>'
        );
        $('.comment-count').each(function () {
          $(this).text(parseInt($(this).text()) + 1);
        });
      }
    });
  });

  $('#first_price').text(formatter.format(calculate()));

  $(document).on('change', '#selected-type', function () {
    type_raw = $(this).val();
    $('#first_price').text(formatter.format(calculate()));
    totalprice();
  });

  $(document).on('change', '#selected-quan', function () {
    quantity_raw = $(this).val();
    $('#first_price').text(formatter.format(calculate()));
    totalprice();
  });

  function calculate() {
    try {
      var type, quan, payable;
      type = type_raw.split("|");
      var type_id = type[0], price = type[1];


      quan = quantity_raw.split("|");
      var quan_id = quan[0], quantity = quan[1], discount = quan[2];

      payable = ((price * quantity) - discount);

      return payable;
    }
    catch (e) {
      return 0;
    }
  }

  let specification = [];
  let checkbox = $('#make_design');
  let grand_total = 0;

  if ($('#spec_exits').length > 0) {
    $('.choice').each(function () {
      var spec_name = $(this).attr('name'), price = $(this).attr('value'), spec_id = $(this).attr('id');
      if ($(this).prop('checked') == true) {
        specification.push({ id: spec_id, name: spec_name, price: price });
      }
    });

    totalprice();
  }

  totalprice();

  $(document).on('change', '.choice', function () {
    var this_select = $(this), spec_name = this_select.attr('name'), spec_price = this_select.attr('value'), spec_id = this_select.attr('id');

    specification.forEach(function (key) {
      if (key.name == spec_name) {
        key.id = spec_id;
        key.price = spec_price;
      }
    });

    totalprice();
  });

  checkbox.change(function () {
    var price = totalprice();
    if (checkbox.prop('checked') == true) {
      $('#design_file').attr('required', false);
      price = parseFloat(checkbox.attr('amount')) + price;
    }
    else {
      $('#design_file').attr('required', true);
      var price = totalprice();
    }
    checkfinal(price);
  });

  function totalprice() {
    var price = 0, payable;

    specification.forEach(function (key) {
      price += parseFloat(key.price);
    });

    if (checkbox.prop('checked') == true) {
      price = price - parseFloat(checkbox.attr('amount'));
      price = parseFloat(checkbox.attr('amount')) + price;
    }


    payable = calculate();
    price = payable + price;

    checkfinal(price);
    return price;
  }

  function checkfinal(price) {
    grand_total = price;
    $('#total_price').text(formatter.format(price));
  }

  $('#checkoutForm').submit(function (e) {
    e.preventDefault();
    var spec_ids = [];
    if (checkbox.prop('checked') == true) {
      var help_me = 1;
    }
    else {
      help_me = 0;
    }

    specification.forEach(function (key) {
      spec_ids = spec_ids + key.id + ',';
    });
    //   console.log(spec_ids);

    var myform = new FormData(this);
    myform.append('spec', spec_ids);
    myform.append('help_me', help_me);

    var customer_email = $('#customer_email').val();

    $('#delivery_details').modal('hide');

    var handler = PaystackPop.setup({
      key: PAYSTACK_KEY,
      email: customer_email,
      amount: grand_total * 100,
      currency: "NGN",
      ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
        custom_fields: [
          {
            display_name: "Mobile Number",
            variable_name: "mobile_number",
            value: ""
          }
        ]
      },
      callback: function (response) {
        //   alert('success. transaction ref is ' + response.reference);
        myform.append('pay_ref', response.reference);
        $.ajax({
          url: "/place-order",
          type: "POST",
          cache: false,
          contentType: false,
          processData: false,
          data: myform,
          success: function (data) {
            console.log(data);
            $('#delivery_modalBtn').css('display', 'none');
            $('#tran_msg').css('color', data.color);
            $('#tran_msg').html(data.msg);
          }
        });
      },
      onClose: function () {
        $('#tran_msg').css('color', 'red');
        $('#tran_msg').html('Payment cancelled!');
      }
    });
    handler.openIframe();

  });

  $('#delivery_modalBtn').click(function (e) {
    e.preventDefault();
    if (checkbox.prop('checked') == true) {
      $('#delivery_details').modal('show');
    }
    else {
      if ($('#design_file').val() != '') {
        $('#delivery_details').modal('show');
      }
      else {
        alert('Kindly upload your design to proceed!');
      }
    }
  })



  $('#brand4freeDonateForm').submit(function (e) {
    let form = $(this);
    let customer_email = form.find("#donate-email").val();
    let amount = form.find("#donate-amount").val();
    let pay_ref = form.find("#donate-pay_ref").val();
    if (pay_ref == null || pay_ref == '') {
      e.preventDefault();
      var handler = PaystackPop.setup({
        key: PAYSTACK_KEY,
        email: customer_email,
        amount: amount * 100,
        currency: "NGN",
        ref: '' + Math.floor((Math.random() * 1000000000) + 1),

        callback: function (response) {
          console.log(response.reference);
          console.log(form);
          form.find("#donate-pay_ref").val(response.reference);
          form.trigger("submit");
        },
        onClose: function () {
          // $('#tran_msg').html('Donation payment cancelled!');
        }
      });
      handler.openIframe();
    }
  });



});
//