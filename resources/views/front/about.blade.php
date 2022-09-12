@extends('layouts.front_layout.front_layout')
@section('content')
<?php 
use App\Allbanner;
$allbannerimage = Allbanner::first();
?>
<!-- ./Main slider starts-->

<section class="breadCrumbNav-banner subpage-slider">
  <figure> <img src="{{ asset($allbannerimage->image_3)}}" alt=""> </figure>
  <div class="breadCrumbNav">
    <div class="container breadcrumb-container">
      <h1 class="breadCrumb_title"> About us</h1>
      <div class="breadcumb-inner">
        <ul>
          <li><a href="index.html" class="breadCrumb_link">Home</a></li>
          <li><span>About us</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ./Main slider ends--> 

 

<section class="welcome_content">
  @forelse($company as $data)
  <div class="container mt-3">
    <figure class="welcome_thumb col-img-50 pull-left mr-3"> <img src="{{ asset($data->image) }}"> </figure>
    <div class="txt_wrapper welcome_caption mt-2">
      <h1 class="section_title">{{ $data->title }}</h1>
      <p>{!! $data->description !!}</p>
      <p><em class="text-dark"><strong>We can help to maintain and modernize your IT infrastructure and solve various infrastructure-specific issues a business may face.</strong></em></p>
    </div>
  </div>
  @empty
  @endforelse
</section>

<section class="about-us-section">
  <div class="container">
    <div class="mt-4">
      <div class="elementor-widget-container center">
        <div class="ot-heading"> <span>// what we offer</span>
          <h3 class="main-heading">Your Partner for
            Software Innovation</h3>
        </div>
      </div>
      <div class="elementor-text-editor elementor-clearfix"> Software development outsourcing is just a tool to achieve business goals. But there is no way to get worthwhile results without cooperation and trust between a client company. </div>
    </div>
    <div class="carousel-wrap mt-2">
      <div class="owl-carousel owl-theme">
        @forelse($about as $data)
        <div class="item">
         
          <div class="serv-box-2 s2"> <img src="{{ asset($data->image)}}" alt="">
            <div class="content-box">
              <h2>{{$data->title}}</h2>
              <p>{{$data->description}}</p>
              <a href="#" class="btn-details"> LEARN MORE <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </div>
          </div>
        
        </div>  @empty
        @endforelse
      </div>
    </div>
  </div>
</section>

@endsection