@extends('layouts.master')
@section('title', "All Notice")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Notice</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
          <h5>All Notice</h5>
      </div>
        @forelse (auth()->user()->notices->sortBy('status') as $notice)
       
          <div class="card mb-3">
              <div class="card-header">
                <h6 style="color:{{$notice->status==1 ? "#000" : ""}}">{{ $notice->title }}</h6>
              </div>
              <div class="card-body" style="color:{{$notice->status==1 ? "#000" : ""}}">
                {!! Str::limit($notice->notice, 200, '...') !!}
              </div>
              <div class="card-footer text-right">
                <a href="{{route('dashboard.student.notice.view',$notice->id )}}" class="btn btn-sm btn-primary">Read More</a>
              </div>
          </div>
          @empty
          <div class="card mb-3">
            <div class="card-body"">
              <p>No Notice Found!</p>
            </div>
        </div>
        @endforelse
    </div>
    
@endsection

@section('dashboard_js')
<script>
  $('.toast').toast('show');
</script>
@endsection