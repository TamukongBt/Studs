@extends('layouts.app')
@section('content')
    @if (Auth::user()->admin==0)
        <script>window.location.href = "/lindex"; </script>;
    @endif
    <div class="container">
<div class="card">
      <h5 class="card-header">Create a Course</h5>
        <div class="card-body">
      <form action="{{ url('/course/create')}}" method="post">
      @csrf
      <div class="row">
          <div class="form-group">
              <input type="hidden" value=" {{ csrf_token()}}" name="_token" />
          </div>
            <div class="col-sm-5">
              <strong>Course Name:</strong>
              <input type="text" name="CourseName" class="form-control" placeholder="CourseName" required>
            </div>
            <div class="col-sm-5">
              <strong>Course Code :</strong>
              <input class="form-control" placeholder="Course Code" name="CourseCode" type="text" required ></input>
            </div>
            <div class="col-sm-5">
              <strong>Option:</strong>
              <input class="form-control" placeholder="Option" name="OptionID" type="text" required ></input>
            </div>
            <div class="col-sm-5 " >
            <strong>Course Type :</strong>
            <select  name="CourseType" class="form-control" placeholder="Course Type" class="col-sm-5 " required>
                <option disabled>Course Type</option>
                <option value="C">Compulsory</option>
                <option value="U">University Requirement</option>
                <option value="E">Elective</option>
            </select>  
          </div>
          <div class="form-group  col-sm-5">
            <strong>Level:</strong>
                <select class="form-control" placeholder="Level" name="Level" type="text"  required >
                    <option disabled>Level</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="500">500</option>
                    <option value="600">600</option>
                    <option value="700">700</option>
                    <option value="800">800</option>
                    <option value="900">900</option>
                </select>
            </div>
            <div class="col-sm-5">
              <strong>Lecturer Name:</strong>
              <input class="form-control" placeholder="Lecturer Name" name="LecturerName" type="text" required ></input>
            </div>
            <div class="col-sm-5">
              <strong>Second Lecturer:</strong>
              <input class="form-control" placeholder="Lecturer Name 2" name="LecturerName2" type="text" ></input>
            </div>
            <div class="col-sm-5">
              <strong>Department:</strong>
              <input class="form-control" placeholder="Department ID" name="DepartmentID" type="text" required ></input>
            </div>
  </div>
  <hr>

    <div class="col-md-15">
      <a href="{{ route('course.index')}}" class="btn btn-sm btn-warning">Back</a>
      <button type="submit" class="btn btn-sm btn-primary">Submit</button>
    </div>
  </div>

  </form>
</div>
@endsection