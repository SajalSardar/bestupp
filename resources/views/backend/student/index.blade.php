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
                @forelse ( $students as $student)
                <tr>    
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->user->name }}</td>
                    <td>{{ $student->user->email }}</td>
                    <td>{{ $student->user->created_at->diffForHumans() }}</td>
                    <td>{{ $student->mobile }}</td>
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

