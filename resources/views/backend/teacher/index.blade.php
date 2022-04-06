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

      <div class="card pd-20 pd-sm-40">
            <table class="table table-bordered">
                <tr>    
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
                @forelse ( $teachers as $teacher)
                <tr>    
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->user->name }}</td>
                    <td>{{ $teacher->user->email }}</td>
                    <td>{{ $teacher->user->created_at->diffForHumans() }}</td>
                    <td>{{ $teacher->mobile }}</td>
                    <td>
                      <a href="#"></a>
                    </td>
                    
                    
                </tr>
                @empty
                    
                @endforelse
            </table>
      </div> 
    </div>
    
@endsection

