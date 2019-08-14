@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="fab">  <a href="{{ route('course.create') }}" class="a"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>
      
        <div class="table-responsive text-nowrap">
                <table class="tablesaw tablesaw-stack tablesaw-row-zebra table table-bodered" data-tablesaw-mode="stack" >
                        <thead >
                            <tr>
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
                                        <td>{{ $item->LecturerName }}</td>
                                        <td>@php
                                            if($item->LecturerName2==null){
                                              echo 'Non Availaible';
                                            }
                                            else{
                                              echo $item->LecturerName2;
                                            }
                                        @endphp</td>
                                        <td>{{ $item->DepartmentID }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#delete">
                                                Delete
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
                                        <td>
                                                <a class="btn btn-outline-light btn-sm" href="/course/{{ $item->id }}/edit">Edit</a>
                                        </td>
                                      </tr>
                                    </tbody>
                                 
                            </div>
                        @endforeach
                       
                    </table>
        </div>
    </div>
    {!!$course->render() !!}
    @else
        <p>No Available Classes</p>
    @endif
   
@endsection