@extends('layouts.front_layout.front_layout')
@section('content')
<?php 
use App\Allbanner;
$allbannerimage = Allbanner::first();
?>
<!-- ./Main slider starts-->

<section class="breadCrumbNav-banner subpage-slider">
    <figure> <img src="{{ asset($allbannerimage->image_1)}}" alt=""> </figure>
    <div class="breadCrumbNav">
      <div class="container breadcrumb-container">
        <h1 class="breadCrumb_title"> Portfolio Grid</h1>
        <div class="breadcumb-inner">
          <ul>
            <li><a href="index.html" class="breadCrumb_link">Home</a></li>
            <li><span>Portfolio Grid</span></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  
  <!-- ./Main slider ends-->
  
  <section class="portfolio_section pt-3">
    <div class="container">
      <div class="elementor-widget-container center">
        <div class="ot-heading"> <span>// latest case studies</span>
          <h4 class="main-heading">Introduce Our Projects</h4>
          <p>Software development outsourcing is just a tool to achieve business goals. But there is no way<br>
            to get worthwhile results without cooperation and trust between a client company.</p>
        </div>
      </div>
      <div class="row mt-3 project-box">
        @forelse($project as $data)
   <div class="col col-md-4 col-sm-6 col-12">
         <a href="https://www.facebook.com/" target="_blank">
            <figure class="project-figure portfolio-thumbnail"><img src="{{ asset($data->image) }}" alt="">
        <figcaption class="project-caption portfolio-info">
        <h2>{{ $data->title }}</h2>
        <p class="portfolio-cates">Design<span>/</span>Ideas </p>
         </figcaption>
        </figure> 
      </a>
      
        </div>
        @empty
        @endforelse

    </div>
  </section>

@endsection
