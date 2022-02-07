@extends('layouts.master')
@section('title', "Create Course")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">All Course</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>All Course</h5>
      </div>

      <div class="card pd-20 pd-sm-40">
            <table class="table table-bordered">
                <tr>    
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Duration</th>
                    <th>Total Class</th>
                    <th>Course Fee</th>
                    <th>Action</th>
                </tr>
                @forelse ( $datas as $data)
                <tr>    
                    <td>{{ $data->id }}</td>
                    <td><img src="{{ $data->banner_image }}" height="50" alt=""></td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->duration }}</td>
                    <td>{{ $data->total_class }}</td>
                    <td>{{ $data->course_fee }} BDT</td>
                    <td>
                      <a href="" class="btn btn-sm btn-{{ $data->status==1 ? 'warning' : 'primary' }}">
                        {{ $data->status == 1 ? "Deactive" : "Active"}}
                      </a>
                      <a href="{{ route("dashboard.course.edit", $data->id) }}" class="btn btn-sm btn-primary">View</a>
                      <a href="{{ route("dashboard.course.edit", $data->id) }}" class="btn btn-sm btn-info">Edit</a>
                      <a href="{{ route("dashboard.course.destroy", $data->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                    
                </tr>
                @empty
                    
                @endforelse
            </table>
      </div> 
    </div>
    
@endsection

