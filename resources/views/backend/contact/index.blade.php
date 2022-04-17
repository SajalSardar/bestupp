@extends('layouts.master')
@section('title', 'Contact Message')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
  <span class="breadcrumb-item active">Contact Mssage</span>
</nav>
<section>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h2>All Message</h2>
          </div>
          <div class="card-body">
            <table class="table">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
              </tr>
              @foreach ($datas as $data)
                <tr>
                  <td >{{ $data->id }}</td>
                  <td >{{ $data->full_name }}</td>
                  <td >{{ $data->mobile  }}</td>
                  <td >{{ $data->email  }}</td>
                  <td >{{ Str::limit($data->message, 20, '...')  }}</td>
                  <td>
                    <a href="">View</a>
                    <a href="">Delete</a>
                  </td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
