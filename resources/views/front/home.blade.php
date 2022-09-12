@extends('layouts.front_layout.front_layout')
@section('content')
<!-- ===./MAIN SLIDER STARTS====-->

<section class="owl-main-slider">
  <div class="owl-carousel owl-theme">
    @forelse($banner as $data)
    <div class="item"> <img src="{{ asset($data->image)}}"alt="images not found">
      <div class="cover">
        <div class="container">
          <div class="header-content">
            <div class="line"></div>
            <h2>{{$data->title}}</h2>
            <h1>{{$data->sub_title}}</h1>
            <h4>{{$data->description}}</h4>
          </div>
        </div>
      </div>
    </div>
    @empty
    @endforelse
  </div>
</section>

<!-- ===./MAIN SLIDER ENDS====-->

<section class="logo-section section_wrapper">
  <div class="container">
    <div class="carousel-wrap">
      <div class="owl-carousel owl-theme">
        @forelse($font as $data)
        <div class="item"> <a href="#">
          <figure class="flipInX animatable"><img src="{{asset($data->image)}}"> </figure>
          </a> </div>
          @empty
          @endforelse
      </div>
    </div>
  </div>
</section>

<section class="welcome_content">
  @forelse($company as $data)
  <div class="container inner_content">
    <figure class="welcome_thumb col-img-50 pull-left mr-3"> <img src="{{ asset($data->image) }}"> </figure>
    <div class="txt_wrapper welcome_caption fadeInRight animatable">
      <h1 class="section_title">{{ $data->title }}</h1>
      <p>{!! $data->description !!}</p>
      <a href="#" class="btn btn-default read_btn">Read More</a> </div>
  </div>
  @empty
  @endforelse
</section>

<section class="product_content three_equal py-3">
  <div class="container center"> 
    <!--    <h2 class="sub_title">Welcome</h2>-->
    <h1 class="section_title">We will help you look<br>
      professional</h1>
    <div class="mar_top row_holder">
      @forelse($profession as $data)
      <div class="col"> <a href="#">
        <div class="product_outer">
          <figure class="product_icon rotateIn  animatable"> <img src="{{ asset($data->image) }}"> </figure>
          <figcaption class="product_caption txt_wrapper">
            <h3 class="product_title">{{$data->name}}</h3>
            <p>Starting at {{$data->price}}</p>
          </figcaption>
        </div>
        </a> </div>
        @empty
        @endforelse
      <div class="btn_center"> <a href="about-us.html" class="btn btn-default read_btn">Read More</a> </div>
    </div>
  </div>
</section>

<section class="service_section py-3">
  <div class="container center">
    <h2 class="section_title">Our services</h2>
    <div class="row choose-bar">
      @forelse($service as $data)
      <div class="col col-md-4 col-sm-6">
        <figure class="icon-user"> <span><i class="{{ $data->icon }}"></i></span> </figure>
        <figcaption class="icon-caption">
          <h2>{{ $data->title }}</h2>
          <p>{{ $data->description }}</p>
        </figcaption>
      </div>
      @empty
      @endforelse
    </div>
  </div>
</section>

<section class="choose_section pt-3">
  <div class="container center"> 
    <!--    <h4 class="sub-title">Why Choose US</h4>
    <h2 class="section_title white_txt center">Design the Concept <br>
      of Your Business Idea Now</h2>-->
    <div class="ot-heading white_txt"> <span>// Why Choose US</span>
      <h3 class="main-heading">Design the Concept <br>
        of Your Business Idea Now </h3>
    </div>
    <div class="row mt-5">
      @forelse($business as $data)
      <div class="col col-md-3">
        <div class="serv-box-2 s2"> <span class="big-number">01</span>
          <div class="icon-main"> <span class="flaticon-tablet"></span> </div>
          <div class="content-box">
            <h2>{{$data->title}}</h2>
            <p>{{$data->description}}</p>
            <a href="#" class="btn-details"> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> LEARN MORE</a> </div>
        </div>
      </div>
      @empty
      @endforelse
    </div>
  </div>
</section>

<section class="elementor-widget-wrap">
  <figure class="banner-img"><!-- <img src="images/pencil-typography-black-design.jpg" alt="">-->
    <figcaption class="banner-caption">
      <div class="ot-heading white_txt"> <span>// We Carry more Than Just Good Coding Skills</span>
        <h2 class="main-heading">Let's Build Your Website! </h2>
      </div>
      <div class="elementor-button-wrapper"> <a href="#" class="elementor-button-link elementor-button elementor-size-md" role="button"> <span class="elementor-button-content-wrapper"> </span> </a> </div>
    </figcaption>
  </figure>
</section>

<section class="intro-section">
  <div class="container">
    <div class="flex_container mt-4">
      <div class="elementor-widget-container">
        <div class="ot-heading"> <span>// latest case studies</span>
          <h2 class="main-heading">Introduce Our Projects</h2>
        </div>
      </div>
      <div class="elementor-text-editor elementor-clearfix"> Software development outsourcing is just a tool to achieve business goals. But there is no way to get worthwhile results without cooperation and trust between a client company. </div>
    </div>
    <div class="carousel-wrap">
      <div class="owl-carousel owl-theme">
        @forelse($project as $data)
        <div class="item">
          <div class="serv-box-3 s2"> <img src="{{ asset($data->image) }}" alt="">
            <div class="projects-box">
              <div class="portfolio-info">
        
                <div class="portfolio-info-inner"> <a class="btn-link" href="#"> <i class="flaticon-right-arrow-1"></i> </a>
                  <h2><a href="#">{{ $data->title }}</a></h2>
                  <p class="portfolio-cates"> <a href="#">Design</a><span>/</span> <a href="#">Ideas</a><span>/</span> </p>
                </div>
              </div>
            </div>
            
            <!--<div class="content-box">
              <h2>ECommerce Website</h2>
              <p>Our product design service lets you prototype, test and validate your ideas.</p>
              <a href="#" class="btn-details"> LEARN MORE <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </div>--> 
          </div>
        </div>
        @empty
        @endforelse
      </div>
    </div>
  </div>
</section>

<section class="back_top"><!--//back to top scroll-->
  <div class="container">
    <div id="back-top" style="display: block;"> <a href="#top" title="Go to top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
  </div>
</section>
<!--//back to top scroll--> 

@endsection
