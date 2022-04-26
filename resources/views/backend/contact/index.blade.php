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
            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" >New List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact">Mark as Read</a>
              </li>
              
            </ul>

            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home">
                <table class="table table-striped table-bordered dataTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($datas as $data)
                      @if ($data->status == 1)
                      <tr>
                        <td >{{ $data->id }}</td>
                        <td >{{ $data->full_name }}</td>
                        <td >{{ $data->mobile  }}</td>
                        <td >{{ $data->email  }}</td>
                        <td >{{ $data->message }}</td>
                        <td>
                          <a href="{{ route('dashboard.contact.markasread',$data->id ) }}" class="btn btn-sm btn-primary">Mark as Read</a>
                          <a href="{{ route('dashboard.contact.delete',$data->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade " id="contact">
                <table class="table table-striped table-bordered dataTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($datas as $data)
                    @if ($data->status == 2)
                    <tr>
                      <td >{{ $data->id }}</td>
                      <td >{{ $data->full_name }}</td>
                      <td >{{ $data->mobile  }}</td>
                      <td >{{ $data->email  }}</td>
                      <td >{{ $data->message }}</td>
                      <td>
                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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
