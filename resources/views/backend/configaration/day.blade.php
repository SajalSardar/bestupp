@extends('layouts.master')
@section('title', "Add Day Schedul")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Schedul</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Add Schedul</h5>
      </div>

      <div class="card pd-20 pd-sm-40">
        <form action="{{ route('dashboard.day.schedul.store') }}" method="POST">
            @csrf
            <div class="form-layout">
                <div class="form-group">
                    <label class="form-control-label">Day Schedul: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="SAT - TUE - FRI">
                    @error('name')
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
                <h2>All Schedul</h2>
              </div>
              <div class="card-body">
                <table class="table">
                  <tr>
                    <th>id</th>
                    <th>Schedul Name</th>
                    <th>Action</th>
                  </tr>

                  @foreach ($datas as $data)
                  <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->name }}</td>
                    <td>
                        <a href="{{ route('dashboard.day.schedul.delete',$data->id) }}" class="btn btn-sm btn-danger">Delete</a>
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