@extends('layouts.frontapp')

@section('title', 'Privacy Policy')

@section('content')
  <!-- Contact Banaer page Strat -->
 <section id="single_banner_page">
  <div class="single_banner_page_overly">
    <div class="single_banner_text">
      <h1>{!! $policy->title !!}</h1>
      <ul>
        <li><a href="{{ route('frontend.home') }}">Home</a></li>
        <li class="diseble"><span>/</span> Privacy Policy</li>
      </ul>
    </div>
  </div>
</section>
<!-- Contact Banaer page End -->

<section id="about_page">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      {!! $policy->privacy_policy !!}
    </div>
  </div>
</div>
</section>

@endsection