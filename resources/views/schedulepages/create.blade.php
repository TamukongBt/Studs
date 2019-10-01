@extends('layouts.app')
@section('content')
    @if (Auth::user()->admin==0)
        <script>window.location.href = "/lindex"; </script>;

    @endif
    <div class="container">
<form action="{{ url('/schedule/create')}}" method="post">
    @csrf
    <div class="card">
            <div class="card-header text-light " style="background-color: rgb(16, 110, 218); ">
                    <h3 class=".text-secondary">Add Lecturer Details</h3>
            </div>
                <div class="card-body">
    
    <div class="row" >
            <div class="form-group">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
            </div>
            <div class="form-group  col-sm-5">
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
            <div class="form-group  col-sm-5">
            <strong>CourseCode :</strong>
                <input class="form-control" placeholder="CourseCode" name="CourseCode" type="text" required ></input>
            </div>
            <div class="form-group  col-sm-5">
            <strong>CourseName:</strong>
                <input class="form-control" placeholder="CourseName" name="CourseName" type="text" required ></input>
            </div>
            <div class="form-group col-sm-5">
            <strong>OptionID:</strong>
                <input class="form-control" placeholder="OptionID" name="OptionID" type="text" required ></input>
            </div>
            <div class="form-group col-sm-5 ">
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
            <div class="form-group col-sm-5 ">
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
            <div class="form-group  col-sm-5">
            <strong>ClassroomID :</strong>
                <input class="form-control" placeholder="ClassroomID" name="ClassroomID" type="text" required ></input>
            </div>
            <div class="form-group  col-sm-5">
            <strong>DepartmentID :</strong>
                <input class="form-control" placeholder="DepartmentID" name="DepartmentID" type="text" required ></input>
            </div>
            <div class="form-group  col-sm-5">
            <strong>Lecturer:</strong>
                <input class="form-control" placeholder="Lecturer" name="Lecturer" type="text" required ></input>
            </div>
            <div class="form-group  col-sm-5">
            <strong>Level:</strong>
                <select class="form-control" placeholder="Level" name="Level" type="text"  required >
                    <option>Level</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="500">500</option>
                    <option value="600">600</option>
                    <option value="700">700</option>
                    <option value="800">800</option>
                    <option value="900">900</option>
                </select>
            </div>
            </div>
    </div>
</div>
    
      <div class="form-group">
        <a href="{{ url('/schedule')}}" class="btn btn-sm btn-success">Back</a>
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
      </div>
    </div>
    </form>
    </div>
@endsection