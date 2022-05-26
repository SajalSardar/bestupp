@extends('layouts.frontapp')
@section('title', "Student Registration")
@section('content')
<!-- Contact Banaer page Strat -->
<section id="single_banner_page">
    <div class="single_banner_page_overly">
      <div class="single_banner_text">
        <h1>Student Registration</h1>
        <ul>
          <li><a href="{{ route('frontend.home') }}">Home</a></li>
          <li class="diseble"><span>/</span> Registration</li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Contact Banaer page End -->

<!-- Student Ragistration Part Start -->
<section id="student_ragistration">
    <div class="container">
      <div class="section_heading text-center">
        {!! themeoptions()->student_title !!}
        <p>{{ themeoptions()->student_subtitle }}</p>
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
