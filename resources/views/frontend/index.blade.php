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
            {!! $aboutHome->about_us !!}
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
                <div class="form-floating admission_input col-md-6">
                  <input type="text" class="form-control" id="studentName" name="name" placeholder="Full Name">
                  <label for="studentName">Full Name</label>
                  @error('name')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-floating admission_input col-md-6">
                  <input type="text" class="form-control" id="regFatherName" name="fathername" placeholder="Father Name">
                  <label for="regFatherName">Father Name</label>
                  @error('fathername')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="form-floating admission_input col-md-6">
                  <input type="text" class="form-control" id="semail" name="email" placeholder="Student Email">
                  <label for="semail">Email</label>
                  @error('email')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="form-floating admission_input col-md-6">
                  <input type="password" class="form-control" id="spass" name="password" placeholder="Password">
                  <label for="spass">Password</label>
                  @error('password')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="form-floating admission_input col-md-6">
                  <input type="date" name="birthday" class="form-control" id="studentDateOfBirth" placeholder="Date of Birth">
                  <label for="studentDateOfBirth">Date of Birth</label>
                  @error('birthday')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="form-floating admission_input col-md-6">
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

                <div class="form-floating admission_input col-md-6">
                  <input type="number" name="mobile" class="form-control" id="studentWhatsappNumber" placeholder="Mobile Number">
                  <label for="studentWhatsappNumber">Whatsapp Number</label>
                  @error('mobile')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-floating admission_input col-md-6">
                  <input type="text" name="address" class="form-control" id="studentAddress" placeholder="Address">
                  <label for="studentAddress">Address</label>
                  @error('address')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="form-floating admission_input col-md-6">
                  <input type="text" class="form-control" id="studentNationality" name="nationality" placeholder="Nationality">
                  <label for="studentNationality">Nationality</label>
                  @error('nationality')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="form-floating admission_input col-md-6">
                  <input type="text" name="guardianname" class="form-control" id="studentGuardianName" placeholder="Guardian Name">
                  <label for="studentGuardianName">Guardian Name</label>
                  @error('guardianname')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-floating admission_input col-md-6">
                  <input type="number" name="gnumber" class="form-control" id="studentGuardianNumber"
                    placeholder="Guardian Phone Number">
                  <label for="studentGuardianNumber">Guardian Phone Number</label>
                  @error('gnumber')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
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

{{-- offer modal part  --}}
  <!-- Modal -->
  @isset($offer->id)
  <div class="modal fade" id="loadmodal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-body">
          <img width="100%" src="{{ asset('storage/uploads/offer/'.$offer->offer_image) }}" alt="{{ $offer->title }}">
        </div>
      </div>
    </div>
  </div>
  @endisset
  
   {{-- offer modal part end --}}



@endsection

@section('frontend_js')
<script>
  $(window).on('load', function(){
    $('#loadmodal').modal('show');

    // var key = 'hadModal',
    //     hadModal = localStorage.getItem(key);

    // // Show the modal only if new user
    // if (hadModal === true) {
    //     $('#loadmodal').modal('show');
    // }

    // // If modal is displayed, store that in localStorage
    // $('#loadmodal').on('shown.bs.modal', function () {
    //     localStorage.setItem(key, true);
    // })

  });



window.onload = (event)=> {
 let myAlert = document.querySelector('.toast');
 let bsAlert = new  bootstrap.Toast(myAlert);
 bsAlert.show();
}
</script>
@endsection