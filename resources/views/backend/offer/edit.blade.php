@extends('layouts.master')
@section('title', "Update Offer")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Update Offer</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Update Offer</h5>
      </div>

      <div class="card pd-20 pd-sm-40">
        <form action="{{ route('dashboard.update.offer', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="form-group">
                    <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="title" value="{{ $data->title }}" placeholder="Enter Offer Title">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Offer description: <span class="tx-danger"></label>
                    <textarea name="description"  rows="6" class="form-control">{{ $data->description }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Offer Image: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="offer_image">
                    @error('offer_image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <img class="mt-4" src="{{ asset('storage/uploads/offer/'.$data->offer_image)}}" width="100" alt="{{ $data->title }}">
                  </div>

                  <div class="form-group">
                    <label>
                    <input type="checkbox" name="home_popup" {{ $data->home_popup == true ? "checked" : '' }}> Display Home Page Popup?
                  </label>
                  </div>
      
                <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5">Update</button>
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