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
        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" >Running Student</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact">Complete Student List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile">Drop Out List</a>
          </li>
          
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home">
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
                @if ($student->status == 1)
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
                @endif
                   
               @endforeach
               </tbody>
           </table>
          </div>

          <div class="tab-pane fade show" id="profile">
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
               @forelse ($students as $student)
                @if ($student->status == 2)
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
                @endif
                @empty
                <tr>
                  <td colspan="6"> Empty List </td>
                </tr>
                   
               @endforelse
               </tbody>
           </table>
          </div>

          <div class="tab-pane fade show" id="contact">
            <table class="table table-striped table-bordered dataTable" >
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
               @forelse ($students as $student)
                @if ($student->status == 3)
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
              
                @endif
                @empty
                <tr>
                  <td colspan="6"> Empty List </td>
                </tr>
                   
               @endforelse
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
