@extends('layouts.app')
@section('content')
<form action="{{ route('lecturer.update',$lecturer->id)}}" method="post">
    @csrf
    @method('PATCH')
    <div >
        <div class="card">
            <div class="card-header bg-info">
            <h3>Edit Lecturer Information</h3>
            </div>
            <div class="card-body">   
                <div class="row">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    </div>
                    <div class="form-group col-sm-5">
                    <strong>Title :</strong>
                        <select type="text" name="title" class="form-control" placeholder="Day" class="col-sm-5 " required>
                            <option>Title</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Miss.">Miss</option>
                            <option value="Dr.">Dr.</option>
                            <option value="Ass. Prof.">Ass. Prof</option> 
                            <option value="Prof.">Prof.</option>
                            
                        </select>
                    </div>
                    <div class="form-group col-sm-5">
                    <strong>Lecturer Name :</strong>
                        <input class="form-control" placeholder="Name Of Lecturer" name="LecturerName" type="text" value="{{ $lecturer->LecturerName }}" required ></input>
                    </div>
                    <div class="form-group col-sm-5">
                    <strong>Email:</strong>
                        <input class="form-control" placeholder="Email Address" name="email" type="email"  value="{{ $lecturer->email }}" required ></input></div>
                    <div class="form-group col-sm-5">
                    <strong>Telephone:</strong>
                        <input class="form-control" placeholder="Telephone Number (+237)" name="telephone" type="tel"  value="{{ $lecturer->telephone }}" required ></input>
                    </div>
                    <div class="form-group col-sm-5">
                    <strong>DepartmentID :</strong>
                        <input class="form-control" placeholder="DepartmentID" name="DepartmentID" type="text"  value="{{ $lecturer->DepartmentID }}" required ></input>
                    </div>
                    <div class="form-group col-sm-5">
                    <strong>FacultyID :</strong>
                        <input class="form-control" placeholder="Faculty Initials" name="FacultyID" type="text"  value="{{ $lecturer->FacultyID }}" required ></input>
                    </div>
                </div>
            </div>
        </div>

        {{-- Button Controls --}}
            <div class="form-group col-sm-5">
                <a href="{{ url('/lecturer')}}" class="btn btn-sm btn-success">Back</a>
                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
            </div>
    </div>
</form>  
@endsection