@extends('layouts.master')
@section('title', 'Our Courses')
@section('content')
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
    <span class="breadcrumb-item active">Our Courses</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Our Courses 
        <a href="{{ route('frontend.all.course') }}" target="_blank" class="float-right btn btn-primary btn-sm">Buy Course</a></h5>
    </div>
      @forelse ( $ourOrders as $order)

        <div class="card mb-5">
          <div class="card-header">
            <h5>
              {{ $order->course->name }} 
              <span class="ml-2" style="font-weight: 400; font-size: 16px">Free: {{ $order->price }}</span>
              <span class="ml-2" style="font-weight: 400; font-size: 16px">Day: {{ $order->selected_day }}</span>
              <span class="ml-2" style="font-weight: 400; font-size: 16px">Time: {{ $order->selected_time->isoFormat('H:MM:SS A') }}</span>
              <span class="ml-2" style="font-weight: 400; font-size: 16px">Join Date: {{ $order->created_at->isoFormat('Do MMM  YY') }} </span>

              <span class="float-right badge badge-{{$order->status ==1 ? "primary": ($order->status ==2 ? "danger" : "success" )  }}">{{$order->status ==1 ? "Running": ($order->status ==2 ? "Drop Out" : "Complete" )  }}</span>

            </h5>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <th>Id</th>
                <th>Installments</th>
                <th>Pay Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              @foreach ($order->order_installments as $key => $installment)
                <tr>
                  <td>{{ ++$key }}</td>
                  <td>{{ $installment->bdt }}</td>
                  <td class="{{($installment->status == 1 && $installment->paydate < now()) ? 'text-danger' : '' }}">
                    {{ $installment->paydate->isoFormat('Do MMM Y') }}</td>
                  <td>
                    @if ($installment->status == 1)
                      <h5><span class='badge btn-warning'>Unpaid</span></h5>
                    @elseif ($installment->status == 2)
                      <h5><span class='badge  btn-success'>Paid</span></h5>
                    @endif
                  </td>
                  <td>
                    @if ($installment->status == 1)
                      <a href='' class='btn btn-sm btn-{{ $installment->paydate < now() ? 'danger' : 'warning' }}'>Pay
                        Now</a>
                    @endif
                  </td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>

      @empty

        <div class="card mb-5">
          <div class="card-body">
            <h5>No Course Purchase.</h5>
          </div>
        </div>
      @endforelse

  </div>
@endsection
