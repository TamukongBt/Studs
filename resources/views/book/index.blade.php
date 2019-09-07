@extends('layouts.app')
@section('content')
    @include('incs.period'){{-- <-- this file includes the data neccesary to execute the check period and display the appropriate time--> --}}




    @if (count($book)>0)
        {{-- Display Booked Periods Based on Date And Time --}}
        <table class="table table-bodered table-hover" id="dataTable">
            <thead>
            <tr>
                <th scope='col'>Lecturer</th>
                <th scope="col">Day</th>
                <th scope="col">Building</th>
                <th scope="col">ClassID</th>
                <th scope='col'>Start Time</th>
                <th scope='col'>End Time</th>
                <th scope='col'>Course Code</th>
            </tr>
            </thead>


            <?php $id = 1; ?>
            @foreach ($book as $class)

                <tbody>
                <tr>
                    <td>{{ $class->Username }}</td>
                    <td>{{ $class->Day }}</td>
                    <td>{{ $class->Building }}</td>
                    <td>{{ $class->ClassID }}</td>
                    <td>
                        @php
                            PeriodS( $class->PeriodID );
                        @endphp
                    </td>
                    <td>
                        @php
                            PeriodE( $class->PeriodID );
                        @endphp
                    </td>
                    <td>{{ $class->CourseCode }}</td>
                </tr>
                </tbody>
            @endforeach
        </table>
        {{ $book->links() }}



    @else
        <div class="alert alert-danger " role="alert">
            <div class="card text-center alert-danger ">
                <div class="card-body alert-danger ">
                    <h5 class="card-title text-dark "><strong>Ooopss..!</strong></h5>
                    <p class="card-text text-dark"> All existing halls have been booked for day </p>
                    <a href="/lindex" class="btn btn-outline-dark btn-sm ">Go Back</a>
                </div>
            </div>
        </div>

    @endif


        <!-- Modal -->

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style=" border: 1px solid rgba(18, 149, 182, 0.76);">
                        <div class="card-header" style=" background-color: rgba(18, 149, 182, 0.76);">
                            <h5 class="modal-title" id="exampleModalLongTitle">Book This Hall</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="margin-top:-25px;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- Form to input Free Period request based on date and time--}}
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
                                    <input type="hidden" class="form-control" name="PeriodID" id="PeriodID">

                                    <div class="form-group  col-md-12">
                                        <strong>ClassID :</strong>
                                        <input type="text" class="form-control" name="ClassID" value="ClassID">
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
                                    <div class="col-sm-5">
                                        <strong>Capacity :</strong>
                                        <input class="form-control" placeholder="Capacity" name="Capacity" type="number"
                                               required></input>
                                    </div>
                                    <div class="col-sm-5 ">
                                        <strong>Access :</strong>
                                        <select type='text' name="Access" class="form-control" placeholder="Hall Access"
                                                class="col-sm-5 " required>
                                            <option disabled>Hall Access</option>
                                            <option value="Open">Open Hall</option>
                                            <option value="Dedicated Hall">Dedicated Hall for a faculty</option>
                                            <option value="Assigned Hall">Assigned for Hall</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="Note">Note</label>
                                        <textarea id="Note" class="form-control" name="Note" rows="4"
                                                  placeholder="Write Something....."> </textarea>
                                    </div>

                                </div>
                                <div class="pull-right">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                        {{-- End of Form --}}
                    </div>
                </div>
            </div>



@endsection
