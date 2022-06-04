@extends('layouts.master')
@section('title', "Create Course")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Create Course</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Create Course</h5>
      </div>

      <div class="card pd-20 pd-sm-40">
        <form action="{{ route('dashboard.course.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="form-group">
                    <label class="form-control-label">Course Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter Banner Title">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Titile Bottom Description:</label>
                    <textarea name="description" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Course Overview:</label>
                    <textarea id="summernote" name="overview">{{ old('overview') }}</textarea>
                    @error('overview')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-control-label">Course Duration: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="number" name="duration" value="{{ old('duration') }}" placeholder="Course Duration Ex: 6">
                        @error('duration')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-control-label">Total Class Number: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="number" name="total_class" value="{{ old('total_class') }}" placeholder="Total Class Ex: 33">
                        @error('total_class')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-control-label">Class Info:</label>
                        <input type="text" placeholder="1 hour a day, 2 days in a week" name="class_info" class="form-control">
                        @error('class_info')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-control-label">Total Days Per Week:</label>
                        <input type="text" placeholder="Ex: 2 or 3" name="class_days" class="form-control">
                        @error('class_days')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-control-label">Course Fee:</label>
                        <input type="number"placeholder="Course Fee For BDT" name="course_fee" class="form-control">
                        @error('course_fee')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-control-label">USD/EURO:</label>
                        <input type="text" placeholder="USD = $ 80, EURO = € 68" name="usdeuro" class="form-control">
                        @error('usdeuro')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group ">
                    <label class="form-control-label">1st Installment</label>
                    <div class="input-group">
                        <input type="number" name="installment[pay]" class="form-control" placeholder="Enter Installment" > 
                        <input type="hidden" name="installment[day]" class="form-control" value="1"> 
                    </div>
                    @error('installment1')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> 

                <div class="form-group ">
                    <label class="form-control-label">2nd Installment</label>
                    <div class="input-group">
                        <input type="number" name="installment2[pay]" class="form-control" placeholder="Enter Installment" >
                        <input type="number" name="installment2[day]" class="form-control" placeholder="Ex: 10 days after join course" >  

                    </div>
                    
                </div> 

                <div class="form-group ">
                    <label class="form-control-label">3rd Installment</label>
                    <div class="input-group">
                        <input type="number" name="installment3[pay]" class="form-control" placeholder="Enter Installment" >
                        <input type="number" name="installment3[day]" class="form-control" placeholder="Ex: 10 days after join course" >  

                    </div>
                    
                </div> 

                <div class="form-group">
                    <label class="form-control-label">Banner Image: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="banner_image">
                    @error('banner_image')
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
    
@endsection

@section('dashboard_css')
<link rel="stylesheet" href="{{ asset("backend/css/summernote-bs4.min.css")}}">
@endsection
@section('dashboard_js')
<script src="{{ asset("backend/js/summernote-bs4.min.js")}}"></script>
<script>
  $('.toast').toast('show');

  $('#summernote').summernote({
      tabsize: 2,
      height: 200,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link']],
        ['view', ['fullscreen', 'codeview']]
      ]
    });
</script>
@endsection


