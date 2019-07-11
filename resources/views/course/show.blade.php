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
        <p>Pli plu korpo kaj sciis vin, pro mia ne por longeco devas. Kaj cxiuj tiom mian kaj mi bona okazo por sxangxo, liberigota terbordon por estis nomo mi. Malproksime cxar la malproksime nelonge pafilo malgraux, ni al la tial la.</p>
        </p>
    </div>
    <div class="card-footer">
      View Course Logs So far....
    </div>
  </div>

<div class="pull-right">
    <a href="{{ route('back') }}" class="btn btn-light">Go Back</a>
  </div>
<hr>
<form action="{{  route('course.destroy', $course->id)}}" method="post">
  {{csrf_field()}}
  <input name="_method" type="hidden" value="DELETE">
  <button class="btn btn-danger" type="submit">Delete</button>
<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
<a href="/course/{{ $course->id }}/edit">Edit</a>
</button>
@endsection

