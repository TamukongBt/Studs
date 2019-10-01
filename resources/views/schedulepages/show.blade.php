@extends('layouts.app')
@section('content')
@include('incs.period'){{-- <-- this file includes the data neccesary to execute the check period and display the appropriate time--> --}}
{{-- Jumbotron to display the selected Day   --}}

{{-- Table Header --}}
<div class="container-fluid" style="width:90%; margin:auto;">


    @if (count($schedule)>0)
        <table class="table table-striped table-hover">
            <tr class="text-light" style="background-color:dodgerblue;">
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

            {{-- Table Data --}}
         <?php $id=1; ?>
          @foreach ($schedule as $entry)

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

{{-- Paginator --}}
      {!! $schedule->render() !!}
      @else
        <div class="alert alert-info">
            <strong>Info!</strong> <br> <p>No Classes have Been Set for this Semester</p>
        </div>
          
      @endif



<div class="pull-left">
    <a href="/schedule" class="btn btn-light">Go Back</a>
  </div>

</div>
@endsection
