@extends('layouts.frontapp')
@section('title', "Student Registration")
@section('content')
<!-- Contact Banaer page Strat -->
<section id="single_banner_page">
    <div class="single_banner_page_overly">
      <div class="single_banner_text">
        <h1>Payment</h1>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="course.html"><span>/</span>All Courses</a></li>
          <li class="diseble"><span>/</span>Payment</li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Contact Banaer page End -->

  <!-- Online Payment Part Start -->
  <section id="registration">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="payment_left">
            <img src="{{asset('frontend/images/Online-payment.png')}}" alt="Payment Pic" class="img-fluid w-100">
          </div>
        </div>

        <div class="col-md-6">
          <div class="admission_form">
            <h3 class="pay_headline">Online Payment</h3>

            <form action="#">
              @csrf
            <div class="form-floating admission_input">
              <input type="text" class="form-control" id="payFullName" placeholder="Frist Name">
              <label for="payFullName">Full Name</label>
            </div>

            <div class="form-floating admission_input">
              <select class="form-select" id="studentCourse" aria-label="Floating label select example">
                <option selected disabled>-Select Course-</option>
                @foreach ($courses as $course)
                  <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
              </select>
              <label for="studentCourse">Course Name</label>
            </div>

            <div class="form-floating admission_input">
              <input type="text" class="form-control" id="payMobNumber" placeholder="Mobile Number">
              <label for="payMobNumber">Mobile Number</label>
            </div>

            <div class="form-floating admission_input">
              <select class="form-select " id="bloodGroup" aria-label="Floating label select example">
                <option selected disabled>Please select</option>
              </select>
              <label for="bloodGroup">Pay For</label>
            </div>

            <div class="form-floating admission_input">
              <input type="number" class="form-control" id="payAmount" placeholder="Amount">
              <label for="payAmount">Amount</label>
            </div>

            <div class="form-floating admission_input">
              <textarea class="form-control" placeholder="Leave a comment here" id="payNote"></textarea>
              <label for="payNote">Notes</label>
            </div>

            <button class="main_btn payment_btn" type="submit">Submit</button>
          </form>
          </div>
        </div>
      </div>

</div>
</section>

  <!-- Online Payment Part End -->

@endsection

@section('frontend_js')
  <script>
    $(function(){
      $('#studentCourse').change(function() {
        
        var studentCourse = $("#studentCourse").val();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var _token = $("input[name='_token']").val();
        let Url = "/payments/course/" + studentCourse;
        $.ajax({
          url: Url,
          type: "GET",
          data: {
            _token: _token,
          },
          datatype: 'json',
          success: function(data) {
            $("#bloodGroup").append(data);
          }
        });
      });
    });
  </script>
@endsection