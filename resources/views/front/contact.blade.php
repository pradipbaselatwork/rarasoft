@extends('layouts.front_layout.front_layout')
@section('content')
<?php 
use App\Allbanner;
$allbannerimage = Allbanner::first();
?>
<!-- ./Main slider starts-->

<section class="breadCrumbNav-banner subpage-slider">
    <figure> <img src="{{ asset($allbannerimage->image_2)}}" alt=""> </figure>
    <div class="breadCrumbNav">
      <div class="container breadcrumb-container">
        <h1 class="breadCrumb_title"> Contact us</h1>
        <div class="breadcumb-inner">
          <ul>
            <li><a href="index.html" class="breadCrumb_link">Home</a></li>
            <li><span>Contact us</span></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  
  <!-- ./Main slider ends-->
  
  <section class="contact_section">
    <div class="container">
      <div class="row row_holder">
      
      
      
      <div class="col col-sm-6 col-12">
          <div class="contact_info">
          
          <div class="ot-heading"> <span>// contact details</span>
          <h4 class="main-heading">Contact us</h4>
          <p>Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days. We will be happy to answer your questions. </p>
        </div>
          
            <address>
            <figure class="icon"> <i class="fa-solid fa-globe"></i> </figure>
            <div class="details">
              <h4 class="contact_title">Address</h4>
              <span>New Baneswor, Kathmandu</span> </div>
            </address>
            <address>
            <figure class="icon"> <i class="fa-solid fa-phone" aria-hidden="true"></i></figure>
            <div class="details">
              <h4 class="contact_title">Phone</h4>
              <span><a href="tel:9801904810" class="call">9801904810</a></span> </div>
            </address>
            <address>
            <figure class="icon"> <i class="fa-solid fa-envelope" aria-hidden="true"></i> </figure>
            <div class="details">
              <h4 class="contact_title">Email</h4>
              <a href="mailto:info@rarasoft.com.np" class="email">info@rarasoft.com.np</a> </div>
            </address>
          </div>
        </div>
      
           <div class="col col-sm-6 col-12">
        
          <div class="contact_form">
          <h2>Ready to Get Started?</h2>
          <p>Your email address will not be published. Required fields are marked *</p>

            <form action="{{ route('contact') }}" method="post">
              @csrf
              <div class="form-group">
                <input id="name" name="name" class="form-control" type="text" required="" placeholder="Name*" >
              </div>
              <div class="form-group">
                <input id="phone" name="phone" class="form-control" required="" type="tel"placeholder="Phone" >
              </div>
              <div class="form-group">
                <input id="email" name="email" class="form-control" required="" type="Email" placeholder="Email*">
              </div>
              <div class="form-group">
                <textarea id="message" name="description" class="form-control" required="" placeholder="Message...*"></textarea>
              </div>
              <div class="form-group">
                <input class="btn btn_submit" type="submit" required="" value="Send Message">
              </div>
            </form>

          </div>
        </div>
        
      </div>
    </div>
    <div class="map">
      <div class="gmap_canvas">
        <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d113031.09583958874!2d85.3244552!3d27.710439000000015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m5!1s0x39eb196ea2778b09%3A0xa3889d5d222c3c38!2sRara%20Soft%20Pvt.%20Ltd%2C%20Kathmandu%2044600!3m2!1d27.691289899999997!2d85.33741119999999!4m0!5e0!3m2!1sen!2snp!4v1646636648682!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </section>

  
@endsection