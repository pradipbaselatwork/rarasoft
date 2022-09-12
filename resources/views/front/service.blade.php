@extends('layouts.front_layout.front_layout')
@section('content')
<?php 
use App\Allbanner;
$allbannerimage = Allbanner::first();
?>
<body>
 
<!-- ./Main slider starts-->

<section class="breadCrumbNav-banner subpage-slider">
  <figure> <img src="{{ asset($allbannerimage->image)}}" alt=""> </figure>
  <div class="breadCrumbNav">
    <div class="container breadcrumb-container">
      <h1 class="breadCrumb_title"> Services</h1>
      <div class="breadcumb-inner">
        <ul>
          <li><a href="index.html" class="breadCrumb_link">Home</a></li>
          <li><span>Services</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ./Main slider ends-->
 
<section class="service_section py-3">
  <div class="container">
  
    
    <div class="elementor-widget-container center">
        <div class="ot-heading"> <span>// our services</span>
          <h4 class="main-heading">We Offer a Wide
Variety of IT Services</h4>
        </div>
      </div>
    
    
    <div class="row choose-bar mt-5">
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
 
@endsection