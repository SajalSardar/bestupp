@extends('layouts.master')
@section('title', "Theme Options")

@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
  <span class="breadcrumb-item active">Update Theme Options</span>
</nav>

<div class="sl-pagebody">
  <div class="sl-page-title">
    <h5>Update Theme Options</h5>
  </div>

  <div class="card pd-20 pd-sm-40">
    <form action="{{ route('dashboard.theme.option.update',$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-layout">
            <div class="form-group row">
              <div class="col-md-6">
                <label class="form-control-label">Logo:</label>
                <input class="form-control" type="file" name="logo">
                <img src="{{ asset('storage/uploads/logo/'. $data->logo) }}" alt="">
                @error('logo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror  
              </div>    
              <div class="col-md-6">
                <label class="form-control-label">Logo Icon:</label>
                <input class="form-control" type="file" name="logo_icon">
                <img src="{{ asset('storage/uploads/logo/'. $data->logo_icon) }}" alt="">
                @error('logo_icon')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror  
              </div>    
            </div>
            <div class="form-group">
                <label class="form-control-label">Header Contact:</label>
                <input class="form-control" type="text" name="header_contact" value="{{ $data->header_contact }}" placeholder="Header Contact">
                @error('header_contact')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label">Header Slogan:</label>
               <textarea class="summernote" name="header_slogan"  class="form-control">{{ $data->header_slogan }}</textarea>
                @error('header_slogan')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label">Google Store Link:</label>
                <input class="form-control" type="text" value="{{ $data->footer_google_store_link }}" name="footer_google_store_link" placeholder="Google Store Link">
                @error('footer_google_store_link')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
              </div>
              <div class="form-group">
                <label class="form-control-label">Footer Contact:</label>
                <textarea name="footer_number" name="footer_number" class="summernote">{{ $data->footer_number }}</textarea>
                @error('footer_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label">Footer Email:</label>
                <textarea name="footer_email" name="footer_email" class="summernote">{{ $data->footer_email }}</textarea>
                @error('footer_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-control-label">Footer Site Link:</label>
                <textarea name="footer_site_link" name="footer_site_link" class="summernote">{{ $data->footer_site_link }}</textarea>
                @error('footer_site_link')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label">Footer Copyright:</label>
                <textarea name="footer_copy" name="footer_copy" class="summernote">{{ $data->footer_copy }}</textarea>
                @error('footer_copy')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
              <label class="form-control-label">Home App Part Title:</label>
              <input class="form-control" type="text" value="{{ $data->home_app_title }}" name="home_app_title" placeholder="Home App Part Title">
              @error('home_app_title')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label class="form-control-label">Home App Sub Title:</label>
              <input class="form-control" type="text" value="{{ $data->home_app_sub_title }}" name="home_app_sub_title" placeholder="Home App Sub Title">
              @error('home_app_sub_title')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label class="form-control-label">Home App Description:</label>
              <textarea name="home_app_description" class="summernote">{{ $data->home_app_description }}</textarea>
              @error('home_app_description')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group">
            <label class="form-control-label">Faq Part Title :</label>
            <input class="form-control" type="text" value="{{ $data->faq_title }}" name="faq_title" placeholder="Faq Title">
            @error('faq_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-control-label">Faq Sub Title :</label>
            <input class="form-control" type="text" value="{{ $data->faq_subtitle }}" name="faq_subtitle" placeholder="Faq Sub Title">
            @error('faq_subtitle')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-control-label">Course Title :</label>
            <input class="form-control" type="text" value="{{ $data->course_title }}" name="course_title" placeholder="Course Title">
            @error('course_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-control-label">Course Subtitle :</label>
            <input class="form-control" type="text" value="{{ $data->course_subtitle }}" name="course_subtitle" placeholder="Course Subtitle">
            @error('course_subtitle')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-control-label">Student Part Title :</label>
            <input class="form-control" type="text" value="{{ $data->student_title }}" name="student_title" placeholder="Student Part Title">
            @error('student_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-control-label">Student Subtitle:</label>
            <input class="form-control" type="text" value="{{ $data->student_subtitle }}" name="student_subtitle" placeholder="Student Part Sub  Title">
            @error('student_subtitle')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-control-label">Teacher Part Title:</label>
            <input class="form-control" type="text" value="{{ $data->teacher_title }}" name="teacher_title" placeholder="Teacher Part Title">
            @error('teacher_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-control-label">Teacher Part Sub Title:</label>
            <input class="form-control" type="text" value="{{ $data->teacher_subtitle }}" name="teacher_subtitle" placeholder="Teacher Part Sub Title">
            @error('teacher_subtitle')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
  
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Uplode</button>
            </div>
          </div>
    </form>
  </div> 
</div>
@endsection

@section('dashboard_css')
<link rel="stylesheet" href="{{ asset("backend/css/summernote-bs4.min.css")}}">
@endsection

@section('dashboard_js')
<script src="{{ asset("backend/js/summernote-bs4.min.js")}}"></script>
<script>
  $('.summernote').summernote({
      tabsize: 2,
      height: 100,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link']],
        ['view', ['fullscreen', 'codeview']]
      ]
    });
</script>
@endsection