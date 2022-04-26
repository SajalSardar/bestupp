@extends('layouts.frontapp')

@section('content')
<section>
    <div class="container">
        <div class="py-5 text-center">
            <h2>EasyCheckout (Popup) - SSLCommerz</h2>
    
            <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. We have provided this
                sample form for understanding EasyCheckout (Popup) Payment integration with SSLCommerz.</p>
        </div>
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">1000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Second product</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">50</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Third item</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">150</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (BDT)</span>
                        <strong>{{ $total_amount }} TK</strong>
                    </li>
                </ul>
                <button class="your-button-class" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="/pay-via-ajax"> Pay Now
                </button>
            </div>
        </div>
    </div>    
</section> 
@endsection

@section('frontend_js')
<script>
    // var obj = {};
    // obj.cus_name = $('#customer_name').val();
    // obj.cus_phone = $('#mobile').val();
    // obj.cus_email = $('#email').val();
    // obj.cus_addr1 = $('#address').val();
    // obj.amount = $('#total_amount').val();

    // $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
    

</script>
@endsection