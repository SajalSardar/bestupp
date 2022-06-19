@extends('layouts.master')
@section('title', "Due Notification")

@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
  <span class="breadcrumb-item active">Due Notification</span>
</nav>

<div class="sl-pagebody">
  <div class="sl-page-title">
    <h5>Due Notification</h5>
  </div>

  <div class="card pd-20 pd-sm-40">
    <form action="{{ route('dashboard.due.notification.query') }}" method="GET" >
        <div class="form-layout">
          <div class="form-group">
            <label>Select Day</label>
              <input type="date" name="day" value="{{ $_GET['day'] ?? old('day') }}" class="form-control" placeholder="">
            @error('day')
                <p class="alert text-danger">{{ $message }}</p>
            @enderror
        </div>
           
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Submit</button>
            </div>
          </div>
    </form>
  </div> 

  <div class="card px-5 pb-5 table-responsive">
   
    @if(isset($orders))

      <table class="table table-striped table-bordered dataTable2">
        <thead>
          <tr>
            <th>Name</th>
            <th>Course Name</th>
            <th>Installment No</th>
            <th>Pay Date</th>
            <th>Pay Tk</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orders as $order )
          @foreach ( $order->OrderInstallments as  $installment )
      
            <tr>
              <td>{{ $order->user->name }}</td>
              <td>{{ strip_tags($order->course->name) }}</td>
              <td>{{ $installment->installment }}</td>
              <td class="{{ $installment->paydate < now() ? 'text-danger': '' }}">{{ $installment->paydate->format('d M Y') }}</td>
              <td>{{ $installment->bdt }}</td>
              <td>
                <a href="" class="btn btn-primary btn-sm">Send Notification</a>
              </td>
            </tr>
          @endforeach
            
          @endforeach
        </tbody>
      </table>
    
      
    @endif
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

