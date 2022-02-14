@extends('layouts.frontapp')
@section('title', "Student Registration")
@section('content')
 <!-- Contact Banaer page Strat -->
 <section id="single_banner_page">
    <div class="single_banner_page_overly">
      <div class="single_banner_text">
        <h1>About Bestupp</h1>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="course.html"><span>/</span>All Courses</a></li>
          <li class="diseble"><span>/</span> About us</li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Contact Banaer page End -->

<!-- About part Start -->
<section id="about_page">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12">
        <div class="about_text_top">
          <h4>Our mission</h4>
        <p>Starting our bestupp journey by thinking about the little kids in exile. We have seen through electronic and social hwmedia at different times that the children of expatriate in different parts of the world cannot speak Bangla properly. Many cannot sing our national anthem. They have no idea about the history of our language and culture at all, because we realize that in the schools of different countries they do not teach on our own language, history, culture, they only teach on their language and the Guardians in exile are busy with their work most of the time. They are not able to give their children enough time on the language, culture, history of our lives.
          <span>In order to develop every child in a creative way through intellectual development, first of all it is necessary to use the right language. No matter where the expatriates are in the world, we will build them in Bangla language, Bangla culture, English education through our bestupp and at the same time we will present the aspects of advanced technology of our country to the world in the right way.</span>
        </p>
        </div>
      </div>
      <div class="col-md-7">
        <div class="about_text">
          <h4 class="skill_develop">Skill development</h4>
          <p>
            In this age of current technology it is possible to bring success to many impossible tasks. That is why we have to take the right steps. We have to think and move forward with a good decision in time. Then success will surely catch us. Whatever I do, I will do for myself and for the welfare of the country and the nation, so everyone has to work with the right decision, learn a full skill in addition to academic education and put themselves one step ahead. Then the right perfection will come in your life. Our bestupp will play a leading role in building your beautiful future and guiding you to the right way.
            <span>In almost every country in the world expatriates work hard for a better life but they do not get the right value for their labor. Some of the important reasons for this are weakness of English language, not knowing foreign language properly, lack of job concept, full skill weakness.</span>
            <span>Our team is always working on this skills to overcome your weaknesses. Our team will always help you become proficient through a complete online course. Computer knowledge is one of your most important requirements to get a good job abroad. So to build your better life we will teach you the computer course you need with the right instructions.</span>
          </p>
        </div>

        <div class="about_text">
          <h4>Freelancing</h4>
          <p>Everyone is now familiar with the term freelancing. Freelancing is a great way to make money online with the help of computers. This work can be done by people of any age, it requires the development of a good skill with a computer. Our bestupp works on different skill related to freelancing such as:  graphics design, web design, app development, video editing, digital marketing. First you can learn any one job well and start freelancing and build a beautiful career in the future. Our bestupp for your beautiful future in freelancing is always working towards achieving your goals. No matter where you are in the world, you can complete your online course through our bestupp, using the right technology, and position yourself from zero to full through freelancing and can successfully build yourself as a good freelancer. Our bestupp will always be by your side to build efficiently and bestupp will always play a leading role in solving the somewhat unemployed problem of the huge population of our country.</p>
        </div>
      </div>
      <div class="col-md-5">
        <div class="about_pic">
          <img src="{{asset('frontend/images/about_us.png')}}" alt="About image" class="img-fluid w-100">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About part end -->
@endsection