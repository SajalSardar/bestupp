@extends('layouts.frontapp')
@section('title', "Home")
@section('content')
  <!-- Banaer Part Strat -->
  <section id="banner">
    <div class="swiper-container mySwiper">
      <div class="swiper-wrapper">
        @foreach ($banners as $banner)
        <div class="swiper-slide banner_1">
         <img src="{{asset('storage/uploads/banner/'. $banner->banner_image)}}" class="img-fluid" alt="">
        </div>
        @endforeach
      </div>
      <div class="swiper-scrollbar"></div>
    </div>
  </section>
  <!-- Banaer Part End -->

  <!-- FAQ Part Start -->
  <section id="faq">
    <div class="container">
      <div class="section_heading text-center">
        {!! $themeoption->faq_title !!}
        <p>{{ $themeoption->faq_subtitle }}</p>
      </div>
      <div class="col-lg-12">
        <div class="faq">
          <div class="accordion" id="accordionExample">
            @foreach ($allFaqs as $key=>$faq)
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button {{ $key==0 ? "" : "collapsed" }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne_{{ $faq->id }}"
                  aria-expanded="true" aria-controls="collapseOne">
                  {{ $faq->question }} <i class="fa fa-chevron-down"></i>
                </button>
              </h2>
              <div id="collapseOne_{{ $faq->id }}" class="accordion-collapse collapse {{ $key==0 ? "show" : "" }} " aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>{{ $faq->answer }}</p>
                </div>
              </div>
            </div>  
            @endforeach
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- FAQ Part End -->



  <!-- About part Start -->
  <section id="about">
    <div class="container">
      <div class="section_heading text-center">
        <h2>{!!  $aboutHome->section_title !!}</h2>
        <p>{{ $aboutHome->section_description }}</p>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="about_pic">
            <img src="{{asset('storage/uploads/about/'.$aboutHome->about_banner)}}" alt="{!! strip_tags($aboutHome->section_title) !!}" class="img-fluid w-100">
          </div>
        </div>
        <div class="col-lg-7">
          <div class="about_text">
            {!! Str::limit($aboutHome->about_us, 1000, '...') !!}
          </div>
          <div class="about_btn">
            <a href="{{ route('frontend.about') }}">Read More</a>
            <a href="{{ route('frontend.student.registration.view') }}">Enroll Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- About part end -->


  <!-- Courses Part Start -->
  <section id="courses">
    <div class="container">
      <div class="section_heading text-center">
        {!! $themeoption->course_title !!}
        <p>{{ $themeoption->course_subtitle }}</p>
      </div>
      <div class="row courses_slider">
        @foreach ($courses as $course)
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('storage/uploads/course/'.$course->banner_image)}}" alt="{{ strip_tags($course->name) }}" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>{!! $course->name !!}</h3>
                {!! Str::limit($course->overview, 180, '...') !!} </p>
                <a href="{{ route('frontend.view.course',$course->slug) }}">Read More</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      <div class="course_btn text-center">
        <a href="{{ route('frontend.all.course') }}">All Courses</a>
      </div>
    </div>
  </section>
  <!-- Courses Part End -->


  <!-- Student Ragistration Part Start -->
  <section id="student_ragistration" class="mb-5">
    <div class="container">
      <div class="section_heading text-center">
        {!! $themeoption->student_title !!}
        <p>{{ $themeoption->student_subtitle }}</p>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="student_ragistration_form">
            <form action="{{ route('frontend.student.registration') }}" method="POST">
              @csrf
              <div class="row margin_top">
                <div class="col-md-6">
                  <div class="reg_form">
                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="studentName" name="name" placeholder="Full Name">
                      <label for="studentName">Full Name</label>
                      @error('name')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="semail" name="email" placeholder="Student Email">
                      <label for="semail">Email</label>
                      @error('email')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="form-floating admission_input">
                      <input type="date" name="birthday" class="form-control" id="studentDateOfBirth" placeholder="Date of Birth">
                      <label for="studentDateOfBirth">Date of Birth</label>
                      @error('birthday')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="form-floating admission_input">
                      <input type="number" name="mobile" class="form-control" id="studentWhatsappNumber" placeholder="Mobile Number">
                      <label for="studentWhatsappNumber">Whatsapp Number</label>
                      @error('mobile')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="studentNationality" name="nationality" placeholder="Nationality">
                      <label for="studentNationality">Nationality</label>
                      @error('nationality')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="form-floating admission_input">
                      <input type="text" name="guardianname" class="form-control" id="studentGuardianName" placeholder="Guardian Name">
                      <label for="studentGuardianName">Guardian Name</label>
                      @error('guardianname')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="reg_form">
                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="regFatherName" name="fathername" placeholder="Father Name">
                      <label for="regFatherName">Father Name</label>
                      @error('fathername')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="form-floating admission_input">
                      <input type="password" class="form-control" id="spass" name="password" placeholder="Password">
                      <label for="spass">Password</label>
                      @error('password')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="form-floating admission_input">
                      <select class="form-select" name="gender" id="regGender" aria-label="Floating label select example">
                        <option selected disabled>-Select One-</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                      <label for="regGender">Gender</label>
                      @error('gender')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="form-floating admission_input">
                      <input type="text" name="address" class="form-control" id="studentAddress" placeholder="Address">
                      <label for="studentAddress">Address</label>
                      @error('address')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="form-floating admission_input">
                      <input type="number" name="gnumber" class="form-control" id="studentGuardianNumber"
                        placeholder="Guardian Phone Number">
                      <label for="studentGuardianNumber">Guardian Phone Number</label>
                      @error('gnumber')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="student_reg_bnt">
                    <button type="submit" class="main_btn">Registration</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Student Ragistration Part End -->


  <!-- Download App Part Start -->
  {{-- <section id="download_app">
    <div class="app_overly">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 m-auto">
            <div class="app_content">
              <h3>{{ $themeoption->home_app_title }}<span>{{ $themeoption->home_app_sub_title }}</span></h3>
              {!! $themeoption->home_app_description !!}
              <div class="app_btn">
                <a href="{{ $themeoption->footer_google_store_link }}" class="main_btn"><span>
                    <?xml version="1.0" encoding="iso-8859-1"?>
                    <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 502.857 502.857"
                      style="enable-background:new 0 0 502.857 502.857;" xml:space="preserve">
                      <g>
                        <path style="fill:#57C927;"
                          d="M115.428,155.433v217.664c0,17,10.208,30.336,27.704,30.336h22.84c-0.784,0-2.544,5.768-2.544,8.6
                      v61.648c0,16.112,15.448,29.176,32,29.176c16.56,0,32-13.064,32-29.176v-61.648c0-2.832-3.088-8.6-3.848-8.6h55.712
                      c-0.76,0-3.864,5.768-3.864,8.6v61.648c0,16.112,15.416,29.176,31.968,29.176c16.592,0,32.032-13.064,32.032-29.176v-61.648
                      c0-2.832-1.752-8.6-2.536-8.6h22.872c17.496,0,27.664-13.336,27.664-30.336V155.433H113.596H115.428z" />
                        <path style="fill:#57C927;" d="M59.428,158.977c-16.568,0-32,13.072-32,29.176v124.92c0,16.112,15.432,29.176,32,29.176
                      c16.56,0,32-13.064,32-29.176V188.161C91.428,172.049,75.988,158.977,59.428,158.977z" />
                        <path style="fill:#57C927;" d="M320.3,42.057l5.584-8.192l5.592-8.096l12.456-18.2c1.56-2.256,0.912-5.264-1.384-6.744
                      c-2.272-1.512-5.416-0.88-6.904,1.36l-19.016,27.704l-5.72,8.344c-18.072-6.832-38.208-10.64-59.48-10.64
                      c-21.224,0-41.4,3.816-59.472,10.64l-5.688-8.336l-5.624-8.184l-13.36-19.512c-1.544-2.248-4.648-2.84-6.952-1.36
                      c-2.28,1.488-2.912,4.496-1.392,6.744l12.448,18.208l5.592,8.104l5.616,8.168c-42.432,19.24-71.144,57.368-71.144,97.368h279.96
                      C391.412,99.433,362.708,61.305,320.3,42.057z M191.436,100.593c-8.312,0-15.008-6.536-15.008-14.608s6.696-14.576,15.008-14.576
                      c8.288,0,15,6.504,15,14.576S199.732,100.593,191.436,100.593z M311.436,100.593c-8.304,0-15.016-6.536-15.016-14.608
                      s6.712-14.576,15.016-14.576c8.288,0,15,6.504,15,14.576S319.724,100.593,311.436,100.593z" />
                      </g>
                      <path style="fill:#1CB71C;" d="M60.852,224.193c-12.472,0-25.424-11.768-33.424-30.432v119.32c0,16.112,15.432,29.176,32,29.176
                    c16.56,0,32-13.064,32-29.176V199.985C83.428,214.977,71.86,224.193,60.852,224.193z" />
                      <path style="fill:#57C927;" d="M443.428,158.977c-16.568,0-32,13.072-32,29.176v124.92c0,16.112,15.432,29.176,32,29.176
                    c16.56,0,32-13.064,32-29.176V188.161C475.428,172.049,459.988,158.977,443.428,158.977z" />
                      <g>
                        <path style="fill:#1CB71C;" d="M444.852,224.193c-12.472,0-25.424-11.768-33.424-30.432v119.32c0,16.112,15.432,29.176,32,29.176
                      c16.56,0,32-13.064,32-29.176V199.985C467.428,214.977,455.86,224.193,444.852,224.193z" />
                        <path style="fill:#1CB71C;" d="M251.428,179.337c-63.28,0-120-7.32-136-17.712v211.472c0,17,10.208,30.336,27.704,30.336h22.84
                      c-0.784,0-2.544,5.768-2.544,8.6v61.648c0,16.112,15.448,29.176,32,29.176c16.56,0,32-13.064,32-29.176v-61.648
                      c0-2.832-3.088-8.6-3.848-8.6h55.712c-0.76,0-3.864,5.768-3.864,8.6v61.648c0,16.112,15.416,29.176,31.968,29.176
                      c16.592,0,32.032-13.064,32.032-29.176v-61.648c0-2.832-1.752-8.6-2.536-8.6h22.872c17.496,0,27.664-13.336,27.664-30.336v-211.48
                      C371.428,172.009,314.716,179.337,251.428,179.337z" />
                        <path style="fill:#1CB71C;"
                          d="M326.436,85.977c0,8.072-6.712,14.608-15,14.608c-8.304,0-15.016-6.536-15.016-14.608
                      c0-4.376,2.008-8.24,5.136-10.912c-15.816-2.64-32.64-4.088-50.128-4.088s-34.304,1.448-50.128,4.088
                      c3.136,2.664,5.144,6.536,5.144,10.912c0,8.072-6.712,14.608-15,14.608c-8.312,0-15.008-6.536-15.008-14.608
                      c0-2.064,0.456-4.024,1.248-5.808c-23.984,6.304-44.592,15.504-60.144,26.808c-3.92,10.296-6.088,24.456-6.088,32.456h279.96
                      c0-8-2.168-22.152-6.08-32.44c-15.544-11.32-36.16-20.536-60.128-26.84C325.988,81.937,326.436,83.921,326.436,85.977z" />
                      </g>
                      <path style="fill:#049E42;" d="M251.428,262.817c-53.896,0-104-10.632-136-28.056v138.336c0,17,10.208,30.336,27.704,30.336h22.84
                    c-0.784,0-2.544,5.768-2.544,8.6v61.648c0,16.112,15.448,29.176,32,29.176c16.56,0,32-13.064,32-29.176v-61.648
                    c0-2.832-3.088-8.6-3.848-8.6h55.712c-0.76,0-3.864,5.768-3.864,8.6v61.648c0,16.112,15.416,29.176,31.968,29.176
                    c16.592,0,32.032-13.064,32.032-29.176v-61.648c0-2.832-1.752-8.6-2.536-8.6h22.872c17.496,0,27.664-13.336,27.664-30.336V234.761
                    C355.428,252.193,305.324,262.817,251.428,262.817z" />
                    </svg>
                  </span> Download App</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- Download App Part End -->

  
@if ($message = Session::get('success'))
<div class="toast-container position-absolute top-0 end-0 p-3" style="z-index:9999;">
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="10000">
  <div class="toast-header " style="background: #5BAD3F">
    <h3 class="pl-2 text-white">{{ config('app.name') }}</h3>
    <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    {{ $message }}
  </div>
</div>
</div>
@endif


@endsection

@section('frontend_js')
<script>
window.onload = (event)=> {
 let myAlert = document.querySelector('.toast');
 let bsAlert = new  bootstrap.Toast(myAlert);
 bsAlert.show();
}
</script>
@endsection