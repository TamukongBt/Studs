@extends('layouts.app')
@section('content')


<div class="container">
    @if (count($option)>0)
    

    <!-- Search form -->
    <div class="md-form active-cyan active-cyan-2 mb-3">
      <input class="form-control" type="text" placeholder="Search" id="search" name="search" aria-label="Search">
      
    </div>
    <a href="/option/create" class="btn btn-outline-primary active-cyan-2">Add Entry</a>
    <div class="row">
    @foreach ($option as $item)
    
    
      <div class="col-sm-4 ">
        <div class="card border-primary mb-3" style="margin-bottom:8px;">
         
          <div class="card-header bg-info"><strong>{{ $item->Optionname.' '.'('.$item->OptionID.')' }}</strong></div>
          <div class="card-body">
            <p class="card-text"> <strong>Department: </strong>{{ $item->DepartmentID }}</p>
            <em>{{ $item->FacultyID }}</em>
            <div style="float:right; display:-webkit-inline-flex;">
            <small ><a href="{{ route('option.edit',$item->id)}}" class="btn btn-sm btn-rounded btn-outline-primary my-0">Edit</a></small>
            <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#delete">
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
                      <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">No</button>
                      <form action="{{  route('option.destroy', $item->id)}}" method="post">
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="DELETE">
                          <button class="btn btn-outline-primary btn-sm" type="submit">Yes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            
          </div>
          </div>
        </div>
      </div>
      
    
    @endforeach
  </div>
    {!! $option->render() !!}
    @else
    {{-- If there are no values to Display --}}
    <div class="alert alert-info "  style=" background-color: #1e90ff;" role="alert"> 
    <div class="card text-center alert " style=" background-color: #1e90ff;">
        <div class="card-body alert " style=" background-color: #1e90ff;">         
          <h5 class="card-title text-dark " style=" background-color: #1e90ff;"><strong>Ooopss..!</strong></h5>
          <p class="card-text text-dark" style=" background-color: #1e90ff;"> There are no Options in this university...not yet</p>
          <a href="/option/create" class="btn btn-outline-dark">Add Entry</a>
        </div>
      </div> 
     
    @endif
  
    
</div>

{{-- <script type="text/javascript">
  $('#search').on('keyup',function(){
  $value=$(this).val();
  $.ajax({
  type : 'get',
  url : '{{URL::to('lecturer/search')}}',
  data:{'search':$value},
  success:function(data){
  $('tbody').html(data);
  }
  });
  })
  </script>
  <script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
  </script> --}}
@endsection