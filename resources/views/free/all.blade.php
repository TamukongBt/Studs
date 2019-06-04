
@extends('layouts.app')
@section('content')
@include('incs.period'){{-- <-- this file includes the data neccesary to execute the check period and display the appropriate time--> --}}

<div class="container-fluid">
 

{{-- Display Free Periods Based on Date And Time --}}
<table class="table table-bodered table-hover">
        <thead >
            <tr>
            <th scope="col">#</th>
            <th scope="col">Building</th>
            <th scope="col">Class Code</th>
            <th scope="col">Capacity</th>
            <th scope='col'>Hall Access</th>
            <th scope='col'>Start Time </th>
            <th scope='col'>End Time </th>
            <th scope='col'>Day</th>
            </tr>
        </thead>
    </div>
    
    @if (count($all)>0)
        
       <?php $id=1; ?>
        @foreach ($all as $class)
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
                      <tr  class="{{ $linecolor}}">
                        <th scope="row">{{ $id++ }}</th>
                        <td> 
                              {{ $class->Building }}
                              </td>
                        <td>{{ $class->ClassID }}</td>
                        <td>{{ $class->Capacity }}</td>
                        <td>{{ $class->Access }}</td>
                        <td>
                                @php
                                
                                PeriodS( $class->PeriodID );
                            
                                @endphp
                            </td>
                            <td>
                                @php
                                PeriodE( $class->PeriodID );
                                @endphp  
                            </td>
                        <td>{{ $class->Day }}</td>
                        <td> 
                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModalCenter">
                                Book This Hall
                              </button>
                              
                              
                              <!-- Modal -->
                              
                              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content" style=" border: 1px solid rgba(18, 149, 182, 0.76);">
                                    <div class="card-header" style=" background-color: rgba(18, 149, 182, 0.76);">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Book a free hall</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-25px;">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div> 
                                    <div class="modal-body">
                                        {{-- Form to input Free Period request based on date and time--}}
                                            <form action="{{ url('/book')}}" method="post">
                                                @csrf
                                            <div class="row">
                                                    <div class="form-group">
                                                        <input type="hidden" value=" {{ csrf_token()}}" name="_token" />
                                                    </div>
                                                    <div class="form-group  col-md-12">
                                                        <strong>Building :</strong>
                                                            <input type="text" class="form-control" name="Building" value="{{ $class->Building }}">
                                                        </div>
                                                    <div class="form-group  col-md-12">
                                                    <strong>Day :</strong>
                                                        <input type="text" class="form-control" name="Day" value="{{ $class->Day }}">
                                                    </div>
                                                    <input type="hidden" class="form-control" name="PeriodID" value="{{ $class->PeriodID }}">
                                                    
                                                    <div class="form-group  col-md-12">
                                                    <strong>ClassID :</strong>
                                                        <input type="text" class="form-control" name="ClassID" value="{{ $class->ClassID }}" >
                                                    </div>
                                                    <div class="form-group  col-md-12">
                                                    <strong>Capacity :</strong>
                                                        <input type="number" class="form-control" name="Capacity" value="{{ $class->Capacity }}">
                                                    </div>
                                                    <div class="form-group  col-sm-4">
                                                    <strong>Access :</strong>
                                                    <input type="text" class="form-control" name="Access" value="{{ $class->Access }}">
                                                    </div>
                                                    <div class="form-group  col-sm-4">
                                                    <strong>Start Time: :</strong>
                                                    <input class="form-control"  name="StartTime" type="text" value="<?php PeriodS( $class->PeriodID ); ?>"  > 
                                                    </div>
                                                    <div class="form-group  col-sm-4">
                                                    <strong>End Time: :</strong>
                                                    <input class="form-control"  name="EndTime" type="text" value="<?php PeriodE( $class->PeriodID ); ?>"  > 
                                                    </div>
                                                    
                                                    <div class="form-group col-lg-12">
                                                        <label for="Note">Note</label>
                                                        <textarea id="Note" class="form-control" name="Note" rows="4" placeholder="Write Something....."> </textarea>
                                                    </div>
                                                    
                                                    </div> 
                                                    <div class="pull-right">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                                    </div> 
                                                        
                                            </form>
                                    </div>
                                        {{-- End of Form --}}
                                </div>
                                </div>
                                </div>
                            
                        </td>
                      </tr>
                    </tbody>
                 
            </div>
        @endforeach
       
    </table>
    {{ $all->links() }}  
</div>
</div>

@else
<p>No Available Classes</p>
@endif



@endsection
