@extends('layouts.app')
@section('content')


    @if (count($classroom)>0)
        <div class="fab">  <a href="/class/create" class="a"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>


        <table class="table table-bodered" id="datatable" data-card-heigth="200">
            <thead>
            <tr>
                <th data-card-title  scope="col">Building</th>
                <th data-card-action-links scope="col">Class Code</th>
                <th data-card-subtitle  scope="col">Capacity</th>
                <th data-card-subtitle scope='col'>Hall Access</th>
                <th  data-card-footer scope='col'></th>
                <th data-card-footer scope='col'></th>
            </tr>
            </thead>
        <?php $id = 1; ?>
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

                <tbody>
                <tr class="{{ $linecolor}}">
                    <td><a href="/class/{{ $class->id }}">
                            <button type="button" class="btn btn-link text-dark" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                {{ $class->Building }}
                            </button>
                        </a></td>
                    <td>{{ $class->ClassID }}</td>
                    <td>{{ $class->Capacity }}</td>
                    <td>{{ $class->Access }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal"
                                data-target="#delete">
                            <i class="fa fa-trash" aria-hidden="true" style="color: black"></i>
                        </button>

                        <!-- Modal to confirm Delete-->
                        <div class="modal fade text-center" id="delete" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">
                                            No
                                        </button>
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
                        <a class="btn btn-outline-danger btn-sm" href="/class/{{ $class->id }}/edit"><i class="fa fa-pencil-square" aria-hidden="true" style="color: black"></i></a>
                    </td>
                </tr>
                </tbody>

                @endforeach

            </table>
            {!!$classroom->render() !!}
            @else
                {{-- If there are no values to Display --}}
                <div class="alert alert-info" role="alert">
                    <div class="card text-center alert alert-info">
                        <div class="card-body alert alert-info">
                            <h5 class="card-title"><strong>Ooopss..!</strong></h5>
                            <p class="card-text"> There are no Classroom in this university...not yet</p>
                            <a href="/class/create" class="btn btn-outline-primary active-cyan-2">Add Entry</a>
                        </div>
                    </div>

                    @endif
                </div>
@endsection