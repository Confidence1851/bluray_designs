@extends('web.layout')

@section('content')
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Portfolio <strong></strong></h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Portfolio</a><i class="icon-angle-right"></i></li>
              <li class="active">All Brand Categories</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <ul class="portfolio-categ filter">
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
                          <li class="{{$category}} {{$name ? 'active' : ''}}" ><a href="#">{{$category}}</a></li>
                        @endforeach
              
            </ul>
            <div class="clearfix">
            </div>
            <div class="row">
              <section id="projects">
                <ul id="thumbs" class="portfolio">
                  <!-- Item Project and Filter Name -->
                  @foreach($products as $product)
                  @php($last_img = App\Picture::where('product_id',$product->id)->orderby('created_at','desc')->first())
                  <li class="item-thumbs span4 {{$product->title}}" data-id="id-{{$product->id}}" data-type="{{$product->category}}">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="{{$product->title}}" href="{{ asset('public/product_images/'.$last_img->image) }}">
                      <span class="overlay-img"></span>
                      <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                    <!-- Thumb Image and Description -->
                    <img src="{{ asset('public/product_images/'.$last_img->image) }}" alt="{{$product->title}}">
                  </li>
                  @endforeach
                  <!-- End Item Project -->
                 
                </ul>
              </section>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop