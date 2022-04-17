@extends('layouts.master')
@section('title', "All Teacher")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">All Teacher</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>All Teacher</h5>
      </div>

      <div class="card p-3">
        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" >Active Teacher</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile">Pending Request</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact">Reject List</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home">
            <table class="table table-striped table-bordered dataTable2">
              <thead>
                <tr>    
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Created</th>
                  <th>Action</th>
              </tr>
              </thead>
              
              <tbody>
                @foreach( $teachers as $teacher)
                @if ($teacher->status == 2)
                <tr>    
                  <td>{{ $teacher->id }}</td>
                  <td>{{ $teacher->user->name }}</td>
                  <td>{{ $teacher->user->email }}</td>
                  <td>{{ $teacher->mobile }}</td>
                  <td>{{ $teacher->user->created_at->diffForHumans() }}</td>
                  <td>
                    <a href="{{ route('dashboard.teachers.view',$teacher->id ) }}" class="btn btn-sm btn-primary">Manage Teacher</a>
                  </td>
              </tr>
                @endif
              @endforeach
              </tbody>
          </table>
          </div>
          <div class="tab-pane fade" id="profile">
            <table class="table table-striped table-bordered dataTable2">
              <thead>
                <tr>    
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Created</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach( $teachers as $teacher)
                @if ($teacher->status == 1)
                <tr>    
                  <td>{{ $teacher->id }}</td>
                  <td>{{ $teacher->user->name }}</td>
                  <td>{{ $teacher->user->email }}</td>
                  <td>{{ $teacher->mobile }}</td>
                  <td>{{ $teacher->user->created_at->diffForHumans() }}</td>
                  <td>
                    <a href="{{ route('dashboard.teachers.view',$teacher->id ) }}" class="btn btn-sm btn-primary">Manage Teacher</a>
                  </td>
              </tr>
                @endif
              @endforeach
              </tbody>
          </table>
          </div>
          <div class="tab-pane fade" id="contact">
            <table class="table table-striped table-bordered dataTable2">
              <thead>
                <tr>    
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Created</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ( $teachers as $teacher)
                @if ($teacher->status == 3)
                <tr>    
                  <td>{{ $teacher->id }}</td>
                  <td>{{ $teacher->user->name }}</td>
                  <td>{{ $teacher->user->email }}</td>
                  <td>{{ $teacher->mobile }}</td>
                  <td>{{ $teacher->user->created_at->diffForHumans() }}</td>
                  <td>
                    <a href="{{ route('dashboard.teachers.view',$teacher->id ) }}" class="btn btn-sm btn-primary">Manage Teacher</a>
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
    $('.dataTable2').DataTable({
      "order": [[ 0, "desc" ]]
    });
  </script>
@endsection