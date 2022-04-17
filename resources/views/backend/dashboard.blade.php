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
        
      </div>
    </div>
    @endrole

   @role('super-admin|admin')
   <div class="row row-sm">
    <div class="col-sm-6 col-xl-3">
      <div class="card pd-20 bg-primary">
        <div class="d-flex justify-content-between align-items-center mg-b-10">
          <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
          <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
        </div><!-- card-header -->
        <div class="d-flex align-items-center justify-content-between">
          <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
          <h3 class="mg-b-0 tx-white tx-lato tx-bold">$850</h3>
        </div><!-- card-body -->
        
      </div><!-- card -->
    </div><!-- col-3 -->
    <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
      <div class="card pd-20 bg-info">
        <div class="d-flex justify-content-between align-items-center mg-b-10">
          <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Week's Sales</h6>
          <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
        </div><!-- card-header -->
        <div class="d-flex align-items-center justify-content-between">
          <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
          <h3 class="mg-b-0 tx-white tx-lato tx-bold">$4,625</h3>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col-3 -->
    <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
      <div class="card pd-20 bg-purple">
        <div class="d-flex justify-content-between align-items-center mg-b-10">
          <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month's Sales</h6>
          <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
        </div><!-- card-header -->
        <div class="d-flex align-items-center justify-content-between">
          <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
          <h3 class="mg-b-0 tx-white tx-lato tx-bold">$11,908</h3>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col-3 -->
    <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
      <div class="card pd-20 bg-sl-primary">
        <div class="d-flex justify-content-between align-items-center mg-b-10">
          <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
          <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
        </div><!-- card-header -->
        <div class="d-flex align-items-center justify-content-between">
          <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
          <h3 class="mg-b-0 tx-white tx-lato tx-bold">$91,239</h3>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col-3 -->
  </div><!-- row -->
   @endrole
   @role('student')
   <div class="row row-sm">
    <div class="col-sm-6 col-xl-3">
      <div class="card pd-20 bg-primary">
        <div class="d-flex justify-content-between align-items-center mg-b-10">
          <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Purchase Course</h6>
          <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
        </div><!-- card-header -->
        <div class="d-flex align-items-center justify-content-between">
          <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
          <h3 class="mg-b-0 tx-white tx-lato tx-bold">$850</h3>
        </div><!-- card-body -->
        
      </div><!-- card -->
    </div><!-- col-3 -->
    <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
      <div class="card pd-20 bg-info">
        <div class="d-flex justify-content-between align-items-center mg-b-10">
          <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Due</h6>
          <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
        </div><!-- card-header -->
        <div class="d-flex align-items-center justify-content-between">
          <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
          <h3 class="mg-b-0 tx-white tx-lato tx-bold">$4,625</h3>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col-3 -->
    <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
      <div class="card pd-20 bg-purple">
        <div class="d-flex justify-content-between align-items-center mg-b-10">
          <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Next Payment</h6>
          <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
        </div><!-- card-header -->
        <div class="d-flex align-items-center justify-content-between">
          <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
          <h3 class="mg-b-0 tx-white tx-lato tx-bold">$11,908</h3>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col-3 -->
    {{-- <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
      <div class="card pd-20 bg-sl-primary">
        <div class="d-flex justify-content-between align-items-center mg-b-10">
          <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
          <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
        </div><!-- card-header -->
        <div class="d-flex align-items-center justify-content-between">
          <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
          <h3 class="mg-b-0 tx-white tx-lato tx-bold">$91,239</h3>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col-3 --> --}}
  </div><!-- row -->
   @endrole

    <div class="row row-sm mg-t-20">
      
      {{-- <div class="col-xl-6 mg-t-20 mg-xl-t-0">
        <div class="card widget-messages mg-t-20">
          <div class="card-header">
            <span>Messages</span>
            <a href=""><i class="icon ion-more"></i></a>
          </div><!-- card-header -->
          <div class="list-group list-group-flush">
            <a href="" class="list-group-item list-group-item-action media">
              <img src="{{ asset('backend/img/img10.jpg') }}" alt="">
              <div class="media-body">
                <div class="msg-top">
                  <span>Mienard B. Lumaad</span>
                  <span>4:09am</span>
                </div>
                <p class="msg-summary">Many desktop publishing packages and web page editors now use...</p>
              </div><!-- media-body -->
            </a><!-- list-group-item -->
            
          </div><!-- list-group -->
          <div class="card-footer">
            <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-3"></i> Load more messages</a>
          </div><!-- card-footer -->
        </div><!-- card -->
      </div><!-- col-3 -->
    </div><!-- row --> --}}

  </div><!-- sl-pagebody -->
  
@endsection