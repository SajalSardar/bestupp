@extends('layouts.master')
@section('title', "All Orders")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">All Order</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>All Orders</h5>
      </div>

      <div class="card p-3">
        <table class="table table-striped table-bordered dataTable2">
          <thead>
            <tr>    
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Course Title</th>
              <th>Course Free</th>
              <th>Course Day</th>
              <th>Course Time</th>
              <th>Admission Date</th>
              <th>Action</th>
          </tr>
          </thead>
          
          <tbody>
            @foreach( $orders as $order)
            <tr>    
              <td>{{ $order->id }}</td>
              <td>{{ $order->user->name }}</td>
              <td>{{ $order->user->email }}</td>
              <td> {{ $order->user->student->mobile ?? '' }} </td>
              <td>{{ $order->course->name }}</td>
              <td>{{ $order->price }}</td>
              <td>{{ $order->selected_day }}</td>
              <td>{{ $order->selected_time->format('h:i') }}</td>
              <td>{{ $order->created_at->format('d-m-Y') }}</td>
              <td>
                <a href="" class="btn btn-sm btn-primary">Manage</a>
              </td>
          </tr>
          @endforeach
          </tbody>
      </table>
      </div> 
    </div>

  @endsection

     
@section('dashboard_css')
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('dashboard_js')
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
  $('.dataTable2').DataTable({
    "order": [[ 0, "desc" ]]
  });
</script>
@endsection
    
