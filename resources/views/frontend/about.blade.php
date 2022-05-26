@extends('layouts.frontapp')
@section('title', "About Us")
@section('content')
 <!-- Contact Banaer page Strat -->
 <section id="single_banner_page">
    <div class="single_banner_page_overly">
      <div class="single_banner_text">
        <h1>{!! $about->section_title !!}</h1>
        <ul>
          <li><a href="{{ route('frontend.home') }}">Home</a></li>
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
      {!! $about->about_us !!}
      <div class="col-md-5">
        <div class="about_pic">
          <img src="{{asset('storage/uploads/about/'.$about->about_banner)}}" alt="{!! strip_tags($about->section_title) !!}" class="img-fluid w-100">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About part end -->
@endsection