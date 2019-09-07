@extends('layouts.app')
@section('content')
    @include('incs.period'){{-- <-- this file includes the data neccesary to execute the check period and display the appropriate time--> --}}



    @if (count($all)>0)
        {{-- Display All Free Periods Based on Date And Time --}}
        <table class="table table-bodered table-hover" id="myTable">
            <thead>
            <tr>
                <th scope="col">Building</th>
                <th scope="col">Class Code</th>
                <th scope="col">Capacity</th>
                <th scope='col'>Hall Access</th>
                <th scope="col">Start Time</th>
                <th scope='col'>End Time</th>
                <th scope='col'>Day</th>
                <th scope='col'></th>
            </tr>
            </thead>


            <?php $id = 1; ?>
            @foreach ($all as $class)
                @php
                    $linecolor=null;
                     if ($class->Access=='Open') {
                         $linecolor = 'table-primary';
                     }
                     elseif ($class->Access=='Dedicated Hall') {
                         $linecolor= 'table-warning';
                     }
                     elseif ($class->Access=='Assigned Hall') {
                         $linecolor = 'table-danger';
                     }
                @endphp

                <tbody>
                <tr class="{{ $linecolor}}">
                    <td>{{ $class->Building }}</td>
                    <td>{{ $class->ClassID }}</td>
                    <td>{{ $class->Capacity }}</td>
                    <td>{{ $class->Access }}</td>
                    <td>@php
                            PeriodS( $class->PeriodID );
                        @endphp</td>
                    <td>@php
                            PeriodE( $class->PeriodID );
                        @endphp</td>
                    <td>{{ $class->Day }}</td>
                    <td>
                        <a class="btn btn-outline-success " id="edit" data-toggle="modal"
                           data-target="#exampleModalCenter">
                            <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                </tbody>

                </div>
            @endforeach

        </table>
        {{ $all->links() }}
        </div>
        </div>

    @else
        <div class="alert alert-danger " role="alert">
            <div class="card text-center alert-danger ">
                <div class="card-body alert-danger ">
                    <h5 class="card-title text-dark "><strong>Ooopss..!</strong></h5>
                    <p class="card-text text-dark"> All existing halls have been booked for day </p>
                    <a href="/lindex" class="btn btn-outline-dark btn-sm ">Go Back</a>
                </div>
            </div>
        @endif


        <!-- Modal -->

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style=" border: 1px solid rgba(18, 149, 182, 0.76);">
                        <div class="card-header" style=" background-color: rgba(18, 149, 182, 0.76);">
                            <h5 class="modal-title" id="exampleModalLongTitle">Book a free hall</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="margin-top:-25px;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- Form to input data on hall you are booking--}}
                            <form action="/book" method="post" id="editform">
                                @csrf
                                <div class="row">
                                    <div class="form-group">
                                        <input type="hidden" value=" {{ csrf_token()}}" name="_token"/>
                                    </div>
                                    <div class="form-group  col-md-12">
                                        <strong>Building :</strong>
                                        <input type="text" class="form-control" name="Building" id="Building">
                                    </div>
                                    <div class="form-group  col-md-12">
                                        <strong>Day :</strong>
                                        <input type="text" name="Day" class="form-control" id="Day"
                                               required>
                                    </div>
                                    <div class="form-group  col-md-12">
                                        <strong>ClassID :</strong>
                                        <input type="text" class="form-control" name="ClassID" value="ClassID"
                                               id="ClassID">
                                    </div>
                                    <div class="form-group col-sm-5">
                                        <strong>Start Time :</strong>
                                        <input class="form-control" id="StartTime" name="StartTime" value="StartTime"
                                               type="text">
                                    </div>
                                    <div class="form-group col-sm-5 ">
                                        <strong>End Time :</strong>
                                        <input class="form-control" id="EndTime" name="EndTime" value="EndTime"
                                               type="text" required>

                                    </div>
                                    <div class="col-sm-5">
                                        <strong>Course Name :</strong>
                                        <input class="form-control" placeholder="Course Name" name="CourseName"
                                               type="text" required/>
                                    </div>
                                    <div class="col-sm-5">
                                        <strong>Course Code :</strong>
                                        <input type='text' name="CourseCode" class="form-control"
                                               placeholder="CourseCode" class="col-sm-5 " required/>
                                    </div>
                                    <div class="col-sm-5">
                                        <strong>Department ID :</strong>
                                        <input class="form-control" placeholder="Department ID" name="DepartmentID"
                                               type="text" required></input>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="Note">Note</label>
                                        <textarea id="Note" class="form-control" name="Note" rows="4"
                                                  placeholder="Write Something....."> </textarea>
                                    </div>

                                </div>
                                <div class="pull-right">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                        {{-- End of Form --}}
                    </div>
                </div>
            </div>


        </div>
@endsection
