<!--// footer starts-->
<?php 
use App\Footer;
$footer= Footer::first();
?>
<footer class="footer section_wrapper">
    <div class="container center pt-5">
     <figure class="footer-logo-holder"> <a href="index.html"> <img src="{{ asset('front/images/footer-logo.png') }}" alt="This is footer logo"> </a> </figure>
      <div class="row row_holder">
        <div class="col col-sm-4 fadeInUp animatable">
          <div class="footer_col">
            <h4 class="sub_title">Phone</h4>
            <h6><a href="tel:9801904810" class="call" >{{ $footer->number }}</a></h6>
          </div>
          <figure class="contact_icon"><i class="fa-solid fa-phone" aria-hidden="true"></i> </figure>
        </div>
        <div class="col col-sm-4 fadeInUp animatable">
          <div class="footer_col">
            <h4 class="sub_title">Mailbox</h4>
            <h6><a href="{{ asset('front/mailto:info@rarasoft.com.np') }}" class="email">{{ $footer->mail }}</a> </h6>
          </div>
          <figure class="contact_icon"><i class="fa-solid fa-envelope" aria-hidden="true"></i></figure>
        </div>
        <div class="col col-sm-4 fadeInUp animatable">
          <div class="footer_col">
            <h4 class="sub_title">Address</h4>
            <h6>{{ $footer->address }}</h6>
          </div>
          <figure class="contact_icon"> <i class="fa-solid fa-globe"></i> </figure>
        </div>
      </div>
      <div class="footer-links">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Portfolio</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Contacts</a></li>
        </ul>
      </div>
      <div class="footer-social-icons">
        <ul>
          <li><a target="_blank" href="{{ $footer->fb_url }}"><i class="fab fa-facebook" aria-hidden="true"></i> </a></li>
          <li><a target="_blank" href="{{ $footer->twitter_url }}"><i class="fab fa-twitter" aria-hidden="true"></i> </a></li>
          <li><a target="_blank" href="{{ $footer->instagram_url }}"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
          <li><a target="_blank" href="{{ $footer->linkedin_url }}"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
          <li><a target="_blank" href="{{ $footer->google_url }}"><i class="fab fa-google"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>
  <div class="copyright">
    <div class="container">
      <p>Copyright © <script type="text/javascript" language="javascript">var date = new Date(); document.write(date.getFullYear());</script> All Rights Reserved.</p>
    </div>
  </div>
  
  <!--// footer ends-->