@extends('layouts.app')
@section('content')
{{-- fORM DISPLAY --}}
<div class="card">
      <h5 class="card-header">Create a Class</h5>
        <div class="card-body">
      <form action="{{ url('/class/create')}}" method="post">
      @csrf
      <div class="row">
          <div class="form-group">
              <input type="hidden" value=" {{ csrf_token()}}" name="_token" />
          </div>
            <div class="col-sm-5">
              <strong>Building :</strong>
              <input type="text" name="Building" class="form-control" placeholder="Building" required>
            </div>
            <div class="col-sm-5">
              <strong>ClassID :</strong>
              <input class="form-control" placeholder="ClassID" name="ClassID" type="text" required ></input>
            </div>
            <div class="col-sm-5">
              <strong>Capacity :</strong>
              <input class="form-control" placeholder="Capacity" name="Capacity" type="number" required ></input>
            </div>
            <div class="col-sm-5 " >
            <strong>Access :</strong>
            <select type='text' name="Access" class="form-control" placeholder="Hall Access" class="col-sm-5 " required>
                <option disabled>Hall Access</option>
                <option value="Open">Open Hall</option>
                <option value="Dedicated Hall">Dedicated Hall for a faculty </option>
                <option value="Assigned Hall">Assigned for Hall</option>
            </select>  
          </div>
  </div>
  <hr>

    <div class="col-md-15">
      <a href="{{ route('class.index')}}" class="btn btn-sm btn-warning">Back</a>
      <button type="submit" class="btn btn-sm btn-primary">Submit</button>
    </div>
  </div>

  </form>
@endsection