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

      <div class="card p-3 table-responsive">

        <table class="table table-striped table-bordered dataTable">
          <thead>
           <tr>    
             <th>Id</th>
             <th>Student Id</th>
             <th>Name</th>
             <th>Email</th>
             <th>Created</th>
             <th>Mobile</th>
             <th>Action</th>
         </tr>
          </thead>
           <tbody>
           @foreach ($students as $ustudent)
              <tr>    
                <td>{{ $ustudent->id }}</td>
                <td>{{ $ustudent->student->student_id ?? '--' }}</td>
                <td>{{ $ustudent->name }}</td>
                <td>{{ $ustudent->email }}</td>
                <td>{{ $ustudent->created_at->diffForHumans() }}</td>
                <td>{{ $ustudent->student->mobile ?? ''}}</td>
                <td>
                  @if (!empty($ustudent->student->id))
                    <a href="{{ route('dashboard.students.manage', $ustudent->student->id) }}" class="btn btn-primary btn-sm"> Manage Student</a>
                    @else
                    <span>Don't provide 
                      <br> student information.</span>
                  @endif
                  
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
