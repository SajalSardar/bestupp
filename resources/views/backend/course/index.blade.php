@extends('layouts.master')
@section('title', "Create Course")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">All Course</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>All Course </h5>
      </div>

      <div class="card p-3">
        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" >Active Course</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact">Deactive Course</a>
          </li>
          
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home">
            <table class="table table-bordered">
                <tr>    
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Duration</th>
                    <th>Total Class</th>
                    <th>Course Fee</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @forelse ( $datas as $data)
                @if ($data->status == 1)
                <tr>    
                  <td>{{ $data->id }}</td>
                  <td><img src="{{ asset('storage/uploads/course/'.$data->banner_image)  }}" height="50" alt=""></td>
                  <td>{{ strip_tags($data->name) }}</td>
                  <td>{{ $data->duration }}</td>
                  <td>{{ $data->total_class }}</td>
                  <td>{{ $data->course_fee }} BDT</td>
                  <td>
                    <span  class="btn btn-sm btn-{{ $data->status==1 ? 'primary' : 'warning' }}">
                      {{ $data->status == 1 ? "Active" : "Deactive"}}
                    </span>
                  </td>
                  <td>
                    <a href="{{ route('dashboard.course.status.update',$data->id) }}" class="btn btn-sm btn-{{ $data->status==1 ? 'warning' : 'primary' }}">
                      {{ $data->status == 1 ? "Deactive Course" : "Active Course"}}
                    </a>
                    <a href="{{ route("dashboard.course.edit", $data->id) }}" class="btn btn-sm btn-primary">View</a>
                    <a href="{{ route("dashboard.course.edit", $data->id) }}" class="btn btn-sm btn-info">Edit</a>
                    {{-- <form class="d-inline" action="{{ route("dashboard.course.destroy", $data->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form> --}}
                   
                  </td>
                  
              </tr>
                @endif
                @empty
                    
                @endforelse
            </table>
          </div>
          <div class="tab-pane fade" id="contact">
            <table class="table table-bordered">
                <tr>    
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Duration</th>
                    <th>Total Class</th>
                    <th>Course Fee</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @forelse ( $datas as $data)
                @if ($data->status == 2)
                <tr>    
                  <td>{{ $data->id }}</td>
                  <td><img src="{{ asset('storage/uploads/course/'.$data->banner_image)  }}" height="50" alt=""></td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->duration }}</td>
                  <td>{{ $data->total_class }}</td>
                  <td>{{ $data->course_fee }} BDT</td>
                  <td>
                    <span  class="btn btn-sm btn-{{ $data->status==1 ? 'primary' : 'warning' }}">
                      {{ $data->status == 1 ? "Active" : "Deactive"}}
                    </span>
                  </td>
                  <td>
                    <a href="{{ route('dashboard.course.status.update',$data->id) }}" class="btn btn-sm btn-{{ $data->status==1 ? 'warning' : 'primary' }}">
                      {{ $data->status == 1 ? "Deactive Course" : "Active Course"}}
                    </a>
                    <a href="{{ route("dashboard.course.edit", $data->id) }}" class="btn btn-sm btn-primary">View</a>
                    <a href="{{ route("dashboard.course.edit", $data->id) }}" class="btn btn-sm btn-info">Edit</a>
                    {{-- <form class="d-inline" action="{{ route("dashboard.course.destroy", $data->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form> --}}
                   
                  </td>
                  
              </tr>
                @endif
                @empty
                    
                @endforelse
            </table>
          </div>
        </div>
      </div> 
    </div>
    
@endsection

