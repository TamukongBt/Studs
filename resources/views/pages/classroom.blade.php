@extends('layouts.app')
@section('content')
    <style>

    </style>
    <div class="container-fluid" style="width:90%; margin:auto;">


        @if (count($classroom)>0)
            @if (Auth::user()->admin==1)
                <div class="fab">  <a href="/class/create" class="a"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>
            @endif

            <table class="table table-striped table-hover" id="myTable">
                <thead>
                <tr class="text-light" style="background-color:#4169e1;">
                    <th>Building</th>
                    <th>Class Code</th>
                    <th>Capacity</th>
                    <th>Hall Access</th>
                    @if (Auth::user()->admin==1)
                        <th></th>
                    @endif
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
                                {{ $class->Building }}

                            </a></td>
                        <td>{{ $class->ClassID }}</td>
                        <td>{{ $class->Capacity }}</td>
                        <td>{{ $class->Access }}</td>
                        @if (Auth::user()->admin==1)
                            <td style="display: flex;">

                                <a class="btn btn-outline-dark btn-sm" href="/class/{{ $class->id }}/edit"><i
                                            class="fa fa-pencil-square" aria-hidden="true" style="color: black"></i></a>
                                <p></p>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
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
                        @endif
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
                        @if (Auth::user()->admin==1)
                            <a href="/class/create" class="btn btn-outline-primary active-cyan-2">Add Entry</a>
                        @endif
                    </div>
                </div>

                @endif
            </div>

    </div>
@endsection