<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title') | {{ config('app.name') }} </title>
    <link rel="icon" href="{{ asset('storage/uploads/logo/'.themeoptions()->logo_icon) }}">

    <!-- vendor css -->
    <link href="{{ asset("backend/css/font-awesome.css") }}" rel="stylesheet">
    <link href="{{ asset("backend/css/ionicons.css") }}" rel="stylesheet">
    <link href="{{ asset("backend/css/perfect-scrollbar.css") }}" rel="stylesheet">
    <link href="{{ asset("backend/css/rickshaw.min.css") }}" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset("backend/css/starlight.css") }}">

    @yield('dashboard_css')
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo">
      <a href="{{ url('/') }}" target="_blank">
        <img src="{{ asset('storage/uploads/logo/'. themeoptions()->logo) }}" width="100" alt="{{ config('app.name') }}">
      </a>
    </div>
    <div class="sl-sideleft">
      

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        <a href="{{ route('dashboard') }}" class="sl-menu-link {{ Request::routeIs('dashboard') ? "active" : ""}}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        
        @role("super-admin|admin")
          <a href="{{ route('dashboard.show.all.students') }}" class="sl-menu-link {{ Request::routeIs('dashboard.show.all.students') ? "active" : ""}}">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">All Students</span></i>
            </div><!-- menu-item -->
          </a>
          <a href="{{ route('dashboard.free.learning') }}" class="sl-menu-link {{ Request::routeIs('dashboard.free.learning') ? "active" : ""}}">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">Free Learning Student</span></i>
            </div><!-- menu-item -->
          </a>
          <a href="{{ route('dashboard.order.index') }}" class="sl-menu-link {{ Request::routeIs('dashboard.order*') ? "active" : ""}}">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">Orders</span></i>
            </div><!-- menu-item -->
          </a>
          <a href="{{ route('dashboard.show.all.teachers') }}" class="sl-menu-link {{ Request::routeIs('dashboard.show.all.teachers') ? "active" : ""}}">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">All Teachers</span></i>
            </div><!-- menu-item -->
          </a>
          <a href="{{ route('dashboard.banner.index') }}" class="sl-menu-link {{ Request::routeIs('dashboard.banner*') ? "active" : ""}}">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">Banner</span></i>
            </div><!-- menu-item -->
          </a>

          <a href="#" class="sl-menu-link {{ Request::routeIs('dashboard.course*') ? "active" : ""}}">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">Course</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('dashboard.course.create') }}" class="nav-link">Add Course</a></li>
            <li class="nav-item"><a href="{{ route('dashboard.course.index') }}" class="nav-link">All Course</a></li>
          </ul>

          <a href="{{ route('dashboard.about.us') }}" class="sl-menu-link {{ Request::routeIs('dashboard.about.us') ? "active" : ""}}">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">About Info</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <a href="{{ route('dashboard.show.contact') }}" class="sl-menu-link {{ Request::routeIs('dashboard.show.contact') ? "active" : ""}}">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">Contact Message</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <a href="{{ route('dashboard.faq.index') }}" class="sl-menu-link {{ Request::routeIs('dashboard.faq*') ? "active" : ""}}">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">FAQ</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <a href="{{ route('dashboard.due.notification') }}" class="sl-menu-link ">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">Send Due Notification</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <a href="#" class="sl-menu-link {{ Request::routeIs('dashboard.notice*') ? "active" : ""}}">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">Notice</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('dashboard.notice.create') }}" class="nav-link">Add Notice</a></li>
            <li class="nav-item"><a href="{{ route('dashboard.notice.index') }}" class="nav-link">All Notice</a></li>
          </ul>

          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">Theme Options</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('dashboard.day.schedul') }}" class="nav-link">Add Day</a></li>
            <li class="nav-item"><a href="{{ route('dashboard.teachereducation.index') }}" class="nav-link">Add Teacher Education</a></li>
            <li class="nav-item"><a href="{{ route('dashboard.social.media') }}" class="nav-link">Social Network</a></li>
            <li class="nav-item"><a href="{{ route('dashboard.theme.option') }}" class="nav-link">Theme Option</a></li>
          </ul>

          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">Settings</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('dashboard.profile.edit') }}" class="nav-link">Edit Profile</a></li>
            @role('super-admin')
            <li class="nav-item"><a target="_blank" href="{{ route('register') }}" class="nav-link">Create Another Admin</a></li>
            <li class="nav-item"><a  href="{{ route('dashboard.show.all.admin') }}" class="nav-link">All Admin</a></li>
            @endrole
            <li class="nav-item"><a href="{{ route('dashboard.privacy.policy.index') }}" class="nav-link">Privacy Policy</a></li>
          </ul>
          
        @endrole

        @role('teacher')
        <a href="{{ route('dashboard.teacher.information.edit') }}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Teacher Profile</span>
          </div><!-- menu-item -->
        </a>
        @endrole

        @role('student')
        <a href="{{ route('dashboard.student.order') }}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Our Course</span>
          </div><!-- menu-item -->
        </a>
        <a href="{{ route('dashboard.student.notice') }}" class="sl-menu-link {{ Request::routeIs('dashboard.notice*') ? "active" : ""}}">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Notice </span> 
            @if(count(auth()->user()->notices->where('status', 1)))
            <span class="badge badge-danger">{{count(auth()->user()->notices->where('status', 1))}} </span>
            @endif
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ route('dashboard.student.information.edit') }}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Student Information</span>
          </div><!-- menu-item -->
        </a>
        @endrole
        
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name"> {{ Str::ucfirst(auth()->user()->name) }}</span>
              @role('teacher')
              <img src="{{ asset('storage/uploads/profiles/'.auth()->user()->teacher->photo )  }}" class="wd-32 rounded-circle" alt="{{ auth()->user()->name }}">
              @endrole

              @role('student')
              @if (!empty(auth()->user()->student->profile_photo))
              <img src="{{ asset('storage/uploads/profiles/'.auth()->user()->student->profile_photo ) }}" class="wd-32 rounded-circle" alt="{{ auth()->user()->name }}">
              @endif
              @endrole

              @role('admin|super-admin')
              <img src="{{ asset('backend/img/img3.jpg') }}" class="wd-32 rounded-circle" alt="{{ auth()->user()->name }}">
              @endrole
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="{{ route('dashboard.profile.edit') }}"><i class="icon ion-ios-person-outline"></i> User Profile</a></li>
                
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="icon ion-power"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    
    <!-- ########## END: RIGHT PANEL ########## --->
    <div class="sl-mainpanel">
      @yield('content')
   
      <footer class="sl-footer mt-5 pt-5">
        <div class="footer-left">
          <div class="mg-b-2">
            {!! themeoptions()->footer_copy !!}
           
          </div>
        </div>
        
      </footer>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    @include('message.flash-message')

    <script src="{{ asset("backend/js/jquery-1.12.4.min.js")}}"></script>
    <script src="{{ asset("backend/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{ asset("backend/js/perfect-scrollbar.jquery.js")}}"></script>
    <script src="{{ asset("backend/js/jquery.sparkline.min.js")}}"></script>

    <script src="{{ asset("backend/js/starlight.js")}}"></script>
    <script src="{{ asset("backend/js/ResizeSensor.js")}}"></script>
    <script src="{{ asset("backend/js/dashboard.js")}}"></script>
    @yield('dashboard_js')
    
    
  </body>
</html>
