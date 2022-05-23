@extends('layouts.master')
@section('title', "All Admin")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">All Admin</span>
    </nav>

    <section class="mt-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2>All Admin</h2>
              </div>
              <div class="card-body">
                <table class="table">
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                  </tr>
                  @foreach ($all_admin as $data)
                  @foreach ( $data->roles as $rol)
                    @if ($rol->name == 'super-admin')
                    <tr>
                      <td >{{ $data->id }}</td>
                      <td >{{ $data->name }}</td>
                      <td >{{ $data->email }}</td>
                    </tr>
                    @endif
                    @endforeach
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
@endsection