@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="/class/create" class="btn btn-outline-primary btn-sm">Add Entry</a>
        <div class="table-responsive text-nowrap">
                <table class="table table-bodered" >
                        <thead >
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Building</th>
                            <th scope="col">Class Code</th>
                            <th scope="col">Capacity</th>
                            <th scope='col'>Hall Access</th>
                            <th scope='col'> </th>
                            <th scope='col'></th>
                            </tr>
                        </thead>
                    </div>
                    @if (count($classroom)>0)
                        
                       <?php $id=1; ?>
                        @foreach ($classroom as $class)
                         @php
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
                            <div class="container">
                                    <tbody>
                                      <tr class="{{ $linecolor}}" >
                                        <th scope="row">{{ $id++ }}</th>
                                        <td> <a href="/class/{{ $class->id }}"> <button type="button" class="btn btn-link text-dark" data-toggle="modal" data-target="#exampleModalCenter">
                                              {{ $class->Building }}
                                              </button></a></td>
                                        <td>{{ $class->ClassID }}</td>
                                        <td>{{ $class->Capacity }}</td>
                                        <td>{{ $class->Access }}</td>
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
                                                        <form action="{{  route('class.destroy', $class->id)}}" method="post">
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
                                                <a class="btn btn-outline-danger btn-sm" href="/class/{{ $class->id }}/edit">Edit</a>
                                        </td>
                                      </tr>
                                    </tbody>
                                 
                            </div>
                        @endforeach
                       
                    </table>
        </div>
    </div>
    {!!$classroom->render() !!}
    @else
        <p>No Available Classes</p>
    @endif
   
@endsection