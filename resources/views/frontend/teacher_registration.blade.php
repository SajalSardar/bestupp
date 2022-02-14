@extends('layouts.frontapp')
@section('title', "Teacher Registration")
@section('content')
<!-- Contact Banaer page Strat -->
<section id="single_banner_page" style="background: url({{ asset('frontend/images/breadcrumb-bg.jpg') }})">
    <div class="single_banner_page_overly">
      <div class="single_banner_text">
        <h1>Teacher Registration</h1>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="course.html"><span>/</span>All Courses</a></li>
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
          <form action="#">
            <div class="row margin_top">
              <div class="col-12">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="reg_form">
                      <div class="form-floating admission_input">
                        <input type="text" class="form-control" id="regYourName" placeholder="Full Name">
                        <label for="regYourName">Full Name</label>
                      </div>
    
                      <div class="form-floating admission_input">
                        <input type="date" class="form-control" id="regDateOfBirth" placeholder="Date of Birth">
                        <label for="regDateOfBirth">Date of Birth</label>
                      </div>
    
                      <div class="form-floating admission_input">
                        <input type="text" class="form-control" id="regMobNumber" placeholder="Mobile Number">
                        <label for="regMobNumber">Mobile Number</label>
                      </div>
    
                      <div class="form-floating admission_input">
                        <input type="text" class="form-control" id="regPreAddress" placeholder="Present Address">
                        <label for="regPreAddress">Present Address</label>
                      </div>
    
                      <div class="form-floating admission_input">
                          <input type="text" class="form-control" id="teacherNationality" placeholder="Nationality">
                          <label for="studentNationality">Nationality</label>
                      </div>
    
                      <div class="form-floating admission_input">
                        <select class="form-select" id="regEducation" aria-label="Floating label select example">
                          <option selected>-Select One-</option>
                          <option value="Kid's English">H.S.C/Diploma/Alim</option>
                          <option value="Spoken English">Graduation</option>
                          <option value="Arabic Shikkha">Post Graduation</option>
                        </select>
                        <label for="regEducation">Education</label>
                      </div>
                    </div>
                  </div>
    
                  <div class="col-lg-6">
                    <div class="reg_form">
                      <div class="form-floating admission_input">
                        <input type="text" class="form-control" id="regFatherName" placeholder="Father Name">
                        <label for="regFatherName">Father Name</label>
                      </div>
    
                      <div class="form-floating admission_input">
                        <select class="form-select" id="regGender" aria-label="Floating label select example">
                          <option selected>-Select One-</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                        <label for="regGender">Gender</label>
                      </div>
    
                      <div class="form-floating admission_input">
                        <input type="email" class="form-control" id="regEmail" placeholder="Email">
                        <label for="regEmail">Email</label>
                      </div>
    
                      <div class="form-floating admission_input">
                        <input type="text" class="form-control" id="regParAddress" placeholder="Parmanent Address">
                        <label for="regParAddress">Parmanent Address</label>
                      </div>
    
                      <div class="form-floating admission_input">
                        <select class="form-select" id="regNameCourse" aria-label="Floating label select example">
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
                          <option value="General Knowledge">General Knowledge</option>
                          <option value="Other">Other</option>
                        </select>
                        <label for="regNameCourse">Name of Course</label>
                      </div>

                      <div class="form-floating admission_input">
                        <input type="text" class="form-control" id="regCollegeName" placeholder="College/University Name">
                        <label for="regCollegeName">College/University Name</label>
                      </div>

                      <div class="form-floating admission_input">
                        <input type="text" class="form-control" id="regContnumber" placeholder="Contact Number">
                        <label for="regContnumber">Contact Number</label>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="admission_input">
                  <label for="regNid">Upload NID/Brith Certificate <span>(Max size 500 KB)</span></label>
                  <input type="file" class="form-control" id="regNid" placeholder="College/University Name">
                </div>

                <div class="admission_input">
                  <label for="regrecentPhoto">Upload recent Photo <span>(Max size 500 KB)</span></label>
                  <input type="file" class="form-control" id="regrecentPhoto" placeholder="Upload recent Photo">
                </div>
                <div class="admission_input">
                  <label for="regNid">Upload Letest Education Certificate <span>(Max size 500 KB)</span></label>
                  <input type="file" class="form-control" id="regCertificate" placeholder="CoLetest Education Certificate">
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
@endsection