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

      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Course Name</th>
            <th>Installment No</th>
            <th>Pay Date</th>
            <th>Pay Tk</th>
            <th>Send Time</th>
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
              <td>{{ $installment->send_notification ? $installment->send_notification->diffForHumans() : "--" }}</td>
              <td>
               
                <a href="{{ route('dashboard.due.notification.send', $installment->id) }}" class="btn btn-{{ $installment->send_notification != null ? "warning" : "primary" }} btn-sm"> 
                  
                  {{ $installment->send_notification != null ? "Resend Notification" : "Send Notification" }}
                </a>
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



