@extends('layouts.frontapp')
@section('title', "Home")
@section('content')
  <!-- Banaer Part Strat -->
  <section id="banner">
    <div class="swiper-container mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide banner_1">
          <img class="img-fluid" src="{{asset('frontend/images/banner-1.jpg')}}" alt="image">
        </div>
        <div class="swiper-slide banner_2">
          <a class="d-block" href="tel:+88 01601600405"><img class="img-fluid" src="{{asset('frontend/images/banner-2.jpg')}}" alt="image"></a>
        </div>
        <div class="swiper-slide banner_3">
          <img class="img-fluid" src="{{asset('frontend/images/banner-3.jpg')}}" alt="image">
        </div>
      </div>
      <div class="swiper-scrollbar"></div>
    </div>
  </section>
  <!-- Banaer Part End -->

  <!-- FAQ Part Start -->
  <section id="faq">
    <div class="container">
      <div class="section_heading text-center">
        <h2>Frequently Asked Questions <span>(FAQ)</span></h2>
        <p>Every moment of life should be used properly</p>
      </div>
      <div class="col-lg-12">
        <div class="faq">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                  aria-expanded="true" aria-controls="collapseOne">
                  What is the class time schedule? <i class="fa fa-chevron-down"></i>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Students will be able to choose their flexible time schedule</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  How long the classes? <i class="fa fa-chevron-down"></i>
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>The classes should be one to two hours long.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Which platform do you use for online classes? <i class="fa fa-chevron-down"></i>
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>We use Zoom application, Google Meet, Whatsapp for our online classes. We provide different Meeting ID according to our
                    time schedule. Students can easily join and participate in the class.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  what do I need to enroll myself ?<i class="fa fa-chevron-down"></i>
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>If you have a laptop or pc in your hand you can enjoy any of our courses.
                    Also your smart phone is enough for all language learning course.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  Can I call you and find out about the course?<i class="fa fa-chevron-down"></i>
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Yes you can find out your unknown questions by calling us.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                  what are your course fees?<i class="fa fa-chevron-down"></i>
                </button>
              </h2>
              <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p> Course fees vary from course to course. Visit our website or app for details about course fees and
                    register for the course of your choice.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingSeven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                  Do you have to pay all the course fees together?<i class="fa fa-chevron-down"></i>
                </button>
              </h2>
              <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p> You do not have to pay at the same time. According to our course, you can pay between two and
                    three times.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingEight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                  How do I pay the course fee?<i class="fa fa-chevron-down"></i>
                </button>
              </h2>
              <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>There is a payment gateway in our website or app to pay the course fee. You can pay with
                    Bkash,Nagad,Rocket, Master card and Visa card with the help of payment gateway.Also call our number
                    for any help.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingNine">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                  What are the arrangements for online classes for children?<i class="fa fa-chevron-down"></i>
                </button>
              </h2>
              <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>There is a separate teacher for each child. one teacher takes one child's class through online
                    classrooms.</p>
                </div>
              </div>
            </div>

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
        <h2>About <span>bestupp</span></h2>
        <p>Every moment of life should be used properly</p>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="about_pic">
            <img src="{{asset('frontend/images/about_us.png')}}" alt="About image" class="img-fluid w-100">
          </div>
        </div>
        <div class="col-lg-7">
          <div class="about_text">
            <h4>Welcome to bestupp</h4>
            <p>
              Starting our bestupp journey by thinking about the little kids in exile. We have seen through electronic and social hwmedia at different times that the children of expatriate in different parts of the world cannot speak Bangla properly. Many cannot sing our national anthem. They have no idea about the history of our language and culture at all, because we realize that in the schools of different countries they do not teach on our own language, history, culture, they only teach on their language and the Guardians in exile are busy with their work most of the time. They are not able to give their children enough time on the language, culture, history of our lives.
              <span>In order to develop every child in a creative way through intellectual development, first of all it is necessary to use the right language. No matter where the expatriates are in the world, we will build them in Bangla language, Bangla culture, English education through our bestupp and at the same time we will present the aspects of advanced technology of our country to the world in the right way.</span>
            </p>
          </div>
          <div class="about_btn">
            <a href="about_us.html">Read More</a>
            <a href="student-registration.html">Enroll Now</a>
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
        <h2>Our <span>Courses</span></h2>
        <p>Every moment of life should be used properly</p>
      </div>
      <div class="row courses_slider">
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/kids-learning.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>Kid's Learning</h3>
                <p>Every parent has a dream so that their children are well educated and can improve themselves and achieve their life goals and so that their children can fully develop themselves by realizing the dreams of the parents.</p>
                <a href="kids_learning.html">Read More</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/english.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>Kid's English</h3>
                <p>We all want our child to be able to speak English fluently in the right way without being afraid of English.
                  We teach your child the right guide, the right practice, the easiest way to teach English in an easy way to develop English. 
                  </p>
                <a href="kids_english.html">Read More</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Spoken English -->
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/spoken-english.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>Spoken English</h3>
                <p>When we hear spoken English, some of us are scared. We must first understand that English is a common language. Whenever you understand spoken English, you will think it is the easiest language in the world. </p>
                <a href="spoken_english.html">Read More</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Arabic Shikkha -->
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/arabic-shikkha.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>Arabic Shikkha</h3>
                <p>Every Muslim parent wants their child to follow Islam from an early age and learn to follow the right way. Register now for admission to our online live class to teach your child Arabic in a beautiful, pure language from an early age.</p>
                <a href="arabic_shikkha.html">Read More</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Quran shikka -->
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/quran-shkkha.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>Quran shikkha</h3>
                <p>The learning process has also improved with the change of era. A lot can be learned easily in less time sitting at home. Most of our Muslims try to learn the Qur'an and learn about Islam properly through the Qur'an. </p>
                <a href="quran-shikkha.html">Read More</a>
              </div>
            </div>
          </div>
        </div>

       <!-- Bangla language -->
       <div class="col-lg-4 col-md-6">
        <div class="courses_item_main">
          <div class="courses_item text-center">
            <div class="course_img">
              <img src="{{asset('frontend/images/bangla-language.png')}}" alt="courses-image" class="img-fluid w-100">
            </div>
            <div class="course_text">
              <h3>Bangla Language</h3>
              <p>Bangla language is the language of our soul "Mother tongue". Everyone wants to be able to present their languages ​​beautifully everywhere. If a mother uses the right language in a beautiful way, her child will also learn </p>
              <a href="bangla_language.html">Read More</a>
            </div>
          </div>
        </div>
      </div>

        <!-- Foreign Language -->
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/foreign-language.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>Foreign Language</h3>
                <p>Most important thing for expatriates in any country of the world is to know the language of that country, all the countries of the world place importance on their local language.  Whatever business or job you do, you must know the language of that country.
                </p>
                <a href="foreign_language.html">Read More</a>
              </div>
            </div>
          </div>
        </div>

        <!-- General knowledge -->
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/general-knoweldge.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>General knowledge</h3>
                <p>General knowledge is essential for any job. Without general knowledge no work can be successful. When you prepare for a job interview, you must appear on the interview board in preparation for the General Knowledge.</p>
                <a href="general_knowledge.html">Read More</a>
              </div>
            </div>
          </div>
        </div>


        <!-- Basic Computer -->
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/basic-computer.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>Basic Computer</h3>
                <p>The type of work is also changing with the change of era. In this age of technology, people are constantly advancing In the present age, nothing can be imagined without a computer. There is no substitute for a computer because of the work you do. </p>
                <a href="basic_computer.html">Read More</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Official Computer -->
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/official-computer.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>Official Computer</h3>
                <p>The type of work is also changing with the change of era. In this age of technology, people are constantly advancing. In the present age, nothing can be imagined without a computer. There is no substitute for a computer because of the work you do.</p>
                <a href="official_computer.html">Read More</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Video Editing -->
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/video_editing.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>Video Editing</h3>
                <p>Whatever the type of your business, you can easily spread it by posting videos of your product on social media to make it smarter and more accessible to people.
                  If you want to post videos on any platform, you must know good video editing.
                  </p>
                <a href="video_editing.html">Read More</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Digital Marketing -->
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/digitl-mrketing.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>Digital Marketing</h3>
                <p>In this era of information technology Digital Marketing is one of the most practiced topic of the world. Be it small or be it big digital marketing has become very popular to promote any kind of business or product in such an affordable cost.</p>
                <a href="digital_marketing.html">Read More</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Graphics Design -->
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/graphic-design.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>Graphics Design</h3>
                <p>Graphic Design. It is a well renowned and respectable profession. There is a great value of a graphic designer not only in our country but also across the whole world. To be an expert designer one has to have a heart of creativity and excellence.</p>
                <a href="graphic_design.html">Read More</a>
              </div>
            </div>
          </div>
        </div>


        <!-- Web Design -->
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/web-design.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>Web Design</h3>
                <p>Web design refers to the design of websites that are displayed on the internet. Through designing these websites you can bring out your creativity. To enrich your career bestupp learning will give you the opportunity of learning to design</p>
                <a href="web_design.html">Read More</a>
              </div>
            </div>
          </div>
        </div>


        <!-- App development -->
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/app-development.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>App development</h3>
                <p>with the world going mobile ,the importance of app is increasing day by day. App development is a process for building mobile applications that run on mobile devices. These applications can either be pre-installed</p>
                <a href="app_development.html">Read More</a>
              </div>
            </div>
          </div>
        </div>


        <!-- Freelancing -->
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/freelancing.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>Freelancing</h3>
                <p>We can easily understand how to earn dollars with a computer at home.  Freelancing is a familiar word in today's world. Millions of people are now joining freelancing and they are becoming self-sufficient by freelancing and meeting the needs of the family.
                  </p>
                <a href="freelancing.html">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="course_btn text-center">
        <a href="course.html">All Courses</a>
      </div>
    </div>
  </section>
  <!-- Courses Part End -->


  <!-- Student Ragistration Part Start -->
  <section id="student_ragistration">
    <div class="container">
      <div class="section_heading text-center">
        <h2>Student <span>Registration</span></h2>
        <p>Every moment of life should be used properly</p>
      </div>
      <div class="row">
        <div class="col-md-12 d-none d-md-block">
          <div class="student_ragistration_form">
            <form action="#">
              <div class="row margin_top">
                <div class="col-md-6">
                  <div class="reg_form">
                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="studentName" placeholder="Full Name">
                      <label for="studentName">Full Name</label>
                    </div>

                    <div class="form-floating admission_input">
                      <input type="date" class="form-control" id="studentDateOfBirth" placeholder="Date of Birth">
                      <label for="studentDateOfBirth">Date of Birth</label>
                    </div>

                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="studentWhatsappNumber" placeholder="Mobile Number">
                      <label for="studentWhatsappNumber">Whatsapp Number</label>
                    </div>

                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="studentNationality" placeholder="Mobile Number">
                      <label for="studentNationality">Nationality</label>
                    </div>

                    <div class="form-floating admission_input">
                      <select class="form-select" id="studentDay" aria-label="Floating label select example">
                        <option selected disabled>-Select One-</option>
                        @foreach ($dayschedules as $dayschedule)
                        <option value="{{ $dayschedule->id }}">{{ $dayschedule->name }}</option>
                        @endforeach
                      </select>
                      <label for="studentDay">Day</label>
                    </div>

                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="studentGuardianName" placeholder="Guardian Name">
                      <label for="studentGuardianName">Guardian Name</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
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
                      <input type="text" class="form-control" id="studentAddress" placeholder="Address">
                      <label for="studentAddress">Address</label>
                    </div>

                    <div class="form-floating admission_input">
                      <select class="form-select" id="studentCourse" aria-label="Floating label select example">
                        <option selected disabled>-Select One-</option>
                        @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                      </select>
                      <label for="studentCourse">Name of Course</label>
                    </div>

                    <div class="form-floating admission_input">
                      <div class="form-floating admission_input">
                        <input type="time" class="form-control" id="studentTime" placeholder="Time">
                        <label for="studentTime">Time</label>
                      </div>
                    </div>

                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="studentGuardianNumber"
                        placeholder="Guardian Phone Number">
                      <label for="studentGuardianNumber">Guardian Phone Number</label>
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

        <!-- For Small Device Start -->
        <div class="col-md-12 d-md-none">
          <div class="student_ragistration_form">
            <form action="#">
              <div class="row margin_top">
                <div class="col-md-12">
                  <div class="reg_form">
                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="studentName" placeholder="Full Name">
                      <label for="studentName">Full Name</label>
                    </div>

                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="regFatherName" placeholder="Father Name">
                      <label for="regFatherName">Father Name</label>
                    </div>

                    <div class="form-floating admission_input">
                      <input type="date" class="form-control" id="studentDateOfBirth" placeholder="Date of Birth">
                      <label for="studentDateOfBirth">Date of Birth</label>
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
                      <input type="text" class="form-control" id="studentWhatsappNumber" placeholder="Mobile Number">
                      <label for="studentWhatsappNumber">Whatsapp Number</label>
                    </div>

                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="studentAddress" placeholder="Address">
                      <label for="studentAddress">Address</label>
                    </div>

                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="studentNationality" placeholder="Mobile Number">
                      <label for="studentNationality">Nationality</label>
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

                    <div class="form-floating admission_input">
                      <select class="form-select" id="studentDay" aria-label="Floating label select example">
                        <option selected>-Select One-</option>
                        <option value="SAT - TUE">SAT - TUE - FRI</option>
                        <option value="SUN - WED">SUN - TUE - THU</option>
                        <option value="SUN - WED">MON - WED - FRI</option>
                        <option value="SUN - WED">TUE - THU - SAT</option>
                        <option value="SUN - WED">WED - FRI - SUN</option>
                        <option value="SUN - WED">THU - SAT - MON</option>
                        <option value="SUN - WED">FRI - SUN - TUE</option>
                      </select>
                      <label for="studentDay">Day</label>
                    </div>

                    <div class="form-floating admission_input">
                      <select class="form-select" id="studentTime" aria-label="Floating label select example">
                        <option selected>-Select One-</option>
                        <option value="06:00 pm">06:00 pm</option>
                        <option value="06:00 pm">06:00 pm</option>
                        <option value="06:00 pm">06:00 pm</option>
                        <option value="06:00 pm">06:00 pm</option>
                        <option value="06:00 pm">06:00 pm</option>
                        <option value="06:00 pm">06:00 pm</option>
                        <option value="06:00 pm">06:00 pm</option>
                      </select>
                      <label for="studentTime">Time</label>
                    </div>

                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="studentGuardianName" placeholder="Guardian Name">
                      <label for="studentGuardianName">Guardian Name</label>
                    </div>

                    <div class="form-floating admission_input">
                      <input type="text" class="form-control" id="studentGuardianNumber"
                        placeholder="Guardian Phone Number">
                      <label for="studentGuardianNumber">Guardian Phone Number</label>
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
        <!-- For Small Device End -->
      </div>
    </div>
  </section>
  <!-- Student Ragistration Part End -->


  <!-- Download App Part Start -->
  <section id="download_app">
    <div class="app_overly">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 m-auto">
            <div class="app_content">
              <h3>Download app from the <span>Google Play Store</span></h3>
              <p>Bestupp always works towards building your beautiful career. our support team is always ready to solve your problems in a timely manner. to learn more about your preferred course, visit our bestupp app.</p>
              <div class="app_btn">
                <a href="#" class="main_btn"><span>
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
  </section>
  <!-- Download App Part End -->

  @endsection