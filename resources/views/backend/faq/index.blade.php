@extends('layouts.master')
@section('title', "ADD FAQ")

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">FAQ</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>FAQ</h5>
      </div>

      <div class="card pd-20 pd-sm-40">
        <form action="{{ route('dashboard.faq.store') }}" method="POST">
            @csrf
            <div class="form-layout">
                <div class="form-group">
                    <label class="form-control-label">Question: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="question" value="{{ old('question') }}" placeholder="Enter Question">
                    @error('question')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="form-control-label">Answer: <span class="tx-danger">*</span></label>
                    <textarea name="answer" style="height: 150px" class="form-control"></textarea>
                    @error('answer')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
      
                <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5">Submit</button>
                </div>
              </div>
        </form>
      </div> 
    </div>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2>All FAQ</h2>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered dataTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Question</th>
                      <th>Answer</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($datas as $data)
                    <tr>
                      <td >{{ $data->id }}</td>
                      <td >{{ $data->question }}</td>
                      <td >{{ $data->answer }}</td>
                      <td>
                        <a href="{{ route('dashboard.faq.edit', $data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('dashboard.faq.delete', $data->id) }}" class="btn btn-sm btn-danger">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
@endsection

@section('dashboard_css')
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

@endsection


@section('dashboard_js')
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  

  <script>
    $('.dataTable').DataTable({
      "order": [[ 0, "desc" ]]
    });

    $('.toast').toast('show');
  </script>
@endsection