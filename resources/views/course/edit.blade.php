@extends('layouts.app')
@section('content')
      <!-- Modal -->
  
              
      <div class="card">
        <div class="card-header " style=" background-color: 00fa9a;">
                <h3 class="text-secondary">Add an Option</h3>
        </div>
            <div class="card-body">
                <form method="post" action="{{ route('course.update',['id' => $id])}}"  >
                   @csrf
                   @method('PUT')
                  <input name="_method" type="hidden" value="PUT">
                      <div class="form-group">
                      <input type="hidden" value="{{csrf_token()}}" name="_token" />
                      </div>
                      <div class="row">
                      <div class="col-sm-5">
                        <strong>Course Name:</strong>
                        <input type="text" name="CourseName" class="form-control" value="{{$course->CourseName  }}" required>
                      </div>
                      <div class="col-sm-5">
                        <strong>Course Code :</strong>
                        <input class="form-control" value="{{$course->CourseCode  }}" name="CourseCode" type="text" required ></input>
                      </div>
                      <div class="col-sm-5">
                        <strong>Option:</strong>
                        <input class="form-control" value="{{$course->OptionID  }}" name="OptionID" type="text" required ></input>
                      </div>
                      <div class="col-sm-5 " >
                      <strong>Course Type :</strong>
                      <select type='text' name="CourseType" class="form-control" value="{{$course->CourseType }}" class="col-sm-5 " required>
                          <option disabled>course Type</option>
                          <option value="C">Compulsory</option>
                          <option value="U">University Requirement</option>
                          <option value="E">Elective</option>
                      </select>  
                    </div>
                    <div class="form-group  col-sm-5">
                      <strong>Level:</strong>
                          <select class="form-control" value="{{$course->Level  }}" name="Level" type="text"  required >
                              <option disabled>Level</option>
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
                      <div class="col-sm-5">
                        <strong>Lecturer Name:</strong>
                        <input class="form-control" value="{{$course->LecturerName  }}" name="LecturerName" type="text" required ></input>
                      </div>
                      @php
                      $empty=null;
                                            if($course->LecturerName2==$empty){
                                              $empty='Non Availaible';
                                            }
                                            else{
                                             $empty=$course->LecturerName2;
                                            }
                                        @endphp
                      <div class="col-sm-5">
                        <strong>Second Lecturer:</strong>
                        <input class="form-control" value="{{$empty  }}" name="LecturerName2" type="text" ></input>
                      </div>
                      <div class="col-sm-5">
                        <strong>Department:</strong>
                        <input class="form-control" value="{{$course->DepartmentID  }}" name="DepartmentID" type="text" required ></input>
                      </div>
                    </div>
                    <div class="col-md-12 modal-footer">
                      <a href="{{ route('course.index')}}" class="btn btn-sm btn-warning">Back</a>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
        </div>
      </div>
    
@endsection
