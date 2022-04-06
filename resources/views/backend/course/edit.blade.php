@extends('layouts.master')
@section('title', "Update Course")
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
      <span class="breadcrumb-item active">Update Course</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Update Course</h5>
      </div>

      <div class="card pd-20 pd-sm-40">
        <form action="{{ route('dashboard.course.update',$course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="form-group">
                    <label class="form-control-label">Course Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="name" value="{{$course->name}}" placeholder="Enter Banner Title">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Title Bottom Description:</label>
                    <textarea name="description" class="form-control" placeholder="Description">{{ $course->description }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Course Overview:</label>
                    <textarea name="overview" class="form-control " style="height:150px" placeholder="overview">{{ $course->overview }}</textarea>
                    @error('overview')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Course Duration: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="number" name="duration" value="{{ $course->duration}}" placeholder="Course Duration Ex: 6">
                    @error('duration')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Total Class Number: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="number" name="total_class" value="{{ $course->total_class }}" placeholder="Total Class Ex: 33">
                    @error('total_class')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Class Info:</label>
                    <input type="text" placeholder="1 hour a day, 2 days in a week" name="class_info" class="form-control" value="{{ $course->class_info }}">
                    @error('class_info')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Course Fee:</label>
                    <input type="number"placeholder="Course Fee For BDT" name="course_fee" class="form-control" value="{{ $course->course_fee }}">
                    @error('course_fee')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">USD/EURO:</label>
                    <input type="text" placeholder="USD = $ 80, EURO = € 68" name="usdeuro" class="form-control" value="{{ $course->usdeuro }}">
                    @error('usdeuro')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                
                <div class="after-add-more"></div>
                <div class="copy d-none">  
                    <div class="control-group input-group mt-2">  
                      <input type="text" name="installments[]" class="form-control" placeholder="Enter Installment" value="{{ old('installment_one') }}" disabled>  
                      <div class="input-group-btn">   
                        <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>  
                      </div>  
                    </div>  
                </div>
                <p class="btn btn-primary btn-sm mt-2 add-more">Add Installment</p>
                
                <div class="form-group">
                    <label class="form-control-label">Banner Image:</label>
                    <input class="form-control" type="file" name="banner_image" id="file_input">
                    <img src="{{ $course->banner_image }}" id="show_img" width="150" class="mt-3" alt="">
                </div>
      
                <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5">Submit</button>
                </div>
              </div>
        </form>
      </div> 
    </div>
    
@endsection

@section('dashboard_js')
<script>
  $('.toast').toast('show');
   
    let imgf = document.getElementById("file_input");
    let outputimg = document.getElementById("show_img");
    imgf.addEventListener("change", function () {
        outputimg.src = URL.createObjectURL(imgf.files[0]);
    });
    $(".add-more").click(function(){   
          var html = $(".copy").html();  
          $(".after-add-more").append(html);
          $(".after-add-more input").prop('disabled', false); 
      });  
  
      $("body").on("click",".remove",function(){   
          $(this).parents(".control-group").remove();  
      });
</script>
@endsection