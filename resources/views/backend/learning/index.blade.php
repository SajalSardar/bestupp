@extends('layouts.master')
@section('title', "All Free Learning Student")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Free Learning Student</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Free Larning Student List</h5>
      </div>

      <div class="card p-3">
        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" >Active Student</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#read">Mark as Read</a>
          </li>
          
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home">
            <table class="table table-bordered dataTable table-striped mt-3">
              <thead>
                <tr>    
                  <th>Id</th>
                  <th>Course Name</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>Create Date</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ( $datas as $data)
                @if ($data->status == 1)
              <tr>    
                  <td>{{ $data->id }}</td>
                  <td>{{ $data->course->name }}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->email }}</td>
                  <td>{{ $data->mobile }}</td>
                  <td>{{ $data->address }}</td>
                  <td>{{ $data->created_at->diffForHumans() }}</td>
                  
                  <td>
                    <a href="{{ route('dashboard.free.learning.read', $data->id) }}" class="btn btn-primary btn-sm">Mark as Read</a>
                    
                  </td>
              </tr>
              @endif
                  
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="read">
            <table class="table table-bordered table-striped dataTable mt-3">
              <thead>
                <tr>    
                  <th>Id</th>
                  <th>Course Name</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>Create Date</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ( $datas as $data)
                @if ($data->status == 2)
              <tr>    
                  <td>{{ $data->id }}</td>
                  <td>{{ $data->course->name }}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->email }}</td>
                  <td>{{ $data->mobile }}</td>
                  <td>{{ $data->address }}</td>
                  <td>{{ $data->created_at->diffForHumans() }}</td>
                  
                  <td>
                    <a href="{{ route('dashboard.free.learning.delete', $data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                  </td>
              </tr>
              @endif
                  
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div> 
    </div>
    
@endsection


@section('dashboard_css')
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

@endsection


@section('dashboard_js')
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  

  <script>
    $('.dataTable').DataTable({
      "order": [[ 0, "desc" ]]
    });
  </script>
@endsection
