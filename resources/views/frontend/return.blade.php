@extends('layouts.frontapp')

@section('title', 'Terms And Condition')

@section('content')
  <!-- Contact Banaer page Strat -->
 <section id="single_banner_page">
  <div class="single_banner_page_overly">
    <div class="single_banner_text">
      <h1>Return &amp; Refund</h1>
      <ul>
        <li><a href="{{ route('frontend.home') }}">Home</a></li>
        <li class="diseble"><span>/</span> Return &amp; Refund</li>
      </ul>
    </div>
  </div>
</section>
<!-- Contact Banaer page End -->

<section id="about_page">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="about_text">
          <h4>Return &amp; Refund</h4>
          
          <h5>Cancellation &amp; Refund Policy</h5>
          <p>When a learner is not satisfied with the course purchased or accidentally purchased
            a course then the user can ask for return/ refund.</p>
            <p>In case of a wrong purchase, a transfer to another course can be done. If the
              price of the new course is:</p>
            <ul>
              <li>1. Higher than the purchased course, the user has to pay the additional
                amount to Exnin by preferred method.</li>
                <li>2. Lower than the purchased course, the additional amount will be adjust in
                  the next installment from Exnin by the preferred method.</li>
            </ul>
          <h5 class="mt-3">How To Refund:</h5>
          <p>A Refund Request will be deemed valid only if made through an email to
            support@exnin.com specifying your email address or phone number used during
            registration within 72 hours from the time of purchase.</p>
            <p>To request a refund, follow these steps on a computer:</p>
            <ul>
              <li>1. Email support@exnin.com and state the email address/phone number you
                have used to sign up and purchased course.
                </li>
                <li>2. In the email, please state why you want a refund with proper validation.
                  Refund requests are only considered valid if contacted and informed via
                  emailing within 72 hours of purchase clearly specifying your email address and
                  phone number used during registration.</li>
            </ul>
            <br>
            <p>Return &amp; Refund shall be made through within 7-14 working days of successful
              processing and approval of the refund request by Explore Next Information Ltd.
               This confirmation will be emailed to the user.</p>
        </div>
    </div>
  </div>
</div>
</section>

@endsection