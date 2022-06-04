@extends('layouts.master')
@section('title', "Edit Information")

@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
  <span class="breadcrumb-item active">Update Information</span>
</nav>

<div class="sl-pagebody">
  <div class="sl-page-title">
    <h5>Update Information</h5>
  </div>

  <div class="card p-4">
      @if (isset($information->id))
          
      
    <form action="{{ route('dashboard.student.information.update',$information->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-layout row">
            <div class="form-group col-sm-6">
                <label class="form-control-label">Father Name:</label>
                <input class="form-control" type="text" name="fathername" value="{{ $information->fathername }}" placeholder="Father Name">
                @error('section_description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label class="form-control-label">Birth Day:</label>
               <input type="text"  name="birthday" class="form-control" value="{{ $information->birthday->isoFormat('Y-M-D') }}">
                @error('birthday')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label class="form-control-label">Gender:</label>
                <select class="form-select form-control" name="gender" >
                  <option disabled>-Select One-</option>
                  <option value="Male" {{ $information->gender == "Male" ? "selected" : "" }}>Male</option>
                  <option value="Female" {{ $information->gender == "Female" ? "selected" : "" }}>Female</option>
                </select>
                @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label class="form-control-label">Whatsapp Number:</label>
                <input type="number" name="mobile" class="form-control" placeholder="Mobile Number" value="{{ $information->mobile }}">
                @error('mobile')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label class="form-control-label">Address:</label>
                <input type="text" name="address" class="form-control" placeholder="Address" value="{{ $information->address }}">
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label class="form-control-label">Nationality:</label>
                <input type="text" class="form-control" placeholder="Nationality"  name="nationality" value="{{ $information->nationality }}">
                @error('nationality')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label class="form-control-label">Guardian Number:</label>
                <input type="text" name="guardianname" class="form-control"  placeholder="Guardian Name" value="{{ $information->guardianname }}">
                @error('guardianname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label class="form-control-label">Guardian Number:</label>
                <input type="number" name="gnumber" class="form-control" placeholder="Guardian Phone Number" value="{{ $information->gnumber }}">
                @error('gnumber')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label class="form-control-label">Profile Image:</label>
                <input class="form-control" type="file" name="profile_photo">
                @error('profile_photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <img src="{{ asset('storage/uploads/profiles/'. $information->profile_photo) }}" width="100" alt="">
              </div>
  
            <div class="form-layout-footer col-12">
              <button class="btn btn-info mg-r-5">Uplode</button>
            </div>
          </div>
    </form>
    @else
    Nai
    @endif
  </div> 
</div>
@endsection
