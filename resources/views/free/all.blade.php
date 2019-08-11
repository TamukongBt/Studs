@extends('layouts.app')
@section('content')
    @include('incs.period'){{-- <-- this file includes the data neccesary to execute the check period and display the appropriate time--> --}}



    @if (count($all)>0)
        {{-- Display Free Periods Based on Date And Time --}}
        <table class="table table-bodered table-hover" id="datatable">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Building</th>
                <th data-card-title scope="col">Class Code</th>
                <th scope="col">Capacity</th>
                <th scope='col'>Hall Access</th>
                <th data-card-footer  scope='col'>Start Time</thdata-card-footer>
                <th data-card-footer scope='col'>End Time</th>
                <th scope='col'>Day</th>
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
            <th scope="row">{{ $id++ }}</th>
            <td>
                {{ $class->Building }}
            </td>
            <td>{{ $class->ClassID }}</td>
            <td>{{ $class->Capacity }}</td>
            <td>{{ $class->Access }}</td>
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
            <td>{{ $class->Day }}</td>
            <td>
                <button type="button" class="btn btn-outline-success edit" data-toggle="modal"
                        data-target="#exampleModalCenter">
                    Book This Hall
                </button>
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
                                            <select type="text" name="Day" class="form-control" placeholder="Day"
                                                    required>
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
                                            <select class="form-control" placeholder="End Time" name="EndTime"
                                                    type="text" required>
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
                                            <input class="form-control" placeholder="Capacity" name="Capacity"
                                                   type="number" required></input>
                                        </div>
                                        <div class="col-sm-5 ">
                                            <strong>Access :</strong>
                                            <select type='text' name="Access" class="form-control"
                                                    placeholder="Hall Access" class="col-sm-5 " required>
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


                <script type="text/javascript">

                    var ready = $(document).ready(function () {

                        //Start Edit Record
                        table.on('click', '.edit', function () {

                            $tr = $(this).closest('tr');
                            if ($($tr).hasClass('child')) {
                                $tr = $tr.prev('.parent');
                            }

                            var data = table.row($tr).data();
                            console.log(data);

                            $('#Building').val(data[1]);
                            $('#ClassID').val(data[2]);
                            $('#Capacity').val(data[3]);
                            $('#Access').val(data[4]);
                            $('#PeriodID').val(data[5]);
                            $('#Day').val(data[6]);

                            $('#editform').attr('action', '/employee/' + data[0],);
                        });
                    });
                </script>

            </div>
@endsection
