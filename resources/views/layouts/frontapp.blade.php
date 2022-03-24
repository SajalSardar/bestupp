<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | {{ config('app.name') }} </title>
  <link type="image/png" rel="shortcut icon" href="{{asset('frontend/images/fev_icon.png')}}">
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
            <h3>Contact us <i class="fa fa-phone"></i><a href="tel:+88 01601600405">+88 01601600405</a></h3>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="slogan">
            <ul>
              <li>Learning</li>
              <li>for</li>
              <li>Careers</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="social_link_top">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
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
        <img class="img-fluid" src="{{asset('frontend/images/logo.png')}}" alt="{{ config('app.name'); }}">
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
            <a class="nav-link active" aria-current="page" href="{{ route('frontend.home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.all.course') }}">Courses</a>
          </li>
          <li class="nav-item drop_down">
            <a class="nav-link">
              Registration <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown_menu">
              <li><a class="nav-link drop-item" href="{{ route('frontend.teacher.registration.view') }}">Teacher registration</a></li>
              <li><a class="nav-link drop_item" href="{{ route('frontend.student.registration.view') }}">Student registration</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.payment') }}">Payment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.about') }}">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.contact') }}">Contact</a>
          </li>
        </ul>
        <a class="enroll_btn" href="{{ route('frontend.student.registration.view') }}">Enroll Now</a>
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
              <img src="{{asset('frontend/images/logo.png')}}" alt="Logo">
            </a>
            <div class="join_free_seminar">
              <button class="main_btn" type="submit" data-bs-target="#myModal" data-bs-toggle="modal">Join free
                learning</button>
              <div class="modal" tabindex="-1" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h6 class="modal-title">Join free learning</h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="#">
                        <div class="form-floating admission_input">
                          <input type="text" class="form-control" id="joinName" placeholder="Enter Name">
                          <label for="joinName">Enter Name</label>
                        </div>
                        <div class="form-floating admission_input">
                          <input type="text" class="form-control" id="joinMobile" placeholder="Enter Mobile">
                          <label for="joinMobile">Enter Mobile</label>
                        </div>
                        <div class="form-floating admission_input">
                          <input type="text" class="form-control" id="joinEmail" placeholder="Enter Email">
                          <label for="joinEmail">Enter Email</label>
                        </div>
                        <div class="form-floating admission_input">
                          <input type="text" class="form-control" id="joinAddress" placeholder="Enter Address">
                          <label for="joinAddress">Enter Address</label>
                        </div>
                        <div class="form-floating admission_input">
                          <select class="form-select" id="studentCourse" aria-label="Floating label select example">
                            <option selected>-Select One-</option>
                            <option value="Kid's learning">Kid's learning</option>
                            <option value="Kid's English">Kid's English</option>
                            <option value="Spoken English">Spoken English</option>
                            <option value="Arabic Shikkha">Arabic Shikkha</option>
                            <option value="Quran Shikkha">Quran Shikkha</option>
                            <option value="Foreign Language">Foreign Language</option>
                            <option value="General Knowledge">General Knowledge</option>
                            <option value="Basic Computer">Basic Computer</option>
                            <option value="Official Computer">Official Computer</option>
                            <option value="Video Editing">Video Editing</option>
                            <option value="Freelancing">Freelancing</option>
                            <option value="Web Design">Web Design</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="App Development">App Development</option>
                            <option value="General Knowledge">Graphic Design</option>
                            <option value="Other">Other</option>
                          </select>
                          <label for="studentCourse">Name of Course</label>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer text-center">
                      <button type="button" class="modal_btn main_btn">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="social_links">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              </ul>
            </div>
            <div class="play_store">
              <div class="play_store_img">
                <a href="#"><img class="img-fluid" src="{{asset('frontend/images/Play-store.png')}}" alt="Play Store image"></a>
              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-2 col-md-6">
          <div class="footer_item">
            <h3>Quick Links</h3>
            <ul class="links">
              <li><a href="about_us.html"><i class="fa fa-caret-right"></i> About us</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Students' Feedback</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Job Placement</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Freelancing Success</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Gallery</a></li>
              <li><a href="contact.html"><i class="fa fa-caret-right"></i> Contact us</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="footer_item">
            <h3>All Courses</h3>
            <div class="row">
              <div class="col-6">
                <ul class="links">
                  <li><a href="kids_learning.html"><i class="fa fa-caret-right"></i> Kid's Learning</a>
                  <li><a href="kids_english.html"><i class="fa fa-caret-right"></i> Kid's English</a>
                  <li><a href="spoken_english.html"><i class="fa fa-caret-right"></i> Spoken English</a>
                  <li><a href="arabic_shikkha.html"><i class="fa fa-caret-right"></i> Arabic Shikkha</a>
                  <li><a href="quran-shikkha.html"><i class="fa fa-caret-right"></i> Quran Shikkha</a>
                  <li><a href="bangla_language.html"><i class="fa fa-caret-right"></i> Bangla Language</a>
                  <li><a href="foreign_language.html"><i class="fa fa-caret-right"></i> Foreign Language</a>
                  <li><a href="general_knowledge.html"><i class="fa fa-caret-right"></i> General Knowledge</a>
                  
                </ul>
              </div>
              <div class="col-6">
                <ul class="links">
                  <li><a href="basic_computer.html"><i class="fa fa-caret-right"></i> Basic Computer</a>
                  <li><a href="official_computer.html"><i class="fa fa-caret-right"></i> Official Computer</a>
                  <li><a href="video_editing.html"><i class="fa fa-caret-right"></i> Video Editing</a>
                  <li><a href="freelancing.html"><i class="fa fa-caret-right"></i> Freelancing</a>
                  <li><a href="web_design.html"><i class="fa fa-caret-right"></i> Web Design</a>
                  <li><a href="digital_marketing.html"><i class="fa fa-caret-right"></i> Digital Marketing</a>
                  <li><a href="app_development.html"><i class="fa fa-caret-right"></i> App Development</a></li>
                  <li><a href="graphic_design.html"><i class="fa fa-caret-right"></i> Graphics Design</a></li>
                </ul>
              </div>
            </div>
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
                  <li><a href="tel:+8801601600405">+88 01601600405</a></li>
                  <li><a href="whatsapp://tel:+8801786600486">+88 01786600486</a> <i class="fa fa-whatsapp"
                      aria-hidden="true"></i></li>
                </ul>
              </div>
            </div>
            <div class="contact_inner_text">
              <div class="contact_icon">
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
              </div>
              <div class="contact_info">
                <ul>
                  <li><a href="mailto:bestupplearning@gmail.com">bestupplearning@gmail.com</a></li>
                  <li><a href="mailto:bestupplearning@gmail.com">bestupplearning@gmail.com</a></li>
                </ul>
              </div>
            </div>
            <div class="contact_inner_text">
              <div class="contact_icon">
                <i class="fa fa-globe" aria-hidden="true"></i>
              </div>
              <div class="contact_info">
                <ul>
                  <li><a href="https://bestupp.com/" target="_blank">www.bestupp.com</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copy">
      <p>Copyright <i class="fa fa-copyright" aria-hidden="true"></i>
        2021. All Rights Reserved by <a href="#">bestupp.</a></p>
    </div>
  </section>
  <!-- Footer Part End -->

  <!-- All script Js Here -->
  <script src="{{ asset('frontend/js/jquery-1.12.4.min.js') }}"></script>
  <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
  <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
  <script src="{{ asset('frontend/js/script.js') }}"></script>

@yield('frontend_js')
</body>

</html>