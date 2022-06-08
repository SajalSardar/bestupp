@extends('layouts.master')

@section('title', "View Teacher")
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
  <span class="breadcrumb-item active">Student Information</span>
</nav>

<div class="sl-pagebody">
  <div class="sl-page-title">
    <h5>{{ $findStuden->user->name }}
    </h5>
  </div>

  <div class="card p-3 table-responsive">
    <table class="table table-bordered table-striped">
      <tr>
        <td width="20%"><strong>Name</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $findStuden->user->name }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Email</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $findStuden->user->email }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Courses</strong></td>
        <td width="5%">:</td>
        <td>
          @if (count($findStuden->user->orders ) <= 0)
            <p> No Course </p>
          @endif
          @foreach ($findStuden->user->orders as $order)
            <a href="{{ route('dashboard.order.manage',$order->id ) }}" class="btn btn-info btn-sm">{{ strip_tags($order->course->name) }}
              <span class="btn btn-sm btn-{{ $order->status==3 ? 'success' : 'warning' }} ">{{ $order->status == 3 ? "Complete" : "Running" }}</span>
            </a>
            
          @endforeach
         
        </td>
      </tr>
      
      <tr>
        <td width="20%"><strong>BirthDay</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $findStuden->birthday->format('d-m-Y') }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Phone</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $findStuden->mobile }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>address</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $findStuden->address }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>National</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $findStuden->nationality }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Father Name</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $findStuden->fathername }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Gender</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $findStuden->gender }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Guardian Name</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $findStuden->guardianname }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Guardian Number</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $findStuden->gnumber }}</p></td>
      </tr>
      
      <tr>
        <td width="20%"><strong>Photo</strong></td>
        <td width="5%">:</td>
        <td><img width="80" src="{{ asset('storage/uploads/profiles/'. $findStuden->profile_photo) }}" alt=""></td>
      </tr>
      
      <tr>
        <td width="20%"><strong>Created At</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $findStuden->created_at->format('d-m-Y') }}</p></td>
      </tr>
    </table>
  </div> 
</div>
@endsection