@extends('layouts.app')
@section('content')
    @if (Auth::user()->admin==0)
        <script>window.location.href = "/lindex"; </script>;
    @endif
    <div class="container">

        <form action="{{ route('option.update',$option->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div >
                <div class="card">
                    <div class="card-header " style=" background-color: 00fa9a;">
                        <h3 class=".text-secondary">{{ $option->Optionname }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                            </div>
                            <div class="form-group col-sm-5">
                                <strong>Option Name :</strong>
                                <input class="form-control" placeholder="Option Initials" name="Optionname" type="text" value="{{ $option->Optionname }}" required ></input>
                            </div>
                            <div class="form-group col-sm-5">
                                <strong>Option Initials :</strong>
                                <input class="form-control" placeholder="Option Name" name="OptionID" type="text" value="{{ $option->OptionID }}" required ></input>
                            </div>
                            <div class="form-group col-sm-5">
                                <strong>Department ID:</strong>
                                <input class="form-control" placeholder="Department Initials" name="DepartmentID" type="text" value="{{ $option->DepartmentID }}" required ></input></div>
                            <div class="form-group col-sm-5">
                                <strong>Faculty Initials:</strong>
                                <select class="form-control" placeholder="Faculty Initials" name="FacultyID" type="text" value="{{ $option->FacultyID }}" required >
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
                    </div>

                    {{-- Button Controls --}}
                    <div class="form-group col-sm-5">
                        <a href="{{ url('/option')}}" class="btn btn-sm btn-success">Back</a>
                        <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
</form>
    </div>
@endsection