@extends('layouts.master')
@section('title', "All Notification")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Notification</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
          <h5>All Notification</h5>
      </div>
      <div class="card mt-5">
        <div class="card-header">
          <h2>All Notification</h2>
        </div>
        <div class="card-body table-responsive">
          <table class="table">
            <tr>
              <th>id</th>
              <th>Title</th>
              <th>Image</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
            @foreach ($datas as $data)
              <tr>
                <td >{{ $data->id }}</td>
                <td >{{ $data->title }}</td>
                <td ><img src="{{ asset('storage/uploads/offer/'.$data->offer_image)}}" width="100" alt="{{ $data->title }}"></td>
                <td>{{ Str::limit($data->description, 50, '...') }}</td>
              
                <td>
                  <a href="{{ route('dashboard.student.notification.view', $data->id) }}" class="btn btn-sm btn-success">View</a>
                  
                </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
    
@endsection

@section('dashboard_js')
<script>
  $('.toast').toast('show');
</script>
@endsection