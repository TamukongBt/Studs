@extends('layouts.app')
@section('content')
@include('incs.period'){{-- <-- this file includes the data neccesary to execute the check period and display the appropriate time--> --}}
{{-- Jumbotron to display the selected Day   --}}
<div class="jumbotron">
      <h1 class="display-4">{{ $show->CourseCode }}</h1>
      <p class="lead">{{ $show->CourseName }}</p>
      <small>{{ $show->Lecturer }}</small>
      <hr class="my-4">
      <p>Content</p>
  </div>
{{-- Table Header --}}
<div class="table-responsive text-nowrap">
        @if (count($schedule)>0)
        <table class="table table-bodered w-auto">
              <tr>
              <th scope="col">#</th>
              <th scope="col">Day</th>
              <th scope="col">Course Code</th>
              <th scope="col">Course Name</th>
              <th scope="col">Opstion Code</th>
              <th scope="col">Start Time</th>
              <th scope="col">End Time</th>
              <th scope="col">Classroom ID</th>
              <th scope="col">Department ID</th>
              <th scope="col">Lecturer</th>
              </tr>
          </thead>
      </div>
      {{-- Table Data --}}
         <?php $id=1; ?>
          @foreach ($schedule as $data)
              <div class="container">
                      <tbody>
                        <tr>
                          <th scope="row">{{ $id++ }}</th>
                          <td> <a href="schedule/{{ $data->Day }}/{{ $data->id }}"> {{ $data->Day }}
                                </a></td>
                          <td>{{ $data->CourseCode }}</td>
                          <td>{{ $data->CourseName }}</td>
                          <td>{{ $data->OptionID }}</td>
                           <td>
                                  @php
                                   PeriodS( $data->PeriodID );
                                  @endphp 
                                 
                           </td>
                           <td>
                                  @php
                                    PeriodE( $data->PeriodID);
                                  @endphp
                           </td>
                          
                          <td>{{ $data->ClassroomID }}</td>
                          <td>{{ $data->DepartmentID }}</td>
                          <td>{{ $data->Lecturer }}</td>
                        </tr>
                      </tbody>
                </div>
          @endforeach  
      </table>
    </div>
    {{-- Paginator --}}
      {!! $schedule->render() !!}
      @else
        <div class="alert alert-info">
            <strong>Info!</strong> <br> <p>No Classes have Been Set for this Semester</p>
        </div>
          
      @endif
   
  

<div class="pull-right">
    <a href="/schedule" class="btn btn-light">Go Back</a>
  </div>
@endsection
