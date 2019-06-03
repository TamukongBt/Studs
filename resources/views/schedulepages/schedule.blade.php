{{-- This is the schedule home page and the crux of the page where all courses will be displayed --}}

@extends('layouts.app')
@section('content')
@include('incs.period'){{-- <-- this file includes the data neccesary to execute the check period and display the appropriate time--> --}}

<div class="container-fluid">

<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModalCenter">
    Search For a Free Hall
  </button>
  
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style=" border: 1px solid rgba(18, 149, 182, 0.76);">
        <div class="card-header" style=" background-color: rgba(18, 149, 182, 0.76);">
          <h5 class="modal-title" id="exampleModalLongTitle">Search for a free hall</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-25px;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{-- Form to input Free Period request based on date and time--}}
                <form action="{{ url('/free/hall')}}" method="get">
                    @csrf
                <div class="row">
                        <div class="form-group">
                            <input type="hidden" value=" {{ csrf_token()}}" name="_token" />
                        </div>
                        <div class="form-group  col-sm-4">
                        <strong>Day :</strong>
                            <select type="text" name="Day" class="form-control" placeholder="Day" required>
                                <option disabled>Day</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option> 
                            </select>
                        </div>
                        <div class="form-group col-sm-4 ">
                            <strong>Start Time :</strong>
                            <select class="form-control" placeholder="Start Time" name="StartTime" type="text"  required >
                                <option>Start Time</option>
                                <option value="7:00am">7:00 am</option>
                                <option value="9:00am">9:00 am</option>
                                <option value="11:00am">11:00 am</option>
                                <option value="1:00pm">1:00 pm</option>
                                <option value="3:00pm">3:00 pm</option>
                                <option value="5:00pm">5:00 pm</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 ">
                            <strong>End Time :</strong>
                            <select class="form-control" placeholder="End Time" name="EndTime" type="text"  required >
                                <option>End Time</option>
                                <option value="9:00am">9:00 am</option>
                                <option value="11:00am">11:00 am</option>
                                <option value="1:00pm">1:00 pm</option>
                                <option value="3:00pm">3:00 pm</option>
                                <option value="5:00pm">5:00 pm</option>
                                <option value="7:00pm">7:00 pm</option>
                            </select>
                        </div>
                        </div>
                        <div class="pull-right">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>       
                </div>
                </form>
            </div>
            {{-- End of Form --}}
            </div>
          </div>



  
          <div class="col-md-4 " style="float:right;">
              <form action="schedule/search" method="get">
              <div class="input-group" >
                <input type="search" name="search" class="form-control" placeholder="Search By Day">
                <span class="input-group-prepend">
                  <button type="submit" class="btn btn-info">Search</button>
                </span>
              </div>
              </form>
          </div>
        
    <div class="table-responsive text-nowrap">
    @if (count($schedule)>0)
    <div class="pull-right">
        <a href="/schedule/create" class="btn btn-outline-primary btn-sm pull-right" >Add Data</a>
    </div>
    <table class="table table-bodered w-auto">
        <thead>
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
            <th scope="col">Level</th>
            </tr>
        </thead>
        </div>
        <?php $id=1; ?>
            @foreach ($schedule as $entry)

                    <tbody>
                        <tr>
                        <th scope="row">{{ $id++ }}</th>
                        <td> <a href="{{ route('show',['Day'=>$entry->Day,'id' => $entry->id]) }}"> {{ $entry->Day }}
                                </a></td>
                        <td><a href="{{ route('course.show',$entry->CourseCode) }}">{{ $entry->CourseCode }}</a></td>
                        <td>{{ $entry->CourseName }}</td>
                        <td>{{ $entry->OptionID }}</td>
                            <td>
                            @php
                            
                            PeriodS( $entry->PeriodID );
                        
                            @endphp
                        </td>
                        <td>
                            @php
                            PeriodE( $entry->PeriodID );
                            @endphp  
                        </td>
                        
                        <td>{{ $entry->ClassroomID }}</td>
                        <td>{{ $entry->DepartmentID }}</td>
                        <td>{{ $entry->Lecturer }}</td>
                        <td>{{ $entry->Level }}</td>
                        <td>
                                <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#delete">
                                        Delete
                                      </button>
                                      
                                      <!-- Modal to confirm Delete-->
                                      <div class="modal fade text-center" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered " role="document">
                                            <div class="modal-content" style=" border: 1px solid rgba(220, 20, 60, 0.808);">
                                                <div class="card-header" style=" background-color: rgba(220, 20, 60, 0.808);">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-25px;">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                            <div class="modal-body">
                                              Are you sure you want to delete this entry
                                            </div>
                                            <div class="modal-footer float-right" >
                                              <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">No</button>
                                              <form action="{{  route('schedule.destroy', $entry->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-outline-danger btn-sm" type="submit">Yes</button>
                                                </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                           
                        </td>
                        <td>
                                <a class="btn btn-outline-primary btn-sm" href="/schedule/{{ $entry->id }}/edit">Edit</a>
                        </td>
                        </tr>
                    </tbody>
        @endforeach  
    </table>
    </div>    

    {!! $schedule->render() !!}
    @else
    <div class="alert alert-info "   role="alert"> 
    <div class="card text-center alert-info " >
        <div class="card-body alert-info ">         
          <h5 class="card-title text-dark " ><strong>Ooopss..!</strong></h5>
          <p class="card-text text-dark" > There are no Options in this university...not yet</p>
          <a href="/schedule/create" class="btn btn-outline-dark btn-sm " >Add Data</a>
        </div>
      </div> 
        
    @endif

@endsection