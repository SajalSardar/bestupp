<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Register | {{ config('app.name') }} </title>

    <!-- vendor css -->
    <link href="{{ asset('backend/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/css/select2.min.css')}}" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/starlight.css')}}">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
        <div class="form-group">
            <input id="name" type="text" placeholder="Enter Your Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <input id="email" type="email" placeholder="Enter Your Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <input id="password" type="password" placeholder="Enter Your Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <input id="password-confirm" type="password" placeholder="Enter Your Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div><!-- form-group -->
        <div class="form-group">
            <button type="submit" class="btn btn-info btn-block">
                {{ __('Register') }}
            </button>
        <div class="mg-t-40 tx-center">Already have an account? <a href="{{ route('login') }}" class="tx-info">Sign In</a></div>
      </div><!-- login-wrapper -->
        </form>
    </div><!-- d-flex -->

    <script src="{{ asset('backend/js/jquery.js') }}"></script>
    <script src="{{ asset('backend/js/popper.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/js/select2.min.js') }}"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      });
    </script>

  </body>
</html>

