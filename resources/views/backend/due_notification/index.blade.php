@extends('layouts.master')
@section('title', "Due Notification")

@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
  <span class="breadcrumb-item active">Due Notification</span>
</nav>

<div class="sl-pagebody">
  <div class="sl-page-title">
    <h5>Due Notification</h5>
  </div>

  <div class="card pd-20 pd-sm-40">
    <form action="{{ route('dashboard.notice.store') }}" method="POST" >
        @csrf
        <div class="form-layout">
          <div class="form-group">
            <strong>Select Student Type:</strong><br><br>
            <label>
              <input type="radio" name="notice_type" value="all"> All Student
            </label>
            <label class="ml-4">
              <input type="radio" name="notice_type" value="admitted"> Admitted by course
            </label>
            <label class="ml-4">
              <input type="radio" name="notice_type" value="none_admitted"> None Admitted
            </label>
            @error('notice_type')
                <p class="alert text-danger">{{ $message }}</p>
            @enderror
        </div>

            <div class="form-group">
                <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Title">
                @error('title')
                    <p class="alert text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label">Notice:</label>
               <textarea id="summernote" name="notice" id="" class="form-control">{{ old('notice') }}</textarea>
                @error('notice')
                    <p class="alert text-danger">{{ $message }}</p>
                @enderror
            </div>
  
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Submit</button>
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
  $('#summernote').summernote({
      tabsize: 2,
      height: 200,
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