@extends('layouts.frontapp')
@section('title', "All Courses")
@section('content')
<!-- Contact Banaer page Strat -->
<section id="single_banner_page">
    <div class="single_banner_page_overly">
      <div class="single_banner_text">
        <h1>All Courses</h1>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li class="diseble"><span>/</span>All Courses</a></li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Contact Banaer page End -->


  <!-- Courses Part Start -->
  <section id="courses">
    <div class="container">
      <div class="section_heading text-center">
        <h2>Our <span>Courses</span></h2>
        <p>Every moment of life should be used properly</p>
      </div>
      <div class="row">

        @foreach ($courses as $course)
        <div class="col-lg-4 col-md-6">
          <div class="courses_item_main">
            <div class="courses_item text-center">
              <div class="course_img">
                <img src="{{asset('frontend/images/kids-learning.png')}}" alt="courses-image" class="img-fluid w-100">
              </div>
              <div class="course_text">
                <h3>{{ $course->name }}</h3>
                <!-- <h4><span>Class : 48</span> <span>Duration : Six-Month</span></h4> -->
                {!! Str::limit($course->overview, 180, '...') !!} </p>
                <a href="{{ route('frontend.view.course',$course->slug) }}">Read More</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Courses Part End -->
@endsection