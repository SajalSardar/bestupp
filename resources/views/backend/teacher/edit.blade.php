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
    <form action="{{ route('dashboard.teacher.information.update',$information->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-layout row">
            <div class="form-group col-sm-6">
                <label class="form-control-label">Courses:</label>
                <select name="courses[]" class="form-control select_2" multiple>
                    @foreach ($courses as $course)
                    <option value="{{ strip_tags($course->name) }}" 
                    
                        @foreach (json_decode($information->courses) as $courses)
                            {{ $courses == strip_tags($course->name) ? "selected" : ""}}
                        @endforeach
                        
                    >{{ strip_tags($course->name) }}</option>
                    @endforeach 
                </select>
                @error('courses')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group  col-sm-6">
                
                <label class="form-control-label">Education:</label>
                <select name="education[]" class="form-control select_2" multiple>
                    @foreach ($tEducations as $tEducation)
                    <option value="{{ $tEducation->name }}"
                        @foreach (json_decode($information->teachereducations) as $teachereducation)
                            {{ $teachereducation == $tEducation->name ? "selected" : ""}}
                        @endforeach >
                         {{ $tEducation->name }}
                    </option>
                    @endforeach 
                </select>
                @error('eduction')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label class="form-control-label">Father Name:</label>
                <input class="form-control" type="text" name="fathername" value="{{ $information->father_name }}" placeholder="Father Name">
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
                <label class="form-control-label">Number:</label>
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
                <label class="form-control-label">Parmanet Address:</label>
                <input type="text" name="parmanet_address" class="form-control" placeholder="Parmanet Address" value="{{ $information->parmanet_address }}">
                @error('parmanet_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label class="form-control-label">Nationality:</label>
                <input type="text" class="form-control" placeholder="Nationality"  name="nationality" value="{{ $information->national }}">
                @error('nationality')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label class="form-control-label">University:</label>
                <input type="text" name="university" class="form-control"  placeholder="University" value="{{ $information->university }}">
                @error('university')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-4">
                <label class="form-control-label">NID:</label>
                <input class="form-control" type="file" name="nid">
                @error('nid')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <img src="{{ asset('storage/uploads/nids/'. $information->nid) }}" width="100" alt="">
              </div>
            <div class="form-group col-sm-4">
                <label class="form-control-label">Photo:</label>
                <input class="form-control" type="file" name="photo">
                @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <img src="{{ asset('storage/uploads/profiles/'. $information->photo) }}" width="100" alt="">
              </div>
            <div class="form-group col-sm-4">
                <label class="form-control-label">Certificate:</label>
                <input class="form-control" type="file" name="certificate">
                @error('certificate')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <img src="{{ asset('storage/uploads/certificates/'. $information->certificate) }}" width="100" alt="">
              </div>
  
            <div class="form-layout-footer col-12">
              <button class="btn btn-info mg-r-5">Uplode</button>
            </div>
          </div>
    </form>
  </div> 
</div>
@endsection

@section('dashboard_css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice{
            color: #000;
            padding: 0 20px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
            color: red;
        }
    </style>
@endsection
@section('dashboard_js')
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
  
    $('.select_2').select2();

</script>
@endsection