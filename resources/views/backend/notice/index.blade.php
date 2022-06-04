@extends('layouts.master')
@section('title', "All Notice")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Notice</span>
    </nav>

    <div class="sl-pagebody">

      
    <section>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2>All Notice</h2>
              </div>
              <div class="card-body">
                <table class="table">
                  <tr>
                    <th>Id</th>
                    <th>Sending Student Type</th>
                    <th>Title</th>
                    <th>Notice</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($notices as $data)
                    <tr>
                      <td >{{ $data->id }}</td>
                      <td >{{ $data->notice_type }}</td>
                      <td >{{ $data->title }}</td>
                      <td >{{Str::limit(strip_tags($data->notice ), 50, '...')  }}</td>
                      <td>
                        <a href="{{ route('dashboard.notice.edit',$data->id ) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('dashboard.notice.edit',$data->id ) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('dashboard.notice.destroy',$data->id ) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" style="cursor: pointer" class="btn btn-sm btn-danger">Delete</button>
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
    
    </div>
    
@endsection

@section('dashboard_js')
<script>
  $('.toast').toast('show');
</script>
@endsection