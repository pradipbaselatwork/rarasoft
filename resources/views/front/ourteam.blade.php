@extends('layouts.front_layout.front_layout')
@section('content')
<?php 
use App\Allbanner;
$allbannerimage = Allbanner::first();
?>
<!-- ./Main slider starts-->

<section class="breadCrumbNav-banner subpage-slider">
    <figure> <img src="{{ asset($allbannerimage->image_4)}}" alt=""> </figure>
    <div class="breadCrumbNav">
      <div class="container breadcrumb-container">
        <h1 class="breadCrumb_title"> Our Team</h1>
        <div class="breadcumb-inner">
          <ul>
            <li><a href="index.html" class="breadCrumb_link">Home</a></li>
            <li><span>Our Team</span></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  
  <!-- ./Main slider ends-->
  
  <section class="team_section py-3">
    <div class="container">
      <div class="elementor-widget-container center">
        <div class="ot-heading"> <span>// latest case studies</span>
          <h4 class="main-heading">Introduce Our Projects</h4>
          <p>Software development outsourcing is just a tool to achieve business goals. But there is no way<br>
            to get worthwhile results without cooperation and trust between a client company.</p>
        </div>
      </div>
      <div class="row project-box mt-5">
        @forelse($ourteam as $data)
          <div class="col col-md-4 col-sm-6 col-12">
            <figure class="team-thumb project-figure portfolio-thumbnail"><img src="{{ asset($data->image)}}" alt="">
              <figcaption class="team-caption project-caption portfolio-info">
            
          </figcaption>
        </figure>
        
        </div>
        @empty
        @endforelse

                    
        </div>
        
        
      </div>
    </div>
  </section>

@endsection