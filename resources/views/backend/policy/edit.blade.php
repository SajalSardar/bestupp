@extends('layouts.master')
@section('title', 'Privacy Policy')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
  <span class="breadcrumb-item active">Privacy Policy</span>
</nav>

<div class="sl-pagebody">
  <div class="sl-page-title">
    <h5>Update Privacy Policy</h5>
  </div>

  <div class="card pd-20 pd-sm-40">
    <form action="{{ route('dashboard.update.privacy.policy',$Policy->id) }}" method="POST" >
        @csrf
        <div class="form-layout">
            <div class="form-group">
                <label class="form-control-label">Title:</label>
                <input class="form-control" type="text" name="title" value="{{ $Policy->title }}" placeholder="Section Title">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            <div class="form-group">
                <label class="form-control-label">Privacy Policy:</label>
               <textarea id="summernote" name="privacy_policy" id="" class="form-control">{{ $Policy->privacy_policy }}</textarea>
                @error('privacy_policy')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
  
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Update</button>
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