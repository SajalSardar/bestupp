@extends('layouts.frontapp')
@section('title', "All Courses")
@section('content')
<!-- Contact Banaer page Strat -->
<section id="single_banner_page">
    <div class="single_banner_page_overly">
      <div class="single_banner_text">
        <h1>{{ $data->name }}</h1>
        <ul>
          <li><a href="{{ route('frontend.home') }}">Home</a></li>
          <li><a href="{{ route('frontend.all.course') }}"><span>/</span>All Courses</a></li>
          <li class="diseble"><span>/</span>{{ $data->name }}</li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Contact Banaer page End -->

  <!-- Kid's Learning Details part Start -->
  <section id="courses_details">
    <div class="container">
      <div class="section_heading text-center">
        <h2>{{ $data->name }}</h2>
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
                      {{-- @foreach (json_decode($data->installments) as $installment)
                      <li>
                        <div class="icon">
                          <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                        </div>
                        <div class="text">
                          <p>{{ $installment }}</p>
                        </div>
                      </li>
                      @endforeach --}}

                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Kid's Learning Details part end -->


@endsection