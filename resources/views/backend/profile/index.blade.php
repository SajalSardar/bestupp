@extends('layouts.master')
@section('title', "Edit Profile")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Edit Profile</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Edit Profile</h5>
      </div>

      <div class="card pd-20 pd-sm-40">
        <form action="{{ route('dashboard.profile.update',auth()->user()->id) }}" method="POST" >
            @csrf
            <div class="form-layout">
                <div class="form-group">
                    <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="name" value="{{ auth()->user()->name }}" placeholder="Enter Your Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="email" value="{{ auth()->user()->email }}" placeholder="Enter Your Email">
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                    <label class="form-control-label">Current Password: </label>
                    <input id="password" type="password" placeholder="Enter Your Current Password" class="form-control @error('current_password') is-invalid @enderror" name="current_password"  >

                    @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                  <label class="form-control-label">New Password: </label>
                  <input id="password" type="password" placeholder="Enter Your New Password" class="form-control @error('password') is-invalid @enderror" name="password"  >

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div><!-- form-group -->
              <div class="form-group">
                  <input id="password-confirm" type="password" placeholder="Enter Your Confirm Password" class="form-control" name="password_confirmation" >
              </div><!-- form-group -->


                <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5">Submit</button>
                </div>
              </div>
        </form>
      </div>
    </div>

@endsection

@section('dashboard_js')
<script>
  $('.toast').toast('show');
</script>
@endsection
