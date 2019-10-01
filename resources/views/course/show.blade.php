@extends('layouts.app')
@section('content')

  <div>
    <div class="jumbotron">
      <div class="container">
        <h1>{{ $course->CourseName }}</h1>
        <small>{{ $course->CourseCode }}</small>
        <p>Course Lecturer: {{ $course->LecturerName }}</p>
        <p>Second Lecturer: @php
          if($course->LecturerName2==null){
            echo 'Non Availaible';
          }
          else{
            echo $course->LecturerName2;
          }
      @endphp</p>
        <p><a class="btn btn-outline-info btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      Header
    </div>
    <div class="card-body">
      <h5 class="card-title"><strong>Course Description</strong></h5>
      <p class="card-text">
        <p>This is the course We are Talking about and has been taught by the lecturer for sometime now</p>
        </p>
    </div>
    <div class="card-footer">
      View Course Logs So far....
    </div>
  </div>

  <div class="pull-left">
    <a href="{{ route('back') }}" class="btn btn-light">Go Back</a>
  </div>
<hr>
  @if (Auth::user()->admin==1)
      <div>
          <a class="btn btn-outline-light btn-sm"
             href="/course/{{ $course->id }}/edit"><i class="fa fa-pencil-square"
                                                      aria-hidden="true"
                                                      style="color: black"></i></a>
      </div>
      <div>
          <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#delete">
              <i class="fa fa-trash" aria-hidden="true" style="color: black"></i>
          </button>

          <!-- Modal to confirm Delete-->
          <div class="modal fade text-center" id="delete" tabindex="-1" role="dialog"
               aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered " role="document">
                  <div class="modal-content  ">
                      <div class="modal-header ">
                          <h5 class="modal-title " id="exampleModalLongTitle">Confirm Delete</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          Are you sure you want to delete this entry
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">No</button>
                          <form action="{{  route('course.destroy', $course->id)}}" method="post">
                              {{csrf_field()}}
                              <input name="_method" type="hidden" value="DELETE">
                              <button class="btn btn-outline-dark btn-sm" type="submit">Yes</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  @endif
@endsection

