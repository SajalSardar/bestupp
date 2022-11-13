@extends('layouts.master')
@section('title', "Upload Offer")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Upload Offer</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Upload Offer</h5>
      </div>

      <div class="card pd-20 pd-sm-40">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="form-group">
                    <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Enter Offer Title">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Offer description: <span class="tx-danger"></label>
                    <textarea name="description"  rows="6" class="form-control"></textarea>
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
                  </div>

                  <div class="form-group">
                    <label>
                    <input type="checkbox" name="home_popup"> Display Home Page Popup?
                  </label>
                  </div>
      
                <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5">Submit</button>
                </div>
              </div>
        </form>
      </div> 


          <div class="card mt-5">
            <div class="card-header">
              <h2>All Offers</h2>
            </div>
            <div class="card-body table-responsive">
              <table class="table">
                <tr>
                  <th>id</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Description</th>
                  <th>Display Home</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                @foreach ($datas as $data)
                  <tr>
                    <td >{{ $data->id }}</td>
                    <td >{{ $data->title }}</td>
                    <td ><img src="{{ asset('storage/uploads/offer/'.$data->offer_image)}}" width="100" alt="{{ $data->title }}"></td>
                    <td>{{ Str::limit($data->description, 50, '...') }}</td>
                    <td>{{ $data->home_popup ? "Display Home" : '--' }}</td>
                    
                    <td>
                      <span class="btn btn-sm {{ $data->status == 1 ? "btn-primary" : "btn-warning"}}">{{ $data->status == 1 ? "Active" : "Deactive"}}</span>
                    </td>
                    <td>
                      <a href="{{ route('dashboard.edit.offer', $data->id) }}" class="btn btn-sm btn-success">Edit</a>
                      <form class="d-inline" action="{{ route('dashboard.delete.offer', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="cursor: pointer" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                      <a href="{{ route('dashboard.status.offer', $data->id) }}" class="btn btn-sm {{ $data->status == 1 ? "btn-warning" : "btn-primary"}}">{{ $data->status == 1 ? "Deactive" : "Active"}}</a>
                      
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
    
      
    </div>
    
@endsection

@section('dashboard_js')
<script>
  $('.toast').toast('show');
</script>
@endsection