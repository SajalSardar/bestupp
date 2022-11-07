@extends('layouts.master')
@section('title', "Upload Offer Image")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Upload Offer Image</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Upload Offer Image</h5>
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
                    <label class="form-control-label">Offer Image: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="offer_image">
                    @error('image')
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

    <section>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2>All Offers</h2>
              </div>
              <div class="card-body table-responsive">
                <table class="table">
                  <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($datas as $data)
                    <tr>
                      <td >{{ $data->id }}</td>
                      <td >{{ $data->title }}</td>
                      <td ><img src="{{ asset('storage/uploads/offer/'.$data->offer_image)}}" width="100" alt="{{ $data->title }}"></td>
                      <td>
                        <span class="btn btn-sm {{ $data->status == 1 ? "btn-primary" : "btn-warning"}}">{{ $data->status == 1 ? "Active" : "Deactive"}}</span>
                      </td>
                      <td>

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
        </div>
      </div>
    </section>
    
@endsection

@section('dashboard_js')
<script>
  $('.toast').toast('show');
</script>
@endsection