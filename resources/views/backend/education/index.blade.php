@extends('layouts.master')
@section('title', "Add Education")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Add Education</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Add Education</h5>
      </div>

      <div class="card pd-20 pd-sm-40">
        <form action="{{ route('dashboard.teachereducation.store') }}" method="POST">
            @csrf
            <div class="form-layout">
                <div class="form-group">
                    <label class="form-control-label">Education: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Education Name">
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
                <h2>All Education</h2>
              </div>
              <div class="card-body">
                <table class="table">
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($datas as $data)
                    <tr>
                        <td >{{ $data->id }}</td>
                        <td >{{ $data->name }}</td>
                        <td >
                          <form action="{{ route('dashboard.teachereducation.destroy',$data->id ) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"> Delete</button>
                          </form>
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