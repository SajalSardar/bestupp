@extends('layouts.frontapp')
@section('title', "Teacher Registration")
@section('content')
<!-- Contact Banaer page Strat -->
<section id="single_banner_page" style="background: url({{ asset('frontend/images/breadcrumb-bg.jpg') }})">
    <div class="single_banner_page_overly">
      <div class="single_banner_text">
        <h1>Teacher Registration</h1>
        <ul>
          <li><a href="{{ route('frontend.home') }}">Home</a></li>
          <li class="diseble"><span>/</span> Registration</li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Contact Banaer page End -->

  <!-- Registration Part Start -->
  <section id="registration">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-5 margin_small">
          <div class="requirements">
            <div class="requirement_overly">
              <h3>Requirements before registration</h3>
              <ul>
                <li>
                  <span><i class="fa fa-check-square-o"></i></span> One PC / Laptop / Smart Phone
                </li>
                <li>
                  <span><i class="fa fa-check-square-o"></i></span> Internet Conection
                </li>
                <li>
                  <span><i class="fa fa-check-square-o"></i></span> Teaching Room
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-lg-7">
          <form action="{{ route('frontend.teacher.registration.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row margin_top">
              <div class="col-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="reg_form">
                      <div class="form-floating admission_input">
                        <input type="text" name="name" class="form-control" id="regYourName" placeholder="Full Name">
                        <label for="regYourName">Full Name</label>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
    
                      <div class="form-floating admission_input">
                        <input type="date" name="birthday" class="form-control" id="regDateOfBirth" placeholder="Date of Birth">
                        <label for="regDateOfBirth">Date of Birth</label>
                        @error('birthday')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
    
                      <div class="form-floating admission_input">
                        <input type="text" class="form-control" id="regMobNumber" placeholder="Mobile Number" name="mobile">
                        <label for="regMobNumber">Mobile Number</label>
                        @error('mobile')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="form-floating admission_input">
                        <input type="password" class="form-control" id="tpassword" placeholder="Password" name="password">
                        <label for="tpassword">Password</label>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
    
                      <div class="form-floating admission_input">
                        <input type="text" class="form-control" id="regPreAddress" placeholder="Present Address" name="address">
                        <label for="regPreAddress">Present Address</label>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
    
                      <div class="form-floating admission_input">
                          <input type="text" class="form-control" id="teacherNationality" placeholder="Nationality" name="national">
                          <label for="studentNationality">Nationality</label>
                          @error('national')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
    
                  <div class="col-lg-6">
                    <div class="reg_form">
                      <div class="form-floating admission_input">
                        <input type="text" class="form-control" id="regFatherName" placeholder="Father Name" name="father_name">
                        <label for="regFatherName">Father Name</label>
                        @error('father_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
    
                      <div class="form-floating admission_input">
                        <select class="form-select" id="regGender" aria-label="Floating label select example" name="gender">
                          <option selected disabled>-Select One-</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                        <label for="regGender">Gender</label>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
    
                      <div class="form-floating admission_input">
                        <input type="email" class="form-control" id="regEmail" placeholder="Email" name="email">
                        <label for="regEmail">Email</label>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
    
                      <div class="form-floating admission_input">
                        <input type="text" class="form-control" id="regParAddress" placeholder="Parmanent Address" name="parmanet_address">
                        <label for="regParAddress" >Parmanent Address</label>
                        @error('parmanet_address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class=" admission_input">
                        <label for="regEducation">Education</label>
                        <select class="form-select select_2" id="regEducation" name="education[]" multiple>
                          <option disabled>Education</option>
                          @foreach ($edus as  $edu)
                            <option value="{{ $edu->name }}">{{ $edu->name }}</option>
                          @endforeach
                        </select>
                        
                        @error('education')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
    
                      <div class=" admission_input">
                        <label for="regNameCourse">Name of Course</label>
                        <select class="form-select select_2" id="regNameCourse"  name="courses[]" multiple>
                          <option disabled> Name of Course </option>
                          @foreach ($courses as $course)
                          <option value="{{ $course->name }}">{{ $course->name }}</option>
                          @endforeach
                         
                        </select>
                        @error('courses')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="form-floating admission_input">
                        <input type="text" class="form-control" id="regCollegeName" placeholder="College/University Name" name="university">
                        <label for="regCollegeName">College/University Name</label>
                        @error('university')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="admission_input">
                  <label for="regNid">Upload NID/Brith Certificate <span>(Max size 500 KB)</span></label>
                  <input type="file" class="form-control" id="regNid" placeholder="College/University Name" name="nid">
                  @error('nid')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>

                <div class="admission_input">
                  <label for="regrecentPhoto">Upload recent Photo <span>(Max size 500 KB)</span></label>
                  <input type="file" class="form-control" id="regrecentPhoto" placeholder="Upload recent Photo" name="photo">
                  @error('photo')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="admission_input">
                  <label for="regNid">Upload Letest Education Certificate <span>(Max size 500 KB)</span></label>
                  <input type="file" class="form-control" id="regCertificate" placeholder="CoLetest Education Certificate" name="certificate">
                  @error('certificate')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="main_btn">Registration</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Registration Part End -->

  
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

@section('frontend_css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection
@section('frontend_js')
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
  
  $('.select_2').select2();

window.onload = (event)=> {
 let myAlert = document.querySelector('.toast');
 let bsAlert = new  bootstrap.Toast(myAlert);
 bsAlert.show();
}
</script>
@endsection