@extends('layouts.app')
@section('content')


<div class="container">
  @if (count($department)>0)

  <div class="fab"> <a href="/department/create" class="a"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>
  <div class="tablesaw-overflow">
    <table class="table   table-hover table-responsive-sm" data-tablesaw-sortable data-tablesaw-sortable-switch >
      <thead>
        <tr>
          <th data-tablesaw-sortable-default-col>Faculty Name</th>
          <th data-tablesaw-sortable-col>Faculty ID</th>
          <th data-tablesaw-sortable-col>Department Name</th>
          <th data-tablesaw-sortable-col>Department ID</th>
          <th scope='col'> </th>
         
          

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
          <td><a href="{{ route('department.edit',$item->id)}}"
              class="btn btn-sm btn-rounded btn-outline-secondary my-0">Edit</a>  <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#delete">
              Delete
            </button></td>


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
<div class="alert " style=" background-color: #1e90ff;" role="alert">
  <div class="card text-center alert " style=" background-color: #1e90ff;">
    <div class="card-body alert " style=" background-color: #1e90ff;">
      <h5 class="card-title"><strong>Ooopss..!</strong></h5>
      <p class="card-text"> There are no departments in this university...not yet</p>
      <a href="/department/create" class="btn btn-outline-primary active-cyan-2">Add Entry</a>
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