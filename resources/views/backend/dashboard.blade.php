@extends('layouts.master')
@section('title', "Dashboard")

@section('content')

  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('dashboard') }}">{{ config('app.name') }}</a>
    <span class="breadcrumb-item active">Dashboard</span>
  </nav>

  <div class="sl-pagebody">

    @role('teacher')
    @if ($teacher->status == 1)
    <div class="row mb-3">
      <div class="col-12">
        <div class="card bg-warning">
          <div class="card-body">
            <h5 class="text-white">Pending Your Request. - Request Type: {{ auth()->user()->roles->pluck('name') }}</h5>
          </div>
        </div>
        
      </div>
    </div>
    @elseif ($teacher->status == 2)
    <div class="row mb-3">
      <div class="col-12">
        <div class="card bg-success">
          <div class="card-body">
            <h5 class="text-white">You are Selected. - Account Type: {{ auth()->user()->roles->pluck('name') }}
            </h5>
          </div>
        </div>
        
      </div>
    </div>
    @elseif ($teacher->status == 3)
    <div class="row mb-3">
      <div class="col-12">
        <div class="card bg-danger">
          <div class="card-body">
            <h5 class="text-white">You are Rejected. - Request Type: {{ auth()->user()->roles->pluck('name') }}</h5>
          </div>
        </div>
        
      </div>
    </div>
    @endif
    
    @endrole

    @role('student')
    <div class="row mb-3">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5>Welcome {{ auth()->user()->name }} - Account Type: {{ auth()->user()->roles->pluck('name') }}
              <a href="{{ route('frontend.all.course') }}" target="_blank" class="float-right btn btn-primary btn-sm">Buy Course</a>
            </h5>
          </div>
        </div>
        <div class="card mt-2">
          <div class="card-body">
            <h5>Your Student Id:  {{  auth()->user()->student->student_id}}
            </h5>
          </div>
        </div>
        
      </div>
    </div>

    @if(empty(auth()->user()->student->id) )
     <div class="row mb-3">
      <div class="col-12">
        <div class="card bg-warning">
          <div class="card-body">
            <h5 class="text-white float-left">Set Your Student information..</h5>
            <a href="{{ route('dashboard.student.information.edit') }}"  class="float-right btn btn-primary btn-sm">Update Information</a>
          </div>
        </div>
        
      </div>
    </div>
    @endif

    @endrole

   @role('super-admin')
   <div class="row row-sm">
    <div class="col-sm-6 col-xl-3">
      <div class="card pd-20 bg-primary">
        <div class="d-flex justify-content-between align-items-center mg-b-10">
          <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Sales</h6>
          <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
        </div><!-- card-header -->
        <div class="d-flex align-items-center justify-content-between">
          <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
          <h3 class="mg-b-0 tx-white tx-lato"> {{ $sales->sum('bdt') }} <br> BDT</h3>
        </div><!-- card-body -->
        
      </div><!-- card -->
    </div><!-- col-3 -->
    <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
      <div class="card pd-20 bg-info">
        <div class="d-flex justify-content-between align-items-center mg-b-10">
          <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Full Paid</h6>
          <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
        </div><!-- card-header -->
        <div class="d-flex align-items-center justify-content-between">
          <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
          <h3 class="mg-b-0 tx-white tx-lato tx-bold">
              {{ $sales->where('status', 2)->sum('bdt') }} <br> BDT
          </h3>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col-3 -->
    <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
      <div class="card pd-20 bg-purple">
        <div class="d-flex justify-content-between align-items-center mg-b-10">
          <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Due</h6>
          <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
        </div><!-- card-header -->
        <div class="d-flex align-items-center justify-content-between">
          <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
          <h3 class="mg-b-0 tx-white tx-lato tx-bold">
            {{ $sales->where('status', 1)->sum('bdt') }} <br> BDT
          </h3>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col-3 -->
    <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
      <div class="card pd-20 bg-sl-primary">
        <div class="d-flex justify-content-between align-items-center mg-b-10">
          <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Student</h6>
          <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
        </div><!-- card-header -->
        <div class="d-flex align-items-center justify-content-between">
          <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
          <h3 class="mg-b-0 tx-white tx-lato tx-bold">
            {{ count($students) }}
          </h3>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col-3 -->
  </div><!-- row -->
   @endrole

  </div><!-- sl-pagebody -->
  
@endsection