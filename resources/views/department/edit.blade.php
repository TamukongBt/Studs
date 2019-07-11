@extends('layouts.app')
@section('content')
<form action="{{ route('department.update',$department->id)}}" method="post">
    @csrf
    @method('PATCH')
    <div >
        <div class="card " >
            <div class="card-header bg-info">
            <h3>Edit Department Information</h3>
            </div>
            <div class="card-body">   
                <div class="row">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    </div>
                    <div class="form-group col-sm-5">
                    <strong>DepartmentID :</strong>
                        <input class="form-control"  name="DepartmentID" value="{{ $department->DepartmentID }}" type="text" required ></input>
                    </div>
                    <div class="form-group col-sm-5">
                    <strong>Department Name :</strong>
                        <input class="form-control"  name="DepartmentName" value="{{ $department->DepartmentName }}" type="text" required ></input>
                    </div>
                    <div class="form-group col-sm-5">
                    <strong>Faculty ID:</strong>
                        <input class="form-control"  name="FacultyID" value="{{ $department->FacultyID }}" type="text" required ></input></div>
                    <div class="form-group col-sm-5">
                    <strong>Faculty Name:</strong>
                        <input class="form-control"  name="FacultyName" value="{{ $department->FacultyName }}" type="text" required ></input>
                    </div>
                </div>
           

        {{-- Button Controls --}}
            <div class="form-group col-sm-5" >
                <a href="{{ url('/department')}}" class="btn btn-sm btn-success">Back</a>
                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
    </div>
</form>  
@endsection