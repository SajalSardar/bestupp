@extends('layouts.master')
@section('title', "All Student")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">All Students</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>All Students</h5>
      </div>

      <div class="card p-3">

        <table class="table table-striped table-bordered dataTable">
          <thead>
           <tr>    
             <th>Id</th>
             <th>Name</th>
             <th>Email</th>
             <th>Created</th>
             <th>Mobile</th>
             <th>Action</th>
         </tr>
          </thead>
           <tbody>
           @foreach ($students as $student)
              <tr>    
                <td>{{ $student->id }}</td>
                <td>{{ $student->user->name }}</td>
                <td>{{ $student->user->email }}</td>
                <td>{{ $student->user->created_at->diffForHumans() }}</td>
                <td>{{ $student->mobile }}</td>
                <td>
                  <a href="{{ route('dashboard.students.manage', $student->id) }}" class="btn btn-primary btn-sm"> Manage Student</a>
                </td>
                
                
            </tr>
               
           @endforeach
           </tbody>
       </table>  
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
