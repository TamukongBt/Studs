@extends('layouts.app')
@section('content')


    <div class="container-fluid" style="width:90%; margin:auto;">
    @if (count($option)>0)
    

    <!-- Search form -->
    <div class="md-form active-cyan active-cyan-2 mb-3">
        <input class="form-control" type="text" placeholder="Search" id="search" name="search" aria-label="Search">
    </div>
        @if (Auth::user()->admin==1)
    <div class="fab">  <a href="/option/create" class="a"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>
        @endif
    <div class="row">
    @foreach ($option as $item)
    
    
      <div class="col-sm-4 ">
        <div class="card border-primary mb-3" style="margin-bottom:8px;">
         
          <div class="card-header bg-info"><strong>{{ $item->Optionname.' '.'('.$item->OptionID.')' }}</strong></div>
          <div class="card-body">
            <p class="card-text"> <strong>Department: </strong>{{ $item->DepartmentID }}</p>
            <em>{{ $item->FacultyID }}</em>
            <div style="float:right; display:-webkit-inline-flex;">
                @if (Auth::user()->admin==1)
            <small ><a href="{{ route('option.edit',$item->id)}}" class="btn btn-sm btn-rounded btn-outline-primary my-0">Edit</a></small>
            <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#delete">
                Delete
              </button>
            @endif
              
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
            <div class="alert alert-info " role="alert">
                <div class="card text-center alert ">
                    <div class="card-body alert ">
                        <h5 class="card-title text-dark "><strong>Ooopss..!</strong></h5>
                        <p class="card-text text-dark"> There are no Options in this university...not yet</p>
                        @if (Auth::user()->admin==1)
          <a href="/option/create" class="btn btn-outline-dark">Add Entry</a>
                        @endif
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