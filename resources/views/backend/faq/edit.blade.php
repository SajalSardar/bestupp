@extends('layouts.master')
@section('title', "Edit FAQ")

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">FAQ</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>FAQ Edit</h5>
      </div>

      <div class="card pd-20 pd-sm-40">
        <form action="{{ route('dashboard.faq.update', $data->id) }}" method="POST">
            @csrf
            <div class="form-layout">
                <div class="form-group">
                    <label class="form-control-label">Question: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="question" value="{{ $data->question }}" placeholder="Enter Question">
                    @error('question')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="form-control-label">Answer: <span class="tx-danger">*</span></label>
                    <textarea name="answer" style="height: 150px" class="form-control">{{ $data->answer }}</textarea>
                    @error('answer')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
      
                <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5">Update</button>
                </div>
              </div>
        </form>
      </div> 
    </div>

@endsection

@section('dashboard_js')
<script>
  $('.toast').toast('show');
</script>
@endsection