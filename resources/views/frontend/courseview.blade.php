@extends('layouts.frontapp')
@section('title', strip_tags($data->name))
@section('content')
<!-- Contact Banaer page Strat -->
<section id="single_banner_page">
    <div class="single_banner_page_overly">
      <div class="single_banner_text">
        <h1>{!! $data->name !!}</h1>
        <ul>
          <li><a href="{{ route('frontend.home') }}">Home</a></li>
          <li><a href="{{ route('frontend.all.course') }}"><span>/</span>All Courses</a></li>
          <li class="diseble"><span>/</span>{!! $data->name !!}</li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Contact Banaer page End -->

  <!-- Kid's Learning Details part Start -->
  <section id="courses_details">
    <div class="container">
      <div class="section_heading text-center">
        <h2>{!! $data->name !!}</h2>
        <p>{{ $data->description }}</p>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="course_detiles_pic">
            <img src="{{ asset('storage/uploads/course/'.$data->banner_image )}}" alt="{{ $data->name }}" class="img-fluid w-100">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="course_detiles_text">
            <h3>Overview</h3>
            {!! $data->overview !!}
            <div class="row">
              <div class="col-12">
                <div class="software course_inner_item">
                  <h3>Class duration</h3>
                  <ul>
                    <li>
                      <div class="icon">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                      </div>
                      <div class="text">
                        <p>Duration: {{ $data->duration }} Months</p>
                      </div>
                    </li>
                    <li>
                      <div class="icon">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                      </div>
                      <div class="text">
                        <p>Total classes - {{ $data->total_class }}. <span>({{ $data->class_info }})</span></p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="col-12">
                <div class="module course_inner_item">
                  <h3>Course fee</h3>
                  <ul>
                    <li>
                      <div class="icon">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                      </div>
                      <div class="text">
                        <p>{{ $data->course_fee }} BDT<span>({{ $data->usdeuro }})</span></p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="marketplaces course_inner_item">
                  <h3>Payment method</h3>
                  <ul>
                      @foreach ($data->installments as $key => $installment)
                      <li>
                        <div class="icon">
                          <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                        </div>
                        <div class="text">
                          <p> {{ $key == 0 ? "1st" : ($key == 1 ? "2nd" : "3rd")  }} installment = {{ $installment->bdt }} BDT @if($installment->pay_date !=1)({{ $installment->pay_date }} days after the start of the course) @endif</p>
                        </div>
                      </li>
                      @endforeach

                  </ul>
                </div>
                
              </div>
              <div class="card mt-3">
                <div class="card-header">
                  <h5>Select Your Preferred Day and Time </h5>
                </div>
                <div class="card-body">
                  <form action="{{ route('frontend.enroll',$data->id) }}" method="GET">
                    @csrf
                    <div class="admission_input">
                      <select class="form-select" name="studentDay" required>
                        <option selected disabled>-Select One-</option>
                        @foreach ($days as $day)
                        <option value="{{ $day->name }}">{{ $day->name }}</option>
                        @endforeach
                      </select>
                      @error('studentDay')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class=" admission_input">
                      <input type="time" name="studenttime" class="form-control"  placeholder="Time" required>
                      @error('studenttime')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div>
                      <button type="submit" class="enroll_btn btn">Enroll Now</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Kid's Learning Details part end -->
<!-- Online Payment Part End -->
@if ($message = Session::get('warning'))
<div class="toast-container position-absolute top-0 end-0 p-3" style="z-index:9999;">
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="10000">
  <div class="toast-header bg-warning">
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