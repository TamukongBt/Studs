@extends('layouts.app')
@section('content')
@include('incs.period'){{-- <-- this file includes the data neccesary to execute the check period and display the appropriate time--> --}}
{{-- Jumbotron to display the selected Day   --}}

{{-- Table Header --}}
<div class="table-responsive text-nowrap">
        @if (count($schedule)>0)
        <table class="table table-bodered w-auto">
              <tr>
              <th scope="col">#</th>
              <th scope="col">Day</th>
              <th scope="col">Course Code</th>
              <th scope="col">Course Name</th>
              <th scope="col">Option Code</th>
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
          @foreach ($schedule as $entry)
              <div class="container">
                      <tbody>
                       
                        <tr >
                          <th scope="row">{{ $id++ }}</th>
                          
                          <td> <a href="schedule/{{ $entry->Day }}/{{ $entry->id }}"> {{ $entry->Day }}
                                </a></td>
                          <td>{{ $entry->CourseCode }}</td>
                          <td>{{ $entry->CourseName }}</td>
                          <td>{{ $entry->OptionID }}</td>
                           <td>
                                  @php
                                   PeriodS( $entry->PeriodID );
                                  @endphp 
                                 
                           </td>
                           <td>
                                  @php
                                    PeriodE( $entry->PeriodID);
                                  @endphp
                           </td>
                          
                          <td>{{ $entry->ClassroomID }}</td>
                          <td>{{ $entry->DepartmentID }}</td>
                          <td>{{ $entry->Lecturer }}</td>
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
