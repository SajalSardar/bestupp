@extends('layouts.master')
@section('title', "About Us")

@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
  <span class="breadcrumb-item active">About Us</span>
</nav>

<div class="sl-pagebody">
  <div class="sl-page-title">
    <h5>Update About Section</h5>
  </div>

  <div class="card pd-20 pd-sm-40">
    <form action="{{ route('dashboard.about.update',$aboutData->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-layout">
            <div class="form-group">
                <label class="form-control-label">Section Title: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="section_title" value="{{ $aboutData->section_title }}" placeholder="Section Title">
                @error('section_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            <div class="form-group">
                <label class="form-control-label">Section Description:</label>
                <input class="form-control" type="text" name="section_description" value="{{ $aboutData->section_description }}" placeholder="Section Description">
                @error('section_description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label">Home Page About Us:</label>
               <textarea class="summernote" name="about_us" id="" class="form-control">{{ $aboutData->about_us }}</textarea>
                @error('about_us')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label">About Image:</label>
                <input class="form-control" type="file" name="banner_image">
                @error('banner_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <img src="{{ asset('storage/uploads/about/'. $aboutData->about_banner) }}" width="100" alt="">
              </div>
  
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Uplode</button>
            </div>
          </div>
    </form>
  </div> 
</div>


<div class="sl-pagebody">
  <div class="sl-page-title">
    <h5>Add About Page Content</h5>
  </div>

  <div class="card pd-20 pd-sm-40">
    <form action="{{ route('dashboard.about.content.insert') }}" method="POST">
        @csrf
        <div class="form-layout">
            <div class="form-group">
                <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="title" placeholder="Title">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            <div class="form-group">
                <label class="form-control-label">Description:</label>
               <textarea class="summernote" name="description" class="form-control"></textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
  
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Add Info</button>
            </div>
          </div>
    </form>
  </div> 
</div>


<div class="sl-pagebody">
  <div class="sl-page-title">
    <h5>About Page Content</h5>
  </div>

  <div class="card pd-20 pd-sm-40 table-responsive">
    <table class="table table-striped table-bordered">
      <tr>
        <th>Id</th>
        <th>Ttile</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
      @foreach ($aboutPageContent as $aboutPageContent)
        <tr>
          <td>{{ $aboutPageContent->id }}</td>
          <td>{{ $aboutPageContent->title }}</td>
          <td>{!! Str::limit($aboutPageContent->description, 100, '...') !!}</td>
          <td>
            <a href="{{ route('dashboard.about.content.edit', $aboutPageContent->id) }}" class="btn btn-sm btn-primary">Edit</a>
            <a href="{{ route('dashboard.about.content.delete', $aboutPageContent->id) }}" class="btn btn-sm btn-warning">Delete</a>
          </td>
        </tr>
      @endforeach
    </table>
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