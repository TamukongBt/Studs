
@extends('layouts.app')
@section('content')
@include('incs.period'){{-- <-- this file includes the data neccesary to execute the check period and display the appropriate time--> --}}

<div class="container">
 

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
    @if (count($free)>0)
        
       <?php $id=1; ?>
        @foreach ($free as $class)
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
      
                      </tr>
                    </tbody>
                 
            </div>
        @endforeach
        
    </table>
    {{ $free->links() }}  
</div>
</div>

@else
{{-- If there are no values to Display --}}
<div class="alert alert-warning" role="alert"> 
    <div class="card text-center alert alert-warning">
        <div class="card-body alert alert-warning">         
          <h5 class="card-title"><strong>Ooopss..!</strong></h5>
          <p class="card-text"> There are no Free Classes Now</p>
        </div>
      </div> 
@endif



@endsection
