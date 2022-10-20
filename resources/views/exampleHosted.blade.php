@extends('layouts.frontapp')

@section('content')
<section>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Continue To Checkout</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 order-md-2 mb-4">
                
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach ($cartDatas as $cartData)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ strip_tags($cartData->course->name) }}</h6>
                            
                        </div>
                        <span class="text-muted">
                            @foreach ($cartData->course->installments as $installment)
                                @if ($installment->pay_date == 1 && $installment->status == 1)
                                    {{ $installment->bdt  }}
                                    <small class="text-muted d-block">1st Installment.</small>
                                @endif
                            @endforeach
                           
                        </span>
                    </li>
                    @endforeach
                    
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (BDT)</span>
                        <strong>{{ $total_amount }} TK</strong>
                    </li>
                </ul>
                
            </div>
            <div class="col-md-6 order-md-1">
                <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">Full name</label>
                            <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder=""
                                   value="{{ auth()->user()->name }}" required>
                            <div class="invalid-feedback">
                                Valid customer name is required.
                            </div>
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="mobile">Mobile</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+88</span>
                            </div>
                            <input type="text" name="customer_mobile" class="form-control" id="mobile" placeholder="Mobile"
                                   value="{{ auth()->user()->student->mobile }}" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Your Mobile number is required.
                            </div>
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted"></span></label>
                        <input type="email" name="customer_email" class="form-control" id="email"
                               placeholder="you@example.com" value="{{ auth()->user()->email }}" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                               value="{{ auth()->user()->student->address }}" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label><input type="checkbox" name="check"> I have read and  agree to the website <a href="{{ route('frontend.terms.condition') }}">terms and conditions</a>, <a href="{{ route('frontend.privacy.policy') }}" target="_blank">privacy and policy</a>, <a href="{{ route('frontend.return.refund') }}" target="_blank">return and refund policy</a> </label>
                        @error('check')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button class="btn enroll_btn btn-block mb-5" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </div>    
</section> 
@endsection
