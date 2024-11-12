@extends('layouts.app')
@section('content')
<form action="{{ url('/option/create')}}" method="post">
    @csrf
<div >
    <div class="card">
        <div class="card-header " style=" background-color: 00fa9a;">
                <div class="card-header " style=" background-color: ;">
                <h3 class=".text-secondary">Add an Option</h3>
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    </div>
                    <div class="form-group col-sm-5">
                    <strong>Option Name :</strong>
                        <input class="form-control" placeholder="Option Name" name="Optionname" type="text" required ></input>
                    </div>
                    <div class="form-group col-sm-5">
                    <strong>Option Initials :</strong>
                        <input class="form-control" placeholder="Option Initials" name="OptionID" type="text" required ></input>
                    </div>
                    <div class="form-group col-sm-5">
                    <strong>Department ID:</strong>
                        <input class="form-control" placeholder="Department Initials" name="DepartmentID" type="text" required ></input></div>
                        <div class="form-group col-sm-5">
                        <strong>Faculty Initials:</strong>
                            <select class="form-control" placeholder="Faculty Initials" name="FacultyID" type="text"  required >
                                    <option disabled>Faculty Initials</option>
                                    <option value="F.A">Faculty Of Arts(F.A)</option>
                                    <option value="F.H.S">Faculty Of Health Science(F.H.S)</option>
                                    <option value="F.S">Faculty Of Science(F.S)</option>
                                    <option value="F.S.M.S">Faculty Of Social and Management Sciences(F.S.M.S)</option>
                                    <option value="F.E.T">Faculty Of Engineering And Technology(F.E.T)</option>
                                    <option value="F.E.D">Faculty Of Education(F.E.D)</option>
                                    <option value="C.O.T">College Of Technology(C.O.T)</option>
                                    <option value="A.S.T.I">Advanced School Of Translation(A.S.T.I)</option>
                                    <option value="H.T.T.C">Higher Teacher Training College(H.T.T.C)</option>
                                </select>
                        </div>
                    </div>
                    
                    <div class="form-group col-sm-5">
                        <a href="{{ url('/option')}}" class="btn btn-sm btn-success">Back</a>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </div>
            </div>
    </div>
</form>  
    
@endsection