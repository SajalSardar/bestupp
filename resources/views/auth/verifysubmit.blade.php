@extends('layouts.master')
@section('title', 'verified')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body mt-3">
                   
                    <form  method="POST" action="{{ route('dashboard.verify.code.update') }}">
                        @csrf
                        <input type="text" class="form-control" placeholder="Enter Your Code" name="verify_token" required>
                        <button type="submit" class="btn  btn-primary mt-3">{{ __('Submit') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
