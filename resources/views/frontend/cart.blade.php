@extends('layouts.frontapp')
@section('title', "Cart")
@section('content')
<!-- Contact Banaer page Strat -->
<section id="single_banner_page">
    <div class="single_banner_page_overly">
      <div class="single_banner_text">
        <h1>Cart</h1>
        <ul>
          <li><a href="{{ route('frontend.home') }}">Home</a></li>
          <li class="diseble"><span>/</span>Cart</li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Contact Banaer page End -->

  <!-- Online Payment Part Start -->
  <section class="my-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          @if (session('warning'))
            <div class="alert alert-warning">{{ session('warning') }}</div>
          @endif

            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Product</th>
                      <th class="text-center">Price</th>
                      <th class="text-center">Installments</th>
                      <th class="text-center">Pay Total</th>
                      <th class="text-center">Remove</th>
                  </tr>
              </thead>
              <tbody>
                @if (count($cartDatas) > 0)
                @foreach ($cartDatas as $data)
                <tr>
                    <td>
                        <div class="cart_product">
                            <img width="50" src="{{ asset('storage/uploads/course/'.$data->course->banner_image) }}" alt="{{ $data->course->name }}">
                            <h3 ><a style="color: #5BAD3F" href="{{ route('frontend.view.course',$data->course->slug) }}">{{ $data->course->name }}</a></h3>
                            
                        </div>
                    </td>
                    <td class="text-center"><span class="price_text">{{ $data->course->course_fee }} BDT</span></td>
                    <td>
                      <ul>
                        @foreach ($data->course->installments as $key => $installment)
                          <li> {{ $key == 0 ? "1st" : ($key == 1 ? "2nd" : "3rd")  }} installment = {{ $installment->bdt }} BDT
                          </li>
                          @endforeach
                    </ul>
                    </td>
                    
                    <td class="text-center"><span class="price_text">{{ $data->course->installments->pluck('bdt')[0] }} BDT</span>
                    <p>1st Installment.</p> 
                    </td>
                    <td class="text-center course_text" >
                        <a href="{{ route('frontend.cart.delete',$data->id) }}" style="padding: 5px 10px; display: inline-block;" ><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="3" class="text-center">
                    <h5>Cart Total</h5>
                  </td>
                  <td colspan="2">
                    <h5>{{ $installmentSum }} BDT</h5>
                  </td>
                </tr>
                <tr>
                  <td colspan="5" align="right">
                    <a href="{{ url('/checkout') }}" class="enroll_btn">Prceed To Checkout</a>
                  </td>
                </tr>
                @else
                <tr>
                  <td colspan="5">
                    <h5>Empty cart</h5>
                  </td>
                </tr>
                @endif
                
              </tbody>
          </table>
        </div>
      </div>

</div>
</section>


@endsection


