
@extends('layouts.app')
@section('content')
<div class="container">
 

{{-- Display Free Periods Based on Date And Time --}}
<table class="table table-bodered">
        <thead >
            <tr>
            <th scope="col">#</th>
            <th scope="col">Building</th>
            <th scope="col">Class Code</th>
            <th scope="col">Capacity</th>
            <th scope='col'>Hall Access</th>
            <th scope='col'>PeriodID </th>
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
                        <td>{{ $class->PeriodID }}</td>
                        <td>{{ $class->Day }}</td>
      
                      </tr>
                    </tbody>
                 
            </div>
        @endforeach
        {{ $all->links() }}  
    </table>
</div>
</div>

@else
<p>No Available Classes</p>
@endif



@endsection
