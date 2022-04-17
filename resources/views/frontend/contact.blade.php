@extends('layouts.frontapp')
@section('title', "Student Registration")
@section('content')




    <!-- Contact Banaer page Strat -->
  <section id="single_banner_page">
    <div class="single_banner_page_overly">
      <div class="single_banner_text">
        <h1>Contact</h1>
        <ul>
          <li><a href="{{ route('frontend.home') }}">Home</a></li>
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
            <form action="{{ route('frontend.contact.store') }}" method="POST">
              @csrf
            <div class="form-floating admission_input">
              <input type="text" class="form-control" id="contFristName" placeholder="Frist Name" name="name">
              <label for="contFristName">Full Name</label>
              @error('name')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>


            <div class="form-floating admission_input">
              <input type="text" class="form-control" id="contMobNumber" placeholder="Mobile Number" name="mobile">
              <label for="contMobNumber">Mobile Number</label>
              @error('mobile')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-floating admission_input">
              <input type="text" class="form-control" id="contEmail" placeholder="E-Mail" name="email">
              <label for="contEmail">E-Mail</label>
              @error('email')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-floating admission_input">
              <textarea class="form-control" placeholder="Leave a comment here" id="contMassage" name="message"></textarea>
              <label for="contMassage">Message</label>
              @error('message')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>

            <button class="main_btn payment_btn" type="submit">Submit</button>
          </form>
          </div>
        </div>
      </div>
</div>
</section>

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
  let myAlert = document.querySelector('.toast');
  let bsAlert = new  bootstrap.Toast(myAlert);
  bsAlert.show();

</script>
@endsection