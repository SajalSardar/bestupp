@extends('layouts.master')
@section('title', "Upload Banner Image")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Upload Banner</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Upload Banner Image</h5>
      </div>

      <div class="card pd-20 pd-sm-40">
        <form action="{{ route('dashboard.banner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="form-group">
                    <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="banner_title" value="{{ old('banner_title') }}" placeholder="Enter Banner Title">
                    @error('banner_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                <div class="form-group">
                    <label class="form-control-label">Banner Image: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="banner_image">
                    @error('banner_image')
                        <div class="alert alert-danger">{{ $message }}</div>
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

@section('dashboard_js')
  <script>
    $('.toast').toast('show')
  </script>
@endsection