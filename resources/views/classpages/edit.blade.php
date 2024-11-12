@extends('layouts.app')
@section('content')
      <!-- fORM -->
  
              
      <div class="card">
          <h5 class="card-header">Create a Class</h5>
            <div class="card-body">
                <form method="post" action="{{ route('class.update',['id' => $id])}}"  >
                   @csrf
                   @method('PUT')
                  <input name="_method" type="hidden" value="PUT">
                      <div class="form-group">
                      <input type="hidden" value="{{csrf_token()}}" name="_token" />
                      </div>
                    <div class="col-md-12">
                      <strong>Building :</strong>
                      <input type="text" name="Building" class="form-control" placeholder="Building" value={{ $class->Building }}  required>
                    </div>
                    <div class="col-md-12">
                      <strong>ClassID :</strong>
                      <input class="form-control" placeholder="ClassID" name="ClassID" type="text" required  value={{ $class->ClassID }}></input>
                    </div>
                    <div class="col-md-12">
                      <strong>Capacity :</strong>
                      <input class="form-control" placeholder="Capacity" name="Capacity" type="number" required value={{ $class->Capacity }} ></input>
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
                    <div class="col-md-12 modal-footer">
                      <a href="{{ route('class.index')}}" class="btn btn-sm btn-warning">Back</a>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                  </div>
                </div>
              
    
@endsection
