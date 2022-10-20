@extends('layouts.master')

@section('title', "View Teacher")
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
  <span class="breadcrumb-item active">Teacher Information</span>
</nav>

<div class="sl-pagebody">
  <div class="sl-page-title">
    <h5>Manage Student - Course Status: <span class="badge badge-{{$orderManage->status ==1 ? "primary": ($orderManage->status ==2 ? "danger" : "success" )  }}">{{$orderManage->status ==1 ? "Running": ($orderManage->status ==2 ? "Drop Out" : "Complete" )  }}</span> 
      <a href="{{ route('dashboard.order.Running',$orderManage->id) }}" class="btn btn-primary btn-sm float-right">Running</a>
      <a href="{{ route('dashboard.order.dropout',$orderManage->id) }}" class="btn btn-danger btn-sm float-right">Drop Out</a> 
      <a href="{{ route('dashboard.order.complete',$orderManage->id) }}" class="btn btn-success btn-sm float-right">Complete</a> 
    </h5>
  </div>
  <div class="card mb-5">
    <div class="card-header">
      <h4>
        {{ strip_tags($orderManage->course->name) }}
        <span class="ml-2" style="font-weight: 400; font-size: 16px">Free: {{ $orderManage->price }}</span>
        <span class="ml-2" style="font-weight: 400; font-size: 16px">Day: {{ $orderManage->selected_day }}</span>
        <span class="ml-2" style="font-weight: 400; font-size: 16px">Time: {{ $orderManage->selected_time->isoFormat('H:MM:SS A') }}</span>
        <span class="ml-2" style="font-weight: 400; font-size: 16px">Join Date: {{ $orderManage->created_at->isoFormat('Do MMM  YY') }} </span>
      </h4>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-bordered">
        <tbody><tr>
          <th>Id</th>
          <th>Installments</th>
          <th>Pay Date</th>
          <th>Status</th>
        </tr>
        
          @foreach ($orderManage->OrderInstallments as $OrderInstallment)
          <tr>
            <td>{{ $OrderInstallment->id }}</td>
            <td>{{ $OrderInstallment->bdt }}</td>
            <td>{{ $OrderInstallment->paydate->isoFormat('Do MMM Y') }}</td>
            <td>
              @if ($OrderInstallment->status == 1)
                  <h5><span class='badge btn-warning'>Unpaid</span></h5>
                @elseif ($OrderInstallment->status == 2)
                 <h5> <span class='badge  btn-success'>Paid</span></h5>
                @endif
            </td>
          </tr>
          @endforeach
        
      </table>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h4>Student Information</h4>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <tr>
          <td width="20%"><strong>Name</strong></td>
          <td width="5%">:</td>
          <td><p>{{ $orderManage->user->name }}</p></td>
        </tr>
        <tr>
          <td width="20%"><strong>Email</strong></td>
          <td width="5%">:</td>
          <td><p>{{ $orderManage->user->email }}</p></td>
        </tr>
        <tr>
          <td width="20%"><strong>Courses</strong></td>
          <td width="5%">:</td>
          <td>
            {!! $orderManage->course->name !!}
          </td>
        </tr>
        <tr>
          <td width="20%"><strong>Mobile</strong></td>
          <td width="5%">:</td>
          <td>
            {{ $orderManage->user->student->mobile ?? '' }}
          </td>
        </tr>
        <tr>
          <td width="20%"><strong>Price</strong></td>
          <td width="5%">:</td>
          <td><p>{{ $orderManage->price }}</p></td>
        </tr>
        <tr>
          <td width="20%"><strong>Schedule</strong></td>
          <td width="5%">:</td>
          <td><p>{{ $orderManage->selected_day }}</p></td>
        </tr>
        <tr>
          <td width="20%"><strong>Time</strong></td>
          <td width="5%">:</td>
          <td><p>{{ $orderManage->selected_time->format('h:i') }}</p></td>
        </tr>
        <tr>
          <td width="20%"><strong>Admission Date</strong></td>
          <td width="5%">:</td>
          <td><p>{{ $orderManage->created_at->format('d-m-Y') }}</p></td>
        </tr>
        <tr>
          <td width="20%"><strong>Nationality</strong></td>
          <td width="5%">:</td>
          <td><p>{{ $orderManage->user->student->nationality ?? '' }}</p></td>
        </tr>
        <tr>
          <td width="20%"><strong>Guardian Name</strong></td>
          <td width="5%">:</td>
          <td><p>{{ $orderManage->user->student->guardianname ?? ''}}</p></td>
        </tr>
        <tr>
          <td width="20%"><strong>Father Name</strong></td>
          <td width="5%">:</td>
          <td><p>{{ $orderManage->user->student->fathername ?? ''}}</p></td>
        </tr>
        <tr>
          <td width="20%"><strong>Gender</strong></td>
          <td width="5%">:</td>
          <td><p>{{ $orderManage->user->student->gender ?? ''}}</p></td>
        </tr>
        <tr>
          <td width="20%"><strong>Gender Number</strong></td>
          <td width="5%">:</td>
          <td><p>{{ $orderManage->user->student->gnumber ?? ''}}</p></td>
        </tr>
        <tr>
          <td width="20%"><strong>Address</strong></td>
          <td width="5%">:</td>
          <td><p>{{ $orderManage->user->student->address ?? ''}}</p></td>
        </tr>
        <tr>
          <td width="20%"><strong>Photo</strong></td>
          <td width="5%">:</td>
          <td>
            @if (!empty($orderManage->user->student->profile_photo))
            <img width="80" src="{{ asset('storage/uploads/profiles/'. $orderManage->user->student->profile_photo) }}" alt="">
            @endif
            </td>
        </tr>
        
      </table>
    </div>
  </div> 
</div>
@endsection