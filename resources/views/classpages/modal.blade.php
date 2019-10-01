@extends('layouts.app')
@section('content')
  <div>
    <div class="jumbotron">
      <div class="container">
        <h1>{{ $class->Building }}</h1>
        <p>Pli plu korpo kaj sciis vin, pro mia ne por longeco devas. Kaj cxiuj tiom mian kaj mi bona okazo por sxangxo, liberigota terbordon por estis nomo mi. Malproksime cxar la malproksime nelonge pafilo malgraux, ni al la tial la.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
  </div>

<div class="pull-right">
    <a href="/class" class="btn btn-light">Go Back</a>
  </div>
<hr>
  @if (Auth::user()->admin==1)
      <div>
          <a class="btn btn-outline-light btn-sm"
             href="/course/{{ $class->id }}/edit"><i class="fa fa-pencil-square"
                                                     aria-hidden="true"
                                                     style="color: black"></i></a>
      </div>
      <div>
          <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#delete">
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
                          <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">No</button>
                          <form action="{{  route('course.destroy', $class->id)}}" method="post">
                              {{csrf_field()}}
                              <input name="_method" type="hidden" value="DELETE">
                              <button class="btn btn-outline-dark btn-sm" type="submit">Yes</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  @endif

@endsection

