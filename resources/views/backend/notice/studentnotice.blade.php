@extends('layouts.master')
@section('title', "All Notice")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Notice</span>
    </nav>

    <div class="sl-pagebody">

    @foreach (auth()->user()->notices as $notice)
      <p>{{ $notice->title }}</p>
    @endforeach
    
    </div>
    
@endsection

@section('dashboard_js')
<script>
  $('.toast').toast('show');
</script>
@endsection