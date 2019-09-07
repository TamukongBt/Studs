{{-- This is the schedule home page and the crux of the page where all courses will be displayed --}}

@extends('layouts.app')
@section('content')
    @include('incs.period'){{-- <-- this file includes the data neccesary to execute the check period and display the appropriate time--> --}}
    {{-- Back to Top Button --}}
    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></i></a>


    @if (count($schedule)>0)
            {{-- FAB BUtton at page bottom  --}}
            <a class="mfab" id="bars"> <i id="bars" class="fa fa-bars" aria-hidden="true"
                                          style="font-size:x-large;"></i> </a>
            <a id="fab1" href="schedule/create" class="mfab1"> <i class="fa fa-pencil text-dark" aria-hidden="true"></i>
            </a>
            <a id="fab2" data-toggle="modal" data-target="#exampleModalCenter" class="mfab2"> <i class="fa fa-search"
                                                                                                 aria-hidden="true"></i>
            </a>
         

            <!-- Modal for search a free hall-->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style=" border: 1px solid rgba(18, 149, 182, 0.76);">
                        <div class="card-header" style=" background-color: rgba(18, 149, 182, 0.76);">
                            <h5 class="modal-title" id="exampleModalLongTitle">Search for a free hall</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="margin-top:-25px;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- Form to input Free Period request based on date and time--}}
                            <form action="{{ url('/free/hall')}}" method="get">
                                @csrf
                                <div class="row">
                                    <div class="form-group">
                                        <input type="hidden" value=" {{ csrf_token()}}" name="_token"/>
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
                                        <select class="form-control" placeholder="Start Time" name="StartTime"
                                                type="text" required>
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
                                        <select class="form-control" placeholder="End Time" name="EndTime" type="text"
                                                required>
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
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                        </div>
                        </form>
                    </div>
                    {{-- End of Form --}}
                </div>
            </div>


            <div class="pull-right">

            </div>
            <table id="myTable" class="table table-striped table-bordered table-responsive">
                <thead>
                <tr>
                    <th class="all" scope="col">Day</th>
                    <th class="all" scope="col">Course Code</th>
                    <th class="none" scope="col">Course Name</th>
                    <th class="none" scope="col">Option Code</th>
                    <th class="all" scope="col">Start Time</th>
                    <th class="none" scope="col">End Time</th>
                    <th class="all" scope="col">Classroom ID</th>
                    <th class="none" scope="col">Department ID</th>
                    <th class="none" scope="col">Lecturer</th>
                    <th class="none" scope="col">Level</th>

                    <th class="none" scope="col"></th>
                </tr>
                </thead>
                <?php $id = 1; ?>
                @foreach ($schedule as $entry)

                    <tbody>
                    <tr>
                        <td><a href="{{ route('show',['Day'=>$entry->Day,'id' => $entry->id]) }}"> {{ $entry->Day }}
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
                            <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal"
                                    data-target="#delete" style="cursor:pointer;">
                                <i class="fa fa-trash" aria-hidden="true" style="color: black"></i>
                            </button>


                            <!-- Modal to confirm Delete-->
                            <div class="modal fade" id="delete" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered " role="document">
                                    <div class="modal-content" style=" border: 1px solid rgba(220, 20, 60, 0.808);">
                                        <div class="card-header" style=" background-color: rgba(220, 20, 60, 0.808);">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete</h5>
                                            <button href="#" type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"
                                                    style="margin-top:-25px;cursor:pointer">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                Are you sure you want to delete this entry
                                            </div>

                                        </div>
                                        <div class="modal-footer float-right">
                                            <button type="button" class="btn btn-outline-dark btn-sm"
                                                    data-dismiss="modal" style="cursor:pointer;">
                                                No
                                            </button>
                                            <form action="{{  route('schedule.destroy', $entry->id)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-outline-danger btn-sm" type="submit">Yes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div>
    <a class="btn btn-outline-primary btn-sm" href="/schedule/{{ $entry->id }}/edit"><i class="fa fa-pencil-square"
                                                                                        aria-hidden="true"
                                                                                        style="color: black"></i></a>
    </td>
    </tr>
    </tbody>
    @endforeach
    </table>


            {!! $schedule->render() !!}
    @else
        <div class="alert alert-info " role="alert">
            <div class="card text-center alert-info ">
                <div class="card-body alert-info ">
                    <h5 class="card-title text-dark "><strong>Ooopss..!</strong></h5>
                    <p class="card-text text-dark"> No classes have been set in this university</p>
                    <a href="/schedule/create" class="btn btn-outline-dark btn-sm ">Add Data</a>

                </div>
            </div>
        </div>
    @endif



@endsection