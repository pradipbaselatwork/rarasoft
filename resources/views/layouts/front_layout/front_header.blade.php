<?php 
use App\Navbar;
use App\Footer;
$footer= Footer::first();
$navbar= Navbar::with('subcategories')->where('parent_id',0)->where('status',1)->get();
?>
<header class="site_header"><!--../header starts--> 
    <!-- ./top-bar-->
    
    <div class="topbar">
      <div class="container">
        <div class="top_social_icons topbar-items">
          <ul>
            <li><a target="_blank" href="{{ $footer->fb_url }}" title=""><i class="fab fa-facebook"></i></a></li>
            <li><a target="_blank" href="{{ $footer->twitter_url }}" title=""><i class="fab fa-twitter"></i> </a></li>
            <li><a target="_blank" href="{{ $footer->instagram_url }}" title=""><i class="fab fa-instagram"></i> </a></li>
          </ul>
        </div>
        <address class="top-contact-address topbar-items">
        <ul>
          <li>
            <figure class="icon"><i class="fas fa-phone"></i></figure>
            <div class="details"> <a href="tel:9801904810" class="call" >{{ $footer->number }}</a> </div>
          </li>
          <li>
            <figure class="icon"> <i class="fas fa-envelope"></i></figure>
            <div class="details"><a href="mailto:info@rarasoft.com.np" class="email">{{ $footer->mail }}</a> </div>
          </li>
        </ul>
        </address>
      </div>
    </div>
    
    <!-- ./top-bar-->
    <div id="pav-mainnav"><!-- ./pav-mainnav-->
      <div class="navigation-bar"><!-- ./navigation-bar-->
        <div class="container">
          <div class="row nav-row">
            <div class="col col-md-3">
             <figure class="logo_holder"><a href="/"> <img src="{{ asset('front/images/main_logo.png') }}" alt="This is web logo"> </a></figure>
            </div>
            <div class="col col-md-9">
              <div id="mainContent">
                <div id="myCanvasNav" class="overlay3" onclick="closeOffcanvas()" style="width: 0%; opacity: 0;"></div>
                <div id="myOffcanvas" class="offcanvas" >
                  <div class="navbar navbar-default" role="navigation"> <!--//Navbar -->
                    <div class="side_nav"><!--nav-collapse-->
                      <ul class="nav navbar-nav">
                        <li><a href="{{ route('home') }}">Home </a>

                        @foreach ($navbar as $nav)
                        <li><a href="{{ route('page',$nav->url) }}">{{$nav->category_name}}

                           @if(!$nav->subcategories->isEmpty()) <span class="caret">@endif</span> </a>
                           
                          @if(!$nav->subcategories->isEmpty())
                          <ul class="dropdown-menu">
                          @foreach ($nav->subcategories as $item)
                            <li><a href="{{ route('page',$item->url) }}">{{ $item->category_name }}</a></li>
                            @endforeach   
                          </ul>
                          @endif               
                            
                        </li>
                        @endforeach

                      </ul>
                    </div>
                    <!--/.nav-collapse --> 
                  </div>
                  <!--//Navbar --> 
                </div>
                <!--offcanvas-->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"  onclick="openNav3();openOffcanvas()"> <span class="toggle-bar"></span> </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ./navigation-bar--> 
    </div>
    <!-- ./pav-mainnav--> 
  </header>
  <!--../header ends--> 