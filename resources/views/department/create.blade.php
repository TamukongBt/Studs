@extends('layouts.app')
@section('content')
<form action="{{ url('/department/create')}}" method="post">
    @csrf
<div >
    <div class="card">
        <div class="card-header " style=" background-color: #1e90ff;">
                <h3 class=".text-secondary">Add Deparrtment Details</h3>
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    </div>
                    <div class="form-group col-sm-5">
                    <strong>DepartmentID :</strong>
                        <input class="form-control" placeholder="DepartmentID" name="DepartmentID" type="text" required ></input>
                    </div>
                    <div class="form-group col-sm-5">
                    <strong>Department Name :</strong>
                        <input class="form-control" placeholder="Name Of Department" name="DepartmentName" type="text" required ></input>
                    </div>
                    <div class="form-group col-sm-5">
                    <strong>Faculty ID:</strong>
                        <input class="form-control" placeholder="Faculty Initials" name="FacultyID" type="text" required ></input></div>
                    <div class="form-group col-sm-5">
                    <strong>Faculty Name:</strong>
                        <input class="form-control" placeholder="Faculty Name" name="FacultyName" type="tel" required ></input>
                    </div>
                    </div>
                    
                    <div class="form-group col-sm-5">
                        <a href="{{ url('/department')}}" class="btn btn-sm btn-success">Back</a>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </div>
            </div>
    </div>
</form>  
    
@endsection