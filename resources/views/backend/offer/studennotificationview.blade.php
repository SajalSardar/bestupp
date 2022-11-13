@extends('layouts.master')
@section('title', "Notice")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Notification</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
          <h5>Notification</h5>
      </div>
          <div class="card mb-3">
              <div class="card-header">
                <h6>{{ $data->title }}</h6>
              </div>
              <div class="card-body">
                {!! $data->description !!}
                <div>
                  <img  class="mt-5" src="{{ asset('storage/uploads/offer/'.$data->offer_image)}}" width="300" alt="{{ $data->title }}">
                </div>
              </div>
          </div>
    </div>
    
@endsection

@section('dashboard_js')
<script>
  $('.toast').toast('show');
</script>
@endsection