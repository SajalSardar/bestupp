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

      <div class="card pd-20 pd-sm-40">
            <table class="table table-bordered">
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
                @forelse ( $datas as $data)
                <tr>    
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->course->name }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->mobile }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->created_at->diffForHumans() }}</td>
                    
                    <td>
                      <a href="#">Delete</a>
                    </td>
                </tr>
                @empty
                    
                @endforelse
            </table>
      </div> 
    </div>
    
@endsection

