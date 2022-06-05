@extends('layouts.master')
@section('title', "Notice")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Notice</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
          <h5>All Notice</h5>
      </div>
          <div class="card mb-3">
              <div class="card-header">
                <h6>{{ $notice->title }}</h6>
              </div>
              <div class="card-body">
                {!! $notice->notice !!}
              </div>
          </div>
    </div>
    
@endsection

@section('dashboard_js')
<script>
  $('.toast').toast('show');
</script>
@endsection