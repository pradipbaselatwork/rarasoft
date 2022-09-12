  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('images/admin_images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/admin_images/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          {{-- <img src="{{asset($data->image)}}" alt="" width="100" height="100" srcset=""> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ ucwords(Auth::guard('admin')->user()->name) }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            @if(Session::get('page')=="dashboard")
            <?php $active = "active"; ?>
            @else
            <?php $active = ""; ?>
            @endif
          <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ $active}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>


          {{-- Sidebar Banner Menu--}}
          @if(Session::get('page')=="allbanner"
          || Session::get('page')=="navbar"
          || Session::get('page')=="banner" 
          || Session::get('page')=="about"
          || Session::get('page')=="ourteam"
          || Session::get('page')=="font" 
          || Session::get('page')=="company"
          || Session::get('page')=="profession" 
          || Session::get('page')=="service"
          || Session::get('page')=="business"
          || Session::get('page')=="project"
          || Session::get('page')=="footer")

          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link {{ $active}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Banner
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="allbanner")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.allbanner') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Bannner Images</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="navbar")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.navbar') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Navbar</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="banner")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.banner') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="about")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.about') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="ourteam")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.ourteam') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Our Team</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="font")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.font') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Font Slide</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="company")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.company') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="profession")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.profession') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Professional Help</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="service")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.service') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Our Services</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="business")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.business') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Business Idea</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="project")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.project') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Our Projects</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="footer")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.edit.footer') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Footer</p>
                </a>
              </li>
            </ul>

          </li>

          @if(Session::get('page')=="settings" || Session::get('page')=="update-admin-details")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
   <li class="nav-item has-treeview menu-open">
     <a href="#" class="nav-link {{ $active}}">
       <i class="nav-icon fas fa-th"></i>
       <p>
         Settings
         <i class="right fas fa-angle-left"></i>
       </p>
     </a>
     <ul class="nav nav-treeview">
       @if(Session::get('page')=="settings")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
       <li class="nav-item">
         <a href="{{ url('admin/settings') }}" class="nav-link {{ $active}}">
           <i class="far fa-circle nav-icon"></i>
           <p>Update Admin Password</p>
         </a>
       </li>
       @if(Session::get('page')=="update-admin-details")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
       <li class="nav-item">
         <a href="{{ url('admin/update-admin-details') }}" class="nav-link {{ $active}}">
           <i class="far fa-circle nav-icon"></i>
           <p>Update Admin Details</p>
         </a>
       </li>
     </ul>
   </li>
   
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>