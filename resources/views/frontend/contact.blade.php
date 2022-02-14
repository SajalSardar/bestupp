@extends('layouts.frontapp')
@section('title', "Student Registration")
@section('content')
    <!-- Contact Banaer page Strat -->
  <section id="single_banner_page">
    <div class="single_banner_page_overly">
      <div class="single_banner_text">
        <h1>Contact</h1>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="course.html"><span>/</span>All Courses</a></li>
          <li class="diseble"><span>/</span> Contact</li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Contact Banaer page End -->

  <!-- Contact Page Part Start -->
  <section id="registration">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="contact_left">
            <img class="img-fluid" src="{{asset('frontend/images/contact.png')}}" alt="image">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="admission_form">
            <h3 class="pay_headline">Send Message</h3>
            <form action="#">
            <div class="form-floating admission_input">
              <input type="text" class="form-control" id="contFristName" placeholder="Frist Name">
              <label for="contFristName">First Name</label>
            </div>

            <div class="form-floating admission_input">
              <input type="text" class="form-control" id="contLastName" placeholder="Last Name">
              <label for="contLastName">Last Name</label>
            </div>

            <div class="form-floating admission_input">
              <input type="text" class="form-control" id="contMobNumber" placeholder="Mobile Number">
              <label for="contMobNumber">Mobile Number</label>
            </div>

            <div class="form-floating admission_input">
              <input type="text" class="form-control" id="contEmail" placeholder="E-Mail">
              <label for="contEmail">E-Mail</label>
            </div>



            <div class="form-floating admission_input">
              <textarea class="form-control" placeholder="Leave a comment here" id="contMassage"></textarea>
              <label for="contMassage">Message</label>
            </div>

            <button class="main_btn payment_btn" type="submit">Submit</button>
          </form>
          </div>
        </div>
      </div>
</div>
</section>

  <!-- Contact Page Part Start -->
@endsection