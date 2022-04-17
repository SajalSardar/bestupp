@extends('layouts.master')

@section('title', "View Teacher")
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
  <span class="breadcrumb-item active">Teacher Information</span>
</nav>

<div class="sl-pagebody">
  <div class="sl-page-title">
    <h5>Teacher Information - Account Status: {!! $teacher->status == 1 ? "<span class='bg-warning'>Pending</span>" : ($teacher->status == 2 ? "<span class='bg-success'>Approved</span>" : "<span class='bg-danger'>Rejected</span>") !!}  
      <a href="{{ route('dashboard.teachers.approve',$teacher->id) }}" class="btn btn-primary btn-sm float-right">Approved</a>
      <a href="{{ route('dashboard.teachers.reject',$teacher->id) }}" class="btn btn-warning btn-sm float-right">Reject</a> 
    </h5>
  </div>

  <div class="card p-3">
    <table class="table table-bordered table-striped">
      <tr>
        <td width="20%"><strong>Name</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $teacher->user->name }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Email</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $teacher->user->email }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Courses</strong></td>
        <td width="5%">:</td>
        <td>
          @foreach (json_decode($teacher->courses) as $course)
            <span class="btn btn-primary btn-sm">{{ $course }}</span>
          @endforeach
        </td>
      </tr>
      <tr>
        <td width="20%"><strong>Education</strong></td>
        <td width="5%">:</td>
        <td>
          @foreach (json_decode($teacher->teachereducations) as $teachereducation)
            <span class="btn btn-primary btn-sm">{{ $teachereducation }}</span>
          @endforeach
        </td>
      </tr>
      <tr>
        <td width="20%"><strong>BirthDay</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $teacher->birthday->format('d-m-Y') }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Phone</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $teacher->mobile }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Address</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $teacher->address }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>National</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $teacher->national }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Father Name</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $teacher->father_name }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Gender</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $teacher->gender }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Parmanet Address</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $teacher->parmanet_address }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>University</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $teacher->university }}</p></td>
      </tr>
      <tr>
        <td width="20%"><strong>Photo</strong></td>
        <td width="5%">:</td>
        <td><img width="80" src="{{ asset('storage/uploads/profiles/'. $teacher->photo) }}" alt=""></td>
      </tr>
      <tr>
        <td width="20%"><strong>NID</strong></td>
        <td width="5%">:</td>
        <td><img width="80" src="{{ asset('storage/uploads/nids/'. $teacher->nid) }}" alt="">
          <a class="btn btn-primary ml-3" href="{{ asset('storage/uploads/nids/'. $teacher->nid) }}" download>Download</a>
        </td>
      </tr>
      <tr>
        <td width="20%"><strong>Certificate</strong></td>
        <td width="5%">:</td>
        <td><img width="80" src="{{ asset('storage/uploads/certificates/'. $teacher->certificate) }}" alt="">
          <a class="btn btn-primary ml-3" href="{{ asset('storage/uploads/certificates/'. $teacher->certificate) }}" download>Download</a>
        </td>
      </tr>
      <tr>
        <td width="20%"><strong>Created At</strong></td>
        <td width="5%">:</td>
        <td><p>{{ $teacher->created_at->format('d-m-Y') }}</p></td>
      </tr>
    </table>
  </div> 
</div>
@endsection