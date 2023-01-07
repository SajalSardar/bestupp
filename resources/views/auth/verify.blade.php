@extends('layouts.master')
@section('title', 'verified')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ auth()->user()->email ?  __('Verify Your Email Address') : __('Verify Your phone number') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <form class="d-inline"  method="POST" action="{{ route('dashboard.verify.code.update') }}">
                        @csrf
                        <input type="text" class="form-control" placeholder="Enter Your Code" name="verify_token" required>
                        <button type="submit" class="btn  btn-primary mt-3">{{ __('Submit') }}</button>.
                    </form>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn  btn-primary mt-3">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
