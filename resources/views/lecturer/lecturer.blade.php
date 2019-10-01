@extends('layouts.app')
@section('content')
    @if (Auth::user()->admin==0)
        <script>window.location.href = "/lindex"; </script>;
    @endif
<div class="container">
    @if (count($lecturer)>0)
    

    <!-- Search form -->
    <div class="md-form active-cyan active-cyan-2 mb-3">
      <input class="form-control" type="text" placeholder="Search" id="search" name="search" aria-label="Search">
      
    </div>
        @if (Auth::user()->admin==1)
    <div class="fab"><a href="/lecturer/create" class="a"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>
        @endif
    <div class="row">
    @foreach ($lecturer as $item)
    
    
      <div class="col-sm-4 ">
        <div class="card border-info mb-3" style="margin-bottom:8px;">
         
          <div class="card-header">{{ $item->title.' '.$item->LecturerName }}</div>
          <div class="card-body">
            <h5 class="card-title">Faculty: {{ $item->FacultyID}}</h5>
            <p class="card-text">Telephone: {{ $item->telephone }}</p>
            <small>Email: {{ $item->email }}</small>
            <div style="float:right; display:-webkit-inline-flex;">
                @if (Auth::user()->admin==1)
            <small ><a href="{{ route('lecturer.edit',$item->id)}}" class="btn btn-sm btn-rounded btn-outline-secondary my-0">Edit</a></small>
            <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#delete">
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
                      <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">No</button>
                      <form action="{{  route('lecturer.destroy', $item->id)}}" method="post">
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="DELETE">
                          <button class="btn btn-outline-dark btn-sm" type="submit">Yes</button>
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
    {!! $lecturer->render() !!}
    @else
    {{-- If there are no values to Display --}}
    <div class="alert alert-info" role="alert"> 
    <div class="card text-center alert alert-info">
        <div class="card-body alert alert-info">         
          <h5 class="card-title"><strong>Ooopss..!</strong></h5>
          <p class="card-text"> There are no Teachers in this university...not yet</p>
            @if (Auth::user()->admin==1)
          <a href="/lecturer/create" class="btn btn-outline-primary active-cyan-2">Add Entry</a>
            @endif
        </div>
      </div> 
     
    @endif
  
    
</div>



            <script type="text/javascript">
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
  </script>
@endsection