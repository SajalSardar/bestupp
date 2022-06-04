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
        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" >Running Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#pending" >Pending Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact">Complete Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile">Drop Out List</a>
          </li>
          
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home">
            <table class="table table-striped table-bordered dataTable2">
              <thead>
                <tr>    
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Course Title</th>
                  <th>Course Free</th>
                  <th>Schedule</th>
                  <th>Course Time</th>
                  <th>Admission Date</th>
                  <th>Action</th>
              </tr>
              </thead>
              
              <tbody>
                @foreach( $orders as $order)
                @foreach ($order->OrderInstallments as $Installment)
                @if ($order->status == 1 && ($Installment->installment == 1 && $Installment->status == 2))
                  <tr>    
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->user->email }}</td>
                    <td> {{ $order->user->student->mobile ?? '' }} </td>
                    <td>{{ strip_tags($order->course->name) ?? '' }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->selected_day }}</td>
                    <td>{{ $order->selected_time->format('h:i') }}</td>
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    <td>
                      <a href="{{ route('dashboard.order.manage', $order->id) }}" class="btn btn-sm btn-primary">Manage</a>
                    </td>
                  </tr>
                @endif
                @endforeach
              @endforeach
              </tbody>
          </table>
          </div>
          <div class="tab-pane fade show" id="pending">
            <table class="table table-striped table-bordered dataTable2">
              <thead>
                <tr>    
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Course Title</th>
                  <th>Course Free</th>
                  <th>Schedule</th>
                  <th>Course Time</th>
                  <th>Admission Date</th>
                  <th>Action</th>
              </tr>
              </thead>
              
              <tbody>
                @foreach( $orders as $order)
                @foreach ($order->OrderInstallments as $Installment)
                    @if ($Installment->installment == 1 && $Installment->status == 1)
                    <tr>    
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->user->name }}</td>
                      <td>{{ $order->user->email }}</td>
                      <td> {{ $order->user->student->mobile ?? '' }} </td>
                      <td>{{ $order->course->name ?? '' }}</td>
                      <td>{{ $order->price }}</td>
                      <td>{{ $order->selected_day }}</td>
                      <td>{{ $order->selected_time->format('h:i') }}</td>
                      <td>{{ $order->created_at->format('d-m-Y') }}</td>
                      <td>
                        <button  class="btn btn-sm btn-warning">Not Paid</button>
                      </td>
                    </tr>
                  @endif
                @endforeach
                
              @endforeach
              </tbody>
          </table>
          </div>
          <div class="tab-pane fade" id="contact">
            <table class="table table-striped table-bordered dataTable2">
              <thead>
                <tr>    
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Course Title</th>
                  <th>Course Free</th>
                  <th>Schedule</th>
                  <th>Course Time</th>
                  <th>Admission Date</th>
                  <th>Action</th>
              </tr>
              </thead>
              
              <tbody>
                @foreach( $orders as $order)
                @if ($order->status == 3)
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
                      <a href="{{ route('dashboard.order.manage', $order->id) }}" class="btn btn-sm btn-primary">Manage</a>
                    </td>
                  </tr>
                @endif
              @endforeach
              </tbody>
          </table>
          </div>
          <div class="tab-pane fade" id="profile">
            <table class="table table-striped table-bordered dataTable2">
              <thead>
                <tr>    
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Course Title</th>
                  <th>Course Free</th>
                  <th>Schedule</th>
                  <th>Course Time</th>
                  <th>Admission Date</th>
                  <th>Action</th>
              </tr>
              </thead>
              
              <tbody>
                @foreach( $orders as $order)
                @if ($order->status == 2)
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
                      <a href="{{ route('dashboard.order.manage', $order->id) }}" class="btn btn-sm btn-primary">Manage</a>
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
    
