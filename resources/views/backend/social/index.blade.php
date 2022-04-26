@extends('layouts.master')
@section('title', "Social Network")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Social Network</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Social Network</h5>
      </div>

      <div class="card pd-20 pd-sm-40">
        <form action="{{ route('dashboard.social.store') }}" method="POST">
            @csrf
            <div class="form-layout">
                <div class="form-group">
                    <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter Social Media Name">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                  <label class="form-control-label">Media Link: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="link" value="{{ old('link') }}" placeholder="Enter Media Link">
                  @error('link')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>
      
                <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5">Add</button>
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
                <h2>All Social Media</h2>
              </div>
              <div class="card-body">
                <table class="table">
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($datas as $data)
                    <tr>
                      <td >{{ $data->id }}</td>
                      <td >{{ $data->name }}</td>
                      <td >{{ $data->link }}</td>
                      <td>
                        <a href="{{ route('dashboard.social.delete', $data->id) }}" class="btn btn-sm btn-danger">Delete</a>
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