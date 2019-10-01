@extends('layouts.app')
@section('content')
    <div class="container-fluid" style="width:90%; margin:auto;">
        @if (Auth::user()->admin==1)
        <div class="fab">  <a href="{{ route('course.create') }}" class="a"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>
        @endif
        <div class="table-responsive text-nowrap">
            <table id="myTable" class="table table-hover table-striped">
                        <thead >
                        <tr class="text-light" style="background-color:dodgerblue;">
                            <th scope="col">#</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Course Code</th>
                            <th scope="col">Option</th>
                            <th scope='col'>Course Type</th>
                            <th scope='col'>Level </th>
                            <th scope='col'>Main Lecturer</th>
                            <th scope='col'>Second Lecturer</th>
                            <th scope='col'>Department ID</th>
                            
                            </tr>
                        </thead>
                    
                    @if (count($course)>0)
                        
                       <?php $id=1; ?>
                        @foreach ($course as $item)
                        
                            <div class="container">
                                    <tbody>
                                      <tr>
                                        <th scope="row">{{ $id++ }}</th>
                                        <td> <a href="/course/{{ $item->CourseCode }}"> <button type="button" class="btn btn-link text-dark" data-toggle="modal" data-target="#exampleModalCenter">
                                              {{ $item->CourseName }}
                                              </button></a></td>
                                        <td>{{ $item->CourseCode }}</td>
                                        <td>{{ $item->OptionID }}</td>
                                        <td>{{ $item->CourseType }}</td>
                                        <td>{{ $item->Level }}</td>
                                          <td>{{ $item->LecturerName }} </td>
                                        <td>@php
                                            if($item->LecturerName2==null){
                                              echo 'Non Availaible';
                                            }
                                            else{
                                              echo $item->LecturerName2;
                                            }
                                        @endphp</td>
                                        <td>{{ $item->DepartmentID }}</td>
                                          @if (Auth::user()->admin==1)
                                          <td>
                                              <a class="btn btn-outline-light btn-sm"
                                                 href="/course/{{ $item->id }}/edit"><i class="fa fa-pencil-square"
                                                                                        aria-hidden="true"
                                                                                        style="color: black"></i></a>
                                          </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#delete">
                                                <i class="fa fa-trash" aria-hidden="true" style="color: black"></i>
                                              </button>
                                              
                                              <!-- Modal to confirm Delete-->
                                              <div class="modal fade text-center" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered " role="document">
                                                  <div class="modal-content  ">
                                                    <div class="modal-header ">
                                                      <h5 class="modal-title " id="exampleModalLongTitle">Confirm Delete</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      Are you sure you want to delete this entry
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">No</button>
                                                        <form action="{{  route('course.destroy', $item->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button class="btn btn-outline-dark btn-sm" type="submit">Yes</button>
                                                    </form>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                        </td>
                                          @endif
                                      </tr>
                                    </tbody>
                                 
                            </div>
                        @endforeach
                       
                    </table>
        </div>
    </div>
    {!!$course->render() !!}
    @else
        <div class="alert alert-primary " role="alert">
            <div class="card text-center alert ">
                <div class="card-body alert ">
                    <h5 class="card-title"><strong>Ooopss..!</strong></h5>
                    <p class="card-text"> There are no departments in this university...not yet</p>
                    @if (Auth::user()->admin==1)
                        <a href="/course/create" class="btn btn-outline-primary active-cyan-2">Add Entry</a>
                    @endif
                </div>
            </div>

    @endif
   
@endsection