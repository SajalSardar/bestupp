<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | {{ config('app.name') }} </title>
  <link type="image/png" rel="shortcut icon" href="{{ asset('storage/uploads/logo/'.themeoptions()->logo_icon) }}">
  <!-- Google Fonts Strat -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Oswald:wght@400;500;600;700&display=swap"
    rel="stylesheet">
  <!-- Google Fonts End -->


  <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/css/slick.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css')}}">
  @yield('frontend_css')
</head>

<body>
  <div class="back_to_top">
    <i class="fa fa-chevron-up"></i>
  </div>

  <!-- Top bar Part Strat -->
  <section id="top_bar">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="more_info">
            <h3>Contact us <i class="fa fa-phone"></i> <a href="tel:{{ themeoptions()->header_contact }}">{{ themeoptions()->header_contact }}</a></h3>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="slogan">
            <ul>
              {!! themeoptions()->header_slogan !!}
            </ul>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="social_link_top">
            <ul>
              @foreach (socilas() as $media)
              <li><a href="{{ $media->link }}"><i class="fa fa-{{ $media->name }}"></i></a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Top bar Part End -->

  <!-- Navbar Part Start -->
  <nav class="navbar navbar-expand-lg header">
    <div class="container">
      <a class="navbar-brand logo" href="{{ route('frontend.home') }}">
        <img class="img-fluid" style="width: 160px"  src="{{ asset('storage/uploads/logo/'. themeoptions()->logo) }}" alt="{{ config('app.name'); }}">
      </a>
      <button class="navbar-toggler toggle_btn" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <div class="my_bars">
          <div class="line1 bars"></div>
          <div class="line3 bars"></div>
          <div class="line4 bars"></div>
        </div>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0 menu" id="navbar-example3">
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('frontend.home') ? "active" : ""}} " aria-current="page" href="{{ route('frontend.home') }}">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{ Request::routeIs('frontend.all.course') ? "active" : ""}}" href="{{ route('frontend.all.course') }}">Courses</a>
          </li>
          <li class="nav-item drop_down">
            <a class="nav-link {{ Request::routeIs('frontend.teacher.registration.view') ||Request::routeIs('frontend.student.registration.view') ? "active" : ""}}">
              Registration <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown_menu">
              <li><a class="nav-link drop-item" href="{{ route('frontend.teacher.registration.view') }}">Teacher registration</a></li>
              <li><a class="nav-link drop_item" href="{{ route('frontend.student.registration.view') }}">Student registration</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('frontend.about') ? "active" : ""}}" href="{{ route('frontend.about') }}">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('frontend.contact') ? "active" : ""}}" href="{{ route('frontend.contact') }}">Contact</a>
          </li>
        </ul>
        @guest()
        <a class="enroll_btn" href="{{ route('login') }}">Login</a>
        @endguest
        
       @auth
       @role('student')
        <a class="enroll_btn me-3" href="{{ route('frontend.cart') }}">View Cart</a>
        @endrole
       <form action="{{ route('logout') }}" method="POST" class="d-inline">
         @csrf
         <button class="enroll_btn" type="submit" style="border:none">Log Out</button>
       </form>
       
       @endauth
      </div>
    </div>
  </nav>
  <!-- Navbar Part End -->

   
    @yield('content')

    <!-- Footer Part Start -->
  <section id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="footer_item item_left">
            <a href="#">
              <img src="{{ asset('storage/uploads/logo/'.themeoptions()->logo) }}" alt="{{ config('app.name') }}" style="width: 160px">
            </a>
            <div class="join_free_seminar">
              <button class="main_btn" data-bs-target="#myModal" data-bs-toggle="modal">Join free  learning</button>
              <div class="modal" tabindex="-1" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h6 class="modal-title">Join free learning</h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="free_leed">
                        @csrf
                        <div class="form-floating admission_input">
                          <input type="text" name="name" class="form-control" id="joinName" placeholder="Enter Name">
                          <label for="joinName">Enter Name</label>
                          <p class="text-danger name_err" ></p>
                        </div>
                        <div class="form-floating admission_input">
                          <input type="number" name="mobile" class="form-control" id="joinMobile" placeholder="Enter Mobile">
                          <label for="joinMobile">Enter Mobile</label>
                          <p class="text-danger mobile_err" ></p>
                        </div>
                        <div class="form-floating admission_input">
                          <input type="text" name="email" class="form-control" id="joinEmail" placeholder="Enter Email">
                          <label for="joinEmail">Enter Email</label>
                          <p class="text-danger email_err" ></p>
                        </div>
                        <div class="form-floating admission_input">
                          <input type="text" name="address" class="form-control" id="joinAddress" placeholder="Enter Address">
                          <label for="joinAddress">Enter Address</label>
                        </div>
                        <div class="form-floating admission_input">
                          <select class="form-select" name="course" id="studentCourse" aria-label="Floating label select example">
                            <option selected disabled>-Select One-</option>
                            @foreach(courses() as $course)
                            <option value="{{ $course->id }}">{{ strip_tags($course->name) }}</option>
                            @endforeach
                            
                          </select>
                          <label for="studentCourse">Name of Course</label>
                          <p class="text-danger course_err" ></p>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer text-center">
                      <button type="button" class="modal_btn main_btn free_submit">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="social_links">
              <ul>
                @foreach (socilas() as $media)
                <li><a href="{{ $media->link }}"><i class="fa fa-{{ $media->name }}"></i></a></li>
                @endforeach
              </ul>
            </div>
            <div class="play_store">
              <div class="play_store_img">
                <a href="{{  themeoptions()->footer_google_store_link }}"><img class="img-fluid" src="{{ asset('frontend/images/Play-store.png') }}" alt="Play Store image"></a>
              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-2 col-md-6">
          <div class="footer_item">
            <h3>Quick Links</h3>
            <ul class="links">
              <li><a href="{{ route('frontend.about') }}"><i class="fa fa-caret-right"></i> About us</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Students' Feedback</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Job Placement</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Freelancing Success</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Gallery</a></li>
              <li><a href="{{ route('frontend.contact') }}"><i class="fa fa-caret-right"></i> Send Message</a></li>
              <li><a href="{{ route('frontend.privacy.policy') }}"><i class="fa fa-caret-right"></i>Privacy Policy</a></li>
              <li><a href="{{ route('frontend.terms.condition') }}"><i class="fa fa-caret-right"></i>Terms And Condition</a></li>
              <li><a href="{{ route('frontend.return.refund') }}"><i class="fa fa-caret-right"></i>Return &amp; Refund</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="footer_item">
            <h3>All Courses</h3>
                <ul class="links row">
                  @foreach (courseTitieOne() as $titleOne)
                    <li class="col-6"><a href="{{ route('frontend.view.course',$titleOne->slug) }}"><i class="fa fa-caret-right"></i> {!! $titleOne->name !!}</a>
                  @endforeach
                </ul>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="footer_item">
            <h3>Contact us</h3>
            <div class="contact_inner_text number">
              <div class="contact_icon">
                <i class="fa fa-phone" aria-hidden="true"></i>
              </div>
              <div class="contact_info">
                <ul>
                    {!! themeoptions()->footer_number !!}
                </ul>
              </div>
            </div>
            <div class="contact_inner_text">
              <div class="contact_icon">
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
              </div>
              <div class="contact_info">
                <ul>
                  {!! themeoptions()->footer_email !!}
                </ul>
              </div>
            </div>
            <div class="contact_inner_text">
              <div class="contact_icon">
                <i class="fa fa-globe" aria-hidden="true"></i>
              </div>
              <div class="contact_info">
                <ul>
                  {!! themeoptions()->footer_site_link !!}
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copy">
      {!! themeoptions()->footer_copy !!}
    </div>
  </section>

  <div class="modal" id="success_modal" style="z-index: 9999;">
    <div class="modal-dialog">
        <div class="modal-body bg-success">
            <p class="text-white">Free Learning Registration Successfull!</p>
        </div>
    </div>
</div>
  <!-- Footer Part End -->

  <!-- All script Js Here -->
  <script src="{{ asset('frontend/js/jquery-1.12.4.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
  <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
  <script src="{{ asset('frontend/js/script.js') }}"></script>
  <script>
  $(document).ready(function ($) {
    
    
    //seminar form
    $(".free_submit").on('click',function(e){
      e.preventDefault();

      $('.name_err').text('');
      $('.email_err').text('');
      $('.mobile_err').text('');
      $('.course_err').text('');

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      let _token =$("input[name='_token']").val();
      var name = $("#joinName").val();
      var email = $("#joinEmail").val();
      var mobile = $("#joinMobile").val();
      var address = $("#joinAddress").val();
      var course_id = $("#studentCourse").val();

      $.ajax({
          url: "{{ route('frontend.free.learning') }}",
          type: "POST",
          data: {_token:_token, name:name, email:email, mobile:mobile, course_id:course_id, address:address},
          datatype: 'json',
          success: function (data) {
              document.getElementById('free_leed').reset();
              $('#myModal').modal('hide');
              $('#success_modal').modal('show');
                setTimeout(function(){
                    $('#success_modal').modal('hide');
                },2500)
          },
          error: function (response) {
              $('.name_err').text(response.responseJSON.errors.name);
              $('.email_err').text(response.responseJSON.errors.email);
              $('.mobile_err').text(response.responseJSON.errors.mobile);
              $('.course_err').text(response.responseJSON.errors.course_id);

          },
          
      });


    });
  
  });
  </script>

  @yield('frontend_js')
</body>

</html>