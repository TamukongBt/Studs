@extends('layouts.app')
@section('content')

  <div class="container-fluid" style="width:90%; margin:auto;">

  @if (count($department)>0)
      @if (Auth::user()->admin==1)
  <div class="fab"> <a href="/department/create" class="a"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>
      @endif
  <div class="tablesaw-overflow">
    <table class="table  table-hover table-striped" id="myTable">
      <thead>
      <tr class="text-light" style="background-color:dodgerblue;">
        <th>Faculty Name</th>
        <th>Faculty ID</th>
        <th>Department Name</th>
        <th>Department ID</th>
        @if (Auth::user()->admin==1)
          <th scope='col'> </th>
        @endif
          

        </tr>
      </thead>

      <?php $id=1; ?>
      @foreach ($department as $item)


      <tbody>
        <tr>
          <td>
            {{ $item->DepartmentName}}
          </td>
          <td>{{ $item->DepartmentID }}</td>
          <td>{{ $item->FacultyName}}</td>
          <td>{{ $item->FacultyID }}</td>
          @if (Auth::user()->admin==1)
          <td><a href="{{ route('department.edit',$item->id)}}"
                 class="btn btn-sm btn-rounded btn-outline-secondary my-0"><i class="fa fa-pencil-square"
                                                                              aria-hidden="true"
                                                                              style="color: black"></i></a>
              <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#delete">
                  <i class="fa fa-trash" aria-hidden="true" style="color: black"></i>
            </button></td>
        @endif


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
                  <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">No</button>
                  <form action="{{  route('department.destroy', $item->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-outline-dark btn-sm" type="submit">Yes</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

      </tbody>

 
  @endforeach

  </table>
</div>

  
</div>
{!! $department->render() !!}
@else
{{-- If there are no values to Display --}}
<div class="alert alert-primary " role="alert">
  <div class="card text-center alert ">
    <div class="card-body alert ">
      <h5 class="card-title"><strong>Ooopss..!</strong></h5>
      <p class="card-text"> There are no departments in this university...not yet</p>
      @if (Auth::user()->admin==1)
      <a href="/department/create" class="btn btn-outline-primary active-cyan-2">Add Entry</a>
      @endif
    </div>
  </div>

  @endif


</div>

{{-- <script type="text/javascript">
  $('#search').on('keyup', function () {
    $value = $(this).val();
    $.ajax({
      type: 'get',
      url: '{{URL::to('lecturer/ search')}}',
      data: { 'search': $value },
      success: function (data) {
        $('tbody').html(data);
      }
});
})
</script>
<script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken': '{{ csrf_token() }}' } });
</script> --}}
@endsection